Here is your **custom `README.md` file** styled like Laravel’s official one, but tailored specifically for your **Laravel Semantic Search Application**:

---

````markdown
<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <strong>Laravel Semantic Search Application</strong><br>
    Built for Bluehole Pvt Ltd technical assessment.
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
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
    </a>
</p>

---

## 📦 About This Project

This is a Laravel-based semantic search web application developed as part of the Laravel Engineer assessment by **Bluehole Pvt Ltd**.

It uses OpenAI embeddings or Cohere to generate vector representations of category data and perform cosine similarity-based semantic search.

---

## 🚀 Features

- Import categories from an Excel file
- Generate and store vector embeddings using an AI API
- Perform semantic search from plain-English input
- Return the most relevant category based on cosine similarity
- Blade-based minimal interface with persistent search value

---

## ⚙️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/mananvadher1/laravel-semantic-search.git
cd laravel-semantic-search
````

### 2. Install PHP & JavaScript Dependencies

```bash
composer install
npm install && npm run dev
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Then edit your `.env` file and update:

* Database credentials
* `OPENAI_API_KEY` (or Cohere API Key)

### 4. Run Migrations

```bash
php artisan migrate
```

---

## 📥 Import Excel Categories

Place your `categories.xlsx` file inside:

```
storage/app/categories.xlsx
```

Then run the import command:

```bash
php artisan import:categories
```

This command will:

* Import all categories from the Excel file
* Generate vector embeddings
* Store everything in the `categories` table

---

## 🔍 Semantic Search UI

Serve the app locally:

```bash
php artisan serve
```

Visit:

```
http://localhost:8000/search
```

Enter a query like:

> digital marketing tools
> financial analytics
> photo editing software

The system will return the **closest matching category**.

---

## 🧠 Tech Stack

* Laravel (Latest version)
* Laravel Excel (Maatwebsite)
* OpenAI or Cohere Embeddings
* PHP 8.2+
* Bootstrap (optional styling via Blade)

---

## 📂 Folder Structure Overview

| Folder                 | Description                               |
| ---------------------- | ----------------------------------------- |
| `app/Imports`          | Custom Excel import classes               |
| `app/Console/Commands` | Artisan commands like `import:categories` |
| `resources/views`      | Blade files including `search.blade.php`  |
| `routes/web.php`       | Defines the `/search` route               |
| `storage/app/`         | Place for `categories.xlsx` file          |

---

## 📬 Contact

Developed by **Manan Vadher**
📧 [manan.vadher@drcsystems.com](mailto:mananvadher1@gmail.com)

---

## 🪪 License

Open-sourced under the [MIT license](https://opensource.org/licenses/MIT).

````

---

### ✅ To Add & Push This to GitHub:

1. Create the file:

```bash
touch README.md
````

2. Paste the above content using a text editor (e.g., VS Code).

3. Commit and push it:

```bash
git add README.md
git commit -m "Add README with setup and instructions"
git push origin main
```

Would you like this exported as a downloadable `.md` file?
