<?php
namespace Wordpress\XmlRpc;
class Sender implements SenderInterface {
    public function send($xmlrc_path, $host, $xmldata) {
        $sender = new \XML_RPC_client($xmlrc_path, $host, 80);
        return $sender -> send($xmldata);
    }
}
