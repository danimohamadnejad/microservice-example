You will need xampp:
1. cd C:/xampp/htdocs
2. git init
3. git remote add main https://github.com/danimohamadnejad/microservice-example.git
4. git pull main
5. git checkout master
7. composer install
8. create .env and config database information
9. php artisan key:generate
10. create two more databases in addition to one you have in .env and name them: soa_user, soa_post
11. php artisan migate --seed (OR php artisan migrate:refresh --seed)
12. php artisan serve
13. We have two api.php files in packages/post and packages/user. To check how request them, inspect 
 corresponding documentations above controller methods. When using postman to send sanctum authorization
  token when required, select Bearer Token type and paste your token after you got it from login endpoint.
 
Now you have a user in soa_user.users table and you can start application.

Some explanations:
 I tried to simulate service oriented architecture (soa) using packges. This still requires 
 post (or message) service to send http request to user service for which I have used laravel Http
 facade and this works on xampp when we we are performing simulation on same server (in this case localhsot).
 Please install xampp and to start you can check home at http://localhost/public url.
 To send a login request then: http://localhost/public/soa-user/auth/login .
 php artisan route:list can be used to check available urls.



 
