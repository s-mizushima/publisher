<?php
namespace Mail;
interface RenderInterface{
    public function render($contents,$subject);
}
