<?php

use TNED\captcha\facade\Captcha;
use think\facade\Route;
use think\Response;

if (!function_exists('captcha')) {
    /**
     * @param string $config
     * @return \think\Response
     */
    function captcha($config = null): Response
    {
        return Captcha::create($config);
    }
}

if (!function_exists('captcha_src')) {
    /**
     * @param string $config 配置名称
     * @return string
     */
    function captcha_src($config = null): string
    {
        return Route::buildUrl('/captcha' . ($config ? "/{$config}" : ''));
    }
}

if (!function_exists('captcha_img')) {
    /**
     * @param string $id
     * @param string $domid
     * @return string
     */
    function captcha_img($id = '', $domid = ''): string
    {
        $src = captcha_src($id);

        $domid = empty($domid) ? $domid : "id='" . $domid . "'";

        return "<img src='{$src}' alt='captcha' " . $domid . " onclick='this.src=\"{$src}?\"+Math.random();' />";
    }
}

if (!function_exists('captcha_check')) {
    /**
     * @param string $value
     * @return bool
     */
    function captcha_check($value)
    {
        return Captcha::check($value);
    }
}
