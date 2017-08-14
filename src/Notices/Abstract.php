<?php

abstract class WPUP_Notice implements WPUP_Notice_Interface
{
	protected $version;
	protected $plugin_name;
	protected $url = 'http://wpupdatephp.com/update/';

	/** @var WPUP_Translator */
	protected $translator;

	public function __construct( $version, $plugin_name = NULL )
	{
		$this->version = $version;
		$this->plugin_name = $plugin_name;
	}

    /**
     * @param $translator WPUP_Translator
     */
    public function setTranslator($translator )
    {
        $this->translator = $translator;
    }

	public function display()
	{
		return '<div class="error">' . $this->getNoticeText() . '</div>';
	}
}