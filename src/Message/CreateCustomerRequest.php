<?php

/**
 * PaywayRest Create Customer Request
 */
namespace Omnipay\PaywayRest\Message;

/**
 * PaywayRest Create Customer Request
 *
 * @link https://www.payway.com.au/rest-docs/index.html#create-a-customer
 */
class CreateCustomerRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('singleUseTokenId', 'merchantId');

        $data = array(
            'singleUseTokenId' => $this->getSingleUseTokenId(),
            'merchantId'       => $this->getMerchantId(),
        );

        $this->addToData($data, array(
            'orderNumber',
            'customerName',
            'emailAddress',
            'sendEmailReceipts',
            'phoneNumber',
            'street1',
            'street2',
            'cityName',
            'state',
            'postalCode',
        ));

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/customers';
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
