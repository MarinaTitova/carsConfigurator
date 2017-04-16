<?php

/**
 * Created by PhpStorm.
 * Date: 14.04.17
 * Time: 13:16
 */
class Message
{
    var $email;
    var $name;
    var $body;

    var $message;

    function Message($n, $from, $b)
    {
        $this->email = $from;
        $this->name = $n;
        $this->body = $b;

        $this->message = null;
    }

    function is_valid()
    {
        if (strpos($this->email, '@') === false) return false;

        if (!strlen($this->name)) return false;
        if (!strlen($this->body)) return false;
        return true;
    }

    function as_string()
    {
        if ($this->message == null) $this->format_message();
        return $this->message;
    }

    function format_message()
    {
        $this->message = 'from: ' . $this->name;
        $this->message .= ' (' . $this->email . ")\n\n";
        $this->message .= $this->body;
    }
}

class RemoteConnect
{
    public function connectToServer($serverName = null)
    {
        if ($serverName == null) {
            throw new Exception(“Thats not a server name!”);
    }
        $fp = fsockopen($serverName, 80);
        return ($fp) ? true : false;
    }

    public function returnSampleObject()
    {
        return $this;
    }
}


?>