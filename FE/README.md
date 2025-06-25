## Cài đặt

```
composer install
```

## Tạo file ENV

```
cp .env.example .env
```

## Cấu hình app key

```
php artisan key:generate
```

## Xóa cache cũ

```
php artisan optimize:clear
composer clear-cache
php artisan cache:clear
php artisan config:cache
php artisan route:cache
```

## Khởi chạy server

```
php artisan serve
```
