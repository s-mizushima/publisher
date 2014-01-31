<?php
namespace Facebook\Instance;
class CreateInstance implements CreateInstanceInterface{
    public function get($fb_config){
        $facebook = new \Facebook($fb_config);
        return $facebook;
    }
}
