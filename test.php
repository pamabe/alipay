<?php

require_once __DIR__."/vendor/autoload.php";

use Alipay\AliPayConfig;

$aliPayConfig = new AliPayConfig();
print_r($aliPayConfig->initAopClient());