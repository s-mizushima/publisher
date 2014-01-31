<?php
namespace Twitter\Auth;
    use Twitter\Instance\CreateInstanceInterface;

    class GetUrl implements GetUrlInterface {
        public function __construct(CreateInstanceInterface $instance) {
            $this -> instance = $instance;
        }

        public function get($tw_config, $callback_url) {
            $twitter = $this -> instance -> get($tw_config);
            $token = $twitter -> getRequestToken($callback_url);
            \Session::put("oauth_token", $token['oauth_token']);
            \Session::put("oauth_token_secret", $token['oauth_token_secret']);
            return $twitter -> getAuthorizeURL($token['oauth_token']);
        }

    }
