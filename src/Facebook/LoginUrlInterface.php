<?php
namespace Facebook;
    interface LoginUrlInterface {
        public function get($fb_config, $scope, $redirect_url);
    }
