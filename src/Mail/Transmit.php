<?php
namespace Mail;
    class Transmit implements TransmitInterface {
        public function __construct(RenderInterface $render, SendInterface $send) {
            $this -> render = $render;
            $this -> send = $send;
        }

        /**
         * $contentsをrenderし一括送信
         * @param $contents
         *  (array)
         *      - url           : 記事URL
         *      - title         : 記事タイトル
         *      - image_url     : 記事画像
         *      - descriptions  : 記事説明
         */
        public function transmit($emails, $contents, $subject) {
            $body = $this -> render -> render($contents, $subject);
            foreach ($emails as $email) {
                $this -> send -> send($email, $body, $subject);
            }
        }

    }
