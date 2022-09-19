
## API Reference

## Posting On Social Media
### Facebook Feed Post
```http
  POST https://socialmintshare.net/api/facebook/feed
```

| Parameter | Type     |     Description                |
| :-------- | :------- |     :------------------------- |
| `Header` | `Authorization` | **Required**. Your API key |
| `message` | `string` | **Required**. Your  Status |

### `Responses`
You wil get Page Name and Post id In response
```http
  {
    "Page Name": {
        "id": "101694652511438_159760810038155"
    }
}

```
### Facebook Media With Post
```http
  POST https://socialmintshare.net/api/facebook/pic
```

| Parameter | Type     |     Description                |
| :-------- | :------- |     :------------------------- |
| `Header` | `Authorization` | **Required**. Your API key |
| `message` | `string` | **Required**. Your  Status |
| `img_url` | `url` | **Required**. Your   Image |

### `Responses`
You wil get Page Name and Post id In response

```http
  {
    "Page Name": {
        "id": "101694652511438_159760810038155"
    }
}

```
### Instagram Media Post
```http
  POST https://socialmintshare.net/api/instagram/pic
```

| Parameter | Type     |     Description                |
| :-------- | :------- |     :------------------------- |
| `Header` | `Authorization` | **Required**. Your API key |
| `message` | `string` | **Required**. Your  Message |
| `imgurl` | `url` | **Required**.     Your  Image |

### `Responses`
You wil get Page Name and Post id In response
```http
  {
    "Page Name": {
        "id": "101694652511438_159760810038155"
    }
}

```
### Twitter Tweet Post
```http
  POST https://socialmintshare.net/api/twitter/tweet
```

| Parameter | Type     |     Description                |
| :-------- | :------- |     :------------------------- |
| `Header` | `Authorization` | **Required**. Your API key |
| `message` | `string` | **Required**. Your  Status |

### `Responses`
You wil get Page Name and Post id In response
```http
  {
    "created_at": "Wed Oct 10 20:19:24 +0000 2018"
}

```
### Tweet with Media
```http
  POST https://socialmintshare.net/api/twitter/tweetMedia
```

| Parameter | Type     |     Description                |
| :-------- | :------- |     :------------------------- |
| `Header` | `Authorization` | **Required**. Your API key |
| `message` | `string` | **Required**. Your  Status |
| `img_url` | `url` | **Required**. Your   Image |

### `Responses`
You wil get Page Name and Post id In response

```http
  {
    "created_at": "Wed Oct 10 20:19:24 +0000 2018"
}

```


## `Common Error Responses`
#### Invalid Data 

```http
"message": "The given data was invalid.",
    "errors": {
        "message": [
            "The message field is required."
        ]
    }
// Another Response 

{
    "message": "The given data was invalid.",
    "errors": {
        "img_url": [
            "The img url field is required."
        ]
    }
}

```
#### UNAUTHENTICATED 

```http
{
    "message": "Unauthenticated."
}

```









## `Common Status Codes`

| Status Code | Description |
| :--- | :--- |
| 401 | `UNAUTHENTICATED` |
| 201 | `CREATED` |
| 500 | `INTERNAL SERVER ERROR` |
| 400 | `BAD REQUEST` |
| 422 | `UNPROCESSABLE CONTENT` |


