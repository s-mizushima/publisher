<?php
namespace Twitter\PostTweet;
interface PostTweetInterface{
    public function tweet($tw_config, $tokens, $message);
}
