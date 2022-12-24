# 筋トレ質問アプリ
筋トレに関する質問ができるアプリケーション．  

# DEMO
[こちら]()で試すことができます．  

ログインする際には，  
email : demo@mail.com  
PW : asdfasdf

# Features
以下にwebアプリの画面を一部紹介する．

# Future Features
- [x] 認証機能
- [x] seederの作成
- [x] リレーション
- [x] 質問一覧機能
- [x] 質問作成機能
- [x] 質問詳細(回答一覧)機能
- [x] 質問削除機能
- [x] お気に入り機能
- [x] カテゴリー機能
- [x] 自分の質問一覧機能

# Requirement
* "php": "^8.0.2"
* "guzzlehttp/guzzle": "^7.2"
* "laravel/framework": "^9.19"
* "laravel/sanctum": "^3.0"
* "laravel/tinker": "^2.7"

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
