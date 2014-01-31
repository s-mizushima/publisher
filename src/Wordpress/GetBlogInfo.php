<?php
namespace Wordpress;

    use Wordpress\XmlRpc\SenderInterface;

    class AuthFailException extends \exception {
    }

    class GetBlogInfo implements GetBlogInfoInterface {
        public function __construct(SenderInterface $sender) {
            $this -> sender = $sender;
        }
        
        /**
         *  @param $config: username,pass,xmlrpc_path,host
         */
        public function getBlogId($config) {
            $appkey = new \XML_RPC_Value("", 'string');
            $username = new \XML_RPC_Value($config["username"], 'string');
            $passwd = new \XML_RPC_Value($config["pass"], 'string');
            $xmldata = new \XML_RPC_Message('blogger.getUsersBlogs', array(
                $appkey,
                $username,
                $passwd
            ));

            $result = $this -> sender -> send($config["xmlrpc_path"], $config["host"], $xmldata);
            $value = $result -> value();
            if ($value == NULL) {
                throw new AuthFailException("ログインに失敗しました");
            }
            $blogs = \XML_RPC_decode($result -> value());
            return $blogs[0]["blogid"];
        }

    }
