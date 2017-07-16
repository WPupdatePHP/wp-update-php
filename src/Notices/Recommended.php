<?php

class WPUP_Recommended_Notice extends WPUP_Notice
{
	public function getNoticeText()
	{
		$plugin_name = $this->plugin_name ? $this->plugin_name : 'This plugin';

		return $plugin_name . ' recommends a PHP version higher than ' . $this->version . '. Read more information about <a href="' . esc_url( $this->url ) . '">how you can update</a>.';
	}
}
