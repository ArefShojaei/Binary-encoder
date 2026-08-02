# 🔐 Binary Encoder

**A simple and secure Binary Encoder/Decoder tool built with PHP & Routex**

Convert text to binary and binary back to text with a clean modern interface and RESTful API.

[![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-blue.svg)](https://php.net)
[![Framework](https://img.shields.io/badge/Framework-Routex-purple.svg)](https://github.com/ArefShojaei/Routex)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

---

## ✨ Features

- 🔄 **Encode & Decode** — Convert text ↔ binary easily
- ⚡ **RESTful API** — Clean endpoints for encode and decode
- 🛡️ **Secure** — Uses secret key for binary operations
- 🎨 **Modern UI** — Beautiful dark interface with Tailwind CSS
- 🧩 **Built on Routex** — File-based routing + MVC architecture
- 🔧 **Middleware Support** — Method validation (Only POST)
- 📦 **Service Layer** — Clean separation of business logic
- 🪶 **Lightweight** — Fast and minimal

---

## 🖼️ Preview


---

## 🚀 API Endpoints

| Method | Endpoint                | Description              |
|--------|-------------------------|--------------------------|
| `POST` | `/api/binary/encode`    | Convert text to binary   |
| `POST` | `/api/binary/decode`    | Convert binary to text   |

### Encode Example

```http
POST /api/binary/encode
Content-Type: application/json

{
  "text": "Hello"
}
```

Response:
```json
{
  "binary": "0100100001100101011011000110110001101111"
}
```

### Decode Example

```http
POST /api/binary/decode
Content-Type: application/json

{
  "binary": "0100100001100101011011000110110001101111"
}
```

Response:
```json
{
  "text": "Hello"
}
```

---

# 📥 Installation & Setup

## Requirements

* PHP 8.0 or higher
* Composer

---

## Clone from GitHub

```bash
git clone https://github.com/ArefShojaei/Routex.git
cd Routex
```

Install dependencies:

```bash
composer install
```

## Environment Configuration
Rename the .env.example file to .env and update the environment variables with your actual project configuration.

```txt
BINARY_SECRET_KEY=
```

> Security tip: openssl rand -base64 [length]

Use **openssl** to make a random secret-key

```txt
openssl rand -base64 40 # m3sV5dFxqxF0TXM8JTiOvxrqQq0Lavyc4Ye9CCAeB90Slr5tdqotwQ==
openssl rand -base64 ...
```

---

# 🚀 Running the Application

Routex comes with a built-in PHP development server.

### Default

```bash
php cli serve
```

### Custom Host

```bash
php cli serve --host:0.0.0.0
```

### Custom Port

```bash
php cli serve --port:3000
```

### Custom Host & Port

```bash
php cli serve --host:0.0.0.0 --port:3000
```

After running the server, open:

```txt
http://localhost:8000
```

---

# ⭐ Show Your Support

If Routex helps you in your projects, consider giving the repository a **Star ⭐** on GitHub.

Your support motivates further development and improvements.
