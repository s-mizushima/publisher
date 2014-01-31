<?php
namespace Mail;
    class Send implements SendInterface {
        public function send($email, $body, $subject) {
            \Mail::send('emails.html', compact("body"), function($message) use ($email, $subject) {
                $message -> to($email) -> subject($subject);
            });
        }

    }
