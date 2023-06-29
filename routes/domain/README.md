domain毎にルーティングファイルを用意する
app/Providers/RouteServiceProvider.phpの`$routeFileList`にファイルパスを追記する
```php
    private $routeFileList = [
        'routes/domain/account.php',
    ];
```