<?php

namespace TNED\captcha;

use think\Route;
use think\Service;
use think\Validate;

class CaptchaService extends Service
{
    public function boot()
    {
        Validate::maker(function ($validate) {
            $validate->extend('captcha', function ($value, $rule = '', $data = []) {
                $key = $rule;
                if ($rule && isset($data[$rule])) {
                    $key = $data[$rule];
                }
                return captcha_check($value, $key);
            }, ':attribute错误!');
        });

        $this->registerRoutes(function (Route $route) {
            $route->get('captcha/[:config]', "\\TNED\\captcha\\CaptchaController@index");
        });
    }
}
