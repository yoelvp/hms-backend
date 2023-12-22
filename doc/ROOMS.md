# Rooms

Detailed documentation for the rooms module, each service that exists is detailed here


## Get all resources

Gets all room records in the `getAll` service.

- Path:

```
/api/v1/rooms
```

- Method: `GET`

- Headers:

```http
Accept: application/json
Content-Type: application/json  // Optional
Authorization: Bearer [TOKEN]
```


- Response

```json
{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "room_number": "1",
      "loor_number": "1",
      "number_beds": "2",
      "bathroom_included": "1",
      "hot_water": "1",
      "tv_included": "1",
      "availability": "1",
      "type_room": "Lite",
      "price_per_day": "60",
      "price_per_hour": "20",
      "created_at": "2023-12-22T16:15:00.000000Z",
      "updated_at": "2023-12-22T16:15:00.000000Z"
    },
    {
      // ...
    }
  ],
  "first_page_url": "http://localhost:8000/api/v1/rooms?page=1",
  "from": 1,
  "last_page": 1,
  "last_page_url": "http://localhost:8000/api/v1/rooms?page=1",
  "links": [
    {
      "url": null,
      "label": "&laquo; Previous",
      "active": false
    },
    {
      "url": "http://localhost:8000/api/v1/rooms?page=1",
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
  "path": "http://localhost:8000/api/v1/rooms",
  "per_page": 15,
  "prev_page_url": null,
  "to": 6,
  "total": 6
}
```


## Register new room

Register a new room using the `register` service.

- Path

```
/api/v1/rooms
```

- Method: `POST`

- Headers

```http
Accept: application/json
Content-Type: application/json  // Optional
Authorization: Bearer [TOKEN]
```

- Body

| Field             | Type      | Description             |
|-------------------|-----------|-------------------------|
| room_number       | `string`  | Room number             |
| loor_number       | `string`  | Floor number            |
| number_beds       | `string`  | Number of beds          |
| bathroom_included | `boolean` | Includes bathroom       |
| hot_water         | `boolean` | Includes hot water bath |
| tv_included       | `boolean` | Includes TV             |
| availability      | `boolean` | Available room          |
| type_room         | `string`  | Type of room            |
| price_per_day     | `double`  | Price per day           |
| price_per_hour    | `double`  | Price per hour          |

- Example

```json
{
  "room_number": "1",
  "loor_number": "1",
  "number_beds": "2",
  "bathroom_included": true,
  "hot_water": true,
  "tv_included": true,
  "availability": true,
  "type_room": "Lite",
  "price_per_day": 60.00,
  "price_per_hour": 20.00
}
```

- Response

```json
{
  "room": {
    "room_number": "1",
    "loor_number": "1",
    "number_beds": "2",
    "bathroom_included": true,
    "hot_water": true,
    "tv_included": true,
    "availability": true,
    "type_room": "Lite",
    "price_per_day": 60,
    "price_per_hour": 20,
    "updated_at": "2023-12-22T17:53:54.000000Z",
    "created_at": "2023-12-22T17:53:54.000000Z",
    "id": 6
  },
  "message": "The room create successfully."
}
```


## Register many rooms

To register more than 1 room with the `registerMany` service.

- Path

```
/api/v1/rooms/many
```

- Method: `POST`

- Headers

```http
Accept: application/json
Content-Type: application/json  // Optional
Authorization: Bearer [TOKEN]
```

- Body

| Field             | Type      | Description             |
|-------------------|-----------|-------------------------|
| room_number       | `string`  | Room number             |
| loor_number       | `string`  | Floor number            |
| number_beds       | `string`  | Number of beds          |
| bathroom_included | `boolean` | Includes bathroom       |
| hot_water         | `boolean` | Includes hot water bath |
| tv_included       | `boolean` | Includes TV             |
| availability      | `boolean` | Available room          |
| type_room         | `string`  | Type of room            |
| price_per_day     | `double`  | Price per day           |
| price_per_hour    | `double`  | Price per hour          |

- Example

```json
[
  {
    "room_number": "1",
    "loor_number": "1",
    "number_beds": "2",
    "bathroom_included": true,
    "hot_water": true,
    "tv_included": true,
    "availability": true,
    "type_room": "Lite",
    "price_per_day": 60.00,
    "price_per_hour": 20.00
  },
  {
    // ...
  }
]
```

- Response

```json
{
  "room": [
    {
      "room_number": "2",
      "loor_number": "1",
      "number_beds": "2",
      "bathroom_included": true,
      "hot_water": true,
      "tv_included": true,
      "availability": true,
      "type_room": "Lite",
      "price_per_day": 60,
      "price_per_hour": 20
    },
    {
      "room_number": "3",
      "loor_number": "1",
      "number_beds": "2",
      "bathroom_included": true,
      "hot_water": true,
      "tv_included": true,
      "availability": true,
      "type_room": "Lite",
      "price_per_day": 60,
      "price_per_hour": 20
    }
  ],
  "created": true,
  "message": "The room create successfully."
}
```
