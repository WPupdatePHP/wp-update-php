<?php

namespace spec;

use PhpSpec\ObjectBehavior;

class WPUP_Minimum_NoticeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('5.4.0', 'Test Plugin');
    }

    function it_adds_plugin_name_to_admin_notice()
    {
        $this->getNoticeText()->shouldMatch('/Test Plugin/i');
    }
}