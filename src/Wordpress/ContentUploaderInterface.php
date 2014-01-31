<?php
namespace Wordpress;
    interface ContentUploaderInterface {
        public function up($config, $title, $body);
    }
