<?php

class Message
{
    public $user;
    public $text;
    
    function getUser()
    {
        return $this->user;
    }

    function getText()
    {
        return $this->text;
    }

    function setUser($user)
    {
        $this->user = $user;
    }

    function setText($text)
    {
        $this->text = $text;
    }

    function send()
    {
        
    }
}