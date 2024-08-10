<?php
namespace Pages;

use Exception;

class Registration
{
    // include url of current page
    public static $URL = '/signup';

    //const
    const AGE_INPUT = ['id' => 'jform_age'];
    const PASSWORD_INPUT = ['id' => 'jform_password1'];
    const NAME_INPUT = ['id' => 'jform_name'];
    const EMAIL_INPUT = ['id' => 'jform_email1'];
    const CREATE_BUTTON = '//button[@type="submit"]';

    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var AcceptanceTester
     */
    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    /**
     * Открытие формы регистрации.
     *
     * @throws Exception
     */
    public function openSignUpPage()
    {
        $I = $this->tester;

        $I->waitAndClick('//a[@class="desktop__create ext-register"]', 'кнопка регистрации');
        $I->waitForVisible(self::CREATE_BUTTON, 'кнопка Create account');
    }

    /**
     * Заполнение и отправка формы регистрации.
     *
     * @param int|string $age
     * @param string $name
     * @param string $email
     * @param string $password
     * @throws Exception
     */
    public function doSignUp($age, $name, $email, $password)
    {
        $I = $this->tester;

        $I->waitAndFill(self::AGE_INPUT, 'age', $age);
        $I->waitAndFill(self::NAME_INPUT,'name', $name);
        $I->waitAndFill(self::EMAIL_INPUT, 'email', $email);
        $I->waitAndFill(self::PASSWORD_INPUT, 'password', $password);
        $I->waitAndClick(self::CREATE_BUTTON, 'кнопка Create account');
    }
}