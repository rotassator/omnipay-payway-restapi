<?php

namespace Omnipay\PaywayRest;

use Omnipay\Tests\GatewayTestCase;

/**
 * Test PayWay REST API gateway
 */
class GatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testAuthenticate()
    {
        $this->markTestIncomplete('Test not implemented yet');
    }
}
