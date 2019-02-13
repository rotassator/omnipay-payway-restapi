<?php
/**
 * PaywayRest Abstract Request.
 */
namespace Omnipay\PaywayRest\Message;

use Omnipay\PaywayRest\Helper\Uuid;

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
     * Get Use Secret Key setting
     * @return bool Use secret API key if true
     */
    public function getUseSecretKey()
    {
        return $this->getParameter('useSecretKey');
    }

    /**
     * Set Use Secret Key setting
     * @param  string $value Flag to use secret key
     */
    public function setUseSecretKey($value)
    {
        return $this->setParameter('useSecretKey', $value);
    }

    /**
     * Get single-use token
     * @return string Token key
     */
    public function getSingleUseTokenId()
    {
        return $this->getParameter('singleUseTokenId');
    }

    /**
     * Set single-use token
     * @param  string $value Token Key
     */
    public function setSingleUseTokenId($value)
    {
        return $this->setParameter('singleUseTokenId', $value);
    }

    /**
     * Get Idempotency Key
     * @return string Idempotency Key
     */
    public function getIdempotencyKey()
    {
        return $this->getParameter('idempotencyKey') ?: Uuid::create();
    }

    /**
     * Set Idempotency Key
     * @param  string $value Idempotency Key
     */
    public function setIdempotencyKey($value)
    {
        return $this->setParameter('idempotencyKey', $value);
    }

    public function getCustomerNumber()
    {
        return $this->getParameter('customerNumber');
    }

    public function setCustomerNumber($value)
    {
        return $this->setParameter('customerNumber', $value);
    }

    public function getTransactionType()
    {
        return $this->getParameter('transactionType');
    }

    public function setTransactionType($value)
    {
        return $this->setParameter('transactionType', $value);
    }

    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }

    public function getPrincipalAmount()
    {
        return $this->getParameter('principalAmount');
    }

    public function setPrincipalAmount($value)
    {
        return $this->setParameter('principalAmount', $value);
    }

    public function getCurrency()
    {
        // PayWay expects lowercase currency values
        return ($this->getParameter('currency'))
            ? strtolower($this->getParameter('currency'))
            : null;
    }

    public function setCurrency($value)
    {
        return $this->setParameter('currency', $value);
    }

    public function getOrderNumber()
    {
        return $this->getParameter('orderNumber');
    }

    public function setOrderNumber($value)
    {
        return $this->setParameter('orderNumber', $value);
    }

    public function getBankAccountId()
    {
        return $this->getParameter('bankAccountId');
    }

    public function setBankAccountId($value)
    {
        return $this->setParameter('bankAccountId', $value);
    }

    public function getBankAccountBsb()
    {
        return $this->getParameter('bankAccountBsb');
    }

    public function setBankAccountBsb($value)
    {
       return $this->setParameter('bankAccountBsb', $value);
    }

    public function getBankAccountNumber()
    {
        return $this->getParameter('bankAccountNumber');
    }

    public function setBankAccountNumber($value)
    {
        return $this->setParameter('bankAccountNumber', $value);
    }

    public function getBankAccountName()
    {
        return $this->getParameter('bankAccountName');
    }

    public function setBankAccountName($value)
    {
        return $this->setParameter('bankAccountName', $value);
    }

    public function getCustomerName()
    {
        return $this->getParameter('customerName');
    }

    public function setCustomerName($value)
    {
        return $this->setParameter('customerName', $value);
    }

    public function getEmailAddress()
    {
        return $this->getParameter('emailAddress');
    }

    public function setEmailAddress($value)
    {
        return $this->setParameter('emailAddress', $value);
    }

    public function getSendEmailReceipts()
    {
        return $this->getParameter('sendEmailReceipts');
    }

    public function setSendEmailReceipts($value)
    {
        return $this->setParameter('sendEmailReceipts', $value);
    }

    public function getPhoneNumber()
    {
        return $this->getParameter('phoneNumber');
    }

    public function setPhoneNumber($value)
    {
        return $this->setParameter('phoneNumber', $value);
    }

    public function getStreet1()
    {
        return $this->getParameter('street1');
    }

    public function setStreet1($value)
    {
        return $this->setParameter('street1', $value);
    }

    public function getStreet2()
    {
        return $this->getParameter('street2');
    }

    public function setStreet2($value)
    {
        return $this->setParameter('street2', $value);
    }

    public function getCityName()
    {
        return $this->getParameter('cityName');
    }

    public function setCityName($value)
    {
        return $this->setParameter('cityName', $value);
    }

    public function getState()
    {
        return $this->getParameter('state');
    }

    public function setState($value)
    {
        return $this->setParameter('state', $value);
    }

    public function getPostalCode()
    {
        return $this->getParameter('postalCode');
    }
    public function setPostalCode($value)
    {
        return $this->setParameter('postalCode', $value);
    }

    public function getTransactionReference()
    {
        return $this->getParameter('transactionReference');
    }

    public function setTransactionReference($value)
    {
        return $this->setParameter('transactionReference', $value);
    }

    public function getTransactionId()
    {
        return $this->getParameter('transactionId');
    }

    public function setTransactionId($value)
    {
        return $this->setParameter('transactionId', $value);
    }

    public function getFrequency()
    {
        return $this->getParameter('frequency') ?: 'once';
    }

    public function setFrequency($value)
    {
        return $this->setParameter('frequency', $value);
    }

    public function getNextPaymentDate()
    {
        // default to today's date
        return $this->getParameter('nextPaymentDate') ?: date('j M Y');
    }

    public function setNextPaymentDate($value)
    {
        return $this->setParameter('nextPaymentDate', $value);
    }

    public function getRegularPrincipalAmount()
    {
        return $this->getParameter('regularPrincipalAmount');
    }

    public function setRegularPrincipalAmount($value)
    {
        return $this->setParameter('regularPrincipalAmount', $value);
    }

    public function getNextPrincipalAmount()
    {
        return $this->getParameter('nextPrincipalAmount');
    }

    public function setNextPrincipalAmount($value)
    {
        return $this->setParameter('nextPrincipalAmount', $value);
    }

    public function getNumberOfPaymentsRemaining()
    {
        return $this->getParameter('numberOfPaymentsRemaining');
    }

    public function setNumberOfPaymentsRemaining($value)
    {
        return $this->setParameter('numberOfPaymentsRemaining', $value);
    }

    public function getFinalPrincipalAmount()
    {
        return $this->getParameter('finalPrincipalAmount');
    }

    public function setFinalPrincipalAmount($value)
    {
        return $this->setParameter('finalPrincipalAmount', $value);
    }

    public function setSSLCertificatePath($value)
    {
        return $this->setParameter('sslCertificatePath', $value);
    }

    public function getSSLCertificatePath()
    {
        return $this->getParameter('sslCertificatePath');
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
        // common headers
        $headers = array(
            'Accept' => 'application/json',
        );

        // set content type
        if ($this->getHttpMethod() !== 'GET') {
            $headers['Content-Type']    = 'application/x-www-form-urlencoded';
        }

        // prevent duplicate POSTs
        if ($this->getHttpMethod() === 'POST') {
            $headers['Idempotency-Key'] = $this->getIdempotencyKey();
        }

        return $headers;
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

        if ($this->getSSLCertificatePath()) {
            $this->httpClient->setSslVerification($this->getSSLCertificatePath());
        }

        $request = $this->httpClient->createRequest(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            $this->getRequestHeaders(),
            $data
        );

        // get the appropriate API key
        $apikey = ($this->getUseSecretKey()) ? $this->getApiKeySecret() : $this->getApiKeyPublic();
        $request->setHeader('Authorization', 'Basic ' . base64_encode($apikey . ':'));

        // send the request
        $response = $request->send();

        $this->response = new Response($this, $response->json());

        // save additional info
        $this->response->setHttpResponseCode($response->getStatusCode());
        $this->response->setTransactionType($this->getTransactionType());

        return $this->response;
    }

    /**
     * Add multiple parameters to data
     * @param array $data  Data array
     * @param array $parms Parameters to add to data
     */
    public function addToData(array $data = array(), array $parms = array())
    {
        foreach ($parms as $parm) {
            $getter = 'get' . ucfirst($parm);
            if (method_exists($this, $getter) && $this->$getter()) {
                $data[$parm] = $this->$getter();
            }
        }

        return $data;
    }
}
