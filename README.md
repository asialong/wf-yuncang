# 望峰云仓sdk

## Install

```
composer require asialong/wf-yuncang
```

# Usage

```php
<?php
use Asialong\WfYuncang\Dispatch;

$dispatch = new Dispatch([
    'partnerID' => '123',
    'partnerKey' => '123',
    'debug' => true,
    'log' => [
        'name' => 'wf_yuncang',
        'file' => __DIR__ . '/wf_yuncang.log',
        'level' => 'debug',
        'permission' => 0777,
    ],
]);



```