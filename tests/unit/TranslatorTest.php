<?php

class TranslatorTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function itReturnsNewStringAfterSetting()
    {
        $translator = new WPUP_Translator();
        $translator->setString('minimum', 'test string');
        $this->assertEquals('test string', $translator->getString('minimum'));
    }

    /** @test */
    public function itReturnsFalseIfNoStringIsSetForKey()
    {
        $translator = new WPUP_Translator();
        $this->assertFalse($translator->getString('test'));
    }
}