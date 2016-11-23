<?php
/**
 * PaywayRest Update Customer Contact Request
 */
namespace Omnipay\PaywayRest\Message;

/**
 * PaywayRest Update Customer Contact Request
 *
 * @link https://www.payway.com.au/rest-docs/index.html#update-contact-details
 */
class UpdateCustomerContactRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate(
            'customerNumber'
        );

        $data = $this->addToData(array(), array(
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
        return $this->endpoint . '/customers/' . $this->getCustomerNumber() . '/contact';
    }

    public function getHttpMethod()
    {
        return 'PUT';
    }

    public function getUseSecretKey()
    {
        return true;
    }
}
