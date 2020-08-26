<?php

namespace TNED\captcha\facade;

use think\Facade;

/**
 * Class Captcha
 * @package TNED\captcha\facade
 * @mixin \TNED\captcha\Captcha
 */
class Captcha extends Facade
{
    protected static function getFacadeClass()
    {
        return \TNED\captcha\Captcha::class;
    }
}
