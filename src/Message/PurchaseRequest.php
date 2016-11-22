<?php

/**
 * PaywayRest Purchase Request
 */
namespace Omnipay\PaywayRest\Message;

/**
 * PaywayRest Purchase Request
 *
 * @see \Omnipay\PaywayRest\Gateway
 * @link https://www.payway.com.au/rest-docs/index.html#process-a-payment
 */
class PurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate(
            'customerNumber',
            'transactionType',
            'principalAmount',
            'currency'
        );

        $data = array(
            'customerNumber'  => $this->getCustomerNumber(),
            'transactionType' => $this->getTransactionType(),
            'principalAmount' => $this->getPrincipalAmount(),
            'currency'        => $this->getCurrency(),
        );

        if ($this->getOrderNumber()) {
            $data['orderNumber'] = $this->getOrderNumber();
        }
        if ($this->getMerchantId()) {
            $data['merchantId'] = $this->getMerchantId();
        }
        if ($this->getBankAccountId()) {
            $data['bankAccountId'] = $this->getBankAccountId();
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/charges';
    }
}
