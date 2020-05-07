---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_ba05cb3a11667fbd2926fcfc72905d8a -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/projects"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "parent_id": null,
        "mpo_id": "1",
        "csj_cn": "1",
        "name": "Transit Route",
        "description": "New transit route for the city of El Paso",
        "limit_from": "RM 12",
        "limit_to": "RM 15",
        "relationship_description": "New transit route for the city of El Paso",
        "need_purpose": "New transit route for the city of El Paso",
        "agency_comments": "New transit route for the city of El Paso",
        "existing_lanes": 3,
        "projected_lanes": 4,
        "created_at": "2020-04-27 19:01:52",
        "updated_at": "2020-04-27 19:01:52"
    },
    {
        "id": 2,
        "parent_id": null,
        "mpo_id": "1",
        "csj_cn": "1",
        "name": "Bikeway",
        "description": "New bikeway for the city of El Paso",
        "limit_from": "RM 12",
        "limit_to": "RM 15",
        "relationship_description": "New Bikeway for the city of El Paso",
        "need_purpose": "New Bikeway for the city of El Paso",
        "agency_comments": "New Bikeway for the city of El Paso",
        "existing_lanes": 5,
        "projected_lanes": 6,
        "created_at": "2020-04-27 19:17:06",
        "updated_at": "2020-04-27 19:17:06"
    }
]
```

### HTTP Request
`GET projects`


<!-- END_ba05cb3a11667fbd2926fcfc72905d8a -->

<!-- START_6457c064807333898638aaa8f41ba1ab -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/projects"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST projects`


<!-- END_6457c064807333898638aaa8f41ba1ab -->

<!-- START_559ca32d29b9eee92470ea6238f2e491 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/projects/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/projects/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "parent_id": null,
    "mpo_id": "1",
    "csj_cn": "1",
    "name": "Transit Route",
    "description": "New transit route for the city of El Paso",
    "limit_from": "RM 12",
    "limit_to": "RM 15",
    "relationship_description": "New transit route for the city of El Paso",
    "need_purpose": "New transit route for the city of El Paso",
    "agency_comments": "New transit route for the city of El Paso",
    "existing_lanes": 3,
    "projected_lanes": 4,
    "created_at": "2020-04-27 19:01:52",
    "updated_at": "2020-04-27 19:01:52"
}
```

### HTTP Request
`GET projects/{project}`


<!-- END_559ca32d29b9eee92470ea6238f2e491 -->

<!-- START_d0e574164f37de9866bf98e489a3b5d0 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/projects/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/projects/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT projects/{project}`

`PATCH projects/{project}`


<!-- END_d0e574164f37de9866bf98e489a3b5d0 -->

<!-- START_7cb1e494fdd6b6708f75dbf4b815c552 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/projects/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/projects/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE projects/{project}`


<!-- END_7cb1e494fdd6b6708f75dbf4b815c552 -->


