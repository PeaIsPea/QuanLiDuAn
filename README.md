<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

# About this repository

Hi! This is an unfinished Laravel E-commerce website project about selling Game Key ( yeah, the one that we used to redeem at Steam )

# Requirement & Installation

PHP >= 8.0
Composer >= 2.5

Create a .env file with this

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=<your app key>
APP_DEBUG=true
APP_URL=

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<your database name>
DB_USERNAME=<your database username>
DB_PASSWORD=<your database password>

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379


MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

MAIL_ADDRESS=gamestore@noreply.email.com
SENDGRID_RAPID_API_HOST=rapidprod-sendgrid-v1.p.rapidapi.com
SENDGRID_RAPID_API_KEY=4d239dcf31mshc0eacf61fa07382p11c334jsn52e33ce4bb74

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"


FACEBOOK_CLIENT_ID=185195804461074
FACEBOOK_CLIENT_SECRET=344be1019ae836d96545385ec65ae47c
# FACEBOOK_CLIENT_ID= '948505973086987',
# FACEBOOK_CLIENT_SECRET='1cd7ec8f616d2d1f89968673f723cab9'
FACEBOOK_REDIRECT='/auth/fb/callback'

GOOGLE_CLIENT_ID=62911174979-adgf70c5h4dlisff4q3kts20gg8147lk.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=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
# GOOGLE_CLIENT_ID='868021255911-astpl298v08fgh8cntgh1jk7a5c79tk0.apps.googleusercontent.com',
# GOOGLE_CLIENT_SECRET='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',
GOOGLE_REDIRECT='/auth/gg/callback'



MOMO_PARTNER_CODE=MOMOBKUN20180529
MOMO_ACCESS_KEY=klm05TvNBzhg7h7j
MOMO_SECRET_KEY=at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa
MOMO_URL=https://test-payment.momo.vn/v2/gateway/api/create

VNPAY_TERMINAL_CODE=NGPV5U4Q
VNPAY_SECRET_CODE=FYXGGFJSWBPVXDVENZXFQUSCJKXYYANK
VNPAY_URL=https://sandbox.vnpayment.vn/paymentv2/vpcpay.html

PAYPAL_CLIENT_ID=AU3FHbaWBElqVBcBDI3M7btS8zQVJ-b8GN8oPvSUkQrYzel0T-AqiNRN3ieknrvgtlD50KTiDNHAAqvB
PAYPAL_CLIENT_SECRET=EBb2PKe8Q3KJRyWteC09cfuguMdw8EwEsTsvIbq8H9RCa7hcNqNkMHQgpRWvAoLug3BKsJFTI_Hg6FW6
PAYPAL_MODE=sandbox
# PAYPAL_MODE=live

RAWG.IO_API_KEY=05f1e9f06d794845a77e4903680c7f82
```

Installation

```
composer install
```

Migration

```
php artisan migrate --seed
```

You gonna need a seeder file
location: storage/resources/seederfile.txt

Game seeder file format

```
name^description^price^image^publisher_id
```

For Publisher and Genre just put some name in it

## Current Features

-   Can try a test payment, using VNPAY E-Wallet
-   Like a game
-   Sending email
-   Admin Dashboard

For testing payment

```
Ngân hàng    NCB
Số thẻ    9704198526191432198
Tên chủ thẻ    NGUYEN VAN A
Ngày phát hành    07/15
Mật khẩu OTP    123456
```
