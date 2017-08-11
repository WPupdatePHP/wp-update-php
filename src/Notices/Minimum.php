<?php

class WPUP_Minimum_Notice extends WPUP_Notice
{
    /**
     * @return string
     */
    public function getNoticeText()
	{
	    $string = $this->translator->getString('minimum');
		$plugin_name = $this->plugin_name ? $this->plugin_name : 'this plugin';

        return sprintf($string, $plugin_name, $this->version, esc_url($this->url));
	}
}