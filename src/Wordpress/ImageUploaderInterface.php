<?php
namespace Wordpress;
    interface ImageUploaderInterface {
        /**
         * path(url)を指定して、画像をUP
         * @param $config: blog_id,username,pass
         */
        public function up($config, $path);
    }
