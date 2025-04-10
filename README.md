# Laravel REST API with Sanctum Authentication & External Search

A secure RESTful API built with **Laravel 8+**, using **Sanctum** for token-based authentication, supporting full **user CRUD** and **dynamic external data search** using real-time data from Google Sheets.

---

## 🚀 Features

- ✅ Login with Sanctum token auth
- ✅ Full CRUD for user accounts
- ✅ Protected routes (`auth:sanctum`)
- ✅ Live search by `NAMA`, `NIM`, or `YMD` from [https://bit.ly/48ejMhW](https://bit.ly/48ejMhW)
- ✅ Tested with Postman, includes collection
- ✅ MySQL database (XAMPP-compatible)
- ✅ Ready-to-use Postman collection & DB backup

---

## 🔐 Authentication

Authentication is handled using **Laravel Sanctum**.\
All protected routes require a Bearer token.

---

## 📦 API Endpoints

| Method | Endpoint          | Description                      |
| ------ | ----------------- | -------------------------------- |
| POST   | `/api/login`      | Login and receive token          |
| GET    | `/api/users`      | Get all users                    |
| POST   | `/api/users`      | Create new user                  |
| GET    | `/api/users/{id}` | Get user by ID                   |
| PUT    | `/api/users/{id}` | Update user                      |
| DELETE | `/api/users/{id}` | Delete user                      |
| GET    | `/api/search`     | Search external data (protected) |

---

### 🔍 Dynamic Search Parameters (Protected)

| Field  | Example URL                               |
| ------ | ----------------------------------------- |
| `NAMA` | `/api/search?field=NAMA&query=Turner Mia` |
| `NIM`  | `/api/search?field=NIM&query=9352078461`  |
| `YMD`  | `/api/search?field=YMD&query=20230405`    |

---

## 🧪 Testing with Postman

Import `laravel-rest-api.postman_collection.json` into Postman.

> 🛑 **Don't forget to include the Bearer token** in Authorization tab for protected routes.

---

## 💾 Setup Instructions

1. Clone the repo:

   ```bash
   git clone https://github.com/rizkyhhh/laravel-rest-api.git
   cd laravel-rest-api
   ```

2. Install dependencies:

   ```bash
   composer install
   ```

3. Create `.env` and setup your DB:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Import DB backup:

   - Open `phpMyAdmin`
   - Import `docs/rest_api_backup.sql`

5. Migrate & run the server:

   ```bash
   php artisan migrate
   php artisan serve
   ```

---

## 📂 Project Structure

```bash
routes/
  └── api.php         # Route definitions

app/
  └── Http/
      └── Controllers/
          ├── AuthController.php
          ├── UserController.php
          └── SearchController.php
```

---

## 📁 Included Files

| File                      | Description      |
| ------------------------- | ---------------- |
| `rest_api.sql`            | MySQL backup     |
| `postman_collection.json` | Postman requests |
| `.env.example`            | Example env file |

---

## 👤 Author

- **Your Name**
- GitHub: [@rizkyhhh](https://github.com/rizkyhhh)

---

## 📜 License

This project is open-source and free to use under the [MIT License](LICENSE).

