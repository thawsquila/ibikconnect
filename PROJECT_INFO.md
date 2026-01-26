# IBI Connect - Career Development Center & Gallery BEI

A modern, fully functional website for Institut Bisnis dan Informatika Kesatuan Bogor featuring Career Development Center (CDC) and Gallery Bursa Efek Indonesia (BEI).

## Features

### CDC & Humas Section
- **Job Listings**: Browse available job opportunities and internships
- **Event Calendar**: View and register for career development events
- **News & Updates**: Latest news about campus activities and achievements
- **Registration Form**: Easy-to-use form for event registration
- **Contact Information**: Multiple ways to reach the CDC team

### Gallery BEI Section
- **Capital Market Education**: Learn about stocks, bonds, and investment basics
- **Event Management**: Register for capital market seminars and workshops
- **Photo Gallery**: Documentation of past events and activities
- **Organization Structure**: Information about Gallery BEI team
- **Educational Resources**: Comprehensive guides for beginner investors

## Design Features

### UI/UX Highlights
- **Modern Blue Theme**: Professional blue color scheme throughout
- **Smooth Animations**: Fade-in effects, hover states, and transitions
- **Responsive Design**: Works perfectly on mobile, tablet, and desktop
- **Interactive Elements**: Ripple effects on buttons, smooth scrolling
- **Card-based Layout**: Clean, organized content presentation
- **Gradient Accents**: Subtle gradients for visual appeal
- **Custom Icons**: SVG icons for better performance
- **Accessible Forms**: Clear labels, validation, and feedback

### Technical Features
- **Laravel 12**: Latest Laravel framework
- **Tailwind CSS 4**: Modern utility-first CSS framework
- **Vite**: Fast build tool and dev server
- **Inter Font**: Clean, professional typography
- **Mobile-First**: Responsive from the ground up
- **Form Validation**: Client and server-side validation
- **Success Messages**: User feedback on form submissions

## Getting Started

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM
- SQLite (or your preferred database)

### Installation

1. Install PHP dependencies:
```bash
composer install
```

2. Install JavaScript dependencies:
```bash
npm install
```

3. Copy environment file:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Run migrations:
```bash
php artisan migrate
```

6. Build assets:
```bash
npm run build
```

### Development

Run the development server:
```bash
composer dev
```

This will start:
- Laravel development server (http://localhost:8000)
- Vite dev server for hot module replacement
- Queue worker
- Log viewer

Or run individually:
```bash
# Laravel server
php artisan serve

# Vite dev server
npm run dev
```

## Project Structure

```
├── app/
│   └── Http/
│       └── Controllers/
│           ├── BEIController.php      # Gallery BEI logic
│           └── CDCController.php      # CDC & Humas logic
├── resources/
│   ├── css/
│   │   └── app.css                    # Custom styles & Tailwind
│   ├── js/
│   │   └── app.js                     # Interactive features
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php          # Main layout
│       ├── cdc/
│       │   └── home.blade.php         # CDC homepage
│       └── bei/
│           └── home.blade.php         # Gallery BEI homepage
└── routes/
    └── web.php                        # Application routes
```

## Routes

- `/` - CDC & Humas homepage
- `/bei` - Gallery BEI homepage
- `/cdc/register` - CDC event registration (POST)
- `/bei/register` - BEI event registration (POST)

## Color Palette

- **Primary Blue**: #3b82f6 (blue-600)
- **Dark Blue**: #1e40af (blue-800)
- **Light Blue**: #dbeafe (blue-100)
- **Accent**: Various blue shades for depth

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Contributing

This is a custom project for IBI Kesatuan Bogor. For modifications or improvements, please contact the development team.

## License

Proprietary - Institut Bisnis dan Informatika Kesatuan Bogor

---

Built with ❤️ for IBI Kesatuan Bogor
