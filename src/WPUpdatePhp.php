<?php

/**
 * WPUpdatePHP
 *
 * @package   WPUpdatePhp
 * @author    Coen Jacobs
 * @license   GPLv3
 * @link      https://github.com/WPupdatePHP/wp-update-php
 */

class WPUpdatePhp {
	/** @var string */
	private $minimum_version;

	/** @var string */
	private $recommended_version;

	/** @var string */
	private $plugin_name = '';

	/**
	 * @param $minimum_version string
	 * @param $recommended_version string
	 */
	public function __construct( $minimum_version, $recommended_version = null ) {
		$this->minimum_version = $minimum_version;
		$this->recommended_version = $recommended_version;
	}

	/**
	 * @param $name string Name of the plugin to be used in admin notices
	 */
	public function set_plugin_name( $name ) {
		$this->plugin_name = $name;
	}

	/**
	 * @param $version
	 *
	 * @return bool
	 */
	public function does_it_meet_required_php_version( $version = PHP_VERSION ) {
		if ( $this->version_passes_requirement( $this->minimum_version, $version ) ) {
			return true;
		}

		$this->load_version_notice( array( $this, 'minimum_admin_notice' ) );
		return false;
	}

	/**
	 * @param $version
	 *
	 * @return bool
	 */
	public function does_it_meet_recommended_php_version( $version = PHP_VERSION ) {
		if ( $this->version_passes_requirement( $this->recommended_version, $version ) ) {
			return true;
		}

		$this->load_version_notice( array( $this, 'recommended_admin_notice' ) );
		return false;
	}

	/**
	 * @param $requirement
	 * @param $version
	 *
	 * @return bool
	 */
	private function version_passes_requirement( $requirement, $version ) {
		return version_compare( $requirement, $version, '<=' );
	}

	/**
	 * @param $callback
	 *
	 * @return void
	 */
	private function load_version_notice( $callback ) {
		if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
			add_action( 'admin_notices', $callback );
			add_action( 'network_admin_notices', $callback );
		}
	}

	/**
	 * Returns the string to be shown in the admin notice based on the level ('recommended' or default 'minimum')
	 * of the notice. This will also add the plugin name to the notice string, if set.
	 *
	 * @param $level String ('recommended' or 'minimum' as default)
	 *
	 * @return string
	 */
	public function get_admin_notice( $level = 'minimum' ) {
		if ( 'recommended' == $level ) {
			if ( ! empty( $this->plugin_name ) ) {
				return '<p>'. $this->plugin_name .' recommends a PHP versions higher than '. $this->recommended_version .'. Read more information about <a href="http://www.wpupdatephp.com/update/">how you can update</a>.</p>';
			} else {
				return '<p>This plugin recommends a PHP versions higher than '. $this->recommended_version .'. Read more information about <a href="http://www.wpupdatephp.com/update/">how you can update</a>.</p>';
			}
		}

		if ( ! empty( $this->plugin_name ) ) {
			return '<p>Unfortunately, '. $this->plugin_name .' can not run on PHP versions older than '. $this->minimum_version .'. Read more information about <a href="http://www.wpupdatephp.com/update/">how you can update</a>.</p>';
		} else {
			return '<p>Unfortunately, this plugin can not run on PHP versions older than '. $this->minimum_version .'. Read more information about <a href="http://www.wpupdatephp.com/update/">how you can update</a>.</p>';
		}
	}

	/**
	 * Method hooked into admin_notices when minimum PHP version is not available to show this in a notice
	 * @hook admin_notices
	 */
	public function minimum_admin_notice() {
		echo '<div class="error">';
		echo $this->get_admin_notice( 'minimum' );
		echo '</div>';
	}

	/**
	 * Method hooked into admin_notices when recommended PHP version is not available to show this in a notice
	 * @hook admin_notices
	 */
	public function recommended_admin_notice() {
		echo '<div class="error">';
		echo $this->get_admin_notice( 'recommended' );
		echo '</div>';
	}
}