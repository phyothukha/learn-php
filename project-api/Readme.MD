# Area Calculator API Documentation

## Overview

The Area Calculator API provides endpoints to calculate the area, breadth, and width of rectangular shapes. This documentation outlines the available endpoints, request parameters, and example responses.

## Base URL

- [base_url](http://localhost:9000)

# Area Calculator API Documentation

## Overview

The Area Calculator API provides endpoints to calculate the area, breadth, and width of rectangular shapes. This documentation outlines the available endpoints, request parameters, and example responses.

### Endpoint

- [/area.php](http://localhost:9000)

### Description

Calculates the area of a rectangle given its breadth and width.

### Request Parameters

- `breadth` (number, required): The breadth of the rectangle.
- `width` (number, required): The width of the rectangle.

### Example Request

```json
POST /calculate-area
Content-Type: application/json

{
  "breadth": 5,
  "width": 10,
  "area":"50 sqft",
}
```
