<?php

namespace Omnipay\PaywayRest;

/**
 * PayWay Direct Debit gateway
 *
 * Bank account based transactions are essentially the same as for credit cards,
 * passing a single-use token as payment authorisation. Include bankAccountForm.js
 * on the front end to generate the single-use token.
 * @see Omnipay\PaywayRest\Gateway
 * @link https://www.payway.com.au/rest-docs/index.html#tokenise-from-web-page
 */
class DirectDebitGateway extends Gateway
{
    public function getName()
    {
        return 'Westpac PayWay Direct Debit';
    }
}
