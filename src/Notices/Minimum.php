<?php

class WPUP_Minimum_Notice extends WPUP_Notice
{
	protected function getNoticeText()
	{
		$plugin_name = $this->plugin_name ? $this->plugin_name : 'this plugin';

		return 'Unfortunately, ' . $plugin_name . ' cannot run on PHP versions older than ' . $this->version . '. Read more information about <a href="' . esc_url( $this->url ) . '">how you can update</a>.';
	}
}
