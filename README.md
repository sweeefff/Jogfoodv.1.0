<p align="center">
  <img src="public/assets/icon/jogfood.png" width="400" alt="Jogfood Logo">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=flat&logo=tailwind-css&logoColor=white" alt="TailwindCSS">
  <img src="https://img.shields.io/badge/MySQL-005C84?style=flat&logo=mysql&logoColor=white" alt="MySQL">
</p>

A web-based application that recommends traditional Jogjakarta dishes and enables users to order them from anywhere.

## 🚀 Features

-   **🍲 Dish Recommendations** — Explore a rich menu of traditional Jogjakarta cuisine
-   **📍 Remote Ordering** — Place food orders remotely.
-   **🔍 Search & Filters** — Easily find dishes by name, ratings, prices, category.
-   **⭐ Reviews & Ratings** — See user feedback and leave your own ratings.
-   **📈 Admin Dashboard** — For managing dishes, orders, deliveries, and report.
-   **🚚 Delivery Service** — For update delivery orders.

---

## 💻 Tech Stack

-   **Frontend:** HTML (Blade) + CSS (Tailwindcss)
-   **Backend:** Laravel (PHP)
-   **Database:** MySQL

---

## 📦 Getting Started

### Prerequisites

-   ![PHP](https://img.shields.io/badge/PHP%20v8.x-777BB4?style=flat&logo=php&logoColor=white)
-   ![Composer](https://img.shields.io/badge/Composer-885630?style=flat&logo=Composer&logoColor=white)
-   ![MySQL](https://img.shields.io/badge/MySQL-005C84?style=flat&logo=mysql&logoColor=white)

---

### Installation

1.  **Clone the repo**

    ```bash
    git clone https://github.com/sweeefff/Jogfoodv.1.0.git
    cd Jogfoodv.1.0
    ```

2.  **Install dependencies**

    ```bash
    composer require anhskohbo/no-captcha \
                 barryvdh/laravel-dompdf \
                 dompdf/dompdf \
                 laravel/framework \
                 laravel/sanctum \
                 laravel/socialite \
                 laravel/tinker \
                 maatwebsite/excel \
    ```

3.  **Configure environment**
    Create a `.env` file using `.env.example` as a template:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=(your_database)
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4.  **Migrate Databases**

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

5.  **Run dev server**
    ```bash
    php artisan serve
    ```
    The app should be running at `http://localhost:8000`.

---

## 📁 Directory Structure

```
/
├── app/                            # Core application logic (MVC)
│   ├── Console/                    # Artisan command classes
│   ├── Http/
│   │   ├── Controllers/            # Request handling logic (Controller classes)
│   │   └── Middleware/             # Filters for HTTP requests (auth, etc.)
│   ├── Models/                     # Eloquent models (database interaction)
│   ├── Providers/                  # Laravel service providers
│   └── Services/                   # Optional custom service classes (helpers, etc.)

├── bootstrap/                      # Laravel bootstrap and autoload files
├── config/                         # All Laravel configuration files

├── database/
│   ├── factories/                  # Model factories for testing/seeding
│   ├── migrations/                 # Database schema migrations
│   └── seeders/                    # Seed data population files

├── public/
│   ├── assets/                     # Frontend static assets (images, JS, CSS)
│   ├── storage/                    # Symlinked storage (uploaded files)
│   ├── favicon.ico                 # Site icon
│   └── index.php                  # Entry point for all web requests

├── resources/
│   └── views/                      # Blade templates (frontend UI)
│       ├── components/            # Reusable UI components
│       │   ├── card/              # e.g., for dish/item display
│       │   ├── kurir/             # e.g., delivery status widgets
│       │   └── navbar/            # Navigation bar component
│       ├── emails/                # Email templates
│       ├── layouts/               # Master page layouts
│       └── pages/                 # Page views grouped by roles
│           ├── admin/             # Admin dashboard pages
│           ├── auth/              # Login/register, etc.
│           ├── kurir/             # Courier/delivery dashboard
│           ├── pdf/               # Exported PDF templates
│           ├── user/              # User-specific views (order history, etc.)
│           ├── about.blade.php    # About page
│           ├── detail.blade.php   # Product detail page
│           ├── home.blade.php     # Homepage
│           └── menu.blade.php     # Menu listing

├── routes/                         # Web and API route definitions
├── storage/                        # Compiled views, logs, uploads, etc.
│   ├── app/                        # User uploads
│   ├── framework/                  # Cache and sessions
│   └── logs/                       # Application logs

├── tests/                          # Automated tests (Feature, Unit)
└── vendor/                         # Composer dependencies

```

---

## ✅ Usage

1. Visit the homepage to browse recommended dishes.
2. Use the search bar or apply filters by name.
3. Click a dish to view details like images, descriptions, and reviews.
4. Add it to your cart and proceed to checkout (login/registration required).
5. At admin section, login (admin credentials) to manage dishes, view orders, and manage deliveries.
6. At courier section, login (courier credentials) to manage delivery orders.

---

## 🤝 Contributing

Contributions are welcome! Just:

1. Fork this repo.
2. Create a feature branch: `git checkout -b feature/my-feature`
3. Commit your changes: `git commit -m 'Add new feature'`
4. Push to the branch: `git push origin feature/my-feature`
5. Submit a pull request.

Please stick to code style and include tests where applicable.

---

## 👏 Thanks to

For Contribution throughout this project since beginning

[![Github Pages](https://img.shields.io/badge/Ridho%20Putrawan%20-%203312411032-100000?style=flat&logo=github&logoColor=white)](https://github.com/sweeefff)

[![Github Pages](https://img.shields.io/badge/Ruth%20Yohana%20Manurung-%203312411032-100000?style=flat&logo=github&logoColor=white)](https://github.com/ruthyoh)

[![Github Pages](https://img.shields.io/badge/Josepine%20Stevie%20Hia-%203312411032-100000?style=flat&logo=github&logoColor=white)](https://github.com/JosepineStevieHia)

[![Github Pages](https://img.shields.io/badge/M%20Rizky%20Raapi%20Ramadhan-%203312411060-100000?style=flat&logo=github&logoColor=white)](https://github.com/rizkyraapi)

---

## 📬 Contact

-   Author: PBL-IF240
-   Email: ridho.putrawan.5@gmail.com
-   Project Link: https://github.com/sweeefff/Jogfoodv.1.0
