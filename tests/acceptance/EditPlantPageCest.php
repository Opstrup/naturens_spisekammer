<?php
use \AcceptanceTester;
use \Codeception\Util\Locator;

class EditPlantPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function editNewlyCreatedPlant(AcceptanceTester $I)
    {
        $I->wantTo('verify I can edit a new created plant');

        $I->amOnPage('/add-new-plant');
        $I->fillField(['name' => 'name'], 'Test plant');
        $I->fillField('name_latin', 'Test plant latin');
        $I->fillField('description', 'Test description of a test plant');
        $I->fillField('history', 'Test history of a test plant');
        $I->checkOption('#eatable');
        $I->attachFile('input[name=photo_0]', 'test.jpg');
        $I->attachFile('input[name=photo_1]', 'test.jpg');
        $I->attachFile('input[name=photo_2]', 'test.jpg');
        $I->attachFile('input[name=photo_3]', 'test.jpg');
        $I->click(['name' => 'addNewPlant']);
        $I->click('Forside');
        $I->canSeeCurrentUrlEquals('/');
        $I->see('Test plant');

        $I->seeRecord('plants', ['name' => 'Test plant']);
        $plantID = $I->grabRecord('plants', array('name' => 'Test plant'));

        $I->click('Mere..', Locator::href('/plant-detail/' . $plantID->id));
        $I->canSeeCurrentUrlEquals('/plant-detail/' . $plantID->id);

        $I->click('edit plant');
        $I->see('Rediger Test plant');
        $I->canSeeCheckboxIsChecked('#eatable');
        $I->uncheckOption('#eatable');
        $I->click('save');

        $I->canSeeCurrentUrlEquals('/plant-detail/' . $plantID->id);
        $I->click('edit plant');
        $I->see('Rediger Test plant');
        $I->cantSeeCheckboxIsChecked('#eatable');
    }

    public function changeNewlyCreatedPlantFromNoteatableToEatable(AcceptanceTester $I)
    {
        $I->wantTo('verify I can edit a new created plant from not eatable to eatable');

        $I->amOnPage('/add-new-plant');
        $I->fillField(['name' => 'name'], 'Test plant');
        $I->fillField('name_latin', 'Test plant latin');
        $I->fillField('description', 'Test description of a test plant');
        $I->fillField('history', 'Test history of a test plant');
        $I->attachFile('input[name=photo_0]', 'test.jpg');
        $I->attachFile('input[name=photo_1]', 'test.jpg');
        $I->attachFile('input[name=photo_2]', 'test.jpg');
        $I->attachFile('input[name=photo_3]', 'test.jpg');
        $I->click(['name' => 'addNewPlant']);
        $I->click('Forside');
        $I->canSeeCurrentUrlEquals('/');
        $I->see('Test plant');

        $I->seeRecord('plants', ['name' => 'Test plant']);
        $plantID = $I->grabRecord('plants', array('name' => 'Test plant'));

        $I->click('Mere..', Locator::href('/plant-detail/' . $plantID->id));
        $I->canSeeCurrentUrlEquals('/plant-detail/' . $plantID->id);

        $I->click('edit plant');
        $I->see('Rediger Test plant');
        $I->cantSeeCheckboxIsChecked('#eatable');
        $I->checkOption('#eatable');
        $I->click('save');

        $I->canSeeCurrentUrlEquals('/plant-detail/' . $plantID->id);
        $I->click('edit plant');
        $I->see('Rediger Test plant');
        $I->seeCheckboxIsChecked('#eatable');
    }

    public function changeNewlyCreatedPlantFromNotHerbToHerb(AcceptanceTester $I)
    {
        $I->wantTo('verify I can edit a new created plant from not eatable to eatable');

        $I->amOnPage('/add-new-plant');
        $I->fillField(['name' => 'name'], 'Test plant');
        $I->fillField('name_latin', 'Test plant latin');
        $I->fillField('description', 'Test description of a test plant');
        $I->fillField('history', 'Test history of a test plant');
        $I->attachFile('input[name=photo_0]', 'test.jpg');
        $I->attachFile('input[name=photo_1]', 'test.jpg');
        $I->attachFile('input[name=photo_2]', 'test.jpg');
        $I->attachFile('input[name=photo_3]', 'test.jpg');
        $I->click(['name' => 'addNewPlant']);
        $I->click('Forside');
        $I->canSeeCurrentUrlEquals('/');
        $I->see('Test plant');

        $I->seeRecord('plants', ['name' => 'Test plant']);
        $plantID = $I->grabRecord('plants', array('name' => 'Test plant'));

        $I->click('Mere..', Locator::href('/plant-detail/' . $plantID->id));
        $I->canSeeCurrentUrlEquals('/plant-detail/' . $plantID->id);

        $I->click('edit plant');
        $I->see('Rediger Test plant');
        $I->cantSeeCheckboxIsChecked('#herb');
        $I->checkOption('#herb');
        $I->click('save');

        $I->canSeeCurrentUrlEquals('/plant-detail/' . $plantID->id);
        $I->click('edit plant');
        $I->see('Rediger Test plant');
        $I->seeCheckboxIsChecked('#herb');
    }
}
