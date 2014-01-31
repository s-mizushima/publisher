<?php
namespace Mail;
    class Render implements RenderInterface {
        public function render($contents, $subject) {
            return \View::make("emails.summery.html") -> with("contents", $contents) -> with("subject", $subject) -> render();
        }

    }
