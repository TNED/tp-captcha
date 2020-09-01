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
     * 检测code是否匹配
     * @param string $value code
     * @param string $key 核销验证码的key值
     * @return bool
     */
    function captcha_check($value, $key = '')
    {
        if ($key) {
            return Captcha::check($value, $key);
        }
        return Captcha::check($value);
    }
}
