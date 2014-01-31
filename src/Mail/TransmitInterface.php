<?php
namespace Mail;
    interface TransmitInterface {
        /**
         * $contentsをrenderし一括送信
         * @param $contents
         *  (array)
         *      - url           : 記事URL
         *      - title         : 記事タイトル
         *      - image_url     : 記事画像
         *      - descriptions  : 記事説明
         */
        public function transmit($emails, $contents, $subject);
    }
