## Weather application
Application allows its users to quickly check fo the weather in their city of choice. There is also option to add most visited places to the bookmarks. 

This application is using Wttr.in to get the data.

### Application Preview
![app preview](app_preview.png)
### Installation

Clone the repository:

```
git clone https://github.com/KarolZygadlo/WeatherApp
```

Then just follow the steps below:

* initialize `.env` file and customize to your needs:

```
cp .env.example .env
```

* open `phpunit.xml` and change 'APP_KEY'

* build and run containers:

```
make build
make run
```

* enter PHP shell and install composer packages and generate app key:

```
make php
    composer install
    php artisan key:generate
    exit
```

* enter Node shell and install npm packages and and run dev:

```
make node
    npm install
    npm run dev
    exit
```

### Launch the application
* open application in the browser via url:

```
localhost:80
```
* check the weather with your terminal:

```
make php
    php artisan get:weather
```
* example andpoint for outside services

```
/api/get-weather?city=Legnica
```
### Running tests

You can run PHPUnit test cases

```
make test
```

### Code style check

You can run PHP-CS-Fixer:

```
make fix
```

### Stopping docker containers

```
make stop
```

### Available containers

* web - nginx HTTP server
* php - php and composer stuff
* node - npm stuff
