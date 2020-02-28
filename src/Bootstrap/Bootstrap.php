<?php

declare(strict_types = 1);

namespace InnStudio\PinyinService\Bootstrap;

use Overtrue\Pinyin\Pinyin;

final class Bootstrap
{
    public function __construct()
    {
        $words = $this->getWords();

        if ( ! $words) {
            \http_response_code(400);

            $this->die();
        }

        $pinyin = new Pinyin('\\Overtrue\\Pinyin\\MemoryFileDictLoader');

        $pinyinWords = [];

        foreach ($words as $word) {
            $pinyinWords[$word] = $pinyin->convert($word, \PINYIN_ASCII_TONE);
        }

        $this->die($pinyinWords);
    }

    private function die(array $json = []): void
    {
        \header('Content-Type: application/json; charset=utf-8');
        \header('Accept: application/json');

        if ( ! $json) {
            die;
        }

        die(\json_encode($json, \JSON_UNESCAPED_UNICODE));
    }

    private function getWords(): array
    {
        $content = \file_get_contents('php://input');

        if ( ! $content) {
            return [];
        }

        return \json_decode($content, true) ?: [];
    }
}
