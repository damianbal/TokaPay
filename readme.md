# TokaPay
> Simple platform to learn about Payments made with Laravel and Omnipay

Aim of this project is to make something like PayPal but of course lot simpler.

Idea of the project is to pay and get paid by generated tokens.

### Features
* Add funds to account by Credit card (Stripe)
* Accept payment by API
* Create payment token in dashboard
* See list of tokens in dashboard (remove tokens as well)
* List of transactions
* Basic account info

![TokaPayHome](tokapay.png?raw=true)

## Installation

```sh
composer install
php artisan migrate
php artisan db:seed
```

## Tests

There is couple tests which test Services

To run tests:
```sh
vendor/bin/phpunit 
```

Of course you need to create .env file based on .env.example and provide your database info

## Meta

Damian Balandowski – balandowski@icloud.com

[https://github.com/damianbal](https://github.com/damianbal)


