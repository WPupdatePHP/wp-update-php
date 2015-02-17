<?php

class WPUpdatePhp {
	/** @var String */
	private $minimum_version;

	/** @var String */
	private $recommended_version;

	/**
	 * @param      $minimum_version
	 * @param null $recommended_version
	 */
	public function __construct( $minimum_version, $recommended_version = null ) {
		$this->minimum_version = $minimum_version;
		$this->recommended_version = $recommended_version;
	}

	/**
	 * @param $version
	 *
	 * @return bool
	 */
	public function does_it_meet_required_php_version( $version ) {
		if ( $this->version_passes_requirement( $this->minimum_version, $version ) ) {
			return true;
		}

		$this->load_minimum_required_version_notice();
		return false;
	}

	/**
	 * @param $version
	 *
	 * @return bool
	 */
	public function does_it_meet_recommended_php_version( $version ) {
		if ( $this->version_passes_requirement( $this->recommended_version, $version ) ) {
			return true;
		}

		$this->load_recommended_required_version_notice();
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
	 * @return void
	 */
	private function load_minimum_required_version_notice() {
		if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
			add_action( 'admin_notices', array( $this, 'minimum_admin_notice' ) );
		}
	}

	public function minimum_admin_notice() {
		echo '<div class="error">';
		echo '<p>Unfortunately, this plugin can not run on PHP versions older than '. $this->minimum_version .'. Read more information about <a href="http://www.wpupdatephp.com/update/">how you can update</a>.</p>';
		echo '</div>';
	}

	/**
	 * @return void
	 */
	private function load_recommended_required_version_notice() {
		if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
			add_action( 'admin_notices', array( $this, 'recommended_admin_notice' ) );
		}
	}

	public function recommended_admin_notice() {
		echo '<div class="error">';
		echo '<p>This plugin recommends a PHP versions older than '. $this->recommended_version .'. Read more information about <a href="http://www.wpupdatephp.com/update/">how you can update</a>.</p>';
		echo '</div>';
	}
}