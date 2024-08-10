<?php

namespace Pages;

use Exception;


class Home
{
    // include url of current page
    public static $URL = '/';

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
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
     * Открытие главной страницы сайта.
     *
     * @param string $extraUrl
     * @throws Exception
     */
    public function open($extraUrl) {
        $I = $this->tester;

        $I->amOnPage($extraUrl);
    }
}