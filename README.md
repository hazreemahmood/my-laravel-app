# Hazree's Laravel Portfolio

A full-featured **personal portfolio & admin dashboard** built with **Laravel 10** and the **Argon Dashboard 2** template. Designed as both a showcase of development skills and a functional backend management platform.

## 🚀 Tech Stack

| Layer      | Technology |
|------------|------------|
| **Backend**  | PHP 8.x, Laravel 10 |
| **Frontend** | Blade Templates, JavaScript, jQuery |
| **Database** | MySQL |
| **UI Kit**   | Argon Dashboard 2 (Creative Tim) |
| **Charts**   | Chart.js (page views & message analytics) |
| **Auth**     | Laravel UI with Sanctum |
| **DevOps**   | Docker (Sail), CI/CD via GitHub Actions |

## ✨ Features

### Public
- **Welcome/Landing Page** — Animated portfolio page with:
  - Typing effect subtitle
  - Resume highlights (experience, skills, tech stack)
  - Interactive career timeline with expandable job cards
  - Skills strip with tags

### Authenticated (Admin Dashboard)
- **Dashboard** — Real-time analytics overview:
  - Total users, page views, messages, media uploads
  - 7-day page views bar chart (live data)
  - Weekly/monthly growth stats
- **User Management** — CRUD for users with role-based access
- **Profile Management** — Edit profile with avatar upload
- **Chat System** — Internal messaging between users with AI integration
- **Gallery / Media Manager** — Upload and manage images in folders
- **Analytics** — Detailed analytics page with:
  - 14-day page view & message charts
  - Top 10 most visited pages table
  - Unique visitor tracking (today & this week)
- **Notifications** — Real-time notification system:
  - Bell icon with unread badge
  - Auto-polling every 30 seconds
  - New user registration alerts for admins
  - Mark as read / mark all as read
- **Dark Mode** — Toggle between light & dark themes
- **Static Pages** — Tables, Billing, Virtual Reality, RTL support

## 🧩 Modules

| Module | Description |
|--------|-------------|
| ✅ Auth | Login, Register, Password Reset |
| ✅ Dashboard | Real stats from database |
| ✅ User Management | Admin CRUD with roles |
| ✅ Chat/AI | Messaging with AI integration |
| ✅ Media Gallery | Image upload & folder management |
| ✅ Analytics | Page visits, messages, unique visitors |
| ✅ Notifications | Database notifications with live polling |
| ✅ Dark Mode | Theme toggle |
| ✅ Portfolio | Career timeline, skills, highlights |

## 🛠️ Installation

```bash
# 1. Clone the repository
git clone https://github.com/hazreemahmood/my-laravel-app.git
cd my-laravel-app

# 2. Install PHP dependencies
composer install

# 3. Install JS dependencies (if needed)
npm install && npm run dev

# 4. Environment setup
cp .env.example .env
php artisan key:generate

# 5. Configure your database in .env
#    DB_DATABASE=your_database
#    DB_USERNAME=your_user
#    DB_PASSWORD=your_password

# 6. Run migrations
php artisan migrate

# 7. Start the dev server
php artisan serve
```

## 📊 New Modules (v2)

### Analytics Dashboard (#4)
- Page visit tracking middleware logs every authenticated request
- Real-time dashboard stats (no more hardcoded mock data)
- Dedicated analytics page with Chart.js visualizations
- Top visited pages table

### Notification System (#5)
- Laravel database notifications
- Triggers on new user registration (alerts admin users)
- Auto-polling AJAX with 30-second interval
- Interactive bell dropdown with mark-as-read functionality

## 👨‍💻 Author

**Hazree Mahmood** — Full Stack Developer  
[GitHub](https://github.com/hazreemahmood)

## 📄 License

This project is open-sourced under the MIT license.