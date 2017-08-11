<?php

class WPUP_Translator
{
    /** @var array */
    private $strings = array(
        'minimum' => 'Unfortunately, %s cannot run on PHP versions older than %s. Read more information about <a href="%s">how you can update</a>.',
        'recommended' => '%s recommends a PHP version higher than %s. Read more information about <a href="%s">how you can update</a>.',
    );

    /**
     * @param $key string
     * @return bool|string
     */
    public function getString($key )
    {
        if ( isset($this->strings[$key] ) ) {
            return $this->strings[$key];
        }

        return false;
    }

    /**
     * @param $key string
     * @param $string string
     */
    public function setString($key, $string )
    {
        $this->strings[$key] = $string;
    }
}