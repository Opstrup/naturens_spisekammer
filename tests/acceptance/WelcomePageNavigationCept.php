<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('verify the welcome page has the required information');
$I->amOnPage('/');
$I->see('Velkommen til Spis-Danmark - Backend', 'h1');

/*
 * Checking the tables exists
 */
$I->seeElement('table');
$I->seeElement('#plantTable');
$I->seeElement('#recipeTable');

/*
 * Checking the links exists
 */
$I->seeLink('Forside');
$I->seeLink('Tilføj ny opskrift');
$I->seeLink('Tilføj ny plante');
$I->seeLink('Tilføj ny ingridients');
$I->seeLink('Om');