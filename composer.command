-| apps    |command    |comment                                             |
-|---------|-----------|----------------------------------------------------|
-- composer init        -------intialize and create composer.json file
-- composer install     -------install composer.json package

                            |dist-name |author/package |diractory for install|
--composer create-project --prefer-dist laravel/laravel blog









problems
-------------------------------------------
(after copy laravel project folder)
-------------------------------------------
1.composer install
2.php artisan key:generate  
3.php artisan cache:clear
4.php artisan migrate
5.php artisan serv

UPDATE: If you're getting
    {
        Whoops, looks like something went wrong
    }

for debugging
{
    in app/config/app.php, set debugging as true with:
        {
            'debug' => env('APP_DEBUG', true)'
        }
}
If you're getting the error
No supported encrpyter found. The ciper and/or key length are invalid
for some people it worked to do cp .env.example .env before (2).
