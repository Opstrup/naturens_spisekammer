<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('verify that I can create a new plant');
$I->amOnPage('/');
$I->click('Tilføj ny plante');
$I->canSeeInCurrentUrl('add-new-plant');
$I->see('Tilføj ny plante til databasen');
$I->fillField('name', 'Test plant');
$I->fillField('name_latin', 'Test plant latin');
$I->fillField('description', 'Test description of a test plant');
$I->fillField('history', 'Test history of a test plant');
$I->checkOption('eatable');
$I->attachFile('input[name=photo_0]', 'test.jpg');
$I->attachFile('input[name=photo_1]', 'test.jpg');
$I->attachFile('input[name=photo_2]', 'test.jpg');
$I->attachFile('input[name=photo_3]', 'test.jpg');
$I->click(['name' => 'addNewPlant']);
$I->dontSee('Test plant'); // Check if the form refreshes
$I->click('Forside');
$I->canSeeCurrentUrlEquals('/');
$I->see('Test plant');