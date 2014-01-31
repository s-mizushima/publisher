<?php
namespace Ameblo;
    use Ameblo\Builder\RawdataInterface;
    class Post implements PostInterface {

        protected $atomapi_url = "http://atomblog.ameba.jp/servlet/_atom/blog";

        public function __construct(RawdataInterface $rawdata) {
            $this -> rawdata = $rawdata;
        }

        /**
         * アメブロに投稿する
         * @param $id : ログインID , $pass : パスワード , $title : タイトル $text : 本文
         */
        public function post($id, $pass, $title, $text) {

            $user_id = $id;
            $password = $pass;

            $created = date('Y-m-d\TH:i:s\Z');
            $nonce = sha1(md5(time()));
            $pass_digest = base64_encode(pack('H*', sha1($nonce . $created . strtolower(md5($password)))));

            $wsse = 'UsernameToken Username="' . $user_id . '", ' . 'PasswordDigest="' . $pass_digest . '", ' . 'Nonce="' . base64_encode($nonce) . '", ' . 'Created="' . $created . '"';

            $hr = new \HTTP_Request2($this -> atomapi_url);
            $hr -> setHeader('X-WSSE', $wsse);
            $hr -> send();
            $res = $hr -> getBody();
            
            preg_match('/rel="service.post" type="application\/x\.atom\+xml" href="(.*?)"/', $res, $postURl);

            $rawdata = $this -> rawdata -> getRaw($title, $text);

            $hr = new \HTTP_Request2($postURl[1]);
            $hr -> setHeader('X-WSSE', $wsse);
            $hr -> addRawPostData($rawdata);
            $hr -> setHeader('Content-Type', 'application/x.atom+xml');
            $hr -> setMethod(HTTP_REQUEST_METHOD_POST);
            $hr -> send();
            $c = $hr -> getResponseCode();
            $hr -> clearPostData();

            \Log::info("response", compact($c));
        }

    }
