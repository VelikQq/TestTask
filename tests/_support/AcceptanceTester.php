<?php

use Pages\Registration as Registration;
use Pages\Home as HomePage;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Перейти на главную страницу сайта.
     *
     * @param string $extraUrl
     * @throws Exception
     */
    public function openHomePage($extraUrl = '')
    {
        $I = $this;

        $homePage = new HomePage($I);
        $homePage->open($extraUrl);
    }

    /**
     * Открыть форму регистрации.
     *
     * @throws \Exception
     */
    public function openSignUpPage()
    {
        $I = $this;

        $registrationPage = new Registration($I);
        $registrationPage->openSignUpPage();
    }

    /**
     * Заполнение и отправка формы регистрации.
     *
     * @param int|string $age
     * @param string $email
     * @param string $name
     * @param string $password
     * @throws \Exception
     */
    public function doSignUp($age, $name, $email, $password)
    {
        $I = $this;

        $registrationPage = new Registration($I);
        $registrationPage->doSignUp($age, $name, $email, $password);
    }

    /**
     * Нажатие на элемент включает ожидание элемента и отображение его описания.
     *
     * @param string $path ссылка на элемент
     * @param string $linkDescription описание элемента
     * @param string $noScroll disable отключить прокрутку к элементу
     * @throws \Exception
     */
    public function waitAndClick($path, $linkDescription, $noScroll = null)
    {
        $I = $this;

        echo("пытается кликнуть на " . $linkDescription);

        $this->waitForVisible($path, $linkDescription);
        try {
            $I->waitForElementClickable($path, 30);
        } catch (\Exception $ex) {
            Throw new \Exception('Не может дождаться ' . $linkDescription . ' в течении ' . ELEMENT_WAIT_TIME . ' секунд');
        }

        if (is_null($noScroll)) {
            try {
                $I->scrollTo($path, 0, -100); //на случай если header страницы фиксирован
            } catch ( \Exception $ex) {
                Throw new \Exception('Не может проскролить ' . $linkDescription);
            }
        }

       $I->click($path, null);
    }

    /**
     * Дождитесь появления элемента с правильным сообщением.
     *
     * @param string $path ссылка на элемент
     * @param string $linkDescription описание элемента
     * @param int $wait
     * @throws \Exception
     */
    public function waitForVisible($path, $linkDescription, $wait = 30)
    {
        $I = $this;

        try {
            $I->waitForElementVisible($path, $wait);
        } catch (\Exception $ex) {
            Throw new \Exception('Не может дождаться ' . $linkDescription . ' в течении ' . ELEMENT_WAIT_TIME . ' секунд');
        }
    }

    /**
     * Ожидание, пока элемент не будет виден с правильным сообщением.
     *
     * @param string $path ссылка на элемент
     * @param string $linkDescription описание элемента
     * @param int $wait
     * @throws \Exception
     */
    public function waitForNotVisible($path, $linkDescription, $wait = 30)
    {
        $I = $this;

        try {
            $I->waitForElementNotVisible($path, $wait);
        } catch (\Exception $ex) {
            Throw new \Exception('Элемент ' . $linkDescription . ' не исчез в течении ' . ELEMENT_WAIT_TIME . ' секунд');
        }
    }

    /**
     * Заполнение поля ввода.
     *
     * @param mixed $link Поле ввода
     * @param string $description Описание поля
     * @param string $data Входные данные
     * @param null $noScroll Отключить прокрутку
     * @throws \Exception
     */
    public function waitAndFill($link, $description, $data, $noScroll = null)
    {
        $I = $this;

        $I->waitAndClick($link, $description, $noScroll);
        $I->fillField($link, $data);
    }

    /**
     * Генерация случайной строки, количество цифр в строке задается параметром.
     *
     * @param string $length Количество цифр в строке
     * @return string
     */
    function generateString($length = null)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ';
        $numChars = mb_strlen($chars, 'UTF-8');
        $string = '';
        $numLenght = 0;

        for ($i = 0; $i <= $length; $i++) {
            $rndChar = rand(1, $numChars) - 1;
            $stringAdd = mb_substr($chars, $rndChar, 1, 'UTF-8');
            if (is_numeric($stringAdd)) {
                $numLenght += $numLenght;
                codecept_debug($numLenght);
            }

            $string .= $stringAdd;
        }

        return $string;
    }

    /**
     * Генерация тестовых данных: год, имя, email, пароль.
     *
     * @return array
     */
    public function generateTestData()
    {
        $I = $this;

        return [
            'age' => mt_rand(18, 99),
            'name' => $I->generateString(6),
            'email' => $I->generateString(10) . '@mail.com',
            'password' => $I->generateString(6)
        ];
    }
}
