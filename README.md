# アプリケーション名
**Rese**

## 作成した目的
上級模擬案件の課題として作成いたしました。

## アプリケーションURL
http://localhost
こちらにアクセスすると、アプリが表示されます。  
アプリのロゴをクリックすると、新規会員登録、ログイン等の項目が表示されますので  
新規会員登録をクリックしていただき、会員登録を行ってください。  
メール認証のテストサーバーとして、mailtrapというアプリを使用しております  
[Mailtrap](https://mailtrap.io/)こちらからアクセスしていただき、認証メールを受信してください。  
アプリのアカウント作成をしていただき、envファイルでのSMTPサーバー設定等につきましては、下記のメール認証の確認に使用するアプリの設定方法を参照ください。

## 機能一覧
会員登録  
ログイン機能  
メール認証機能  
ログアウト  
ユーザー情報取得  
ユーザー飲食店お気に入り一覧取得  
ユーザー飲食店予約情報取得  
飲食店一覧取得  
飲食店詳細取得  
飲食店お気に入り追加  
飲食店お気に入り削除  
飲食店予約情報追加  
飲食店予約情報削除  
エリアで検索機能  
ジャンルで検索機能  
店名で検索機能  

## 使用技術
laravel : 8.*  
nginx : 1.21.1  
PHP : 8.2  
mysql : 8.0.26  
Docker : 24.0.6  

## テーブル設計

## ER図

## 環境構築

以下の手順に従って、ローカル環境でこのアプリケーションをセットアップしてください。

### 1.リポジトリのクローン

$ git clone git@github.com:noda-mari/20240227_noda_rese.git

### 2. Docker コンテナの起動とビルド

$ docker-compose up -d --build

### 3. Composer パッケージのインストール

$ composer install

※私の環境では、アプリのディレクトリで実行すると  
composer.json"ファイルが見つかりません  
というエラーが発生してしまいました。
その場合、以下のコードでsrcディレクトリまで移動して再度、パッケージをインストールしてみてください。  

$cd src

$ composer install

### 4. 環境ファイルの設定

$ docker-compose exec php bash &emsp;&emsp; PHP コンテナ内にログイン

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

### 7 シンボリックリンクを貼る

$ php artisan storage:link

※ storage/に保存、書き換えを行う際 Permissionエラーが出る場合があります。  
その際は、下記のコードを使い権限を変更してください。

$ sudo chmod -R 777 *

### 8. データベースのマイグレーション

$ php artisan migrate

### 9. ダミーデータを入れる

$ php artisan db:seed


### 10. スケジューラーの実行

cronエントリを追加する

$ crontab -e

* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1  

cronが動かない場合は下記のコードを使い、１分ごとにスケジューラーを呼び出します。

$ docker-compose exec php bash

$ php artisan schedule:work


## メール認証の確認に使用するアプリの設定方法

[Mailtrap](https://mailtrap.io/)
無料で利用するのに、クレジットカードの登録などは不要です。  
アカウント作成後、すぐに利用することができます。

アカウントは、Googleアカウントなどで連携するか、メールアドレスでアカウントを作成できます。

サインイン後、受信トレイの設定が開かれます。

プルダウンから「Laravel 7.x and 8.x」を選択します。  
Laravelの.envファイルにそのまま追記できる形式で、サーバー・ユーザー・パスワードなどが記述されています。  
右上のCopyボタンをクリックし、Laravelプロジェクトの.envファイルに貼り付けて、サーバー設定を変更してください。

.env 31行目から36行目

MAIL_MAILER=smtp    &emsp;&emsp;&emsp;こちらはデフォルトです。  
MAIL_HOST=mailhog  
MAIL_PORT=1025  
MAIL_USERNAME=null  
MAIL_PASSWORD=null  
MAIL_ENCRYPTION=null  

.env 36行目も以下に設定お願いします。

MAIL_FROM_ADDRESS=test@gmail.com

上記の設定をしない場合、「Cannot send message without a sender address」というエラーがLaravel上で発生します。  

以上で、新規会員登録時[Mailtrap](https://mailtrap.io/)のMy Inboxに認証メールが届きますので、届いたメールを開き
Verify Email Addressをクリックして認証完了です。

※&emsp;env.ファイルの内容が反映されず、SMTPサーバーへの認証に失敗エラーが出る場合  
下記コマンドでキャッシュをクリアします。  

$ php artisan config:clear

## アプリで使用する決済アプリの設定方法

[Stripe](https://dashboard.stripe.com)
無料で利用するのに、クレジットカードの登録などは不要です。  
アカウント作成後、すぐに利用することができます。

.envにアクセスキーを設定します。  

ページ上部の’管理者’をクリックします。  

APIキーをクリックします。  

公開可能キーと、シークレットキーをそれぞれコピーし、env.ファイルに追加します。


STRIPE_KEY= コピーしたキーを貼り付け  
STRIPE_SECRET= コピーしたキーを貼り付け  

また、デフォルトでは価格の単価がusdなので  
.envファイルにCASHIER_CURRENCYを設定してjpyを設定します。  

CASHIER_CURRENCY=jpy    &emsp;&emsp;&emsp;こちらを追加してください。  

こちらも、env.ファイルの内容が反映させるため  
下記コマンドでキャッシュをクリアします。  

$ php artisan config:clear


## 各種機能のテスト用アカウント情報

ユーザー権限  
name : 山田花子  
email : hanako@test.com  
password : hanako0000  

テスト決済時のカード情報  
email : hanako@test.com  
カード番号 : 4242 4242 4242 4242  
有効期限 : 12/27  
セキュリティコード : 123  

管理者権限  
name : テスト管理者  
email : test@example.com  
password : test0000  
管理者でのログインページ : http://localhost/admin/login

店舗管理者権限  
name : テスト店舗管理者  
email : shop@example.com  
password : shop0000  
店舗管理者でのログインページ : http://localhost/manager/login
※予約とレビューのダミーデータは'テスト店舗管理者'に紐ずいている店舗のみです。  
店舗情報ページの予約情報、レビューの確認は、こちらのアカウントで確認いただけると早いと思います。  

こちらを使用して、ログインお願いいたします。  
ユーザー未ログイン時の動きも見ていただけると嬉しいです。