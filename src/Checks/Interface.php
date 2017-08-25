<?php

interface WPUP_Check
{
    public function __construct(WPUP_Checker $checker);
    public function setup();
    public function check();
}
