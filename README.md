# 筋トレ質問アプリ
筋トレに関する質問ができるアプリケーション．  

# DEMO
[こちら]()で試すことができます．  

ログインする際には，  
email : demo@mail.com  
PW : asdfasdf

# Features
以下にwebアプリの画面を一部紹介する.

- 質問一覧
<img width="1273" alt="スクリーンショット 2023-01-11 11 02 21" src="https://user-images.githubusercontent.com/82089820/211700889-850ca014-30a2-442c-bfa3-263621f051df.png">

- 質問詳細(回答一覧)
<img width="1276" alt="スクリーンショット 2023-01-11 11 02 40" src="https://user-images.githubusercontent.com/82089820/211701011-5caf7dc8-fac0-4f3a-87e1-c68b14ab6c3c.png">

- 質問作成
<img width="1270" alt="スクリーンショット 2023-01-11 11 03 01" src="https://user-images.githubusercontent.com/82089820/211701062-b06311f6-e7b9-432e-bb8b-33ffb55b3f97.png">

- 回答作成
<img width="1277" alt="スクリーンショット 2023-01-11 11 03 16" src="https://user-images.githubusercontent.com/82089820/211701071-a2673860-c773-4d07-8fe9-eb7b0fdccbd5.png">

# Future Features
- [x] 認証機能
- [x] seederの作成
- [x] リレーション
- [x] 質問一覧機能
- [x] 質問作成機能
- [x] 質問詳細(回答一覧)機能
- [x] 質問回答機能
- [x] 質問削除機能
- [x] お気に入り機能
- [x] カテゴリー機能
- [x] 自分の質問一覧機能
- [x] 質問・回答日時
- [x] トレーニング開始時期

# Requirement
* php: ^8.0.2
* guzzlehttp/guzzle: ^7.2
* laravel/framework: ^9.19
* laravel/sanctum: ^3.0
* laravel/tinker: ^2.7

# Installation
インストールと初期設定
```bash
git clone https://github.com/koya-namba/workout-question.git
cd workout-question
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
```  

.envの中身を設定
```.env
DB_DATABASE={db_name}
DB_USERNAME={db_username}
DB_PASSWORD={db_password}
```

マイグレーションを実行して，サーバを起動
```bash
php artisan migrate:fresh --seed
php artisan serve --port=8080
```

# Note
作成中のアプリのためバグがあった場合には，下記まで連絡をお願いします

# Author
- 作成者：難波洸也
- 所属：九州大学システム情報科学府
- E-mail：namba.koya@arakawa-lab.com

# license
"筋トレ質問アプリ" is under MIT license.
