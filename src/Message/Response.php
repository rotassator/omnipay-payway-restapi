<?php
/**
 * PayWayRest Response
 */
namespace Omnipay\PaywayRest\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * PaywayRest Response
 *
 * Response class for all PaywayRest requests
 * @see \Omnipay\PaywayRest\Gateway
 */
class Response extends AbstractResponse
{
    /** @var string Request ID */
    protected $requestId = null;
    /** @var string HTTP Response Code */
    protected $responseCode = null;

    /**
     * Is the transaction successful?
     * @return boolean True if successful
     */
    public function isSuccessful()
    {
        return $this->getData('status') && in_array($this->getData('status'), array(
            'approved',
            'approved*',
        ));
    }

    /**
     * Get Transaction ID
     * @return string|null
     */
    public function getTransactionId()
    {
        return $this->getData('transactionId');
    }

    /**
     * Get Customer Number
     * @return string|null
     */
    public function getCustomerNumber()
    {
        return $this->getData('customerNumber');
    }

    /**
     * Get Contact details
     * @return array Customer contact
     */
    public function getContact()
    {
        return $this->getData('contact');
    }

    /**
     * Get response data, optionally by key
     * @param  string       $key Data array key
     * @return string|array      Response data item or all data if no key specified
     */
    public function getData($key = null)
    {
        if ($key) {
            return isset($this->data[$key]) ? $this->data[$key] : null;
        }
        return $this->data;
    }

    /**
     * Get error data from response
     * @param  string       $key Optional data key
     * @return string|array      Response error item or all data if no key
     */
    public function getErrorData($key = null)
    {
        if ($this->isSuccessful()) {
            return null;
        }
        // get error data (array in data)
        $data = isset($this->getData('data')[0]) ? $this->getData('data')[0] : null;
        if ($key) {
            return isset($data[$key]) ? $data[$key] : null;
        }
        return $data;
    }

    /**
     * Get error message from the response
     * @return string|null Error message or null if successful
     */
    public function getMessage()
    {
        return $this->getErrorData('message');
    }

    /**
     * Get field name in error from the response
     * @return string|null Error message or null if successful
     */
    public function getErrorFieldName()
    {
        return $this->getErrorData('fieldName');
    }

    /**
     * Get field value in error from the response
     * @return string|null Error message or null if successful
     */
    public function getErrorFieldValue()
    {
        return $this->getErrorData('fieldValue');
    }

    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * Set request id
     * @return AbstractRequest provides a fluent interface.
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    /**
     * Get HTTP Response Code
     * @return string
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * Set HTTP Response Code
     * @parm string Response Code
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;
    }
}
