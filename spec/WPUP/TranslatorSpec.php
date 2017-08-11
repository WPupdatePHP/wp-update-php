<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WPUP_TranslatorSpec extends ObjectBehavior
{
	function it_should_return_new_set_string()
	{
			$this->setString('minimum', 'test string');
			$this->getString('minimum')->shouldMatch('/test string/i');
	}


	function it_returns_false_if_no_string_is_set_for_requested_key()
	{
			$this->getString('test')->shouldReturn(false);
	}
}
