<?php

/**
 * PaywayRest Create Customer Request
 */
namespace Omnipay\PaywayRest\Message;

/**
 * PaywayRest Create Customer Request
 *
 * @link https://www.payway.com.au/docs/rest.html#tokenise-a-credit-card
 */
class CreateSingleUseCardTokenRequest extends AbstractRequest
{
    public function getData()
    {
        $this->getCard()->validate();

        return array(
            'paymentMethod' => 'creditCard',
            'cardNumber' => $this->getCard()->getNumber(),
            'cardholderName' => $this->getCard()->getName(),
            'cvn' => $this->getCard()->getCvv(),
            'expiryDateMonth' => $this->getCard()->getExpiryMonth(),
            'expiryDateYear' => $this->getCard()->getExpiryYear(),
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
