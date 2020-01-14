<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('have Vue deom page');

$I->amOnPage('/vue');
$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret');

$I->click('#login_button');

$I->seeCurrentUrlEquals('/vue');

$I->waitForText("Example Component", 5, "div.card-header");
$I->waitForText("I'm an example component.", 5, "div.card-body");
