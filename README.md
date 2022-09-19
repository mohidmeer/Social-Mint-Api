
# API Reference

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



# SocialMintShare Api Endpoints

These are Some API End points your website will use in order to integrate the Social Share feature,
These Api Enpoints will Only work with `Socialmint` platform

## Linking Account with Social Mint Share Platform
In order to link your platform you first need to signup by sending user email and name and you will get Bearer token In reponse you need to 
save this token in database for user all the other api end points require this token in Authorization Header

```http
  POST https://socialmintshare.net/api/socialmintshare/signup
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` |    `string` | **Required**.              |
| `email`|    `string` | **Required**.              |

### `Response`

```http
{Bearer_Token :1|ZxceCzsZQ2jQyJIMJG8rExRbm2FJdqtv3kg }

```
#### `Status Codes`

| Status Code | Description |
| :--- | :--- |
| 201 | `CREATED` |
| 400 | `BAD REQUEST` |
| 409 | `USER_EXSISTS` |
| 500 | `INTERNAL SERVER ERROR` |



## Linking Twitter 
Linking twitter require redirect Url from the server so thats the exception you will make a call to server for redirect url 
and server will genarate a redirect url and send as response you will redirect the user for completing Auth Logic

```http
  GET https://socialmintshare.net/api/socialmintshare/twitterredirect
```

| Parameter | Type            | Description                       |
| :-------- | :-------        | :-------------------------------- |
| `Header`  | `Authorization` | **Bearer_Token**.  |

### `Responses`

```http
{"Successfully Connected" , 201 }

{"Error message" , 400 }


```

#### `Status Codes`

| Status Code | Description |
| :--- | :--- |
| 201 | `CREATED` |
| 400 | `BAD REQUEST` |
| 401 | `UNAUTHENTICATED` |
| 500 | `INTERNAL SERVER ERROR` |





## Linking Facebook and Instgram
Linking `Facebook` or `Instagram` require redirect Urls respectively that will be provided in your `.env` file you will have to redirect the user to Facebook or Instagram We will
save the user pages.Each redirect Url requires `State` Parameter as query params That will be used to identify the user on `Social Mint Share` for now we will use 
`user email` as state params so we can identify rather that managing state with sessions   
| Parameter | Type            | Description                       |
| :-------- | :-------        | :-------------------------------- |
| `Header`  | `Authorization` | **Bearer_Token**.  |

```http
// Facebook Redirect Url

  GET https://www.facebook.com/v14.0/dialog/oauth?client_id=&redirect_uri=k&scope=public_profile&state=

// Instagram Redirect Url

  GET https://www.facebook.com/v14.0/dialog/oauth?client_id=&redirect_uri=&scope=instagram_basic,t&state=
```


### `Responses`

```http
{"Account Successfully Connected" , 201 }

{"Error" , 500}


```

#### `Status Codes`

| Status Code | Description |
| :--- | :--- |
| 201 | `CREATED` |
| 500 | `INTERNAL SERVER ERROR` |





## Getting Accounts Data
For getting account data we need `Bearer_Token` in `Authorization Header` and you will receive Array of Accounts Data that are linked to specific
user 

```http
  GET https://socialmintshare.net/api/socialmintshare/accounts
```

| Parameter | Type            | Description                       |
| :-------- | :-------        | :-------------------------------- |
| `Header`  | `Authorization` | **Bearer_Token**.  |

### `Response`

```http
{
    "facebook": {
        "Status": true,
        "Multiple_Accounts": false,
        "Name": "Social Mint",
        "ImgUrl": "https://scontent.fisb7-1.c_ZoEAAAA&oh=00_AT_pMU3FL-1vFDY7lAZmUVubQ&oe=632BAE75"
    },
    "instagram": {
        "Status": true,
        "Multiple_Accounts": false,
        "Name": "socialmintnet",
        "ImgUrl": "https://scontent.fisb7-1.fnnet/v/t68057_n.jpg?_nc_cat=6c713&_nc_ohc=3ZCT39mf7dBpB7EFD"
    },
    "twitter": {
        "Status": true,
        "Multiple_Accounts": false,
        "Name": "SocialMintNet",
        "ImgUrl": "https://pbs.twimg.com/profile_images/1504562084717158403/vt86FVN7_normal.jpg"
    }
}

```

#### `Status Codes`

| Status Code | Description |
| :--- | :--- |
| 401 | `UNAUTHENTICATED` |
| 200 | `SUCCESS` |
| 500 | `INTERNAL SERVER ERROR` |
| 400 | `BAD REQUEST` |

## Unlinking User Social Accounts  
For Unlinking User Account We will make a call to following End points with `Delete` http verb and `Bearer_Token` in Authorization
Header
| Parameter | Type            | Description                       |
| :-------- | :-------        | :-------------------------------- |
| `Header`  | `Authorization` | **Bearer_Token**.  |

#### Facebook Unlinking
```http
  DELETE  : https://socialmintshare.net/api/socialmintshare/unlinkfacebook
```
#### `Response`

```http
  {"Facebook Unlinked Successfully"}
```

#### Instagram Unlinking
```http
  DELETE  : https://socialmintshare.net/api/socialmintshare/unlinkinstagram
```
#### `Response`

```http
  {"Instagram Unlinked Successfully"}
```

#### Twitter  Unlinking
```http
  DELETE  : https://socialmintshare.net/api/socialmintshare/unlinktwitter
```
   
#### `Response`

```http
  {"Twitter Unlinked Successfully} 
```
### ` Common Status Codes`

| Status Code | Description |
| :--- | :--- |
| 401 | `UNAUTHENTICATED` |
| 500 | `INTERNAL SERVER ERROR` |
| 400 | `BAD REQUEST` |
| 404 | `NOT_FOUND` |


## User Accounts Selection
Sometimes we have multiple user accounts that user selected from Facebook OAuth Screen specially for instagram and facebook
We want to select only one Of the Account for Linking We can force the user to select one Account here are somme routes for 
that purpose,`Page_id` is provided in Array of Accounts if user have multiple Pages for facebook or instagram 
| Parameter | Type            | Description                       |
| :-------- | :-------        | :-------------------------------- |
| `Header`  | `Authorization` | **Bearer_Token**.                 |
| `page_id`  | `string` | **Page_id**.                            |

#### Facebook Page Selection
```http
  POST    : https://socialmintshare.net/api/socialmintshare/facebookselection
```
#### Instagram Page Selection
```http
  POST    : https://socialmintshare.net/api/socialmintshare/instagramselection
```
#### Responses
```http
{"Successfully Connected"}

```


| Status Code | Description |
| :--- | :--- |
| 200 | `SUCCESS`                      |
| 401 | `UNAUTHENTICATED`       |
| 500 | `INTERNAL SERVER ERROR` |
| 400 | `BAD REQUEST`           |
| 404 | `NOT_FOUND`             |