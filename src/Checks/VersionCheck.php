<?php

abstract class WPUP_VersionCheck implements WPUP_Check
{
    /** @var WPUP_Checker */
    public $checker;

    /** @var array */
    public $arguments;

    /** @var string */
    public $arguments_key;

    public function __construct(WPUP_Checker $checker)
    {
        $this->arguments = $checker->arguments;
        $this->checker = $checker;
    }

    public function checkArguments($arguments, $key)
    {
        if (!isset($arguments[$key])) {
            return false;
        }

        if (!is_array($arguments[$key])) {
            return false;
        }

        return true;
    }

    public function check()
    {
        if ( ! $this->checkArguments($this->arguments, $this->arguments_key )) {
            return;
        }

        $this->checkVersions($this->arguments[$this->arguments_key]);
    }

    public function checkVersions($arguments)
    {
        foreach ($arguments as $argument) {
            if (!is_array($argument)) {
                continue;
            }

            if (version_compare($this->match_version, $argument['version']) === -1) {
                if ($argument['required'] === true) {
                    $this->checker->reportFail($argument);
                } else {
                    $this->checker->reportRecommendation($argument);
                }
            }
        }
    }
}
