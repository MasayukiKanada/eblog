# Eblog

## ダウンロード
Docker環境にて構築するため、下記のコマンドでファイルをダウンロードしてください。

### 任意ディレクトリ配下
- git clone https://github.com/MasayukiKanada/eblog.git
- cd eblog
- git clone https://github.com/MasayukiKanada/eblog.git src

### dockerファイル実行
- cd ../
- docker-compose build
- docker-compose up -d
- docker exec -it eblog_php bash


## Laravelインストール
- composer install
- npm install
- npm run dev

## インストール後の実施事項
### DB設定
- php artisan migrate:fresh --seed
### キーの生成
- php artisan key:generate
### 画像リンク
- php artisan storage:link

## アプリURL
#### トップ：http://localhost:18888/
#### 会員ログイン:http://localhost:18888/login
#### 管理者ログイン:http://localhost:18888/admin/login
※各ログイン画面にテスト用ログイン情報を記載しています。

## アプリの機能概要
#### 一般ユーザーは投稿閲覧ができる
#### 会員ユーザーは会員限定投稿閲覧ができる
#### 管理者は新規投稿・投稿編集・投稿更新・投稿削除ができる