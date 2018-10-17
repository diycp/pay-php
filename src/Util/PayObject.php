<?php
/**
 *  +----------------------------------------------------------------------
 *  | 草帽支付系统 [ WE CAN DO IT JUST THINK ]
 *  +----------------------------------------------------------------------
 *  | Copyright (c) 2018 http://www.IredCap.cn All rights reserved.
 *  +----------------------------------------------------------------------
 *  | Licensed ( https://www.apache.org/licenses/LICENSE-2.0 )
 *  +----------------------------------------------------------------------
 *  | Author: Brian Waring <BrianWaring98@gmail.com>
 *  +----------------------------------------------------------------------
 */
namespace IredCap\Pay\Util;

use IredCap\Pay\exception\AuthorizationException;
use IredCap\Pay\exception\InvalidRequestException;
use IredCap\Pay\Pay;

class PayObject
{

    /**
     * 发起请求
     *
     * @author 勇敢的小笨羊 <brianwaring98@gmail.com>
     *
     * @param null $url
     * @param null $params
     * @return mixed
     * @throws AuthorizationException
     * @throws InvalidRequestException
     * @throws \IredCap\Pay\exception\Exception
     */
    protected static function _request($url = null, $params = null)
    {
        $opts = self::_validateParams($params);
        Log::Init();
        Log::DEBUG('Params :'.json_encode($params));
        $respose = new HttpService();
        if (empty($opts)){
            return $respose->get($url, null, 5);
        }else {
            return $respose->post($url, $opts, 5);
        }
    }

    /**
     * 数据检查
     *
     * @author 勇敢的小笨羊 <brianwaring98@gmail.com>
     *
     * @param $options
     * @return mixed
     * @throws AuthorizationException
     * @throws InvalidRequestException
     */
    private static function _validateParams($options)
    {
        //参数填充
        if (!array_key_exists('mchid', $options)) {
            $options['mchid'] = Pay::getMchId();
        }
        if (!array_key_exists('return_url', $options)) {
            $options['return_url'] = Pay::getReturnUrl();
        }
        if (!array_key_exists('notify_url', $options)) {
            $options['notify_url'] =Pay::getNotifyUrl();
        }
        if (!array_key_exists('client_ip', $options)) {
            $options['client_ip'] = $_SERVER['REMOTE_ADDR'];
        }

        if (empty(Pay::getPrivateKeyPath())){
            throw new InvalidRequestException("The Path of RSA Private Key can not be blank.");
        }

        if (empty(Pay::getPayPublicKeyPath())){
            throw new AuthorizationException("The Path of Yubei Public Key can not be blank.");
        }
        return $options;

    }
}