<?php
use \AcceptanceTester;

class AddNewPlantPageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/add-new-plant');
        $I->see('Tilføj ny plante til databasen');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function createNewPlant(AcceptanceTester $I)
    {
        $I->wantTo('verify that I can create a new plant');
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
    }

    public function createNewPlantWithSeasons(AcceptanceTester $I)
    {
        $I->wantTo('verify that I can create a new plant with specific season');
        $I->fillField('name', 'Test plant with season');
        $I->fillField('name_latin', 'Test plant latin');
        $I->fillField('description', 'Test description of a test plant');
        $I->fillField('history', 'Test history of a test plant');
        $I->checkOption('#spring');
        $I->attachFile('input[name=photo_0]', 'test.jpg');
        $I->attachFile('input[name=photo_1]', 'test.jpg');
        $I->attachFile('input[name=photo_2]', 'test.jpg');
        $I->attachFile('input[name=photo_3]', 'test.jpg');
        $I->click(['name' => 'addNewPlant']);

        $plantId = $I->grabRecord('plants', array('name' => 'Test plant with season'));
        $I->seeRecord('plant_seasons', ['plant_id' => $plantId->id]);
    }

    public function createEatablePlant(AcceptanceTester $I)
    {
        $I->wantTo('verify that I can create a eatable plant');
        $I->fillField('name', 'Eatable plant');
        $I->fillField('name_latin', 'Test plant latin');
        $I->fillField('description', 'Test description of a test plant');
        $I->fillField('history', 'Test history of a test plant');
        $I->checkOption('#eatable');
        $I->attachFile('input[name=photo_0]', 'test.jpg');
        $I->attachFile('input[name=photo_1]', 'test.jpg');
        $I->attachFile('input[name=photo_2]', 'test.jpg');
        $I->attachFile('input[name=photo_3]', 'test.jpg');
        $I->click(['name' => 'addNewPlant']);

        $I->seeRecord('plants', ['name' => 'Eatable plant', 'eatable' => '1']);
    }

    public function createCompletePlant(AcceptanceTester $I)
    {
        $I->wantTo('verify that I can create a plant with all information');
        $I->fillField('name', 'Test plant');
        $I->fillField('name_latin', 'Test plant latin');
        $I->fillField('description', 'Test description of a test plant');
        $I->fillField('history', 'Test history of a test plant');
        $I->checkOption('#eatable');
        $I->checkOption('#winter');
        $I->checkOption('#25-40');
        $I->checkOption('#farmland');
        $I->checkOption('#red');
        $I->attachFile('input[name=photo_0]', 'test.jpg');
        $I->attachFile('input[name=photo_1]', 'test.jpg');
        $I->attachFile('input[name=photo_2]', 'test.jpg');
        $I->attachFile('input[name=photo_3]', 'test.jpg');
        $I->click(['name' => 'addNewPlant']);

        $I->seeRecord('plants', ['name' => 'Test plant', 'eatable' => '1']);

        $plantId = $I->grabRecord('plants', array('name' => 'Test plant'));
        $I->seeRecord('plant_seasons', ['plant_id' => $plantId->id]);
        $I->seeRecord('plant_colors', ['plant_id' => $plantId->id]);
        $I->seeRecord('plant_habitats', ['plant_id' => $plantId->id]);
        $I->seeRecord('plant_sizes', ['plant_id' => $plantId->id]);
        $I->seeRecord('photos', ['plant_id' => $plantId->id]);
    }
}
