<?php

//require \Codeception\Util\Stub;

class colorHandlerTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $UUT, $plantColorStub, $colorStub;

    protected $colorArray = array('red', 'yellow', 'blue', 'black', 'brown', 'purple', 'orange', 'white', 'green');
    protected $colorsForPlant = array('red', 'yellow');

    protected function _before()
    {
        $this->createStubs();
        $this->UUT = new ColorHandler;
    }

    protected function _after()
    {
        $this->UUT = null;
    }

    protected function createStubs()
    {
        $this->plantColorStub = \Codeception\Util\Stub::make('PlantColor', ['where' => $this->colorsForPlant]);
        $this->colorStub = \Codeception\Util\Stub::make('Colors', ['where' => $this->colorArray]);
    }

    public function test_get_function_returns_an_array()
    {
        $this->assertInternalType('array', $this->UUT->get('1'), 'check the function returns correct type');
    }

}