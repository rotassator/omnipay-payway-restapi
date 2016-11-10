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
    /** @var string Endpoint URL */
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

    /**
     * Get Use Secret Key setting
     * @return bool Use secret API key if true
     */
    public function getUseSecretKey()
    {
        return $this->getParameter('use_secret_key');
    }

    /**
     * Set Use Secret Key setting
     * @param  string $value Flag to use secret key
     */
    public function setUseSecretKey($value)
    {
        return $this->setParameter('use_secret_key', $value);
    }

    /**
     * Get HTTP method
     * @return string HTTP method (GET, PUT, etc)
     */
    public function getHttpMethod()
    {
        return 'GET';
    }

    /**
     * Get request headers
     * @return array Request headers
     */
    public function getRequestHeaders()
    {
        return array();
    }

    /**
     * Send data request
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function sendData($data)
    {
        // enforce TLS >= v1.2 (https://www.payway.com.au/rest-docs/index.html#basics)
        $config = $this->httpClient->getConfig();
        $curlOptions = $config->get('curl.options');
        $curlOptions[CURLOPT_SSLVERSION] = 6;
        $config->set('curl.options', $curlOptions);
        $this->httpClient->setConfig($config);

        // don't throw exceptions for 4xx errors
        $this->httpClient->getEventDispatcher()->addListener(
            'request.error',
            function ($event) {
                if ($event['response']->isClientError()) {
                    $event->stopPropagation();
                }
            }
        );

        $request = $this->httpClient->createRequest(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            $this->getRequestHeaders(),
            $data
        );

        // get the appropriate API key
        $apikey = ($this->getUseSecretKey()) ? $this->getApiKeySecret() : $this->getApiKeyPublic();
        // send the request
        $response = $request
            ->setHeader('Authorization', 'Basic ' . base64_encode($apikey . ':'))
            ->send();

        $this->response = new Response($this, $response->json());

        if ($response->hasHeader('Request-Id')) {
            $this->response->setRequestId((string) $response->getHeader('Request-Id'));
        }

        return $this->response;
    }
}
