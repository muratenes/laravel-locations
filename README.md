
## About muratenes/laravel-locations

This package contains turkey cities and districts

## How to Install ?

Run this command in your application base folder.

`composer require murat/regions`

## Usage

Some links are as follows

### List all countries

`localhost:8000/locations/countries`

### Get States by Country

`localhost:8000/locations/states/<country:id>`

ex : countryId = 228

### Get Districts by State

`localhost:8000/locations/districts/<state:id>`

ex : stateId = 1
