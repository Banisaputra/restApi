# REST API Products Documentation

## Overview

This REST API provides access to various resources required for the application. It follows RESTful principles and communicates using JSON over HTTP.

## Base URL

```
http://127.0.0.1:8000/api/
```

## Endpoints

### 1. User Authentication

#### Login

**Endpoint:**

```
POST /auth/login
```

**Request Body:**

```json
{
    "email": "user@example.com",
    "password": "yourpassword"
}
```

**Response:**

```json
{
    "token": "your_jwt_token",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "user@example.com"
    }
}
```

#### Register

**Endpoint:**

```
POST /auth/register
```

**Request Body:**

```json
{
    "name": "John Doe",
    "email": "user@example.com",
    "password": "yourpassword"
}
```

---

### 2. User Management

#### Get User Profile

**Endpoint:**

```
GET /users/me
```

**Headers:**

```
Authorization: Bearer YOUR_ACCESS_TOKEN
```

**Response:**

```json
{
    "id": 1,
    "name": "John Doe",
    "email": "user@example.com"
}
```

---

### 3. Products Management

#### Get All Items

**Endpoint:**

```
GET /products
```

**Response:**

```json
{
  "status": 200,
  "message": "List Data Products",
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "name": "samsung",
        "description": "product electronic",
        "price": 2450000,
        "stock": 35,
        "created_at": "2025-02-13T02:42:54.000000Z",
        "updated_at": "2025-02-13T02:42:54.000000Z"
      }
    ],
    "first_page_url": "http://127.0.0.1:8000/api/products?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://127.0.0.1:8000/api/products?page=1",
    "links": [
      {
        "url": null,
        "label": "&laquo; Previous",
        "active": false
      },
      {
        "url": "http://127.0.0.1:8000/api/products?page=1",
        "label": "1",
        "active": true
      },
      {
        "url": null,
        "label": "Next &raquo;",
        "active": false
      }
    ],
    "next_page_url": null,
    "path": "http://127.0.0.1:8000/api/products",
    "per_page": 10,
    "prev_page_url": null,
    "to": 1,
    "total": 1
  }
}
```

#### Create Item

**Endpoint:**

```
POST /products
```

**Request Body:**

```json
{
   "name": "samsung",
   "description": "product electronic",
   "price": "2450000",
   "stock": "35"
}
```

#### Update Item

**Endpoint:**

```
PUT /items/{id}
```

**Request Body:**

```json
{
    "name": "Updated Item",
    "price": 250.0
}
```

#### Delete Item

**Endpoint:**

```
DELETE /items/{id}
```

---

## Error Handling

The API returns standard HTTP status codes. Here are common ones:

- `200 OK` – Success
- `201 Created` – Resource created
- `400 Bad Request` – Invalid input
- `401 Unauthorized` – Authentication failed
- `403 Forbidden` – Insufficient permissions
- `404 Not Found` – Resource not found
- `500 Internal Server Error` – Server error

---

## Usage Example (cURL)

```sh
curl -X GET "https://api.example.com/v1/users/me" \
     -H "Authorization: Bearer YOUR_ACCESS_TOKEN"
```

---

## Notes

- Ensure to replace `YOUR_ACCESS_TOKEN` with a valid token.
- All requests and responses are in JSON format.
- API versioning is handled via the base URL (`/v1`).

