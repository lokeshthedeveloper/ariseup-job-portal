# Quick Start Guide - Frontend Integration

## 🎉 Integration Complete!

The ariseup-theme-frontend has been successfully integrated into your Job Backend Laravel project. Here's how to get started:

## 🚀 Getting Started

### 1. Start the Development Server

```bash
cd job-backend
php artisan serve
```

Your application will be available at: `http://localhost:8000`

### 2. Visit the Pages

#### Main Frontend Pages:
- **Home**: http://localhost:8000/
- **Blog Listing**: http://localhost:8000/blog
- **Blog Detail**: http://localhost:8000/blog/top-10-tips-for-writing-a-winning-resume
- **Contact**: http://localhost:8000/contact
- **Company Registration**: http://localhost:8000/company-registration/register

#### Admin Pages (existing):
- **Admin Login**: http://localhost:8000/admin/login
- **Admin Dashboard**: http://localhost:8000/admin/dashboard

### 3. Optional Configuration

Edit your `.env` file to customize:

```env
# Your App Name
APP_NAME="Your Company Name"

# Contact Information
CONTACT_EMAIL=your-email@example.com
CONTACT_PHONE="+1 (555) 123-4567"
ADDRESS_LINE1="Your Street Address"
ADDRESS_LINE2="City, State ZIP"

# Social Media
SOCIAL_TWITTER=https://twitter.com/yourcompany
SOCIAL_FACEBOOK=https://facebook.com/yourcompany
SOCIAL_INSTAGRAM=https://instagram.com/yourcompany
SOCIAL_LINKEDIN=https://linkedin.com/company/yourcompany
```

After updating `.env`, clear the config cache:
```bash
php artisan config:clear
```

## 📋 What's Been Implemented

### ✅ Completed Features

1. **Theme Assets** - All CSS, JS, and images copied to `public/frontend-assets/`

2. **Layout System**
   - Main layout: `resources/views/layouts/frontend.blade.php`
   - Header component: `resources/views/includes/frontend-header.blade.php`
   - Footer component: `resources/views/includes/frontend-footer.blade.php`

3. **Home Page** - Full homepage with:
   - Hero section
   - About section
   - Statistics counters
   - Services (6 cards)
   - Pricing plans (3 tiers)
   - Testimonials carousel
   - Call-to-action

4. **Blog Module**
   - Blog listing with pagination
   - Blog detail page with sidebar
   - 6 sample blog posts (dummy data)
   - Controller: `BlogController.php`

5. **Contact Page**
   - Contact form with validation
   - Google Maps embed
   - Contact information display
   - Controller: `ContactController.php`

6. **Company Registration** - Existing system preserved
   - Multi-step registration form
   - OTP verification
   - Social login options
   - API integration already configured

## 🔧 Next Steps (Optional)

### A. Enable Contact Form Email
1. Configure your mail settings in `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
```

2. Uncomment the email code in `app/Http/Controllers/ContactController.php` (lines 32-40)

### B. Replace Blog Dummy Data with Database
1. Create Blog model and migration:
```bash
php artisan make:model Blog -m
```

2. Update the migration and run:
```bash
php artisan migrate
```

3. Update `BlogController.php` to query the database instead of using dummy data

### C. Customize Images
Replace placeholder images in `public/frontend-assets/img/` with your own:
- `hero-bg.jpg` - Hero section background
- `about.jpg` - About section image
- `blog-*.jpg` - Blog post images
- `testimonials/testimonials-*.jpg` - Testimonial author photos
- `logo.png` - Your company logo (optional)

### D. Customize Content
1. **Home Page**: Edit `resources/views/frontend/home.blade.php`
   - Update welcome message
   - Modify service cards
   - Adjust pricing plans
   - Change testimonials

2. **Navigation**: Edit `resources/views/includes/frontend-header.blade.php`
   - Add/remove menu items
   - Update links

3. **Footer**: Edit `resources/views/includes/frontend-footer.blade.php`
   - Update footer links
   - Modify footer columns

## 📱 Mobile Responsive

All pages are fully responsive and work on:
- Desktop (1920px+)
- Laptop (1024px - 1919px)
- Tablet (768px - 1023px)
- Mobile (< 768px)

## 🎨 Styling

The theme uses:
- **Bootstrap 5** for layout and components
- **Custom CSS** in `frontend-assets/css/main.css`
- **Font Awesome** for icons
- **Bootstrap Icons** for additional icons
- **Google Fonts**: Roboto, Poppins, Raleway

To customize colors, edit `public/frontend-assets/css/main.css` and look for the main color:
- Primary color: `#3fbbc0` (teal/cyan)
- Secondary color: `#2c4964` (dark blue)

## 🐛 Troubleshooting

### Issue: Styles not loading
**Solution**: Clear Laravel cache
```bash
php artisan cache:clear
php artisan view:clear
php artisan config:clear
```

### Issue: 404 errors on pages
**Solution**: Clear route cache
```bash
php artisan route:clear
```

### Issue: Images not displaying
**Solution**: Check file permissions and that assets are in `public/frontend-assets/img/`

### Issue: Contact form not working
**Solution**:
1. Check `.env` has mail configuration
2. Check `storage/logs/laravel.log` for errors
3. Verify CSRF token is included in form

## 📖 Documentation

For detailed documentation, see:
- **Integration Guide**: `FRONTEND_INTEGRATION_GUIDE.md`
- **Architecture**: `CODEBASE_ARCHITECTURE.md`
- **Company Registration**: `COMPANY_REGISTRATION_SETUP.md`

## 🎯 Testing Checklist

Before deployment, test:
- [ ] All pages load without errors
- [ ] Navigation works on all pages
- [ ] Mobile menu works
- [ ] Contact form submits successfully
- [ ] Blog pagination works
- [ ] All links in footer work
- [ ] Social media links are updated
- [ ] Company registration still works
- [ ] Admin panel still accessible

## 💡 Tips

1. **Use Named Routes**: Always use route names in views:
   ```blade
   {{ route('home') }}
   {{ route('blog.index') }}
   {{ route('contact') }}
   ```

2. **Asset Helper**: Always use `asset()` helper for static files:
   ```blade
   {{ asset('frontend-assets/img/logo.png') }}
   ```

3. **Config Helper**: Use config for dynamic content:
   ```blade
   {{ config('app.name') }}
   {{ config('app.contact_email') }}
   ```

## 🎊 You're All Set!

Your job portal frontend is now fully integrated and ready to use. The design is clean, professional, and optimized for job boards.

### Need Help?
- Check `storage/logs/laravel.log` for errors
- Review the browser console for JavaScript issues
- See `FRONTEND_INTEGRATION_GUIDE.md` for detailed information

**Happy coding! 🚀**
