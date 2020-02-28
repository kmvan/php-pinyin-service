<?php

declare(strict_types = 1);

namespace InnStudio\PinyinService;

use InnStudio\PinyinService\Bootstrap\Bootstrap;

include __DIR__ . '/vendor/autoload.php';

\define('PINYIN_SERVICE_CACHE_FILE_PATH', __DIR__ . '/pinyin.cache');

new Bootstrap();
