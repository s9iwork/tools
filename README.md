<p align="center">
	<img src="https://tools.shinjiezumi.work/img/main.svg" width="100%" height="100px" alt="image">
</p>

# URL

https://tools.shinjiezumi.work

# このWebアプリについて

Web開発の中で用途がありそうなツールを自作して公開していきます。

## ツール一覧

- ダミーデータジェネレーター

## ダミーデータジェネレーター

名前や住所などのダミーデータを生成するツールです

# 使用技術

## フロントエンド

- Vue.js
- Materialize CSS FW
- Sass(Scss)

## バックエンド

- PHP 7.3
- Laravel 6
- MySQL 5.7

## ミドルウェア

- Nginx
- PHP-FPM

## CI/CD

- GitHub Actions
- Deployer

## 開発環境

docker(docker-compose)

## 本番環境

Webarena VPSクラウド

# 環境構築

1. クローン

    ```
    git clone https://github.com/shinjiezumi/tools.git
    ```

2. イメージビルド、コンテナ起動

    ```
    docker-compose up -d
    ```

3. 初期化

    ```
    docker-compose exec app bash
    bash script/init.sh
    ```
