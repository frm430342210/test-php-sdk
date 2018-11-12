<?php
/**
 * @author zjl <[<email address>]>
 */
namespace src\model\response\result\data;
class TransactionInfo {
    public  $source_address;
    public  $fee_limit;
    public  $gas_price;
    public  $nonce;
    public  $ceil_ledger_seq;
    public  $metadata;
    /**
     * @var \src\model\response\result\data\Operation[]
     */
    public  $operations;
}
?>