<?php

class SignUpCest
{
    /**
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function validSignUp(AcceptanceTester $I)
    {
        $I->openHomePage();
        $I->openSignUpPage();
        $testData = $I->generateTestData();
        $I->doSignUp($testData['age'], $testData['name'], $testData['email'], $testData['password']);
        $name = $testData['name'];
        $I->see("Welcome, $name!"); //проверяем на наличие welcome текста с именем пользователя
    }
}