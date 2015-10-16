<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('verify the welcome page welcomes me');
$I->amOnPage('/');
$I->see('Velkommen', 'h1');
