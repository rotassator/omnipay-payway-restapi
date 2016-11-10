<?php

/**
 * PayWayRest check network
 */
namespace Omnipay\PaywayRest\Message;

/**
 * PayWayRest check network
 *
 * Check network connectivity to PayWay REST API.
 *
 * @link https://www.payway.com.au/rest-docs/index.html#use-curl-to-check-network
 */
class CheckNetworkRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('token');

        $data = array();

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }
}
