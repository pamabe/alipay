<?php

/**
 *   支付配置
 *
 * User: pamabe
 * Date: 2020/4/14
 * Time: 17:11
 */

namespace Alipay;
use  Alipay\aop\AopClient;

class AliPayConfig {
    //appId
    private $appId = "xxxxxx";
    //签名类型
    private $signType = "RSA2";
    //编码格式
    private $charset = "UTF-8";
    private $postCharset = "UTF-8";
    //数据交互格式
    private $format = "json";
    //商家应用私钥
    private $rsaPrivateKey = "";
    //支付宝公钥
    private $alipayrsaPublicKey = "";
    //apiVersion
    private $apiVersion = "1.0";

    //初始化
    public function __construct(){
        $this->setRsaPrivateKey();
        $this->setAlipayrsaPublicKey();
    }

    public function initAopClient(){
        $aop = new AopClient();
        $aop->gatewayUrl = "https://openapi.alipay.com/gateway.do";
        $aop->appId = $this->appId;
        $aop->rsaPrivateKey = $this->rsaPrivateKey;

        $aop->format = $this->format;
        $aop->charset = $this->charset;
        $aop->signType = $this->signType;
        $aop->alipayrsaPublicKey = $this->alipayrsaPublicKey;

        return $aop;
    }

    public function initQueryAopClient(){
	    $aop = new AopClient();
        $aop->gatewayUrl = "https://openapi.alipay.com/gateway.do";
        $aop->appId = $this->appId;
        $aop->rsaPrivateKey = $this->rsaPrivateKey;
	    $aop->apiVersion = $this->apiVersion;
        $aop->format = $this->format;
        $aop->postCharset = $this->charset;
        $aop->signType = $this->signType;
        $aop->alipayrsaPublicKey = $this->alipayrsaPublicKey;

	    return $aop;
    }
    
    public function notInitAopClient(){
        $aop = new AopClient();
        $aop->alipayrsaPublicKey = $this->alipayrsaPublicKey;
        return $aop;
    }
    //获取appId
    public function getAppId(){
	    return $this->appId;
    }
    //获取商家私钥
    public function getRsaPrivateKey(){
	    return $this->rsaPrivateKey;
    }
    //获取支付宝公钥
    public function getAlipayrsaPublicKey(){
	    return $this->alipayrsaPublicKey;
    }
    //设置商家私钥
    public function setRsaPrivateKey(){
	    $this->rsaPrivateKey = trim(file_get_contents(__DIR__ . "/config/rsaPrivateKey.pem"));
    }	
    //设置支付宝公钥
    public function setAlipayrsaPublicKey(){
	    $this->alipayrsaPublicKey = trim(file_get_contents(__DIR__ . "/config/alipayrsaPublicKey.pem"));
    }

}
    
?>
