php composer.phar install

cp .env.example .env
php artisan key:generate

mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views

php composer.phar dump-autoload

php artisan migrate --seed
APP_ENV=testing php artisan migrate

npm install
npm run dev
