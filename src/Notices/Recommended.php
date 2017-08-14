<?php

class WPUP_Recommended_Notice extends WPUP_Notice
{
    /**
     * @return string
     */
    public function getNoticeText()
	{
        $string = $this->translator->getString('minimum');

		return sprintf($string, $this->plugin_name, $this->version, esc_url($this->url));
	}
}