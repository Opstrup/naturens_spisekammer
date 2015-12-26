<?php
use \Codeception\Util\Locator;

function helperCreatePlant($I)
{
    /*
     * The user goes to the welcome page.
     */

    $I->amOnPage('/');

    /*
     * There he sees the welcome message.
     */

    $I->see('Velkommen til Spis-Danmark - Backend', 'h1');

    /*
     *  He also sees the two tables with all the plants and recipes.
     */
    $I->seeElement('table');
    $I->seeElement('#plantTable');
    $I->seeElement('#recipeTable');

    /*
     * Furthermore he sees all the links to the functionality on the website.
     */
    $I->seeLink('Forside');
    $I->seeLink('Tilføj ny opskrift');
    $I->seeLink('Tilføj ny plante');
    $I->seeLink('Tilføj ny ingridients');
    $I->seeLink('Om');

    /*
     * He wants to create a new plant in the system so he clicks on the link "Tilføj ny plante".
     */

    $I->click('Tilføj ny plante');

    /*
     * He now gets redirected to the creation page "create-new-plant".
     */

    $I->seeInCurrentUrl('add-new-plant');

    /*
     * Here he fills out the form.
     * Its a very special plant so he fills out all the information about the plant,
     * he even checks all the checkboxes.
     */

    $I->fillField('#name', 'Test plant');
    $I->fillField('#name_latin', 'Test plant latin');
    $I->fillField('#description', 'Test description of a test plant');
    $I->fillField('#history', 'Test history of a test plant');

    $I->checkOption('spring');
    $I->checkOption('summer');
    $I->checkOption('autumn');
    $I->checkOption('winter');

    $I->checkOption('10'); // does not get tested
    $I->checkOption('10-25');
    $I->checkOption('25-40');
    $I->checkOption('40-50');
    $I->checkOption('50-75');
    $I->checkOption('75-100');
    $I->checkOption('100'); // does not get testec

    $I->checkOption('red');
    $I->checkOption('yellow');
    $I->checkOption('blue');
    $I->checkOption('green');
    $I->checkOption('brown');
    $I->checkOption('black');
    $I->checkOption('white');
    $I->checkOption('purple');
    $I->checkOption('orange');

    $I->checkOption('herb');
    $I->checkOption('thee');
    $I->checkOption('schnapps');
    $I->checkOption('pickled');
    $I->checkOption('firefood');
    $I->checkOption('pot');
    $I->checkOption('juice');
    $I->checkOption('soup');
    $I->checkOption('salad');
    $I->checkOption('dessert');
    $I->checkOption('snack');

    $I->checkOption('farmland');
    $I->checkOption('wetland');
    $I->checkOption('forest');
    $I->checkOption('moor');
    $I->checkOption('coast');

    /*
     * He also uploads four photos of the plant.
     */

    $I->attachFile('input[name=photo_0]', 'test.jpg');
    $I->attachFile('input[name=photo_1]', 'test.jpg');
    $I->attachFile('input[name=photo_2]', 'test.jpg');
    $I->attachFile('input[name=photo_3]', 'test.jpg');

    /*
     * Then he clicks on the submit button.
     */

    $I->click('addNewPlant');

    /*
     * Now the website redirects him to the cropping page for the photos.
     * The title of the page has now change to "Beskær billeder" and
     * a welcome message says "Beskær billeder".
     */

    $I->seeInTitle('Beskær billeder');
    $I->see('Beskær billeder');

    /*
     * He does not want to crop the photos yet so he press the skip button.
     */

    $I->click('Spring over', 'a');

    /*
     * Now the website redirects him to the detail page of the new created plant.
     */

    $plantID = $I->grabRecord('plants', array('name' => 'Test plant'))->id;

    $I->seeInCurrentUrl('plant-detail/' . $plantID);

    /*
     * Here he can see all the information on the plant that he did previously
     */
    $I->see('Test plant', '.page-header h1');
    $I->see('Test plant latin', '.page-header h1');
    $I->see('Test description of a test plant', '.well');
    $I->see('Test history of a test plant', '.well');
    $I->see('Krydderi', 'li');
    $I->see('The', 'li');
    $I->see('Snaps', 'li');
    $I->see('Sylte', 'li');
    $I->see('Bålmad', 'li');
    $I->see('Gryderet', 'li');
    $I->see('Saft', 'li');
    $I->see('Suppe', 'li');
    $I->see('Salat', 'li');
    $I->see('Dessert', 'li');
    $I->see('Snack', 'li');

    $I->see('rød', 'li');
    $I->see('gul', 'li');
    $I->see('blå', 'li');
    $I->see('grøn', 'li');
    $I->see('brun', 'li');
    $I->see('sort', 'li');
    $I->see('hvid', 'li');
    $I->see('lilla', 'li');
    $I->see('orange', 'li');

    $I->see('Forår', 'li');
    $I->see('Sommer', 'li');
    $I->see('Efterår', 'li');
    $I->see('Vinter', 'li');

//$I->see('10 cm', 'li');
    $I->see('10-25 cm', 'li');
    $I->see('25-40 cm', 'li');
    $I->see('40-50 cm', 'li');
    $I->see('50-75 cm', 'li');
    $I->see('75-100 cm', 'li');
//$I->see('100 cm', 'li');

    $I->see('Agerland', 'li');
    $I->see('Vådområde', 'li');
    $I->see('Skov og hegn', 'li');
    $I->see('Hede', 'li');
    $I->see('Kyst', 'li');

    $I->seeElement('.photo');
    $I->dontSeeElement('.default');

    /*
     * After he have check that all the data is correct he clicks on the link to the front page.
     */

    $I->click('Forside');

    /*
     * Here he sees the plant is on the list and therefor has been successful created.
     */

    $I->see('Test plant', 'tr td');
    $I->see('Test plant latin', 'tr td');
}

$I = new AcceptanceTester($scenario);
$I->wantTo('Edit plant');

/*
 * The user creates a plant width all the information on a plant.
 */

helperCreatePlant($I);

/*
 * He is now on the front page and he wants to edit the newly created plant.
 */

$plantID = $I->grabRecord('plants', array('name' => 'Test plant'))->id;

/*
 * He clicks on the link "mere.." at the plant.
 */

$I->click('Mere..', Locator::href('/plant-detail/' . $plantID));

/*
 * Here he sees all the information on the plant has been saved correct.
 */

$I->seeInCurrentUrl('plant-detail/' . $plantID);

/*
 * Now he clicks on the edit button for the plant.
 */

$I->click('edit plant');

/*
 * The page redirects him to the edit page
 */

$I->seeInCurrentUrl('show-edit-plant');

/*
 * Here he sees all the checkboxes is checked correctly.
 */

// Seasons is checked
$I->seeElement('html/body/div[5]/div[2]/fieldset[1]/ul/li[1]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[1]/ul/li[2]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[1]/ul/li[3]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[1]/ul/li[4]/input', ['checked' => 'checked']);

// Sizes is checked
$I->seeElement('html/body/div[5]/div[2]/fieldset[2]/ul/li[1]/input'); // 10 cm is not being tested.
$I->seeElement('html/body/div[5]/div[2]/fieldset[2]/ul/li[2]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[2]/ul/li[3]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[2]/ul/li[4]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[2]/ul/li[5]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[2]/ul/li[6]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[2]/ul/li[7]/input'); // 100 cm is not being tested.

// Color is checked
$I->seeElement('html/body/div[5]/div[2]/fieldset[4]/ul/li[1]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[4]/ul/li[2]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[4]/ul/li[3]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[4]/ul/li[4]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[4]/ul/li[5]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[4]/ul/li[6]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[4]/ul/li[7]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[4]/ul/li[8]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[4]/ul/li[9]/input', ['checked' => 'checked']);

// Application is checked
$I->seeElement('html/body/div[5]/div[1]/form/fieldset/ul/li[1]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[1]/form/fieldset/ul/li[2]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[1]/form/fieldset/ul/li[3]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[1]/form/fieldset/ul/li[4]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[1]/form/fieldset/ul/li[5]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[1]/form/fieldset/ul/li[6]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[1]/form/fieldset/ul/li[7]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[1]/form/fieldset/ul/li[8]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[1]/form/fieldset/ul/li[9]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[1]/form/fieldset/ul/li[10]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[1]/form/fieldset/ul/li[11]/input', ['checked' => 'checked']);

// Habitats is checked
$I->seeElement('html/body/div[5]/div[2]/fieldset[3]/ul/li[1]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[3]/ul/li[2]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[3]/ul/li[3]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[3]/ul/li[4]/input', ['checked' => 'checked']);
$I->seeElement('html/body/div[5]/div[2]/fieldset[3]/ul/li[5]/input', ['checked' => 'checked']);

/*
 * After he sees that all checkboxes is checked, he unchecks them all.
 */

$I->uncheckOption('herb');
$I->uncheckOption('thee');
$I->uncheckOption('schnapps');
$I->uncheckOption('pickled');
$I->uncheckOption('firefood');
$I->uncheckOption('pot');
$I->uncheckOption('juice');
$I->uncheckOption('soup');
$I->uncheckOption('salad');
$I->uncheckOption('dessert');
$I->uncheckOption('snack');

$I->uncheckOption('spring');
//$I->uncheckOption('summer');
//$I->uncheckOption('autumn');
//$I->uncheckOption('winter');

//$I->uncheckOption('10');
//$I->uncheckOption('10-25');
//$I->uncheckOption('25-40');
//$I->uncheckOption('40-50');
//$I->uncheckOption('50-75');
//$I->uncheckOption('75-100');
//$I->uncheckOption('100');

