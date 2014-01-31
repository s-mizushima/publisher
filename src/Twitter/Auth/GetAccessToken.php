<?php
namespace Twitter\Auth;
    use Twitter\Instance\CreateInstanceInterface;
    class GetAccessToken implements GetAccessTokenInterface {
        public function __construct(CreateInstanceInterface $instance) {
            $this -> instance = $instance;
        }

        public function get($tw_config) {
            $twitter = $this -> instance -> get($tw_config);
            $twitter -> setTokens(\Session::get("oauth_token"), \Session::get("oauth_token_secret"));
            return $twitter -> getAccessToken($_GET['oauth_verifier']);
        }

    }
