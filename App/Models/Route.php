<?php

class Route
{
    public $page = null;

    public $Request = null;

    public $Reference = null;

    public function __construct()
    {
        $this->Reference = Sanitize::String(Input::grab("reference"));
        $this->Request = Sanitize::String(Input::grab("request"));
    }

}