<?php
/**
 * PayWayRest Response
 */
namespace Omnipay\PaywayRest\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\ResponseInterface;

/**
 * PayWayRest Response
 *
 * @see \Omnipay\PaywayRest\Gateway
 */
class Response extends AbstractResponse implements ResponseInterface
{
    /**
     * Is the transaction successful?
     * @return boolean True if successful
     */
    public function isSuccessful()
    {
        return !isset($this->data['message']);
    }

    /**
     * Get response error message
     * @return string Error message
     */
    public function getMessage()
    {
        return !$this->isSuccessful() ? $this->data['message'] : '';
    }

    /**
     * Get response data
     * @return array Array of data
     */
    public function getData()
    {
        return $this->data;
    }
}
