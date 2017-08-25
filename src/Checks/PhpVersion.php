<?php

class WPUP_PhpVersion extends WPUP_VersionCheck
{
    /** @var string */
    public $arguments_key = 'php';

    public function setup()
    {
        $this->match_version = PHP_VERSION;
    }
}
