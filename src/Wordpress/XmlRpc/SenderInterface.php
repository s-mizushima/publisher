<?php
namespace Wordpress\XmlRpc;
interface SenderInterface {
    public function send($xmlrc_path, $host, $xmldata);
}