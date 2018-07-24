<?php

/**
 * PaywayRest Create Single Use Bank Account Token Request
 */
namespace Omnipay\PaywayRest\Message;

/**
 * PaywayRest Create Single Use Bank Account Token Request
 *
 * @link https://www.payway.com.au/docs/rest.html#tokenise-a-bank-account
 */
class CreateSingleUseBankTokenRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('bankAccountBsb', 'bankAccountNumber', 'bankAccountName');

        return array(
            'paymentMethod' => 'bankAccount',
            'bsb' => $this->getBankAccountBsb(),
            'accountNumber' => $this->getBankAccountNumber(),
            'accountName' => $this->getBankAccountName(),
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
