# copy the environments file
cp .env.example .env

# hiya composer!
composer install --no-dev -n
composer update umpirsky/phpsummercamp-doctrine-wiki

# setup!
php console assets:install --symlink --relative
php console cache:clear --no-warmup
