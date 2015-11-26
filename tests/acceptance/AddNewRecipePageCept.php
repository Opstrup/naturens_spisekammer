<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('verify the add new recipe page has required has information');
$I->amOnPage('/add-new-recipe');
$I->see('Tilføj ny opskrift til databasen', 'h2');

/*
 * Checking the basic information inputs exists
 */
$I->seeElement('#name');
$I->seeElement('#storage');
$I->seeElement('#guide');

/*
 * Checking the different types of recipes exists
 */
$I->seeElement('html/body/div[5]/form/div[1]/select/option[1]');
$I->seeElement('html/body/div[5]/form/div[1]/select/option[2]');

/*
 * Checking the tables exists
 */
$I->seeElement('table');
$I->seeElement('#plantTable');
$I->seeElement('#ingredientTable');

/*
 * Checking submit btn exists
 */
$I->seeElement('html/body/div[5]/form/div[3]/input');

/*
 * Checking the links exists
 */
$I->seeLink('Forside');
$I->seeLink('Tilføj ny opskrift');
$I->seeLink('Tilføj ny plante');
$I->seeLink('Tilføj ny ingridients');
$I->seeLink('Om');

