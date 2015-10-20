<?php
use \AcceptanceTester;
use \Codeception\Util\Locator;

class DetailPlantPageCest
{
    protected $plantID;

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('add-new-plant');
        $I->fillField(['name' => 'name'], 'Test plant');
        $I->fillField('name_latin', 'Test plant latin');
        $I->fillField('description', 'Test description of a test plant');
        $I->fillField('history', 'Test history of a test plant');
        $I->checkOption('#eatable');
        $I->checkOption('#10-25');
        $I->checkOption('#red');
        $I->checkOption('#summer');
        $I->checkOption('#coast');
        $I->checkOption('#farmland');
        $I->attachFile('input[name=photo_0]', 'test.jpg');
        $I->attachFile('input[name=photo_1]', 'test.jpg');
        $I->attachFile('input[name=photo_2]', 'test.jpg');
        $I->attachFile('input[name=photo_3]', 'test.jpg');
        $I->click(['name' => 'addNewPlant']);
        $I->click('Forside');
        $I->canSeeCurrentUrlEquals('/');
        $I->see('Test plant');

        $I->seeRecord('plants', ['name' => 'Test plant']);
        $this->plantID = $I->grabRecord('plants', array('name' => 'Test plant'))->id;

        $I->click('Mere..', Locator::href('/plant-detail/' . $this->plantID));
        $I->canSeeCurrentUrlEquals('/plant-detail/' . $this->plantID);

        $I->click('edit plant');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function seeSeasonsOfPlant(AcceptanceTester $I)
    {
        $I->wantTo('verify that I can see what season a plant belongs to');
        $I->seeCheckboxIsChecked('#summer');
    }

    public function seeIfPlantIsEatable(AcceptanceTester $I)
    {
        $I->wantTo('verify that I can see if plants is eatable');
        $I->seeCheckboxIsChecked('#eatable');
    }

    public function seeHabitatsForPlant(AcceptanceTester $I)
    {
        $I->wantTo('verify that I can see habitats for plant');
        $I->seeCheckboxIsChecked('#coast');
        $I->seeCheckboxIsChecked('#farmland');
    }

    public function seeColorsForPlant(AcceptanceTester $I)
    {
        $I->wantTo('verify that I can see colors for plant');
        $I->seeCheckboxIsChecked('#red');
    }

    public function cantAttachMorePhotosForPlant(AcceptanceTester $I)
    {
        $I->wantTo('verify that I can not attach anymore photos to the plant');
        $I->dontSeeElement(['name' => 'photo_0']);
        $I->dontSeeElement(['name' => 'photo_1']);
        $I->dontSeeElement(['name' => 'photo_2']);
        $I->dontSeeElement(['name' => 'photo_3']);
    }
}
