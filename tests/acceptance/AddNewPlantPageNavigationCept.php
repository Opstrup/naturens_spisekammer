<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('verify the add new plant page has required has information');
$I->amOnPage('/add-new-plant');
$I->see('Tilføj ny plante til databasen', 'h2');

/*
 * Checking the basic information inputs exists
 */
$I->seeElement('#name');
$I->seeElement('#name_latin');
$I->seeElement('#description');
$I->seeElement('#history');

/*
 * Checking the application inputs exists
 */
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[1]/ul/li[1]/input');
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[1]/ul/li[2]/input');
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[1]/ul/li[3]/input');
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[1]/ul/li[4]/input');
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[1]/ul/li[5]/input');
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[1]/ul/li[6]/input');
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[1]/ul/li[7]/input');
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[1]/ul/li[8]/input');
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[1]/ul/li[9]/input');
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[1]/ul/li[10]/input');
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[1]/ul/li[11]/input');

/*
 * Checking the season input exists
 */
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[2]/ul/li[1]/input');
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[2]/ul/li[2]/input');
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[2]/ul/li[3]/input');
$I->seeElement('html/body/div[5]/form/div[1]/fieldset[2]/ul/li[4]/input');

/*
 * Checking the size input exists
 */
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[1]/ul/li[1]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[1]/ul/li[2]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[1]/ul/li[3]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[1]/ul/li[4]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[1]/ul/li[5]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[1]/ul/li[6]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[1]/ul/li[7]/input');

/*
 * Checking the habitat input exists
 */
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[2]/ul/li[1]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[2]/ul/li[2]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[2]/ul/li[3]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[2]/ul/li[4]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[2]/ul/li[5]/input');

/*
 * Checking the color input exists
 */
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[3]/ul/li[1]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[3]/ul/li[2]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[3]/ul/li[3]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[3]/ul/li[4]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[3]/ul/li[5]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[3]/ul/li[6]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[3]/ul/li[7]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[3]/ul/li[8]/input');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[3]/ul/li[9]/input');

/*
 * Checking the file input exists
 */
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[4]/input[1]');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[4]/input[2]');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[4]/input[3]');
$I->seeElement('html/body/div[5]/form/div[2]/fieldset[4]/input[4]');

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