curl -s "https://laravel.build/laravel10-clean-architecture" | bash


```
./vendor/bin/sail artisan sail:publish
```

docker/8.2/php.ini add 
```
[xdebug]
xdebug.start_with_request=yes

.vscode参照
```

```
./vebdir/bin/sail build --no-cache
./vebdir/bin/sail up -d

mysql
```
./vendor/bin/sail mysql
```

larastan
```
 ./vendor/bin/phpstan analyze --level=4 ./domain/ --memory-limit=1G
```


[url]
register
http://localhost:8080/account/register?email=address@example.com&password=password?name

show
http://localhost:8080/account/show?email=address@example.com



[vite]
install
./vender/bin/sail npm install

dev
./vender/bin/sail npm run dev

build
./vender/bin/sail npm build
