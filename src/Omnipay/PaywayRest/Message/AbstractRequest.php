<?php
/**
 * PaywayRest Abstract Request.
 */
namespace Omnipay\PaywayRest\Message;

/**
 * PayWay REST API Abstract Request.
 *
 * This is the parent class for all PayWay requests.
 *
 * @todo Add usage documention, including live and test details
 *
 * @see \Omnipay\PaywayRest\Gateway
 * @link https://www.payway.com.au/rest-docs/index.html
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    /**
     * Live or Test Endpoint URL.
     *
     * @var string URL
     */
    protected $endpoint = 'https://api.payway.com.au/rest/v1';

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
}
