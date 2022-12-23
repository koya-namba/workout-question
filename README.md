# 筋トレ質問アプリ

筋トレに関する質問ができるアプリケーション．  

# DEMO
[こちら]()で試すことができます．  

ログインする際には，  
email : demo@mail.com  
PW : asdfasdf

# Features

以下にwebアプリの画面を一部紹介する．

投稿一覧画面.  


投稿作成画面.  


カテゴリーごとの投稿一覧画面.  


# Future Features
- [ ] ユーザごとの投稿ページ
- [ ] いいね機能
- [ ] Twitter連携

# Requirement
* "php": "^7.2.5|^8.0"
* "fideloper/proxy": "^4.4"
* "laravel/framework": "^6.20.26"
* "laravel/tinker": "^2.5"
* "league/flysystem-aws-s3-v3": "~1.0"

# Installation
インストールと初期設定
```bash
git clone
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
