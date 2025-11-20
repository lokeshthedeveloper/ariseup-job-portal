# Company Registration Setup Guide

This document explains how to configure and use the company/consultancy registration system with OTP verification and social login.

## Features Implemented

- Company/Consultancy registration with essential information
- OTP verification via Email or Mobile (user's choice)
- Social login integration (Google, Facebook, LinkedIn)
- API authentication using Laravel Sanctum
- Secure password hashing
- Rate limiting and validation

## Database Schema

### Tables Created
- `users` - User accounts (updated with phone fields)
- `companies` - Company profiles linked to users
- `otps` - OTP verification codes
- `social_accounts` - Social login provider accounts
- `personal_access_tokens` - Sanctum API tokens

## Environment Configuration

Add the following to your `.env` file:

```env
# Social Login Providers
# Google OAuth
GOOGLE_CLIENT_ID=your-google-client-id
GOOGLE_CLIENT_SECRET=your-google-client-secret
GOOGLE_REDIRECT_URI=${APP_URL}/api/company/auth/google/callback

# Facebook OAuth
FACEBOOK_CLIENT_ID=your-facebook-app-id
FACEBOOK_CLIENT_SECRET=your-facebook-app-secret
FACEBOOK_REDIRECT_URI=${APP_URL}/api/company/auth/facebook/callback

# LinkedIn OAuth
LINKEDIN_CLIENT_ID=your-linkedin-client-id
LINKEDIN_CLIENT_SECRET=your-linkedin-client-secret
LINKEDIN_REDIRECT_URI=${APP_URL}/api/company/auth/linkedin/callback

# Twilio (for SMS OTP - Optional)
TWILIO_SID=your-twilio-account-sid
TWILIO_TOKEN=your-twilio-auth-token
TWILIO_FROM=your-twilio-phone-number

# Mail Configuration (for Email OTP)
MAIL_MAILER=smtp
MAIL_HOST=your-mail-host
MAIL_PORT=587
MAIL_USERNAME=your-mail-username
MAIL_PASSWORD=your-mail-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourapp.com
MAIL_FROM_NAME="${APP_NAME}"
```

## Setup Instructions

1. **Run migrations:**
   ```bash
   php artisan migrate
   ```

2. **Configure social providers:**
   - Create apps on Google, Facebook, and LinkedIn developer consoles
   - Add the OAuth credentials to your `.env` file
   - Set up redirect URLs in each provider's settings

3. **Configure email service:**
   - Set up your mail server credentials in `.env`
   - Test email sending to ensure OTP emails work

4. **Configure SMS provider (Optional):**
   - Sign up for Twilio or another SMS provider
   - Add credentials to `.env`
   - Uncomment the Twilio code in `app/Services/OtpService.php`

## API Endpoints

### Public Endpoints (No Authentication Required)

#### 1. Register Company
```http
POST /api/company/register
Content-Type: application/json

{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123",
  "phone": "+1234567890",
  "company_name": "Acme Corp",
  "company_type": "company",  // or "consultancy"
  "verification_method": "email"  // or "phone"
}

Response:
{
  "success": true,
  "message": "Company registered successfully. Please verify your email",
  "user_id": 1,
  "verification_method": "email",
  "otp_expires_at": "2025-11-12T15:30:00.000000Z"
}
```

#### 2. Verify OTP
```http
POST /api/company/verify-otp
Content-Type: application/json

{
  "identifier": "john@example.com",  // email or phone
  "type": "email",  // or "phone"
  "otp": "123456"
}

Response:
{
  "success": true,
  "message": "Email verified successfully",
  "user": { ... },
  "token": "1|abcdef..."
}
```

#### 3. Resend OTP
```http
POST /api/company/resend-otp
Content-Type: application/json

{
  "identifier": "john@example.com",
  "type": "email"
}

Response:
{
  "success": true,
  "message": "Email OTP sent successfully",
  "expires_at": "2025-11-12T15:40:00.000000Z"
}
```

#### 4. Login
```http
POST /api/company/login
Content-Type: application/json

{
  "email": "john@example.com",
  "password": "password123"
}

Response:
{
  "success": true,
  "user": { ... },
  "token": "2|ghijkl..."
}
```

#### 5. Social Login
```http
GET /api/company/auth/{provider}
// Redirects to provider login page
// Provider can be: google, facebook, linkedin

GET /api/company/auth/{provider}/callback
// Callback URL after social provider authentication
// Returns user data and token
```

### Protected Endpoints (Authentication Required)

Add the token to the Authorization header: `Bearer {token}`

#### 6. Get Current User
```http
GET /api/company/me
Authorization: Bearer {token}

Response:
{
  "success": true,
  "user": {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "company": { ... }
  }
}
```

#### 7. Logout
```http
POST /api/company/logout
Authorization: Bearer {token}

Response:
{
  "success": true,
  "message": "Logged out successfully"
}
```

## Security Features

1. **Password Hashing**: Uses bcrypt hashing
2. **OTP Expiration**: OTPs expire after 10 minutes
3. **One-time Use**: OTPs can only be used once
4. **Token-based Auth**: Uses Laravel Sanctum tokens
5. **Rate Limiting**: API endpoints are rate-limited
6. **Input Validation**: All inputs are validated
7. **CSRF Protection**: Built-in Laravel protection

## Frontend Integration Example

```javascript
// 1. Register company
const register = async () => {
  const response = await fetch('http://yourapp.com/api/company/register', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      name: 'John Doe',
      email: 'john@example.com',
      password: 'password123',
      password_confirmation: 'password123',
      phone: '+1234567890',
      company_name: 'Acme Corp',
      company_type: 'company',
      verification_method: 'email'
    })
  });
  const data = await response.json();
  return data;
};

// 2. Verify OTP
const verifyOtp = async (email, otp) => {
  const response = await fetch('http://yourapp.com/api/company/verify-otp', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      identifier: email,
      type: 'email',
      otp: otp
    })
  });
  const data = await response.json();
  // Store the token
  localStorage.setItem('token', data.token);
  return data;
};

// 3. Make authenticated requests
const getMe = async () => {
  const token = localStorage.getItem('token');
  const response = await fetch('http://yourapp.com/api/company/me', {
    headers: {
      'Authorization': `Bearer ${token}`,
    }
  });
  return await response.json();
};
```

## Testing

You can test the API using tools like:
- Postman
- Insomnia
- cURL
- HTTPie

Example cURL command:
```bash
curl -X POST http://yourapp.com/api/company/register \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Test User",
    "email": "test@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "phone": "+1234567890",
    "company_name": "Test Company",
    "company_type": "company",
    "verification_method": "email"
  }'
```

## Troubleshooting

### Email not sending
- Check MAIL_* configuration in .env
- Verify firewall allows outbound connections on mail port
- Check Laravel logs: `storage/logs/laravel.log`

### SMS not sending
- Ensure Twilio credentials are correct
- Uncomment Twilio code in OtpService.php
- Verify phone number format (E.164 format recommended)

### Social login not working
- Verify OAuth credentials in .env
- Check redirect URLs match in provider settings
- Ensure APP_URL is correct in .env

### Token authentication failing
- Ensure Sanctum is properly configured
- Check if token is included in Authorization header
- Verify token hasn't been revoked

## Next Steps

1. Implement rate limiting for OTP requests
2. Add reCAPTCHA for registration
3. Implement password reset functionality
4. Add email verification reminder
5. Create admin panel for managing companies
6. Add company profile update endpoints
7. Implement file upload for company logos

## Support

For issues or questions, please refer to:
- Laravel Documentation: https://laravel.com/docs
- Laravel Sanctum: https://laravel.com/docs/sanctum
- Laravel Socialite: https://laravel.com/docs/socialite
