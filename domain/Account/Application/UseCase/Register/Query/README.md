Queryを置く
- Queryの意味はSQLのQueryと同じ意味合いで考える
- ひとつのQueryは複数パターンの不変条件は持てない
  - 常にdelete_flag=0のもの
  - 常にdelete_flag=0, certificated=1 など
- カウント処理はQueryクラスに並列で持たせるメソッドとしても良い

```php
<?php
declare(strict_types=1);

namespace Account\Application\UseCase\Register\Query;

interface Acount{
    public function getByAccount(string $string);
    public function CountByAccount(string $string);
}
```