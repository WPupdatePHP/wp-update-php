<?php

class WPUP_WordPressVersion extends WPUP_VersionCheck
{
    /** @var string */
    public $match_version;

    /** @var string */
    public $arguments_key = 'wordpress';

    public function setup()
    {
        global $wp_version;
        $this->match_version = $wp_version;
    }
}
