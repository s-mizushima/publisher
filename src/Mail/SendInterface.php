<?php
namespace Mail;
    interface SendInterface {
        public function send($email, $body, $subject);
    }
