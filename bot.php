<?php

require 'vendor/autoload.php'; // 載入 Composer 生成的自動加載文件

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

// 設定 Botman 的 LINE 驅動器
DriverManager::loadDriver(\BotMan\Drivers\Line\LineDriver::class);

// 設定 Botman 參數
$config = [
    'line' => [
        'channel_secret' => '75bdedf4e505ee4bab9ffc20c70d7042',
        'channel_access_token' => 'XYBtFHEck4F5lqgWGojFMljAsSKZWOlfQ5Pm2hlKfn38HNtg98RibIJB519XIcy3vZF+1M2odkBZjRqy4LRAGn1uuDQ8rzuPoKu2WrjgnOhcD5MDS6kF4cUj8578oJY0Cxv6ehBgXeOZFa1g0fZzoAdB04t89/1O/w1cDnyilFU=',
    ]
];

// 建立 Botman 應用
$botman = BotManFactory::create($config);

// 定義收到訊息時的回應
$botman->hears('hello', function (BotMan $bot) {
    $bot->reply('Hello!');
});

// 執行 Botman
$botman->listen();
