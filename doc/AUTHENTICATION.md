# Authentication

Detail of authentication services for the user


## Login

To log in you have the `login` service.

- Path

```
/api/v1/auth/login
```

- Headers

```http
Accept: application/json
Content-Type: application/json  // Optional
```

- Body

| Field     | Type      | Description         |
|-----------|-----------|---------------------|
| email     | `string`  | User email          |
| password  | `string`  | Enter your password |

- Example

  ```json
  {
    "email": "yoelvp73@gmail.com",
    "password": "@Valverde2002"
  }
  ```

- Response

```json
{
  "token": "[TOKEN]",
  "token_type": "Bearer"
}
```


## Register

To register a new system administrator user, use the `register` service.

- Path

```
/api/v1/auth/register
```

- Headers

```http
Accept: application/json
Content-Type: application/json  // Optional
```

- Body

| Field           | Type      | Description           |
|-----------------|-----------|-----------------------|
| names           | `string`  | Names of the user     |
| surnames        | `string`  | Surnames of the user  |
| document_number | `string`  | Document number       |
| phone_number    | `string`  | Phone number          |
| address         | `string`  | Address of user       |
| email           | `string`  | User email            |
| password        | `string`  | Enter your password   |

- Example

  ```json
  {
    "names": "John",
    "surnames": "Doe",
    "document_number": "00000000",
    "phone_number": "999999999",
    "address": "New York",
    "email": "john.doe@gmail.com",
    "password": "@John{Doe}"
  }
  ```

- Response

```json
{
  "user": {
    "id": 2
    "names": "John",
    "last_name": "Doe",
    "document_number": "74571801",
    "phone_number": "942208501",
    "address": "New York",
    "email": "john.doe@gmail.com",
    "updated_at": "2023-12-20T19:40:00.000000Z",
    "created_at": "2023-12-20T19:40:00.000000Z",
  },
  "token": "17|svlx4QyUseRIhoecOHri5xY4IlzUSzucIDzWbv2W18ce6853",
  "token_type": "Bearer"
}
```


## Reset password

To change the old password you can use the `reset password` service

- Path

```
/api/v1/auth/reset-password/{USER_ID}
```

- Headers

```http
Accept: application/json
Content-Type: application/json  // Optional
Authentication: Bearer [TOKEN]
```

- Body

| Field     | Type      | Description           |
|-----------|-----------|-----------------------|
| password  | `string`  | Send the new password |

Example

```json
{
  "password": "NEW_PASSWORD"
}
```


- Response

```json
{
  "message": "User with ID {USER_ID} not found"
}
```
