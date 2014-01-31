<?php
namespace Request;
interface RequestInterface{
    public function send($url);
    public function post($url, $params);
}
