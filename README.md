# API Reference

## Posting On Social Media
### Facebook Feed Post
```http
  POST https://socialmintshare.net/api/facebook/feed
```

| Parameter | Type     |     Description                |
| :-------- | :------- |     :------------------------- |
| `Header` | `Authorization` | **Required**. Your API key |
| `message` | `string`       | **Required**. Your  Status |

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
| `message` | `string` | **Optional**. Your  Caption |
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
| `message` | `string` | **Required**. Your aption |
| `img_url` | `url` | **Required**. Your   Image |

### `Responses`
You wil get Page Name and Post id In response

```http
  {
    "created_at": "Wed Oct 10 20:19:24 +0000 2018"
}

```
### Reddit
```http
  POST https://socialmintshare.net/api/reddit/feed
```

| Parameter | Type     |     Description                |
| :-------- | :------- |     :------------------------- |
| `Header` | `Authorization` | **Required**. Your API key |
| `title`  | `string` | **Required**. Your  title |
| `text`   | `string` | **Required**. Your  text |

### `Responses`
You wil get a very wierd response from reddit 
```js
 {"jquery": [[0, 1, "call", ["body"]], [1, 2, "attr", "find"], 
 [2, 3, "call", [".status"]], [3, 4, "attr", "hide"], [4, 5, "call", []],
 [5, 6, "attr", "html"], [6, 7, "call", [""]], [7, 8, "attr", "end"],
 [8, 9, "call", []], [1, 10, "attr", "redirect"], [10, 11, "call",
 ["https://www.reddit.com/r/u_MoHiD420/comments/xo4w6y/some_titile/"]],
 [1, 12, "attr", "find"], [12, 13, "call", ["*[name=url]"]],
 [13, 14, "attr", "val"], [14, 15, "call", [""]], [15, 16, "attr", "end"], [16, 17, "call", []],
 [1, 18, "attr", "find"], [18, 19, "call", ["*[name=text]"]], [19, 20, "attr", "val"],
 [20, 21, "call", [""]], [21, 22, "attr", "end"], [22, 23, "call", []], 
 [1, 24, "attr", "find"], [24, 25, "call", ["*[name=title]"]], 
 [25, 26, "attr", "val"], [26, 27, "call", [" "]], [27, 28, "attr", "end"], 
 [28, 29, "call", []]], "success": true}

```
At the end success true or false incase anything  go wrong
### Post image on Reddit 
```http
  POST https://socialmintshare.net/api/reddit/pic
```

| Parameter | Type     |     Description                |
| :-------- | :------- |     :------------------------- |
| `Header` | `Authorization` | **Required**. Your API key |
| `title` | `string` | **Required**. Your caption |
| `img_url` | `url` | **Required**. Your   Image |

### `Responses`
You wil get Something Like This 

```js
   {"jquery": [[0, 1, "call", ["body"]], [1, 2, "attr", "find"], 
 [2, 3, "call", [".status"]], [3, 4, "attr", "hide"], [4, 5, "call", []],
 [5, 6, "attr", "html"], [6, 7, "call", [""]], [7, 8, "attr", "end"],
 [8, 9, "call", []], [1, 10, "attr", "redirect"], [10, 11, "call",
 ["https://www.reddit.com/r/u_MoHiD420/comments/xo4w6y/some_titile/"]],
 [1, 12, "attr", "find"], [12, 13, "call", ["*[name=url]"]],
 [13, 14, "attr", "val"], [14, 15, "call", [""]], [15, 16, "attr", "end"], [16, 17, "call", []],
 [1, 18, "attr", "find"], [18, 19, "call", ["*[name=text]"]], [19, 20, "attr", "val"],
 [20, 21, "call", [""]], [21, 22, "attr", "end"], [22, 23, "call", []], 
 [1, 24, "attr", "find"], [24, 25, "call", ["*[name=title]"]], 
 [25, 26, "attr", "val"], [26, 27, "call", [" "]], [27, 28, "attr", "end"], 
 [28, 29, "call", []]], "success": true}

```
### Posting On Telegram 
```http
  POST https://socialmintshare.net/api/telegram/feed
```

| Parameter | Type           | Description               |
| :-------- | :-------       |:------------------------- |
| `Header` | `Authorization` | **Required**. Your API key|
| `message` | `string`       | **Required**. Your  message|

### `Responses`
You wil get Chat id Name and User name 

### Posting media On Telegram
```http
  POST https://socialmintshare.net/api/telegram/pic
```

| Parameter | Type     |     Description                |
| :-------- | :------- |     :------------------------- |
| `Header` | `Authorization` | **Required**. Your API key |
| `message` | `string` | **Required**. Your caption |
| `img_url` | `url` | **Required**. Your   Image |

### `Responses`
You wil get Chat id Name and User name 

### Posting On Discord
```http
  POST https://socialmintshare.net/api/discord/feed
```

| Parameter | Type           | Description               |
| :-------- | :-------       |:------------------------- |
| `Header` | `Authorization` | **Required**. Your API key|
| `message` | `string`       | **Required**. Your  message|

### `Responses`


### Posting media On Discord
```http
  POST https://socialmintshare.net/api/discord/pic
```

| Parameter | Type     |     Description                |
| :-------- | :------- |     :------------------------- |
| `Header` | `Authorization` | **Required**. Your API key |
| `message` | `string` | **Required**. Your caption |
| `img_url` | `url` | **Required**. Your   Image |

### `Responses`
### Posting On Pintrest
```http
  POST https://socialmintshare.net/api/pintrest/pin
```

| Parameter | Type           | Description               |
| :-------- | :-------       |:------------------------- |
| `Header` | `Authorization` | **Required**. Your API key|
| `title` | `string`         | **Required**. Title|
| `description` | `string`   | **Required**. Description |
| `img_url` | `string`       | **Required**. Image Url |

### `Responses`


 


## `Common Error Responses`
#### Invalid Data 

```http
"message": "The given data was invalid.",
    "errors": {
        "message": [
            "The message field is required."
        ]
    }



    "message": "The given data was invalid.",
    "errors": {
        "img_url": [
            "The img url field is required."
        ]
    }


    "message": "The given data was invalid.",
    "errors": {
        "caption": [
            "The caption field is required."
        ]
    }


```
#### UNAUTHENTICATED 

```http
{
    "message": "Unauthenticated."
}

```
Sometimes you may get a response from Social Media Platform itself about limit issues OAuth Issues or user restrictions 

## `Common Status Codes`

| Status Code | Description |
| :--- | :--- |
| 401 | `UNAUTHENTICATED` |
| 201 | `CREATED` |
| 500 | `INTERNAL SERVER ERROR` |
| 400 | `BAD REQUEST` |
| 422 | `UNPROCESSABLE CONTENT` |


## `SocialMintShare Api Endpoints`

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



## Linking Twitter,Facebook,Instagram,Reddit,Pintrest and Discord
Linking Social Media Platform require redirect Url from the server you will make a call to server for redirect url 
and server will genarate a redirect url and send as response you will redirect the user for completing Auth Logic

```http
  GET https://socialmintshare.net/api/socialmintshare/twitter/login
  GET https://socialmintshare.net/api/socialmintshare/facebook/login
  GET https://socialmintshare.net/api/socialmintshare/instagram/login
  GET https://socialmintshare.net/api/socialmintshare/reddit/login
  GET https://socialmintshare.net/api/socialmintshare/discord/login
  GET https://socialmintshare.net/api/socialmintshare/pintrest/login
```

| Parameter | Type            | Description                       |
| :-------- | :-------        | :-------------------------------- |
| `Header`  | `Authorization` | **Bearer_Token**.  |

### `Responses After Redirections From Client Side`

```http
{"Successfully Connected" , 201 }

{"Error message" , 400 }

```
#### `Status Codes`

| Status Code | Description |
| :--- | :--- |
| 201 | `CREATED` |
| 400 | `BAD REQUEST` |
| 409 | `USER_EXSISTS` |
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
    "FACEBOOK": {
        "Status": false,
        "Multiple_Pages": false,
        "Name": " No Account Linked"
    },
    "INSTAGRAM": {
        "Status": false,
        "Multiple_Pages": false,
        "Name": " No Account Linked"
    },
    "TWITTER": {
        "Status": false,
        "Name": " No Account Linked"
    },
    "REDDIT": {
        "Status": false,
        "Name": " No Account Linked"
    },
    "DISCORD": {
        "Status": false,
        "Multiple_Channels": false,
        "Name": " No Account Linked"
    },
    "PINTREST": {
        "Status": false,
        "Multiple_Boards": false,
        "Name": " No Account Linked"
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
  DELETE  : https://socialmintshare.net/api/socialmintshare/facebook/unlink
```
#### `Response`

```http
  {"Facebook Unlinked Successfully"}
```

#### Instagram Unlinking
```http
  DELETE  : https://socialmintshare.net/api/socialmintshare/instagram/unlink
```
#### `Response`

```http
  {"Instagram Unlinked Successfully"}
```

#### Twitter  Unlinking
```http
  DELETE  : https://socialmintshare.net/api/socialmintshare/twitter/unlink
```
   
#### `Response`

```http
  {"Twitter Unlinked Successfully} 
```
All Linked platforms can be unlinked just need to replace `Social Media App Name` In Url like as above 
#### Social Platform Unlinking
```http
  DELETE  : https://socialmintshare.net/api/socialmintshare/{Social Name}/unlink
```
   
#### `Response`

```http
  {"Account Unlinked Successfully} 
```




### ` Common Status Codes`

| Status Code | Description |
| :--- | :--- |
| 401 | `UNAUTHENTICATED` |
| 500 | `INTERNAL SERVER ERROR` |
| 400 | `BAD REQUEST` |
| 404 | `NOT_FOUND` |

## User Pages,Channels and Boards Selection
Sometimes we have multiple user pages that user selected from Facebook OAuth Screen specially for instagram and facebook
We want to select only one Of the pages for Linking We can force the user to select one page here are somme routes for 
that purpose,`id` is provided in Array of Accounts if user have multiple Pages,Channels or Boards for facebook,instagram
,Discord or Pintrest respectively We have a similar problem with discord and pinterest we may have multiple discord channel
 or pintrest user boards we will force the user to use one of them for posting

| Parameter | Type            | Description                       |
| :-------- | :-------        | :-------------------------------- |
| `Header`  | `Authorization` | **Bearer_Token**.                 |
| `id`  | `string` | **id**.                            |

### Facebook Page Selection
```http
  POST    : https://socialmintshare.net/api/socialmintshare/facebook/select
```
### Instagram Page Selection
```http
  POST    : https://socialmintshare.net/api/socialmintshare/instagram/select
```
### Discord Channel Selection
```http
  POST    : https://socialmintshare.net/api/socialmintshare/discord/select
```
### Pintrest Boards Selection
```http
  POST    : https://socialmintshare.net/api/socialmintshare/pinterest/select
```


#### Responses
```http
{"Successfully Connected"}

```

| Status Code | Description |
| :--- | :--- |
| 200 | `SUCCESS`            |
| 401 | `UNAUTHENTICATED`       |
| 500 | `INTERNAL SERVER ERROR` |
| 400 | `BAD REQUEST`           |
| 404 | `NOT_FOUND`             |