<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('verify the add new ingredient page has required has information');
$I->amOnPage('/add-new-ingredient');
$I->see('Tilføj ny ingridients til databasen', 'h2');

/*
 * Checking the input field exists
 */
$I->seeElement('#name');

/*
 * Checking add and delete btn exists
 */
$I->seeElement('html/body/div[5]/form[1]/input[2]');
$I->seeElement('html/body/div[5]/form[2]/input[2]');

/*
 * Checking the table exists
 */
$I->seeElement('table');
$I->seeElement('#ingredientTable');

/*
 * Checking the links exists
 */
$I->seeLink('Forside');
$I->seeLink('Tilføj ny opskrift');
$I->seeLink('Tilføj ny plante');
$I->seeLink('Tilføj ny ingridients');
$I->seeLink('Om');
