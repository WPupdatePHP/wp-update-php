<?php

class AbstractCheckTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function itReturnsFalseWhenKeyIsNotSet()
    {
        $arguments = array(
            'key' => array(
                array(
                    'version' => '5.6.0',
                    'required' => true,
                ),
            ),
        );
        $testedUnit = $this->getMock('WPUP_Checker', array());
        $testedUnit->arguments = $arguments;

        $check = new TestCheck($testedUnit);
        $this->assertFalse($check->checkArguments($arguments, 'notSetKey'));
    }

    /** @test */
    public function itReturnsFalseWhenKeyIsNotArray()
    {
        $arguments = array(
            'key' => 'dummy value'
        );
        $testedUnit = $this->getMock('WPUP_Checker', array());
        $testedUnit->arguments = $arguments;

        $check = new TestCheck($testedUnit);
        $this->assertFalse($check->checkArguments($arguments, 'notSetKey'));
    }

    /** @test */
    public function itReturnsTrueOnProperConfig()
    {
        $arguments = array(
            'php' => array(
                array(
                    'version' => '5.6.0',
                    'required' => true,
                ),
            ),
        );
        $testedUnit = $this->getMock('WPUP_Checker', array());
        $testedUnit->arguments = $arguments;

        $check = new TestCheck($testedUnit);
        $this->assertTrue($check->checkArguments($arguments, 'php'));
    }

    /** @test */
    public function itReportsFailWhenVersionFails()
    {
        $arguments = array(
            'test' => array(
                array(
                    'version' => '5.6.0',
                    'required' => true,
                ),
            ),
        );
        $testedUnit = $this->getMock('WPUP_Checker', array('reportFail'));
        $testedUnit->arguments = $arguments;

        $check = new TestCheck($testedUnit);
        $check->match_version = '5.2.2';
        $testedUnit->expects($this->once())->method('reportFail');
        $check->check();
    }

    /** @test */
    public function itReportsRecommendationWhenVersionRecommendationIsNotMet()
    {
      $arguments = array(
          'test' => array(
              array(
                  'version' => '7.0.0',
                  'required' => false,
              ),
          ),
      );
      $testedUnit = $this->getMock('WPUP_Checker', array('reportRecommendation'));
      $testedUnit->arguments = $arguments;

      $check = new TestCheck($testedUnit);
      $check->match_version = '5.2.2';
      $testedUnit->expects($this->once())->method('reportRecommendation');
      $check->check();
    }
}

class TestCheck extends WPUP_VersionCheck
{
    public $arguments_key = 'test';
    public function setup(){}
}
