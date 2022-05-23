## Task description
Laravel app:
 - The user provides his city and country via form
 - After submission system displays current weather forecast.

The temperature forecast is calculated as an average based on various APIs, at least 2 different data sources.

(ex. API1 will return temperature 25, API2 will return temperature 27 so the result should be (25+27)/2 ie. 26)

A few notes:
- Implemented proper error handling
- Results are stored in the database
- Added simple caching mechanism
- Ability to easily add new data sources (how to register them, interfaces, etc.)
- Clean data sharing
- Having the latest PHP mechanisms (like traits)

## Used technologies

- PHP (Laravel)
- MySQL
- Cache system
- Strategy, Adapter design patterns

## Usage

1. clone the project
2. Run:
    - `copy .env.example .env`
    - `composer install`
    - `php artisan key:generate`
    - `php artisan migrate`
    - `php artisan db:seed`

You need to have these configs in your .env file besides the db configs.  

`OPENWEATHERMAP_KEY=`  
`OPENWEATHERMAP_API_URL=https://api.openweathermap.org/data/2.5/`  
`WEATHERBIT_KEY=`  
`WEATHERBIT_API_URL=https://api.weatherbit.io/v2.0/`  

You can get   
`OPENWEATHERMAP_KEY` from https://openweathermap.org/API  
`WEATHERBIT_KEY` from https://www.weatherbit.io/  

![image](https://user-images.githubusercontent.com/45182546/169783061-c23f9d9d-c7f3-482e-b91c-747e76119213.png)
