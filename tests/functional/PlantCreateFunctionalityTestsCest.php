<?php
use \FunctionalTester;

class PlantCreateFunctionalityTestsCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/add-new-plant');
        $this->createSimplePlant($I);
    }

    public function _after(FunctionalTester $I)
    {
    }

    protected function createSimplePlant($I)
    {
        $I->fillField('#name', 'Test plant');
        $I->fillField('#name_latin', 'Test plant latin');
        $I->fillField('#description', 'Test description of a test plant');
        $I->fillField('#history', 'Test history of a test plant');
        $I->attachFile('input[name=photo_0]', 'test.jpg');
        $I->attachFile('input[name=photo_1]', 'test.jpg');
        $I->attachFile('input[name=photo_2]', 'test.jpg');
        $I->attachFile('input[name=photo_3]', 'test.jpg');
    }

    protected function getPlantID($I)
    {
        return $I->grabRecord('plants', array('name' => 'Test plant'))->id;
    }

    public function createSimplePlantTest(FunctionalTester $I)
    {
        $I->click('html/body/div[5]/form/div[3]/input');

        $I->seeRecord('plants', [
            'name' => 'Test plant',
            'name_latin' => 'Test plant latin',
            'description' => 'Test description of a test plant',
            'history' => 'Test history of a test plant']);
    }

    public function createPlantWithSeasonTest(FunctionalTester $I)
    {

    }
}
