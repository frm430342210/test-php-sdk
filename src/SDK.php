<?php
/**
 * Created by PhpStorm.
 * User: fengruiming
 * Date: 2018/11/1
 * Time: 11:45
 */
namespace src;

use \src\common\General;
use \src\account\Account;
use \src\contract\Contract;
use \src\blockchain\Transaction;
use \src\blockchain\Block;
use \src\token\Asset;

class SDK {
    static private $instance;
    private function __construct($baseUrl) {
        General::$url = $baseUrl;
    }
    private function __clone() {
    }
    static public function getInstance($baseUrl) {
        if(!self::$instance instanceof self){
            self::$instance = new self($baseUrl);
        }
        return self::$instance;
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