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

    /**
     * @return mixed
     */
    public function createPlantWithColorForTest()
    {
        $plantID = $this->tester->haveRecord('plants', ['name' => 'test plant']);
        $colorArray = array("red" => "red", "yellow" => "yellow", "blue" => NULL, "green" => NULL, "brown" => NULL, "black" => NULL,
            "white" => NULL, "purple" => NULL, "orange" => NULL);

        $this->UUT->set($plantID, $colorArray);
        return $plantID;
    }

    protected function _before()
    {
        $this->UUT = new ColorHandler;
    }

    protected function _after()
    {
        $this->UUT = null;
    }

    public function test_get_function_returns_an_array()
    {
        $planID = $this->createPlantWithColorForTest();
        $this->assertInternalType('array', $this->UUT->get($planID), 'check the function returns correct type');
    }

    public function test_get_function_returns_correct_colors()
    {
        $planID = $this->createPlantWithColorForTest();

        $colorsForPlant = $this->UUT->get($planID);
        $this->assertEquals('rød', $colorsForPlant[0], 'check the function returns correct color values');
    }

    public function test_set_function_creates_correct_colors()
    {
        $plantID = $this->createPlantWithColorForTest();

        $colorsForPlant = $this->UUT->get($plantID);
        $this->assertEquals('gul', $colorsForPlant[1], 'check the function returns correct color values');
    }

    public function test_delete_function_deletes_correct_colors()
    {
        $plantID = $this->createPlantWithColorForTest();

        $this->UUT->delete($plantID);
        $colorsForPlant = $this->UUT->get($plantID);

        $this->assertEquals(array(), $colorsForPlant, 'check the delete function deletes the correct colors for the plant');
    }

    public function test_edit_function_edits_correct_colors()
    {
        $plantID = $this->createPlantWithColorForTest();
        $newColorsForPlant = array("red" => NULL, "yellow" => NULL, "blue" => "blue", "green" => NULL, "brown" => NULL, "black" => NULL,
            "white" => NULL, "purple" => NULL, "orange" => NULL);

        $this->UUT->edit($plantID, $newColorsForPlant);
        $colorsForPlant = $this->UUT->get($plantID);

        $this->assertEquals('blå', $colorsForPlant[0], 'check the function returns correct color values');
    }

    public function test_should_return_empty_array()
    {
        $nonexistentPlantID = 99999;

        $this->assertEquals(array(), $this->UUT->get($nonexistentPlantID));
    }

}