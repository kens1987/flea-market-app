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
###  使用技術  
  
###  ER図  
  ![スクリーンショット (570)](https://github.com/user-attachments/assets/0c8e3edb-8de9-432b-9c5e-1172e7e1fa4a)

##  URL  
  フリマアプリ：  
  php MyAdmin： http://localhost:8080/  
  
