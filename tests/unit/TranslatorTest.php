<?php

use PHPUnit\Framework\TestCase;

class TranslatorTest extends TestCase
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