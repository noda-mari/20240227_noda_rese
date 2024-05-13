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
![スクリーンショット 2024-04-06 235235](https://github.com/noda-mari/20240227_noda_rese/assets/147699251/c0d67c92-b1bb-45ff-a3b4-75ffbce4b27c)
![スクリーンショット 2024-04-06 235416](https://github.com/noda-mari/20240227_noda_rese/assets/147699251/8deb3e5f-8ae1-4f35-9e5b-ac27e6ae552c)
![スクリーンショット 2024-04-14 182124](https://github.com/noda-mari/20240227_noda_rese/assets/147699251/cf5e7e66-b3af-471a-9880-e2a7c7644a69)
![スクリーンショット 2024-04-14 182722](https://github.com/noda-mari/20240227_noda_rese/assets/147699251/fdea806e-290f-4ca2-a0e9-ec9e691b204d)
## ER図
![rese_er drawio](https://github.com/noda-mari/20240227_noda_rese/assets/147699251/91527c75-5744-4884-907b-4cd4ef82814e)

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

$cd ../



### 4. 環境ファイルの設定

$ docker-compose exec php bash &emsp;&emsp; PHP コンテナ内にログイン

$ cp .env.example .env &emsp;&emsp; `.env.example` ファイルを `.env` という名前でコピー

$ exit

$ code .



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

$ docker-compose exec php bash &emsp;&emsp; PHP コンテナ内にログイン

$ php artisan key:generate

.envファイルの3行目にキーが生成されます。

APP_KEY= <ここに生成されます>



### 7 シンボリックリンクを貼る

$ php artisan storage:link

※ storage/に保存、書き換えを行う際 Permissionエラーが出る場合があります。  
&emsp;&emsp;下記のコードを使い権限を変更してください。

$ sudo chmod -R 777 *  



### 8. データベースのマイグレーション

$ php artisan migrate

### 9. ダミーデータを入れる

$ php artisan db:seed




### 10. スケジューラーの実行

cronエントリを追加する

$ crontab -e

<&emsp;&emsp;* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1&emsp;&emsp;>  

cronが動かない場合は下記のコードを使い、１分ごとにスケジューラーを呼び出します。

$ docker-compose exec php bash

$ php artisan schedule:work




## メール認証,リマインドメール等に使用するアプリの設定方法

[Mailtrap](https://mailtrap.io/)
無料で利用するのに、クレジットカードの登録などは不要です。  
アカウント作成後、すぐに利用することができます。

アカウントは、Googleアカウントなどで連携するか、メールアドレスでアカウントを作成できます。

サインイン後、受信トレイの設定が開かれます。
![スクリーンショット 2024-02-13 025215](https://github.com/noda-mari/20240227_noda_rese/assets/147699251/06912e9e-bef7-4b19-93c4-23c9e9c8e4b4)

プルダウンから「Laravel 7.x and 8.x」を選択します。  
![スクリーンショット 2024-02-13 173558](https://github.com/noda-mari/20240227_noda_rese/assets/147699251/a2a9a6e6-e0e5-49b3-98e9-0a591c10e270)

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

ページ上部の’管理者’または’管理者向けAPIキー’をクリックします。  
![スクリーンショット 2024-04-10 191530](https://github.com/noda-mari/20240227_noda_rese/assets/147699251/9ebfcf62-0bbf-429c-9a8f-dd21550c66d1)

APIキーをクリックします。  
![スクリーンショット 2024-04-10 191642](https://github.com/noda-mari/20240227_noda_rese/assets/147699251/72b6ccc5-6f90-4337-a41c-84cdd2a32aec)


公開可能キーと、シークレットキーをそれぞれコピーし、env.ファイルに追加します。
![スクリーンショット 2024-04-10 191738](https://github.com/noda-mari/20240227_noda_rese/assets/147699251/81d9b5ce-aa11-4de2-a757-4a0d88d98fa8)


STRIPE_KEY= コピーしたキーを貼り付け  
STRIPE_SECRET= コピーしたキーを貼り付け  



また、デフォルトでは価格の単価がusdなので  
.envファイルにCASHIER_CURRENCYを設定してjpyを設定します。  



CASHIER_CURRENCY=jpy    &emsp;&emsp;&emsp;こちらを追加してください。  

こちらも、env.ファイルの内容が反映させるため  
下記コマンドでキャッシュをクリアします。  

$ php artisan config:clear




## 各種機能のテスト用アカウント情報

###  ユーザー権限  
name : 山田花子  
email : hanako@test.com  
password : hanako0000  
ユーザー未ログイン時の動きも見ていただけると嬉しいです。  

### テスト決済時のカード情報  
email : hanako@test.com  
カード番号 : 4242 4242 4242 4242  
有効期限 : 12/27  
セキュリティコード : 123  



### 管理者権限  
name : テスト管理者  
email : test@example.com  
password : test0000  
管理者でのログインページ : http://localhost/admin/login



### 店舗管理者権限  
name : テスト店舗管理者  
email : shop@example.com  
password : shop0000  
店舗管理者でのログインページ : http://localhost/manager/login
※予約とレビューのダミーデータは'テスト店舗管理者'に紐ずいている店舗のみです。  
店舗情報ページの予約情報、レビューの確認は、こちらのアカウントで確認いただけると早いと思います。  
こちらを使用して、ログインお願いいたします。  

## 採点者様へ

### ユーザーの口コミ機能

1.ログイン後、店舗一覧から店舗詳細へ進み、口コミ情報一覧ボタンの下の"口コミを投稿"から  
口コミ投稿画面へ  

2.口コミを投稿後、サンクスページへ遷移  

3.店舗詳細にて、自身の口コミ確認、編集画面へのリンク、削除機能を確認していただけます。  

##管理者の口コミ削除機能

1.管理者でログイン後、アプリのアイコンクリックでメニュー(店舗一覧)へ遷移  

2.店舗詳細へ進み、口コミ情報一覧から口コミの削除ができます。管理者でログイン時のみ表示。  

4.店舗管理者は、店舗管理画面からレビュー一覧を確認することのみできます。  

### csvファイルの記述方法

ファイルの一列目は、shopsテーブルのカラム名でお願いします。  

area_id,genre_id,name,description,shop_img  

店舗情報の地域、ジャンルはそれぞれのテーブルと紐づけているため、IDで管理しています。  

下記の表のidを使用ください。

![スクリーンショット 2024-05-12 122718](https://github.com/noda-mari/20240227_noda_rese/assets/147699251/e6a251c1-b3fb-42c1-9b3c-ace65ecd8132)

例:  

area_id,genre_id,name,description,shop_img  
1,2,テスト,テスト,http//image.jpeg  

### 実装できかなった箇所  

1.店舗一覧のソート機能を、検索をかけた店舗にソートをかける機能  

2.SVCファイルで登録した店舗画像を表示する

エラーで躓いてしまい、最後まで実装できませんでした。

申し訳ありません。
