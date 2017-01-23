<?php
/**
 * PaywayRest Transaction Detail Request
 */
namespace Omnipay\PaywayRest\Message;

/**
 * PaywayRest Transaction Detail Request
 *
 * @link https://www.payway.com.au/rest-docs/index.html#get-transaction-details
 */
class TransactionDetailRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate(
            'transactionId'
        );

        return $data = array();
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/transactions/' . $this->getTransactionId();
    }

    public function getHttpMethod()
    {
        return 'GET';
    }

    public function getUseSecretKey()
    {
        return true;
    }
}
