# Laravel Job Portal - Codebase Overview & Architecture Analysis

## 1. OVERALL FOLDER STRUCTURE

```
job-backend/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          (16 controllers for admin panel)
│   │   │   ├── Api/            (17 API endpoint controllers)
│   │   │   └── Controller.php   (base controller)
│   │   ├── Middleware/
│   │   │   └── IsAdmin.php      (admin authorization middleware)
│   │   └── Requests/           (28 form request classes for validation)
│   ├── Models/                 (18 Eloquent models)
│   ├── Services/               (2 service classes)
│   └── Providers/              (AppServiceProvider)
├── routes/
│   ├── api.php                (282 lines - API routes with Sanctum auth)
│   ├── web.php                (145 lines - Web routes with session auth)
│   └── console.php
├── database/
│   ├── migrations/            (25 migrations)
│   ├── factories/
│   └── seeders/
├── config/
│   ├── auth.php              (authentication config)
│   └── ... (other configs)
├── resources/
├── public/
├── bootstrap/
├── storage/
├── vendor/
├── composer.json
├── composer.lock
└── .env

```

## 2. SUPER ADMIN IMPLEMENTATION

### Current Status
- **NOT IMPLEMENTED**: The codebase has "admin" role but NO "sub_admin" module yet
- **Super Admin Role**: Uses the generic "admin" role in the User model
- **Latest Migration**: `2025_11_20_154056_modify_role_enum_in_users_table.php` added 'sub_admin' enum value to users.role column (but no implementation yet)

### User Model (app/Models/User.php)
```php
protected $fillable = [
    'name', 'email', 'password', 'role', 'phone', 'phone_verified_at'
];

// Role checking methods
public function isAdmin(): bool { return $this->role === 'admin'; }
public function isCompany(): bool { return $this->role === 'company'; }

// Uses HasApiTokens from Sanctum for API token generation
use HasFactory, Notifiable, HasApiTokens;
```

### Current Role Structure (ENUM in Database)
```
admin      - Super admin (full access)
user       - Regular user
company    - Company account
sub_admin  - [PLACEHOLDER] Added but not implemented
```

### Middleware (app/Http/Middleware/IsAdmin.php)
```php
- Checks if user is authenticated
- Verifies user->isAdmin() returns true
- Returns 403 Unauthorized if not admin
- Redirects to login if not authenticated
```

**Note**: This middleware is only used in web routes, not API routes.

---

## 3. CURRENT AUTHENTICATION SETUP

### Type: **Laravel Sanctum (Token-Based API Authentication)**

#### Key Components:
- **Laravel Version**: ^12.0 (latest)
- **Authentication Package**: `laravel/sanctum: ^4.2`
- **Session-Based Auth**: For admin web panel (web.php)
- **Token-Based Auth**: For API endpoints (sanctum middleware)

#### Auth Flow:

**API (Company Registration)**
- POST /api/company/register → Create user + company
- POST /api/company/verify-otp → Verify email/phone
- POST /api/company/login → Returns sanctum token
- GET /api/... → Requires `auth:sanctum` middleware
- POST /api/company/logout → Revokes token

**Web (Admin Dashboard)**
- GET /admin/login → Session login form
- POST /admin/login → Session-based auth check
- Auth::attempt() → Validates credentials
- Must pass isAdmin() check
- GET /admin/dashboard → Session authenticated
- POST /admin/logout → Destroys session

### Config Auth (config/auth.php)
```php
'defaults' => [
    'guard' => env('AUTH_GUARD', 'web'),  // Default: 'web' (session)
    'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
],

'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => env('AUTH_MODEL', App\Models\User::class),
    ],
],
```

### Other Auth Features:
- **Password Reset**: Token-based password reset links
- **Social Auth**: Laravel Socialite integration (redirectToProvider, handleProviderCallback)
- **OTP Verification**: Email/Phone OTP service (but middleware checks auth:sanctum)

---

## 4. DATABASE MIGRATION PATTERNS

### Convention Used
```
YYYY_MM_DD_HHMMSS_description_of_table.php
Example: 2025_11_20_105151_create_cities_table.php
```

### Migration Structure Pattern
```php
return new class extends Migration {
    public function up(): void {
        Schema::create('table_name', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes for performance
            $table->index('status');
            $table->index('category_id');
        });
    }

    public function down(): void {
        Schema::dropIfExists('table_name');
    }
};
```

### Key Patterns:
1. **Soft Deletes**: Most models use SoftDeletes trait
2. **Status Field**: Uses tinyInteger (0=inactive, 1=active)
3. **Foreign Keys**: Explicit ->constrained()->onDelete('cascade')
4. **Timestamps**: All tables have created_at, updated_at
5. **Indexes**: Added on frequently queried columns (status, foreign keys, search fields)
6. **Unique Constraints**: Custom composite unique constraints (e.g., skill name per category)

### Example Migrations:
- **2025_11_19_212501_create_skills_table.php** - Has composite unique constraint
- **2025_11_20_105151_create_cities_table.php** - Belongs to state & country
- **2025_11_12_140727_create_otps_table.php** - For verification

### Relationship Tables Pattern:
```php
// Foreign Keys use naming: singular_id (e.g., skill_category_id)
$table->foreignId('skill_category_id')->constrained('skill_categories')->onDelete('cascade');
```

---

## 5. SERVICE LAYER PATTERNS

### Location: app/Services/

#### 1. **OtpService.php** (3,567 bytes)
```php
namespace App\Services;

class OtpService {
    public function generateAndSend(string $identifier, string $type): array
    
    public function verify(string $identifier, string $type, string $otpCode): array
    
    protected function sendEmailOtp(string $email, string $otpCode): void
    protected function sendPhoneOtp(string $phone, string $otpCode): void
}
```

**Pattern Used**:
- Dependency Injection in controllers
- Returns consistent array response structure
- Logging for debugging
- Transaction handling for database operations

**Return Format**:
```php
[
    'success' => bool,
    'message' => string,
    'expires_at' => Carbon,
    'error' => string,
]
```

#### 2. **SocialAuthService.php** (2,769 bytes)
```php
namespace App\Services;

class SocialAuthService {
    // Handles OAuth with Socialite
    // Used in CompanyAuthController
}
```

### Service Usage Pattern:
```php
// In Controller
public function __construct(OtpService $otpService)
{
    $this->otpService = $otpService;
}

public function verify(Request $request)
{
    $result = $this->otpService->verify($identifier, $type, $otp);
    
    if ($result['success']) {
        // Handle success
    }
}
```

### Database Transaction Pattern in Services:
```php
public function store(Request $request)
{
    try {
        DB::beginTransaction();
        // Create model
        Model::create($validated);
        DB::commit();
        return response()->json([...], 201);
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error: ' . $e->getMessage());
        return response()->json([...], 500);
    }
}
```

---

## 6. API STRUCTURE & NAMING CONVENTIONS

### Route Prefix Pattern
```php
Route::prefix('resource-name')->group(function () {
    // All routes use lowercase with hyphens
    Route::get('/', [ResourceController::class, 'index']);
    Route::get('/{id}', [ResourceController::class, 'show']);
    Route::post('/', [ResourceController::class, 'store']);
    Route::put('/{id}', [ResourceController::class, 'update']);
    Route::patch('/{id}/toggle-status', [ResourceController::class, 'toggleStatus']);
    Route::delete('/{id}', [ResourceController::class, 'destroy']);
});
```

### API Response Format
```json
{
    "success": true,
    "message": "Operation successful",
    "data": {...},
    "errors": {...}
}
```

### HTTP Status Codes Used
```
200 - OK (GET, PUT, PATCH)
201 - Created (POST)
204 - No Content
400 - Bad Request
401 - Unauthorized
403 - Forbidden
404 - Not Found
422 - Validation Failed
500 - Server Error
```

### Naming Conventions:

#### Routes (kebab-case)
```
/api/skill-categories
/api/job-roles
/api/education-levels
/api/company
```

#### Controllers (PascalCase)
```
SkillCategoryController
JobRoleController
EducationLevelController
CompanyAuthController
```

#### Models (PascalCase, Singular)
```
SkillCategory
JobRole
EducationLevel
Company
```

#### Database Tables (snake_case, Plural)
```
skill_categories
job_roles
education_levels
companies
```

#### Requests (PascalCase with prefix)
```
StoreSkillCategoryRequest
UpdateSkillCategoryRequest
StoreSkillRequest
UpdateSkillRequest
```

### Controller Method Naming (RESTful)
```
index()      - GET /api/resources
show()       - GET /api/resources/{id}
store()      - POST /api/resources
update()     - PUT /api/resources/{id}
destroy()    - DELETE /api/resources/{id}
toggleStatus() - PATCH /api/resources/{id}/toggle-status
active()     - GET /api/resources/active (custom action)
getByCategory() - GET /api/resources/category/{id} (custom action)
```

### Validation Request Classes Pattern

Each resource has Store & Update requests:

```php
namespace App\Http\Requests;

class StoreSkillCategoryRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    
    public function rules(): array { 
        return ['name' => 'required|string|max:255|unique:...'];
    }
    
    public function messages(): array { 
        return ['name.required' => 'Custom message'];
    }
    
    protected function prepareForValidation(): void { 
        // Data transformation before validation
    }
}
```

---

## 7. MODEL PATTERNS & RELATIONSHIPS

### Base Model Features (Example: SkillCategory)
```php
use HasFactory, SoftDeletes;

protected $fillable = ['name', 'status'];
protected $casts = ['status' => 'integer', 'created_at' => 'datetime'];

// Relationships
public function skills(): HasMany { 
    return $this->hasMany(Skill::class, 'skill_category_id');
}

// Query Scopes
public function scopeActive($query) { return $query->where('status', 1); }
public function scopeInactive($query) { return $query->where('status', 0); }

// Helper Methods
public function isActive(): bool { return $this->status === 1; }
public function toggleStatus(): bool { 
    $this->status = $this->status === 1 ? 0 : 1;
    return $this->save();
}
```

### Common Model Traits
- `HasFactory` - For database seeding
- `SoftDeletes` - For soft deletion (keeps data in DB)
- `Notifiable` - For sending notifications
- `HasApiTokens` - For Sanctum API tokens (User model only)

---

## 8. CONTROLLER PATTERNS

### Web Controller (Admin) Pattern
```php
class SkillCategoryController extends Controller {
    // index() - Show listing with search/filters and pagination
    public function index(Request $request) {
        $query = SkillCategory::query();
        if ($request->has('search')) { $query->where('name', 'like', ...); }
        if ($request->has('status')) { $query->where('status', ...); }
        $categories = $query->paginate(15);
        return view('admin.skill-categories.index', compact('categories'));
    }
    
    // create() - Show form for creating
    // store() - Save to database with transaction and error handling
    // show() - Display details with relationships
    // edit() - Show edit form
    // update() - Update with transaction
    // toggleStatus() - Patch request to toggle status
    // destroy() - Delete with business logic checks
}
```

### API Controller Pattern
```php
class SkillCategoryController extends Controller {
    // Similar CRUD methods but:
    // - Return JsonResponse instead of views
    // - Use Form Requests for validation
    // - Include error handling with DB transactions
    // - Log errors using Log::error()
    // - Return consistent JSON structure
    
    public function store(StoreSkillCategoryRequest $request): JsonResponse {
        try {
            DB::beginTransaction();
            $category = SkillCategory::create($request->validated());
            DB::commit();
            return response()->json([...], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error: ' . $e->getMessage());
            return response()->json([...], 500);
        }
    }
}
```

---

## 9. EXISTING MODELS (18 Total)

```
Core:
- User (with isAdmin(), isCompany() methods)
- Company (belongsTo User)
- Otp
- SocialAccount

Education:
- University
- EducationLevel
- Course
- Specialization

Skills & Categories:
- Skill
- SkillCategory

Jobs & Roles:
- JobTitle
- JobRole
- RoleCategory
- Department

Geography:
- Country
- State
- City

Industry:
- Industry
```

---

## 10. MIDDLEWARE & GUARDS

### Current Middleware
1. **IsAdmin** - Web middleware for admin auth
   - Checks auth()->check()
   - Validates isAdmin() method
   - Returns 403 if unauthorized

### Middleware Groups (Inferred from routes)
```php
'web' => [...standard web middleware...]
'api' => [...standard API middleware...]
'admin' => ['auth', 'admin'] // Custom middleware group
'sanctum' => [...standard Sanctum middleware...]
```

### Guards
- **web** - Session-based (default)
- **api** - Sanctum token-based (implicit)

---

## 11. EXISTING ADMIN CONTROLLERS (16 Total)

1. AuthController - Login/Logout/Password Reset
2. CompanyController - Company CRUD
3. SkillCategoryController - Skill Category CRUD
4. SkillController - Skill CRUD
5. UniversityController - University CRUD
6. EducationLevelController - Education Level CRUD
7. CourseController - Course CRUD
8. SpecializationController - Specialization CRUD
9. IndustryController - Industry CRUD
10. JobTitleController - Job Title CRUD
11. DepartmentController - Department CRUD
12. RoleCategoryController - Role Category CRUD
13. JobRoleController - Job Role CRUD
14. CountryController - Country CRUD
15. StateController - State CRUD
16. CityController - City CRUD

---

## 12. EXISTING API CONTROLLERS (17 Total)

1. CompanyAuthController - Company register/login/verify/OTP
2. SkillCategoryController
3. SkillController
4. UniversityController
5. EducationLevelController
6. CourseController
7. SpecializationController
8. IndustryController
9. JobTitleController
10. DepartmentController
11. RoleCategoryController
12. JobRoleController
13. CountryController
14. StateController
15. CityController

---

## 13. KEY OBSERVATIONS FOR SUB-ADMIN MODULE

### What Already Exists:
- User model with role-based checking
- Admin middleware for authorization
- Admin controllers with full CRUD patterns
- Request validation classes
- Service layer for complex operations
- Database transaction patterns
- Soft delete support
- Status toggle functionality
- Search & filter patterns
- Pagination patterns

### What Needs to Be Built:
1. Sub-Admin Model (or extend User with additional fields)
2. Sub-Admin middleware (similar to IsAdmin)
3. Sub-Admin authentication controller
4. Sub-Admin CRUD controller
5. Sub-Admin request validation classes
6. Sub-Admin menu/dashboard views
7. Permission/role-based access control (if needed)
8. Sub-Admin activity logging/auditing (optional)
9. Sub-Admin assignment to resources (companies, departments, etc.)

### Recommended Approach:
1. Use existing role-based approach (extend User model with 'sub_admin' role)
2. Follow existing controller patterns (web + API)
3. Create Sub-Admin service layer if complex business logic needed
4. Use existing middleware pattern as template
5. Follow existing database migration patterns
6. Use existing form request validation approach

---

## 14. KEY FILES & PATHS

### Authentication
- Config: `/config/auth.php`
- User Model: `/app/Models/User.php`
- Middleware: `/app/Http/Middleware/IsAdmin.php`

### Services
- `/app/Services/OtpService.php`
- `/app/Services/SocialAuthService.php`

### Routes
- Web Routes: `/routes/web.php` (145 lines)
- API Routes: `/routes/api.php` (282 lines)

### Controllers (Sample Paths)
- Admin: `/app/Http/Controllers/Admin/AuthController.php`
- API: `/app/Http/Controllers/Api/CompanyAuthController.php`

### Models (Sample Paths)
- `/app/Models/User.php`
- `/app/Models/Company.php`
- `/app/Models/SkillCategory.php`

### Requests
- `/app/Http/Requests/StoreSkillCategoryRequest.php`
- `/app/Http/Requests/UpdateSkillCategoryRequest.php`

### Migrations
- Recent: `/database/migrations/2025_11_20_154056_modify_role_enum_in_users_table.php`

---

## 15. ARCHITECTURE SUMMARY

### Architecture Type: **MVC + Service Layer + RESTful API**

```
Request → Routes → Middleware → Controller → Service/Model → Database
                                         ↓
                              Validation Request
                              Transaction Handling
                              Logging
                              
Response ← JSON/View ← Response Format ← Query Results
```

### Key Architectural Decisions:
1. **Dual Authentication**: Session for web admin, Sanctum for API
2. **Role-Based Access**: Simple role field in users table (no separate permissions table)
3. **Service Layer**: For complex operations (OTP, Social Auth)
4. **Form Request Validation**: Centralized validation logic
5. **Soft Deletes**: Keep data for auditing
6. **Transaction Handling**: Important operations wrapped in DB::transaction
7. **JSON API**: Consistent response structure with success/error handling
8. **Logging**: Log::error() for all exceptions

### Standards Followed:
- PSR-4 Autoloading
- Laravel Conventions (Models, Controllers, Routes)
- RESTful API design
- Semantic HTTP status codes
- Consistent naming conventions

---

## NEXT STEPS FOR SUB-ADMIN MODULE

Based on this analysis, the Sub-Admin module should:

1. ✓ Use existing User model with 'sub_admin' role (already added to enum)
2. Create SubAdminController (web) following AuthController pattern
3. Create Sub-Admin API controllers if API endpoints needed
4. Create Sub-Admin request validation classes
5. Create SubAdmin middleware (similar to IsAdmin)
6. Update existing IsAdmin/IsSuperAdmin middleware logic
7. Create Sub-Admin views (login, dashboard, assignment management)
8. Define Sub-Admin permissions/capabilities
9. Create Sub-Admin management interface in admin panel
10. Add Sub-Admin database migration (if additional fields needed)

