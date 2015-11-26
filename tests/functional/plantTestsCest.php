<?php
//use \FunctionalTester;
//use \Codeception\Util\Locator;
//
//class plantTestsCest
//{
//
//    public function createPlant($I)
//    {
//        $I->wantTo('verify that I can create a complete plant');
//        $I->amOnPage('/add-new-plant');
//        $I->see('Tilføj ny plante til databasen');
//        $I->fillField(['name' => 'name'], 'Test plant');
//        $I->fillField('name_latin', 'Test plant latin');
//        $I->fillField('description', 'Test description of a test plant');
//        $I->fillField('history', 'Test history of a test plant');
//        $I->checkOption('eatable');
//        $I->checkOption('spring');
//        $I->checkOption('summer');
//        $I->checkOption('10-25');
//        $I->checkOption('25-40');
//        $I->checkOption('moor');
//        $I->checkOption('forest');
//        $I->checkOption('red');
//        $I->attachFile('input[name=photo_0]', 'test.jpg');
//        $I->attachFile('input[name=photo_1]', 'test.jpg');
//        $I->attachFile('input[name=photo_2]', 'test.jpg');
//        $I->attachFile('input[name=photo_3]', 'test.jpg');
//        $I->click(['name' => 'addNewPlant']);
//        $I->click('Forside');
//        $I->canSeeCurrentUrlEquals('/');
//        $I->see('Test plant', 'td');
//
//        $I->seeRecord('plants', [
//            'name' => 'Test plant',
//            'name_latin' => 'Test plant latin',
//            'description' => 'Test description of a test plant',
//            'history' => 'Test history of a test plant',
//            'herb' => null,
//            'eatable' => 0]);
//
//        return $I->grabRecord('plants', array('name' => 'Test plant'))->id;
//    }
//
//    public function createNewPlant(FunctionalTester $I)
//    {
//        $I->wantTo('verify that I can create a new plant');
//        $I->amOnPage('/add-new-plant');
//        $I->see('Tilføj ny plante til databasen');
//        $I->fillField(['name' => 'name'], 'Test plant');
//        $I->fillField('name_latin', 'Test plant latin');
//        $I->fillField('description', 'Test description of a test plant');
//        $I->fillField('history', 'Test history of a test plant');
//        $I->attachFile('input[name=photo_0]', 'test.jpg');
//        $I->attachFile('input[name=photo_1]', 'test.jpg');
//        $I->attachFile('input[name=photo_2]', 'test.jpg');
//        $I->attachFile('input[name=photo_3]', 'test.jpg');
//        $I->click(['name' => 'addNewPlant']);
//        $I->click('Forside');
//        $I->canSeeCurrentUrlEquals('/');
//        $I->see('Test plant', 'td');
//
//        $I->seeRecord('plants', [
//                                'name' => 'Test plant',
//                                'name_latin' => 'Test plant latin',
//                                'description' => 'Test description of a test plant',
//                                'history' => 'Test history of a test plant',
//                                'herb' => null,
//                                'eatable' => null]);
//    }
//
//    public function createNewEatablePlant(FunctionalTester $I)
//    {
//        $I->wantTo('verify that I can create a eatable plant');
//        $I->amOnPage('/add-new-plant');
//        $I->see('Tilføj ny plante til databasen');
//        $I->fillField(['name' => 'name'], 'Test plant');
//        $I->fillField('name_latin', 'Test plant latin');
//        $I->fillField('description', 'Test description of a test plant');
//        $I->fillField('history', 'Test history of a test plant');
//        $I->checkOption('eatable');
//        $I->attachFile('input[name=photo_0]', 'test.jpg');
//        $I->attachFile('input[name=photo_1]', 'test.jpg');
//        $I->attachFile('input[name=photo_2]', 'test.jpg');
//        $I->attachFile('input[name=photo_3]', 'test.jpg');
//        $I->click(['name' => 'addNewPlant']);
//        $I->click('Forside');
//        $I->canSeeCurrentUrlEquals('/');
//        $I->see('Test plant', 'td');
//
//        $I->seeRecord('plants', [
//            'name' => 'Test plant',
//            'name_latin' => 'Test plant latin',
//            'description' => 'Test description of a test plant',
//            'history' => 'Test history of a test plant',
//            'herb' => null,
//            'eatable' => 0]);
//    }
//
//    public function createNewHerbPlant(FunctionalTester $I)
//    {
//        $I->wantTo('verify that I can create a new plant with herb attribut');
//        $I->amOnPage('/add-new-plant');
//        $I->see('Tilføj ny plante til databasen');
//        $I->fillField(['name' => 'name'], 'Test plant');
//        $I->fillField('name_latin', 'Test plant latin');
//        $I->fillField('description', 'Test description of a test plant');
//        $I->fillField('history', 'Test history of a test plant');
//        $I->checkOption('herb');
//        $I->attachFile('input[name=photo_0]', 'test.jpg');
//        $I->attachFile('input[name=photo_1]', 'test.jpg');
//        $I->attachFile('input[name=photo_2]', 'test.jpg');
//        $I->attachFile('input[name=photo_3]', 'test.jpg');
//        $I->click(['name' => 'addNewPlant']);
//        $I->click('Forside');
//        $I->canSeeCurrentUrlEquals('/');
//        $I->see('Test plant', 'td');
//
//        $I->seeRecord('plants', [
//            'name' => 'Test plant',
//            'name_latin' => 'Test plant latin',
//            'description' => 'Test description of a test plant',
//            'history' => 'Test history of a test plant',
//            'herb' => 0,
//            'eatable' => null]);
//    }
//
//    public function createNewPlantWithSeasons(FunctionalTester $I)
//    {
//        $I->wantTo('verify that I can create a new plant with seasons');
//        $I->amOnPage('/add-new-plant');
//        $I->see('Tilføj ny plante til databasen');
//        $I->fillField(['name' => 'name'], 'Test plant');
//        $I->fillField('name_latin', 'Test plant latin');
//        $I->fillField('description', 'Test description of a test plant');
//        $I->fillField('history', 'Test history of a test plant');
//        $I->checkOption('summer');
//        $I->attachFile('input[name=photo_0]', 'test.jpg');
//        $I->attachFile('input[name=photo_1]', 'test.jpg');
//        $I->attachFile('input[name=photo_2]', 'test.jpg');
//        $I->attachFile('input[name=photo_3]', 'test.jpg');
//        $I->click(['name' => 'addNewPlant']);
//        $I->click('Forside');
//        $I->canSeeCurrentUrlEquals('/');
//        $I->see('Test plant', 'td');
//
//        $I->seeRecord('plants', [
//            'name' => 'Test plant',
//            'name_latin' => 'Test plant latin',
//            'description' => 'Test description of a test plant',
//            'history' => 'Test history of a test plant',
//            'herb' => null,
//            'eatable' => null]);
//
//        $plantID = $I->grabRecord('plants', array('name' => 'Test plant'))->id;
//
//        $I->click('Mere..', Locator::href('/plant-detail/' . $plantID));
//        $I->canSeeCurrentUrlEquals('/plant-detail/' . $plantID);
//
//        $I->see('sommer', 'li');
//    }
//
//    public function createNewPlantWithColors(FunctionalTester $I)
//    {
//        $I->wantTo('verify that I can create a new plant with colors');
//        $I->amOnPage('/add-new-plant');
//        $I->see('Tilføj ny plante til databasen');
//        $I->fillField(['name' => 'name'], 'Test plant');
//        $I->fillField('name_latin', 'Test plant latin');
//        $I->fillField('description', 'Test description of a test plant');
//        $I->fillField('history', 'Test history of a test plant');
//        $I->checkOption('red');
//        $I->attachFile('input[name=photo_0]', 'test.jpg');
//        $I->attachFile('input[name=photo_1]', 'test.jpg');
//        $I->attachFile('input[name=photo_2]', 'test.jpg');
//        $I->attachFile('input[name=photo_3]', 'test.jpg');
//        $I->click(['name' => 'addNewPlant']);
//        $I->click('Forside');
//        $I->canSeeCurrentUrlEquals('/');
//        $I->see('Test plant', 'td');
//
//        $I->seeRecord('plants', [
//            'name' => 'Test plant',
//            'name_latin' => 'Test plant latin',
//            'description' => 'Test description of a test plant',
//            'history' => 'Test history of a test plant',
//            'herb' => null,
//            'eatable' => null]);
//
//        $plantID = $I->grabRecord('plants', array('name' => 'Test plant'))->id;
//
//        $I->click('Mere..', Locator::href('/plant-detail/' . $plantID));
//        $I->canSeeCurrentUrlEquals('/plant-detail/' . $plantID);
//
//        $I->see('rød', 'li');
//    }
//
//    public function createNewCompletePlant(FunctionalTester $I)
//    {
//        $I->wantTo('verify that I can create a complete plant');
//        $I->amOnPage('/add-new-plant');
//        $I->see('Tilføj ny plante til databasen');
//        $I->fillField(['name' => 'name'], 'Test plant');
//        $I->fillField('name_latin', 'Test plant latin');
//        $I->fillField('description', 'Test description of a test plant');
//        $I->fillField('history', 'Test history of a test plant');
//        $I->checkOption('eatable');
//        $I->checkOption('spring');
//        $I->checkOption('summer');
//        $I->checkOption('10-25');
//        $I->checkOption('25-40');
//        $I->checkOption('moor');
//        $I->checkOption('forest');
//        $I->checkOption('red');
//        $I->attachFile('input[name=photo_0]', 'test.jpg');
//        $I->attachFile('input[name=photo_1]', 'test.jpg');
//        $I->attachFile('input[name=photo_2]', 'test.jpg');
//        $I->attachFile('input[name=photo_3]', 'test.jpg');
//        $I->click(['name' => 'addNewPlant']);
//        $I->click('Forside');
//        $I->canSeeCurrentUrlEquals('/');
//        $I->see('Test plant', 'td');
//
//        $I->seeRecord('plants', [
//            'name' => 'Test plant',
//            'name_latin' => 'Test plant latin',
//            'description' => 'Test description of a test plant',
//            'history' => 'Test history of a test plant',
//            'herb' => null,
//            'eatable' => 0]);
//
//        $plantID = $I->grabRecord('plants', array('name' => 'Test plant'))->id;
//
//        $I->click('Mere..', Locator::href('/plant-detail/' . $plantID));
//        $I->canSeeCurrentUrlEquals('/plant-detail/' . $plantID);
//
//        $I->see('forår', 'li');
//        $I->see('sommer', 'li');
//        $I->see('10-25 cm', 'li');
//        $I->see('25-40 cm', 'li');
//        $I->see('25-40 cm', 'li');
//        $I->see('25-40 cm', 'li');
//        $I->see('Hede', 'li');
//        $I->see('Skov og hegn', 'li');
//        $I->see('rød', 'li');
//    }
//
//    public function editPlantFormEatableToNotEatable(FunctionalTester $I)
//    {
//        $I->wantTo('verify that I can create a complete plant');
//        $I->amOnPage('/add-new-plant');
//        $plantID = $this->createPlant($I);
//
//        $I->click('Mere..', Locator::href('/plant-detail/' . $plantID));
//        $I->canSeeCurrentUrlEquals('/plant-detail/' . $plantID);
//
//        $I->click('edit plant');
//        $I->see('Test plant');
//        $I->uncheckOption('eatable');
//        /*$I->click('save');
//        $I->click('edit plant');
//        $I->cantSeeCheckboxIsChecked('eatable');*/
//    }
//}
