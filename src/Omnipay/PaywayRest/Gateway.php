<?php

namespace Omnipay\PaywayRest;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\GatewayInterface;

class Gateway extends AbstractGateway implements GatewayInterface
{
    public function getName()
    {
        return 'Westpac PayWay';
    }

    public function getDefaultParameters()
    {
        return array(
            'apikey_public'  => '',
            'apikey_secret'  => '',
            'merchant'       => '',
            'use_secret_key' => false,
        );
    }

    /**
     * Get API publishable key
     * @return string
     */
    public function getApiKeyPublic()
    {
        return $this->getParameter('apikey_public');
    }

    /**
     * Set API publishable key
     * @param  string $value API publishable key
     */
    public function setApiKeyPublic($value)
    {
        return $this->setParameter('apikey_public', $value);
    }

    /**
     * Get API secret key
     * @return string
     */
    public function getApiKeySecret()
    {
        return $this->getParameter('apikey_secret');
    }

    /**
     * Set API secret key
     * @param  string $value API secret key
     */
    public function setApiKeySecret($value)
    {
        return $this->setParameter('apikey_secret', $value);
    }

    /**
     * Get Merchant
     * @return string Merchant ID
     */
    public function getMerchant()
    {
        return $this->getParameter('merchant');
    }

    /**
     * Set Merchant
     * @param  string $value Merchant ID
     */
    public function setMerchant($value)
    {
        return $this->setParameter('merchant', $value);
    }

    /**
     * Test the PayWay gateway
     * @param  array  $parameters Request parameters
     * @return \Omnipay\PaywayRest\Message\CheckNetworkRequest
     */
    public function testGateway(array $parameters = array()) {
        return $this->createRequest(
            '\Omnipay\PaywayRest\Message\CheckNetworkRequest',
            $parameters
        );
    }
}
