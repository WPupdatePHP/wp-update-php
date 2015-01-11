<?php

namespace {
    function add_action( $hook, $callback ) {
        return true;
    }

    function is_admin() {
        return true;
    }
}

namespace spec {

    use PhpSpec\ObjectBehavior;
    use Prophecy\Argument;

    class WPUpdatePhpSpec extends ObjectBehavior {
        function let() {
            $this->beConstructedWith( '5.4.0' );
        }

        function it_can_run_on_minimum_version() {
            $this->does_it_meet_required_php_version( '5.4.0' )->shouldReturn( true );
        }

        function it_will_not_run_on_old_version() {
            $this->does_it_meet_required_php_version( '5.2.4' )->shouldReturn( false );
        }
    }
}