<?php
/**
 * Created by PhpStorm.
 * User: fengruiming
 * Date: 2018/11/1
 * Time: 11:45
 */
namespace src;

use \src\account\Account;
use src\common\Tools;
use \src\contract\Contract;
use \src\blockchain\Transaction;
use \src\blockchain\Block;
use src\model\request\SDKConfigure;
use \src\token\Asset;

class SDK {
    static private $instance = null;
    static private $url = null;
    static private $configure = null;
    private function __construct() {
    }
    private function __clone() {
    }
    static public function getInstance($baseUrl) {
        if(!self::$instance instanceof self){
            self::$instance = new self();
            SDK::$configure = new SDKConfigure();
        }
        SDK::$url = $baseUrl;
        return self::$instance;
    }
    static public function getInstanceWithConfigure($sdkConfigure) {
        if(!self::$instance instanceof self){
            self::$instance = new self();
        }
        if (Tools::isEmpty(SDK::$configure)) {
            SDK::$configure = new SDKConfigure();
        }
        if (!Tools::isEmpty($sdkConfigure)) {
            SDK::$url = $sdkConfigure->getUrl();
            SDK::$configure->setUrl(SDK::$url);
            $timeOut = $sdkConfigure->getTimeOut();
            if (is_int($timeOut) && $timeOut > 0) {
                SDK::$configure->setTimeOut($timeOut);
            }
            $chainId = $sdkConfigure->getChainId();
            if (is_int($chainId) && $chainId > 0) {
                SDK::$configure->setChainId($chainId);
            }
        }
        return self::$instance;
    }
    static public function getUrl() {
        return SDK::$url;
    }
    static public function getConfigure() {
        return SDK::$configure;
    }
    public function getAccount() {
        return new Account();
    }
    public function getAsset() {
        return new Asset();
    }
    public function getContract() {
        return new Contract();
    }
    public function getTransaction() {
        return new Transaction();
    }
    public function getBlock() {
        return new Block();
    }
}