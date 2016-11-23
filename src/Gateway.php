<?php

namespace Omnipay\PaywayRest;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Westpac PayWay';
    }

    public function getDefaultParameters()
    {
        return array(
            'apiKeyPublic' => '',
            'apiKeySecret' => '',
            'merchantId'   => '',
            'useSecretKey' => false,
        );
    }

    /**
     * Get API publishable key
     * @return string
     */
    public function getApiKeyPublic()
    {
        return $this->getParameter('apiKeyPublic');
    }

    /**
     * Set API publishable key
     * @param  string $value API publishable key
     */
    public function setApiKeyPublic($value)
    {
        return $this->setParameter('apiKeyPublic', $value);
    }

    /**
     * Get API secret key
     * @return string
     */
    public function getApiKeySecret()
    {
        return $this->getParameter('apiKeySecret');
    }

    /**
     * Set API secret key
     * @param  string $value API secret key
     */
    public function setApiKeySecret($value)
    {
        return $this->setParameter('apiKeySecret', $value);
    }

    /**
     * Get Merchant
     * @return string Merchant ID
     */
    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    /**
     * Set Merchant
     * @param  string $value Merchant ID
     */
    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    /**
     * Test the PayWay gateway
     * @param  array  $parameters Request parameters
     * @return \Omnipay\PaywayRest\Message\CheckNetworkRequest
     */
    public function testGateway(array $parameters = array())
    {
        return $this->createRequest(
            '\Omnipay\PaywayRest\Message\CheckNetworkRequest',
            $parameters
        );
    }

    /**
     * Purchase request
     *
     * @param array $parameters
     * @return \Omnipay\PaywayRest\Message\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        /** @todo create customer before payment if none supplied */
        return $this->createRequest('\Omnipay\PaywayRest\Message\PurchaseRequest', $parameters);
    }

    /**
     * Create Customer
     *
     * @param array $parameters
     * @return \Omnipay\PaywayRest\Message\CreateCustomerRequest
     */
    public function createCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PaywayRest\Message\CreateCustomerRequest', $parameters);
    }

    /**
     * Update Customer contact details
     *
     * @param array $parameters
     * @return \Omnipay\PaywayRest\Message\UpdateCustomerContactRequest
     */
    public function updateCustomerContact(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PaywayRest\Message\UpdateCustomerContactRequest', $parameters);
    }
}
