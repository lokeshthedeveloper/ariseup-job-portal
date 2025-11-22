# How to Run the Application

## 🚀 Quick Start (Using Docker)

### Step 1: Start Docker Containers

```bash
# Navigate to the project root
cd /Users/lokeshsalvi/Workspace/demo-portal

# Start the Docker containers
docker-compose up -d
```

This will start:
- **App Container** (Laravel) on port 8000
- **Database Container** (MySQL) on port 3307

### Step 2: Clear All Laravel Caches

```bash
# Clear all caches to see your changes
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan route:clear
docker-compose exec app php artisan view:clear
```

### Step 3: Set Proper Permissions

```bash
# Fix storage permissions
docker-compose exec app chmod -R 775 storage bootstrap/cache
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
```

### Step 4: Access Your Application

Open your browser and visit:
- **Frontend Home**: http://localhost:8000/
- **Blog Listing**: http://localhost:8000/blog
- **Blog Detail**: http://localhost:8000/blog/top-10-tips-for-writing-a-winning-resume
- **Contact Page**: http://localhost:8000/contact
- **Company Registration**: http://localhost:8000/company-registration/register
- **Admin Login**: http://localhost:8000/admin/login

---

## 🔄 If Changes Still Don't Show

### Option 1: Restart Containers
```bash
# Stop containers
docker-compose down

# Start containers again
docker-compose up -d

# Clear caches again
docker-compose exec app php artisan optimize:clear
```

### Option 2: Rebuild Containers (if needed)
```bash
# Stop and remove containers
docker-compose down

# Rebuild and start
docker-compose up -d --build

# Clear caches
docker-compose exec app php artisan optimize:clear
```

---

## 📋 Useful Docker Commands

### Check Container Status
```bash
docker-compose ps
```

### View Logs
```bash
# All logs
docker-compose logs

# App logs only
docker-compose logs app

# Follow logs (live)
docker-compose logs -f app
```

### Access Container Shell
```bash
# Access the app container
docker-compose exec app bash

# Once inside, you can run artisan commands directly
php artisan route:list
php artisan cache:clear
```

### Stop Containers
```bash
docker-compose stop
```

### Start Containers
```bash
docker-compose start
```

### Restart Containers
```bash
docker-compose restart
```

---

## 🐛 Troubleshooting

### Issue: "Connection refused" or "502 Bad Gateway"
**Solution**: Wait 30 seconds after starting containers, then try again. The app container needs time to initialize.

### Issue: Assets (CSS/JS/Images) not loading
**Solution**:
1. Check if files exist:
```bash
docker-compose exec app ls -la public/frontend-assets
```

2. Fix permissions:
```bash
docker-compose exec app chmod -R 755 public/frontend-assets
```

### Issue: Page shows but without styles
**Solution**:
1. Clear browser cache (Ctrl+Shift+R or Cmd+Shift+R)
2. Check browser console for errors (F12)
3. Verify assets path in browser: http://localhost:8000/frontend-assets/css/main.css

### Issue: "View not found" error
**Solution**:
```bash
docker-compose exec app php artisan view:clear
docker-compose exec app php artisan config:clear
```

### Issue: Database connection error
**Solution**:
1. Make sure database container is running:
```bash
docker-compose ps
```

2. Check database logs:
```bash
docker-compose logs db
```

3. If needed, restart:
```bash
docker-compose restart db
```

---

## 🔧 Alternative: Run Without Docker (Local PHP)

If you prefer to run without Docker:

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL
- Node.js (for assets, if needed)

### Steps
```bash
# Navigate to job-backend
cd job-backend

# Install dependencies (if not already done)
composer install

# Copy .env file (if not exists)
cp .env.example .env

# Generate application key
php artisan key:generate

# Update .env with your local database credentials
# DB_HOST=127.0.0.1
# DB_DATABASE=job-portal
# DB_USERNAME=root
# DB_PASSWORD=your_password

# Run migrations
php artisan migrate

# Clear all caches
php artisan optimize:clear

# Start development server
php artisan serve
```

Then visit: http://localhost:8000

---

## ✅ Verification Checklist

After starting the application, verify:

- [ ] Home page loads at http://localhost:8000/
- [ ] You see the hero section with "WELCOME TO JOBPORTAL"
- [ ] Navigation menu shows: Home, About, Services, Pricing, Blog, Jobs, Contact
- [ ] Footer is visible at bottom
- [ ] Blog page loads at http://localhost:8000/blog
- [ ] Contact page loads at http://localhost:8000/contact
- [ ] CSS styles are applied (page looks styled, not plain HTML)
- [ ] No JavaScript errors in browser console (F12)

---

## 📞 Quick Reference

| What | Command |
|------|---------|
| Start app | `docker-compose up -d` |
| Stop app | `docker-compose down` |
| View logs | `docker-compose logs -f app` |
| Clear cache | `docker-compose exec app php artisan optimize:clear` |
| Access shell | `docker-compose exec app bash` |
| Restart | `docker-compose restart` |

---

## 🎯 Common Workflow

**Daily Development:**
```bash
# Start containers in the morning
docker-compose up -d

# Make code changes...

# If you change routes or config
docker-compose exec app php artisan optimize:clear

# View logs if something breaks
docker-compose logs -f app

# Stop containers when done
docker-compose stop
```

**After Pulling Code Changes:**
```bash
# Restart containers
docker-compose restart

# Clear all caches
docker-compose exec app php artisan optimize:clear

# If composer.json changed
docker-compose exec app composer install

# If migrations changed
docker-compose exec app php artisan migrate
```

---

Need help? Check the container logs!
