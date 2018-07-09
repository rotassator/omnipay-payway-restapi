<?php

/**
 * PaywayRest Create Customer Request
 */
namespace Omnipay\PaywayRest\Message;

/**
 * PaywayRest Create Customer Request
 *
 * @link https://www.payway.com.au/docs/rest.html#tokenise-a-bank-account
 */
class CreateSingleUseBankTokenRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('bsb', 'accountNumber', 'accountName');

        return array(
            'paymentMethod' => 'bankAccount',
            'bsb' => $this->getBankAccountId(),
            'accountNumber' => $this->getBankAccountNumber(),
            'accountName' => $this->getCustomerName(),
        );
    }

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint . '/single-use-tokens';
    }

    public function getHttpMethod()
    {
        return 'POST';
    }
}
