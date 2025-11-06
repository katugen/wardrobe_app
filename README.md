# 👕 Wardrobe App

Laravel + Vue.js + TypeScript を用いた服管理アプリです。  
Docker 環境で動作し、GitHub Flow に基づいたチーム開発を想定しています。

---

## 🧩 使用技術

- Laravel 11 (PHP 8.3)
- Vue.js 3
- TypeScript
- MySQL 8.0
- Docker / Docker Compose
- Nginx

---

## ⚙️ セットアップ手順

```bash
# リポジトリをクローン
git clone git@github.com:<あなたのGitHubユーザー名>/wardrobe_app.git
cd wardrobe_app

# Docker 起動
docker compose up -d --build

# Laravel セットアップ
docker exec -it laravel_app bash
composer install
cp .env.example .env
php artisan key:generate

# データベース接続確認
php artisan migrate
