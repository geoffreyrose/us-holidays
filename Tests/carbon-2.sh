#!/bin/bash

cp composer.json original-composer.json
rm composer.lock

rm -rf vendor
composer remove nesbot/carbon
composer require nesbot/carbon:2.* --no-plugins

rm composer.json
mv original-composer.json composer.json

./vendor/bin/phpunit
