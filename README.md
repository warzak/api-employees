# api-employees
Web Api Employees

#Employees REST APi

###Following are the Models
- Address
- City
- Employee
- Salaries
- State
- User

###Usage
Clone the project via git clone or download the zip file.

###Development environment
https://github.com/laravel/sail

###Composer Install
cd into the project directory via terminal sail and run the following command to install composer packages.

`composer install`

###Generate Key
then run the following command to generate fresh key.

`artisan key:generate`

###Run Migration
then run the following command to create migrations in the databbase.

`artisan migrate`

###Database Seeding
finally run the following command to seed the database with dummy content.

`artisan db:seed --class=Blit\\StatesAndCities\\Seeds\\DatabaseSeeder`

and

`artisan db:seed`

##API EndPoints
###States and Cities
- GET http://0.0.0.0:80/api/states
```angular2html
    {
        "id": 1,
        "country_id": 1,
        "ibge": 12,
        "code": "AC",
        "name": "Acre",
        "created_at": "2021-12-23T22:41:57.000000Z",
        "updated_at": "2021-12-23T22:41:57.000000Z"
    }
```
---
- GET http://0.0.0.0:80/api/cities
```angular2html
    {
        "id": 1,
        "state_id": 22,
        "code": 1100015,
        "name": "Alta Floresta Do Oeste",
        "created_at": "2021-12-23T22:41:57.000000Z",
        "updated_at": "2021-12-23T22:41:57.000000Z"
    },
```
---
###Employess
- GET All http://0.0.0.0:80/api/employees
```angular2html
{
    "employees": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "address_id": 10,
                "first_name": "Naiara",
                "last_name": "Espinoza",
                "email": "rivera.ruth@example.org",
                "cpf": "96182831006",
                "rg": "942002407",
                "birthday": "1996-04-24",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            },
            {
                "id": 2,
                "address_id": 37,
                "first_name": "Nayara",
                "last_name": "da Rosa",
                "email": "torres.noa@example.org",
                "cpf": "33239844206",
                "rg": "917829557",
                "birthday": "1994-01-26",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            },
            {
                "id": 3,
                "address_id": 3,
                "first_name": "Eric",
                "last_name": "Colaço",
                "email": "emiliano.avila@example.net",
                "cpf": "67619543988",
                "rg": "651170320",
                "birthday": "2013-05-30",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            },
            {
                "id": 4,
                "address_id": 33,
                "first_name": "Stella",
                "last_name": "Carvalho",
                "email": "molina.igor@example.net",
                "cpf": "26925723008",
                "rg": "575992328",
                "birthday": "2009-02-09",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            },
            {
                "id": 5,
                "address_id": 28,
                "first_name": "Heitor",
                "last_name": "Maia",
                "email": "gabrielle40@example.com",
                "cpf": "64947282436",
                "rg": "030158699",
                "birthday": "1978-10-07",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            },
            {
                "id": 6,
                "address_id": 50,
                "first_name": "Alícia",
                "last_name": "Correia",
                "email": "eva61@example.net",
                "cpf": "26238711752",
                "rg": "609772597",
                "birthday": "2016-11-19",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            },
            {
                "id": 7,
                "address_id": 49,
                "first_name": "Rodolfo",
                "last_name": "Queirós",
                "email": "stella.sandoval@example.net",
                "cpf": "13131143673",
                "rg": "270683429",
                "birthday": "2021-12-07",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            },
            {
                "id": 8,
                "address_id": 4,
                "first_name": "Erik",
                "last_name": "Balestero",
                "email": "qqueiros@example.net",
                "cpf": "72695631103",
                "rg": "188988041",
                "birthday": "1999-01-15",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            },
            {
                "id": 9,
                "address_id": 12,
                "first_name": "Jonas",
                "last_name": "Marques",
                "email": "ronaldo.dearruda@example.org",
                "cpf": "03930966611",
                "rg": "788599348",
                "birthday": "2006-05-18",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            },
            {
                "id": 10,
                "address_id": 14,
                "first_name": "Heitor",
                "last_name": "Tamoio",
                "email": "dfonseca@example.org",
                "cpf": "51837395446",
                "rg": "109321812",
                "birthday": "2009-04-17",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            },
            {
                "id": 11,
                "address_id": 50,
                "first_name": "Gian",
                "last_name": "Vale",
                "email": "pena.davi@example.net",
                "cpf": "32913698662",
                "rg": "561953090",
                "birthday": "1996-07-05",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            },
            {
                "id": 12,
                "address_id": 28,
                "first_name": "Heitor",
                "last_name": "de Freitas",
                "email": "daniela83@example.org",
                "cpf": "22881358756",
                "rg": "024943800",
                "birthday": "2012-01-22",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            },
            {
                "id": 13,
                "address_id": 22,
                "first_name": "Téo",
                "last_name": "Meireles",
                "email": "natan98@example.org",
                "cpf": "39631465080",
                "rg": "689580509",
                "birthday": "2012-05-25",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            },
            {
                "id": 14,
                "address_id": 34,
                "first_name": "Maitê",
                "last_name": "Campos",
                "email": "luciana.valentin@example.com",
                "cpf": "12949745563",
                "rg": "221386823",
                "birthday": "2008-06-12",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            },
            {
                "id": 15,
                "address_id": 40,
                "first_name": "Bruno",
                "last_name": "Queirós",
                "email": "dayana.ferraz@example.com",
                "cpf": "89783413309",
                "rg": "924830530",
                "birthday": "2000-08-03",
                "created_at": "2021-12-23T22:44:10.000000Z",
                "updated_at": "2021-12-23T22:44:10.000000Z",
                "deleted_at": null
            }
        ],
        "first_page_url": "http://0.0.0.0/api/employees?page=1",
        "from": 1,
        "last_page": 4,
        "last_page_url": "http://0.0.0.0/api/employees?page=4",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://0.0.0.0/api/employees?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://0.0.0.0/api/employees?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://0.0.0.0/api/employees?page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://0.0.0.0/api/employees?page=4",
                "label": "4",
                "active": false
            },
            {
                "url": "http://0.0.0.0/api/employees?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": "http://0.0.0.0/api/employees?page=2",
        "path": "http://0.0.0.0/api/employees",
        "per_page": 15,
        "prev_page_url": null,
        "to": 15,
        "total": 50
    },
    "message": "Retrieved successfully"
}
```
---
- GET Single http://0.0.0.0:80/api/employees/4
```
{
    "employee": {
        "id": 4,
        "first_name": "Stella",
        "last_name": "Carvalho",
        "email": "molina.igor@example.net",
        "cpf": "26925723008",
        "rg": "575992328",
        "birthday": "2009-02-09",
        "address": "Travessa Maiara, 4. Bloco B CEP 83899-835 - Barão do Triunfo / RS",
        "salaries": [
            "2021-12-23 - R$6985.49",
            "2021-12-23 - R$3811.28"
        ]
    },
    "message": "Record found"
}
```
---
- GET CPF http://0.0.0.0:80/api/employees/cpf/26925723008
```
{
    "employee": {
        "id": 4,
        "first_name": "Stella",
        "last_name": "Carvalho",
        "email": "molina.igor@example.net",
        "cpf": "26925723008",
        "rg": "575992328",
        "birthday": "2009-02-09",
        "address": "Travessa Maiara, 4. Bloco B CEP 83899-835 - Barão do Triunfo / RS",
        "salaries": [
            "2021-12-23 - R$6985.49",
            "2021-12-23 - R$3811.28"
        ]
    },
    "message": "Record found"
}
```
---
- POST Create http://0.0.0.0:80/api/employees
```angular2html
[body json request]

{
    "first_name": "Maria",
    "last_name": "Salgada",
    "email": "vmascarenhas@example.net",
    "cpf": "10583102166",
    "rg": "722712618",
    "birthday": "1999-03-01",
    "address":" rua x3, numero 592",
    "postal_code":"92500000",
    "city_id":"22"
}

{
"message": "Registered successfully"
}

```
---
- POST Salary http://0.0.0.0:80/api/employees/salary
```
[body json request]

{
    "employee_id": "18",
    "salary": 1000.55
}


[response]

{
"message": "Registered successfully"
}
```
- PUT Update http://0.0.0.0:80/api/employees (create similar)
- DELETE destroy http://0.0.0.0:80/api/employees/18


######Author: Rodrigo Warzak - warzak@gmail.com

23/12/2021

