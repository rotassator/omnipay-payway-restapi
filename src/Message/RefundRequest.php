<?php

/**
 * PaywayRest Refund Request
 */
namespace Omnipay\PaywayRest\Message;

/**
 * PaywayRest Refund Request
 *
 * @see \Omnipay\PaywayRest\Gateway
 * @link https://www.payway.com.au/rest-docs/index.html#refund-a-payment
 */
class RefundRequest extends TransactionRequest
{
    public function getData()
    {
        $this->validate(
            'parentTransactionId',
            'principalAmount'
        );

        $data = array(
            'transactionType'     => 'refund',
            'parentTransactionId' => $this->getTransactionReference(),
            'principalAmount'     => $this->getAmount(),
        );

        if ($this->getOrderNumber()) {
            $data['orderNumber'] = $this->getOrderNumber();
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/transactions';
    }

    public function getHttpMethod()
    {
        return 'POST';
    }

    public function getUseSecretKey()
    {
        return true;
    }
}
