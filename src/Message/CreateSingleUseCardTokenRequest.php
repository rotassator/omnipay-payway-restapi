<?php

/**
 * PaywayRest Create Single Use Card Token Request
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

        // PayWay requires two digit expiry month.
        $expiryDateMonth = $this->getCard()->getExpiryMonth() > 9
            ? $this->getCard()->getExpiryMonth()
            : '0'.$this->getCard()->getExpiryMonth();

        return array(
            'paymentMethod' => 'creditCard',
            'cardNumber' => $this->getCard()->getNumber(),
            'cardholderName' => $this->getCard()->getName(),
            'cvn' => $this->getCard()->getCvv(),
            'expiryDateMonth' => $expiryDateMonth,
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
