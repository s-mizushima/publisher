<?php
namespace Twitter\Instance;
class CreateInstance implements CreateInstanceInterface{
    public function get($tw_config){
        $twitter = new \TwitterOAuth\Api($tw_config["consumer_key"],$tw_config["consumer_secret"]);
        return $twitter;
    }
}
