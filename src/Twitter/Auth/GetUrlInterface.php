<?php
namespace Twitter\Auth;
interface GetUrlInterface{
    public function get($tw_config,$callback_url);
}
