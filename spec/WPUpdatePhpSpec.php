<?php

namespace spec {

    use PhpSpec\ObjectBehavior;

    class WPUpdatePhpSpec extends ObjectBehavior {
        function let() {
            $this->beConstructedWith( '5.4.0', '5.3.0' );
        }

        function it_can_run_on_minimum_version() {
            $this->does_it_meet_required_php_version( '5.4.0' )->shouldReturn( true );
        }

        function it_passes_the_recommended_version() {
            $this->does_it_meet_recommended_php_version( '5.3.0' )->shouldReturn( true );
        }

        function it_will_not_run_on_old_version() {
            $this->does_it_meet_required_php_version( '5.2.4' )->shouldReturn( false );
        }

        function it_fails_the_recommended_version() {
            $this->does_it_meet_recommended_php_version( '5.2.9' )->shouldReturn( false );
        }
    }
}