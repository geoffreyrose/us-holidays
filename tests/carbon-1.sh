#!/bin/bash

cp composer.json original-composer.json

composer remove nesbot/carbon
composer require nesbot/carbon:1.*

rm composer.json
mv original-composer.json composer.json

./vendor/bin/phpunit
