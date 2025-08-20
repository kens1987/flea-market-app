##  フリマアプリ  
###  Docker  
  git clone(git@github.com:kens1987/flea-market-app.git)  
  docker-compose up -d --build  
###  Laravel環境構築  
  docker-compose exec php bash  
  composer install  
  envファイルは.env.exampleをコピーし以下を修正  
    DB_HOST=127.0.0.1 → mysql  
    DB_DATABASE=laravel → laravel_db  
    DB_USERNAME=root → laravel_user  
    DB_PASSWORD= → laravel_pass  
  php artisan key:generate  
  php artisan migrate  
  php artisan db:seed  
  php artisan storage:link  
  ※権限付与：$ sudo chmod -R 777 src/*  
  mailtrap  
    MAIL_MAILER=smtp  
    MAIL_HOST=sandbox.smtp.mailtrap.io  
    MAIL_USERNAME=c34360324ad134  
    MAIL_PASSWORD=9970de7d1cfc37  
    MAIL_ENCRYPTION=tls  
    MAIL_FROM_ADDRESS=example@example.com  
    MAIL_FROM_NAME="FleaMarketApp"  
###  使用技術  
  
###  ER図  
![スクリーンショット (579)](https://github.com/user-attachments/assets/08c9cdd2-af6a-49a8-b575-142d975530eb)

##  URL  
  フリマアプリ（新規登録画面）：  http://localhost/register  (password123)  
  フリマアプリ（商品一覧）：  http://localhost/  
  php MyAdmin： http://localhost:8080/  
  
