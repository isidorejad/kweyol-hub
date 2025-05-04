# Kwéyòl Hub 🌺 | Preserving Saint Lucian Creole

[![Laravel Version](https://img.shields.io/badge/Laravel-11.x-FF2D20?logo=laravel)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.1+-777BB4?logo=php)](https://php.net)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

Kwéyòl Hub is a comprehensive digital platform dedicated to preserving and promoting Saint Lucian Kwéyòl (Creole) through interactive learning tools, cultural resources, and community engagement.

![Kwéyòl Hub Screenshots](public/img/preview.png)

## 🌟 Key Features

### Language Learning
- 📖 **Interactive Dictionary**: Search English-Kwéyòl translations
- 🕒 **Time & Numbers**: Learn to tell time and count in Kwéyòl
- 👥 **Body Parts**: Anatomy vocabulary with pronunciation guides
- 🗣 **Common Phrases**: Essential expressions for daily conversations

### Cultural Resources
- 🏝 **Saint Lucia Landmarks**: Learn cultural terms through famous locations
- 📜 **History & Context**: Background on Kwéyòl's linguistic roots

### Community Tools
- ✍️ **Contribution System**: Submit translations and corrections
- 📬 **Feedback Portal**: Share suggestions with the development team
- 💰 **Support Options**: Donate to help maintain the platform

## 🛠 Technology Stack

### Core Framework
- [Laravel 11](https://laravel.com) - PHP web framework
- [MySQL](https://www.mysql.com/) - Database system

### Frontend
- [Bootstrap 5.3](https://getbootstrap.com/) - Responsive UI components
- [Tailwind CSS](https://tailwindcss.com/) - Utility-first CSS framework
- [Vite](https://vitejs.dev/) - Next-generation frontend tooling
- [Boxicons](https://boxicons.com/) - Beautiful open-source icons

### Additional Tools
- [PayPal API](https://developer.paypal.com/) - Secure donation processing
- [GitHub Issues](https://github.com/features/issues) - Bug tracking system

## 🚀 Getting Started

### Prerequisites
- PHP 8.1+
- Composer 2.0+
- Node.js 16+
- MySQL 5.7+

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/isidorejad/kweyol-hub.git
   cd kweyol-hub
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Edit `.env` with your database credentials and app settings.

4. **Run migrations**
   ```bash
   php artisan migrate
   ```

5. **Start development server**
   ```bash
   php artisan serve
   npm run dev
   ```
   Visit `http://localhost:8000` in your browser.

## 🏗 Project Structure

```
kweyol-hub/
├── app/                  # Core application logic
│   ├── Http/             # Controllers and middleware
│   └── Models/           # Database models
├── config/               # Configuration files
├── database/             # Migrations and seeders
├── public/               # Publicly accessible assets
├── resources/            # Views, JS, and CSS assets
│   ├── js/               # JavaScript files
│   ├── css/              # Stylesheets
│   └── views/            # Blade templates
├── routes/               # Application routes
└── tests/                # Test cases
```

## 🌐 Deployment

### Production Requirements
- Web server (Nginx/Apache)
- PHP 8.1+ with required extensions
- MySQL database
- Node.js for asset compilation

### Deployment Steps
1. Set up production environment variables
2. Install dependencies with `--no-dev` flag:
   ```bash
   composer install --optimize-autoloader --no-dev
   npm install --production
   ```
3. Compile assets:
   ```bash
   npm run build
   ```
4. Optimize application:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

## 🤝 How to Contribute

We welcome contributions from the community! Here's how you can help:

1. **Report Bugs**: Open an issue on our [GitHub Issues](https://github.com/isidorejad/kweyol-hub/issues) page
2. **Submit Code**: Fork the repo and create a pull request
3. **Improve Translations**: Help expand our Kwéyòl dictionary
4. **Enhance Documentation**: Make our guides clearer

Please read our [Contribution Guidelines](CONTRIBUTING.md) before submitting changes.

## 📜 License

Kwéyòl Hub is open-source software licensed under the [MIT license](LICENSE).

## 📬 Contact Us

Have questions or suggestions? Reach out to our team:

- 🌐 Website: [https://kweyolhub.com](https://kweyolhub.online)
- 📧 Email: [support@kweyolhub.online](mailto:support@kweyolhub.online)
- 🐦 Twitter: [@solutions_53058](https://twitter.com/solutions_53058)
- 📘 Facebook: [Kwéyòl Hub](https://facebook.com/kweyolhub)
- 📸 Instagram: [@jtech_solutions2024](https://instagram.com/jtech_solutions2024)

---

**Kwéyòl Hub** is proudly developed by [JTech Solutions](https://jtechsolutions.com) with ❤️ for the people of Saint Lucia and Kwéyòl speakers worldwide.
