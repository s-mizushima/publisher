<?php
namespace Facebook;
interface PostWallInterface{
     public function post($fb_config,$message, $picture = NULL, $link = NULL, $name = NULL, $caption = NULL, $description = NULL, $action_name = NULL, $action_link = NULL);
}
