<?php
namespace Twitter\PostTweet;
    use Twitter\Instance\CreateInstanceInterface;
    class PostTweet implements PostTweetInterface {
        public function __construct(CreateInstanceInterface $instance) {
            $this -> instance = $instance;
        }

        public function tweet($tw_config, $tokens, $message) {
            $twitter = $this -> instance -> get($tw_config);
            $twitter -> setTokens($tokens["oauth_token"], $tokens["oauth_token_secret"]);
            return $twitter -> post('statuses/update', array('status' => $message));
        }

    }
