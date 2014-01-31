<?php
namespace Wordpress;
    use Wordpress\XmlRpc\SenderInterface;
    class ContentUploader implements ContentUploaderInterface {

        public function __construct(SenderInterface $sender) {
            $this -> sender = $sender;
        }
        /**
         * @param $config: username,pass,host,xmlrpc_path
         */
        public function up($config, $title, $body) {
            $content = new \XML_RPC_Value( array(
                'title' => new \XML_RPC_Value($title, 'string'),
                'description' => new \XML_RPC_Value($body, 'string'),
                'dateCreated' => new \XML_RPC_Value(time(), 'dateTime.iso8601'),
            ), 'struct');
            $publish = new \XML_RPC_Value(0, "boolean");
            $xmldata = new \XML_RPC_Message('metaWeblog.newPost', array(
                new \XML_RPC_Value(1),
                new \XML_RPC_Value($config["username"]),
                new \XML_RPC_Value($config["pass"]),
                $content,
                $publish
            ));
            $result = $this -> sender -> send($config["xmlrpc_path"], $config["host"], $xmldata);
            $result = \XML_RPC_decode($result -> value());
            $url = "http://" . $config["host"] . $config["xmlrpc_path"];
            $url = str_replace("/xmlrpc.php", NULL, $url);
            return $url . "/wp-admin/post.php?post=" . $result . "&action=edit";
        }

    }
