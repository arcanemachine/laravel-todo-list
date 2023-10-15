set dotenv-load

@_default:
  just --list -u # list all the commands in this justfile

# start a npm dev server
@dev-npm:
  npm run dev

# start a PHP dev server
@dev-php:
  php artisan serve

# start a mailpit server (temporary docker container)
@mailpit:
  docker run --name=mailpit --rm -p 8025:8025 -p 1025:1025 axllent/mailpit
