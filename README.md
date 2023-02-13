# WEATHER SERVICE

## API

### /weather
Получение погоды по названию города

### /weather/popular
Получение списка популярных запросов

### /weather/results
Получение статистики

## Добавление новых источников API
Требуется добавить новый класс провайдера в namespace App\WeatherProviders
и реализовать интерфейс WeatherProviderInterface.
Затем указанного провайдера указать в сервисе App\Services\WeatherService
в константе PROVIDERS

## Запуск проекта
composer install


Чтобы запустить докер требуется выполнить команду ./vendor/bin/sail up
