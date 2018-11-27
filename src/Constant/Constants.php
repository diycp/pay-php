<?php
/**
 *  +----------------------------------------------------------------------
 *  | ��ñ֧��ϵͳ [ WE CAN DO IT JUST THINK ]
 *  +----------------------------------------------------------------------
 *  | Copyright (c) 2018 http://www.iredcap.cn All rights reserved.
 *  +----------------------------------------------------------------------
 *  | Licensed ( https://www.apache.org/licenses/LICENSE-2.0 )
 *  +----------------------------------------------------------------------
 *  | Author: Brian Waring <BrianWaring98@gmail.com>
 *  +----------------------------------------------------------------------
 */
namespace IredCap\Pay\Constant;

/**
 * ͨ�ó���
 */
class Constants
{
	//ǩ���㷨HmacSha256
    const HMAC_SHA256 = "HmacSHA256";
	//ǩ���㷨RSA2
    const RSA2 = "RSA2";
    //����UTF-8
    const ENCODING = "UTF-8";
    //UserAgent
    const USER_AGENT = "Mozilla/4.0 (compatible; MSIE 7.0; Cmpay SDK SV1; Trident/4.0; SV1; .NET4.0C; .NET4.0E; SE 2.X MetaSr 1.0) ";
    //���з�
    const LF = "\n";
	//�ָ���1
    const SPE1 = ",";
    //�ָ���2
    const SPE2 = ":";
    //Ĭ������ʱʱ��,��λ����
    const DEFAULT_TIMEOUT = 1000;
    //����ǩ����ϵͳHeaderǰ׺,ֻ��ָ��ǰ׺��Header�Ż���뵽ǩ����
	const CA_HEADER_TO_SIGN_PREFIX_SYSTEM = "X-Ca-";
}