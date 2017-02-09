<?php
/**
 * PaywayRest Customer Detail Request
 */
namespace Omnipay\PaywayRest\Message;

/**
 * PaywayRest Customer Detail Request
 *
 * @link https://www.payway.com.au/rest-docs/index.html#get-customer-details
 */
class CustomerDetailRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate(
            'customerNumber'
        );

        return $data = array();
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/customers/' . $this->getCustomerNumber();
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
