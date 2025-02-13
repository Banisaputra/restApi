# REST API Products Documentation

## Overview

This REST API provides access to various resources required for the application. It follows RESTful principles and communicates using JSON over HTTP.

## Base URL

```
http://127.0.0.1:8000/api/
```

## Endpoints

### 1. Products Management

#### Get All Products

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
        "id": 2,
        "name": "xiaomi",
        "description": "product electronic",
        "price": 1845000,
        "stock": 45,
        "created_at": "2025-02-13T03:13:18.000000Z",
        "updated_at": "2025-02-13T03:13:18.000000Z"
      },
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
    "to": 2,
    "total": 2
  }
}
```

#### Create Product

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

#### Show Product

**Endpoint:**

```
GET /products/{id}
```
**Response:**

```json
{
  "status": 200,
  "message": "Product Details",
  "data": {
    "id": 1,
    "name": "samsung",
    "description": "product electronic",
    "price": 2450000,
    "stock": 35,
    "created_at": "2025-02-13T02:42:54.000000Z",
    "updated_at": "2025-02-13T02:42:54.000000Z"
  }
}
```

#### Update Item

**Endpoint:**

```
PUT /products/{id}
```

**Request Body:**

```json
{
  "_method":"PUT",
  "name": "samsung update",
  "description": "product electronic update",
  "price": "1875000",
  "stock": "48"
}
```

#### Delete Item

**Endpoint:**

```
DELETE /products/{id}
```

---

## Error Handling

The API returns standard HTTP status codes. Here are common ones:

- `200 OK` – Success
- `201 Created` – Resource created
- `400 Bad Request` – Invalid input
- `401 Unauthorized` – Authentication failed
- `403 Forbidden` - Insufficient permissions
- `422 Unprocessable Content` - Understood the content type
- `404 Not Found` – Resource not found
- `500 Internal Server Error` – Server error

---

## Notes

- All requests and responses are in JSON format.

