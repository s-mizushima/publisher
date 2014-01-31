<?php
namespace Facebook;
    use Facebook\Instance\CreateInstanceInterface;
    class PostWall implements PostWallInterface {
        public function __construct(CreateInstanceInterface $fb_instance) {
            $this -> fb_instance = $fb_instance;
        }

        public function post($fb_config, $message, $picture = NULL, $link = NULL, $name = NULL, $caption = NULL, $description = NULL, $action_name = NULL, $action_link = NULL) {
            $facebook = $this -> fb_instance -> get($fb_config);
            $result = $facebook -> api("/me/feed", "post", array(
                "message" => $message,
                "picture" => $picture,
                "link" => $link,
                "name" => $name,
                "caption" => $caption,
                "description" => $description,
                "action" => json_encode(array(
                    "name" => $action_name,
                    "link" => $action_link,
                ))
            ));
            return $result;
        }

    }
