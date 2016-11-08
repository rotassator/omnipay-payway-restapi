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
            'apikey_public' => '',
            'apikey_secret' => '',
            'merchant' => ''
        );
    }

    public function getApiKeyPublic()
    {
        return $this->getParameter('apikey_public');
    }

    public function setApiKeyPublic($apikey_public)
    {
        return $this->setParameter('apikey_public', $apikey_public);
    }

    public function getApiKeySecret()
    {
        return $this->getParameter('apikey_secret');
    }

    public function setApiKeySecret($apikey_secret)
    {
        return $this->setParameter('apikey_secret', $apikey_secret);
    }

    public function getMerchant()
    {
        return $this->getParameter('merchant');
    }

    public function setMerchant($merchant)
    {
        return $this->setParameter('merchant', $merchant);
    }
}
