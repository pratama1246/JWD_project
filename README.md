# 🎓 Sistem Pendaftaran Beasiswa

A web-based scholarship registration system built with native PHP and MySQL, developed as a certification project for the **Junior Web Developer (JWD) program by Komdigi (Kementerian Komunikasi dan Digital RI)**. The system allows students to submit scholarship applications along with required supporting documents.

---

## 📌 Overview

This application handles end-to-end scholarship registration, from form input to result display. It includes server-side validation using the Respect/Validation library via Composer, file upload handling, and dynamic IPK (GPA) retrieval.

---

## ✨ Features

- Student scholarship registration form with multi-field input
- File upload support for required documents (PDF/DOCX)
- Dynamic IPK (GPA) fetch based on student data (`get_ipk.php`)
- Server-side form validation using **Respect/Validation** (via Composer)
- Registration result display page
- MySQL database integration for storing applicant data

---

## 🧰 Tech Stack

| Layer | Technology |
|-------|-----------|
| Language | PHP (Native) |
| Database | MySQL |
| Validation | Respect/Validation (via Composer) |
| Frontend | HTML, CSS (custom) |
| File Handling | PHP `$_FILES` (native upload) |
| Server | Apache / PHP Built-in Server |

---

## 📁 Project Structure

```
JWD_project/
├── index.php           # Landing page / home
├── daftar.php          # Registration form & submission handler
├── hasil.php           # Registration result page
├── get_ipk.php         # AJAX/dynamic IPK (GPA) fetcher
├── conn.php            # Database connection
├── db_beasiswa.sql     # Database schema & seed data
├── uploads/            # Uploaded applicant documents
├── vendor/             # Composer dependencies (Respect/Validation, Symfony polyfill)
├── composer.json       # Dependency configuration
└── composer.lock       # Locked dependency versions
```

---

## ⚙️ How to Run

### Requirements
- PHP >= 7.4
- MySQL
- Composer
- Web server (XAMPP, Laragon, or PHP built-in server)

### Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/pratama1246/JWD_project.git
   cd JWD_project
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Import database**
   ```bash
   mysql -u root -p beasiswa < db_beasiswa.sql
   ```

4. **Configure database connection**

   Edit `conn.php`:
   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db   = "beasiswa";
   ```

5. **Run the application**
   ```bash
   php -S localhost:8080
   ```
   Open browser at `http://localhost:8080`

---

## 📦 Dependencies

This project uses [Composer](https://getcomposer.org/) to manage PHP dependencies:

| Package | Purpose |
|---------|---------|
| `respect/validation` | Server-side input validation (required fields, format checks) |
| `symfony/polyfill-mbstring` | Multibyte string support for compatibility |

---

## 📄 Context

This project was developed as part of the **Junior Web Developer Certification** program held by **Komdigi (Kementerian Komunikasi dan Digital RI)**. It demonstrates core web development competencies including form handling, file uploads, database integration, and dependency management.

Full project report available in: `Laporan Sertifikasi Junior Web Developer.pdf`

---

## 👨‍💻 Author

**Pratama Putra Purwanto** — D4 Teknik Informatika, Politeknik Negeri Cilacap

[![GitHub](https://img.shields.io/badge/GitHub-pratama1246-black?logo=github)](https://github.com/pratama1246)
