## 環境構築

以下の手順に従って、ローカル環境でこのアプリケーションをセットアップしてください。

### 1.リポジトリのクローン

$ git clone git@github.com:noda-mari/20240227_noda_rese.git

### 2. Docker コンテナの起動とビルド

$ docker-compose up -d --build

### 3. Composer パッケージのインストール

$ docker-compose exec php bash &emsp;&emsp; PHP コンテナ内にログイン

$ composer install

### 4. 環境ファイルの設定

$ cp .env.example .env &emsp;&emsp; `.env.example` ファイルを `.env` という名前でコピー

$ exit

### 5. 環境ファイルの設定

VScode 等で、env ファイル内の環境設定の変数を変更する
env ファイルの 11 行目を以下のように変更してください。

DB_CONNECTION=mysql  
DB_HOST=mysql  
DB_PORT=3306  
DB_DATABASE=laravel_db  
DB_USERNAME=laravel_user  
DB_PASSWORD=laravel_pass

### 6. アプリケーションキーの生成

$ php artisan key:generate

### 7. 画像ファイルの移動

$ cd src/public

$ mv images /home/mari/coachtech/laravel/rese_new/src/storage/app/public

### 8 シンボリックリンクを貼る

$ php artisan storage:link

※ storage/に保存、書き換えを行う際 Permissionエラーが出る場合があります。  
その際は、下記のコードを使い権限を変更してください。

$ sudo chmod -R 777 *


### 9. データベースのマイグレーション

$ php artisan migrate

### 10. ダミーデータを入れる

$ php artisan db:seed
