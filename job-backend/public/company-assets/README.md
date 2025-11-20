# Company Registration UI

This is a complete, production-ready UI for company registration with OTP verification and social login integration.

## Features

### 1. Multi-Step Registration Form
- **Step 1**: Account Information (Name, Email, Password, Phone)
- **Step 2**: Company Details (Company Name, Type, Industry, Size, Location, Website, Description, About Us)
- **Step 3**: Verification Method Selection (Email or SMS)

### 2. OTP Verification
- 6-digit OTP input with auto-focus navigation
- 10-minute countdown timer
- Resend OTP functionality
- Paste support for quick input
- Visual feedback and animations

### 3. Social Login Integration
- Google OAuth
- Facebook OAuth
- LinkedIn OAuth

### 4. Security Features
- Password strength validation
- Email format validation
- Phone number validation
- URL validation
- Password visibility toggle
- CSRF protection ready

### 5. UX Features
- Progress indicators
- Real-time validation
- Loading states
- Error messages
- Success animations
- Responsive design (mobile, tablet, desktop)
- Smooth transitions and animations

## Files Structure

```
public/company-registration/
├── index.html           # Landing page
├── register.html        # Registration form
├── verify-otp.html      # OTP verification page
├── success.html         # Success page after verification
├── login.html           # Login page
├── styles.css           # Complete CSS styling
├── register.js          # Registration form logic
├── verify-otp.js        # OTP verification logic
└── README.md           # This file
```

## How to Use

### 1. Access the Pages

- **Landing Page**: `http://yourapp.com/company-registration/`
- **Registration**: `http://yourapp.com/company-registration/register.html`
- **Login**: `http://yourapp.com/company-registration/login.html`
- **OTP Verification**: `http://yourapp.com/company-registration/verify-otp.html`
- **Success**: `http://yourapp.com/company-registration/success.html`

### 2. Registration Flow

1. User fills out the registration form (3 steps)
2. User selects verification method (Email or SMS)
3. Form submits to API `/api/company/register`
4. User redirected to OTP verification page
5. User enters 6-digit OTP code
6. OTP verified via API `/api/company/verify-otp`
7. User redirected to success page
8. Auth token stored in localStorage

### 3. Social Login Flow

1. User clicks social login button
2. Redirected to provider authentication page
3. After authentication, redirected back to callback URL
4. API handles the callback and creates/logs in user
5. User redirected to success page

### 4. Login Flow

1. User enters email and password
2. Form submits to API `/api/company/login`
3. On success, auth token stored in localStorage
4. User redirected to success page

## API Integration

The UI automatically connects to the backend API at `/api/company/`. Make sure your backend is running and configured correctly.

### Required API Endpoints

- `POST /api/company/register` - Register new company
- `POST /api/company/verify-otp` - Verify OTP code
- `POST /api/company/resend-otp` - Resend OTP code
- `POST /api/company/login` - Login with credentials
- `GET /api/company/auth/{provider}` - Social login redirect
- `GET /api/company/auth/{provider}/callback` - Social login callback

## Customization

### Colors
Edit the CSS variables or gradient colors in `styles.css`:
```css
/* Primary gradient */
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

/* Success gradient */
background: linear-gradient(135deg, #56ab2f 0%, #a8e063 100%);
```

### Form Fields
Add or remove fields in `register.html` and update the JavaScript in `register.js` to include them in the API request.

### Validation Rules
Modify validation functions in `register.js`:
- `validateEmail()`
- `validatePhone()`
- `validateURL()`
- `validateStep()`

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Dependencies

- Font Awesome 6.4.0 (for icons)
- No JavaScript frameworks required (Vanilla JS)

## Testing

### Test Registration
1. Open `register.html`
2. Fill in all required fields
3. Check validation errors by leaving fields empty
4. Submit the form
5. Check browser console for API responses

### Test OTP Verification
1. After registration, check email/SMS for OTP
2. Enter the 6-digit code
3. Check countdown timer (10 minutes)
4. Try resend functionality
5. Test paste functionality

### Test Social Login
1. Configure social providers in backend `.env`
2. Click social login buttons
3. Complete OAuth flow
4. Verify user is created/logged in

## Troubleshooting

### Registration not working
- Check browser console for errors
- Verify API endpoint is accessible
- Check CORS configuration on backend
- Verify all required fields are filled

### OTP not received
- Check email configuration in backend `.env`
- Check spam folder
- Verify phone number format for SMS
- Check backend logs

### Social login not working
- Verify OAuth credentials in backend `.env`
- Check redirect URLs in provider settings
- Ensure callback URLs are whitelisted
- Check browser console for errors

## Security Notes

1. **Never store passwords in localStorage**
2. **Auth tokens are stored in localStorage** - Consider using httpOnly cookies for production
3. **Implement rate limiting** on the backend for OTP requests
4. **Add CSRF protection** for form submissions
5. **Use HTTPS** in production
6. **Validate all inputs** on both frontend and backend
7. **Implement reCAPTCHA** to prevent bots

## Production Checklist

- [ ] Configure environment variables
- [ ] Set up email service (SMTP, SendGrid, etc.)
- [ ] Set up SMS service (Twilio, etc.)
- [ ] Configure social OAuth providers
- [ ] Enable HTTPS
- [ ] Add rate limiting
- [ ] Add reCAPTCHA
- [ ] Test on all browsers
- [ ] Test on mobile devices
- [ ] Set up error tracking (Sentry, etc.)
- [ ] Add analytics (Google Analytics, etc.)
- [ ] Optimize images and assets
- [ ] Minify CSS and JavaScript
- [ ] Set up CDN for static assets

## Support

For issues or questions:
1. Check the main backend documentation: `COMPANY_REGISTRATION_SETUP.md`
2. Review the API endpoint documentation
3. Check browser console for errors
4. Review backend logs for API errors

## License

This UI is part of the Job Portal project.
