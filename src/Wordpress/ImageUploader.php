<?php
namespace Wordpress;

    use Wordpress\XmlRpc\SenderInterface;

    class ImageUploader implements ImageUploaderInterface {

        public function __construct(SenderInterface $sender) {
            $this -> sender = $sender;
        }

        /**
         * path(url)を指定して、画像をUP
         * @param $config: username,pass,xmlrpc_path,host
         */
        public function up($config, $path) {
            $file = @file_get_contents($path);
            $fname = str_random(10) . ".jpg";
            $fmime = "regular file\n";
            
            $content = new \XML_RPC_Value( array(
                'name' => new \XML_RPC_Value($fname, 'string'),
                'type' => new \XML_RPC_Value($fmime, 'string'),
                'bits' => new \XML_RPC_Value($file, 'base64'),
                'overwrite' => new \XML_RPC_Value(0, 'boolean'),
            ), 'struct');

            $xmldata = new \XML_RPC_Message('wp.uploadFile', array(
                new \XML_RPC_Value(1),
                new \XML_RPC_Value($config["username"]),
                new \XML_RPC_Value($config["pass"]),
                $content
            ));
            
            $result = $this -> sender -> send($config["xmlrpc_path"], $config["host"], $xmldata);
            return \XML_RPC_decode($result -> value());
        }

    }
