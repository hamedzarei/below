## instruction
#### simple login, signup, panel
signup with codes

admin can see users
#### steps:
1. composer install

2. php artisan key:generate

3. php artisan migrate

4. php artisan import:code path_to_file

    * example:  php artisan import:code sample_codes.xlsx

5. php artisan db:seed

6. php artisan serve

7. register link: /register/{code}

    * example : /register/1936283909


