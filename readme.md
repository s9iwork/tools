<p align="center">
	<img src="https://tools.freeeestyle.com/img/main.svg" width="100%" height="100px">
</p>

#URL
https://tools.s9i.work

#このWebアプリについて
Web開発の中で用途がありそうなツールを自作して公開していきます。

## ツール一覧
- ダミーデータ作る君

## ダミーデータ作る君
テスト用のダミーデータを作成するツールです。
様々な種類のダミーデータを作成することが出来ます。


#使用技術
## フロントエンド
- Vue.js
- Materialize CSS FW
- Sass(Scss)

## バックエンド
- PHP 7.2
- Laravel
- MySQL 5.7

## ミドルウェア
- Nginx
- PHP-FPM

## 開発環境
docker(docker-compose)

## 本番環境
Webarena VPSクラウド（月額400円）

#環境構築
1. ソースコードクローン

    ```
    https://github.com/s9iwork/tools.git
    ```

1. composerインストール

    ```
    cd path/to/APP_ROOT
    composer install
    ```

3. envファイル、cacheフォルダ作成

    ```
    cp .env.sample .env

    // DB情報などを記載
    vi .env

    // 暗号化キー生成
    php artisan key:generate

    // cacheフォルダ作成
    mkdir -p /storage/framework/cache
    mkdir -p /storage/framework/sessions
    mkdir -p /storage/framework/views
    ```

4. マイグレーション、初期データ投入

    ```
    php artisan migrate --seed
    ```

5. npmインストール

    ```
    npm install
    npm run dev
    ```

