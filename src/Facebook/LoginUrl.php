<?php
namespace Facebook;
    use Facebook\Instance\CreateInstanceInterface;

    class LoginUrl implements LoginUrlInterface {
        public function __construct(CreateInstanceInterface $fb_instance) {
            $this -> fb_instance = $fb_instance;
        }

        public function get($fb_config, $scope, $redirect_url) {
            $facebook = $this -> fb_instance -> get($fb_config);
            return $facebook -> getLoginUrl(array(
                "scope" => $scope,
                "redirect_uri" => $redirect_url
            ));
        }

    }
