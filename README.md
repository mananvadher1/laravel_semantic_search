<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <strong>Laravel Semantic Search Application</strong><br>
    Developed for the Bluehole Pvt Ltd Laravel Engineer Technical Assessment.
</p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions">
        <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://opensource.org/licenses/MIT">
        <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
    </a>
</p>

---

## 📦 About the Project

This is a **Laravel-based semantic search web application** built for the Laravel Engineer technical assessment by **Bluehole Pvt Ltd**.

The application uses **AI-generated embeddings** (OpenAI or Cohere) to convert category names into vectors, enabling **cosine similarity-based semantic search** to find the most relevant category from user queries.

---

## 🚀 Features

✅ Import categories directly from an Excel file  
✅ Generate and store vector embeddings using OpenAI/Cohere API  
✅ Perform **semantic search** from plain-English queries  
✅ Retrieve the **most relevant category** based on similarity scoring  
✅ Clean Blade-based UI with persistent search queries  

---

## ⚙️ Installation Guide

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/mananvadher1/laravel_semantic_search.git
cd laravel-semantic-search
```

### 2️⃣ Install PHP Dependencies

```bash
composer install
composer require maatwebsite/excel
```

### 3️⃣ Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

🔹 **Why run `php artisan key:generate`?**  
Laravel uses the **APP_KEY** in `.env` to securely encrypt session data, cookies, and other sensitive information.  
Running this command generates a unique 32-character key and automatically sets it in `.env`.

### 4️⃣ Run Database Migrations

```bash
php artisan migrate
```

---

## 📥 Import Categories from Excel

Place your `categories.xlsx` file here:

```
storage/app/categories.xlsx
```

Run the Artisan import command:

```bash
php artisan import:categories
```

This will:

- Import all categories from the Excel file  
- Generate AI vector embeddings  
- Store everything in the `categories` table  

---

## 🔍 Using the Semantic Search UI

Start the development server:

```bash
php artisan serve
```

Visit:

```
http://localhost:8000/search
```

Enter queries like:

```
digital marketing tools
financial analytics
photo editing software
```

The application will return the **closest matching category**.

---

## 🧠 Tech Stack

- **Laravel (Latest Version)**  
- **Laravel Excel (Maatwebsite)** for Excel imports  
- **OpenAI / Cohere API** for embeddings  
- **PHP 8.2+**  
- **Bootstrap** for lightweight styling via Blade  

---

## 📂 Key Folder Overview

| Folder                 | Purpose                                      |
| ---------------------- | -------------------------------------------- |
| `app/Imports`          | Excel import logic                           |
| `app/Console/Commands` | Custom Artisan commands like `import:categories` |
| `resources/views`      | Blade templates (e.g. `search.blade.php`)    |
| `routes/web.php`       | Route definitions (e.g. `/search`)           |
| `storage/app/`         | Location for the `categories.xlsx` file      |

---

## 📬 Contact

Developed by **Manan Vadher**  
📧 [mananvadher1@gmail.com](mailto:mananvadher1@gmail.com)

---

## 🪪 License

This project is open-sourced under the [MIT License](https://opensource.org/licenses/MIT).
