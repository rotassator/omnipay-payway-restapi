# Omnipay: PayWay REST API

**WestPac PayWay REST API driver for the Omnipay PHP payment processing library**

[![Latest Stable Version](https://poser.pugx.org/rotassator/omnipay-payway-restapi/v/stable)](https://packagist.org/packages/rotassator/omnipay-payway-restapi)
[![Total Downloads](https://poser.pugx.org/rotassator/omnipay-payway-restapi/downloads)](https://packagist.org/packages/rotassator/omnipay-payway-restapi)
[![License](https://poser.pugx.org/rotassator/omnipay-payway-restapi/license)](https://packagist.org/packages/rotassator/omnipay-payway-restapi)

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements PayWay REST API support for Omnipay.

This module aims to implement a usable subset of the [PayWay REST API](https://www.payway.com.au/rest-docs/index.html) (a product of Westpac Bank). The API is extensive, so the initial aim is to implement the following features:

* Create and maintain customers
* Create single-use tokens (Credit Card, Bank Account)
* Take payments using tokenised credit card details (aiding PCI compliance)
* Schedule regular payments

These initial features have now been implemented.

See the [official PayWay documentation](https://www.payway.com.au/rest-docs/index.html) for full details.

## Installation

Install the module using composer.

```
composer require rotassator/omnipay-payway-restapi
```

## Usage

### Take Payment

To take a one-time credit card payment.

```php
<?php

include 'vendor/autoload.php';

use Exception;
use Omnipay\Common\CreditCard;
use Omnipay\Omnipay;

$gateway = Omnipay::create('PaywayRest_DirectDebit');

$gateway->setApiKeyPublic('REPLACE');
$gateway->setApiKeySecret('REPLACE');
$gateway->setMerchantId('REPLACE');
$gateway->setTestMode(true);

try {
    $response = $gateway->createSingleUseCardToken([
        'card' => new CreditCard([
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'number' => '4564710000000004',
            'expiryMonth' => '02',
            'expiryYear' => '2019',
            'cvv' => '847',
        ]),
    ])->send();

    $singleUseTokenId = $response->getData('singleUseTokenId');

    if (empty($singleUseTokenId)) {
        // handle error
    }

    $request = $gateway->purchase([
        'singleUseTokenId' => $singleUseTokenId,
        'customerNumber' => 'AB1245',
        'principalAmount' => '10.00',
        'currency' => 'AUD',
        'orderNumber' => 12,
    ]);

    $response = $request->send();

    if ($response->isSuccessful()) {
        // update order
    }
} catch (Exception $e) {
    // handle error
}

// Example for creating single-use token with Bank Account
$response = $gateway->createSingleUseBankToken([
    'bankAccountBsb' => '999999',
    'bankAccountNumber' => '999999999',
    'bankAccountName' => 'Your Name',
])->send();

$singleUseTokenId = $response->getData('singleUseTokenId');
```
## Known Issue

[curl] 60: SSL certificate problem: unable to get local issuer certificate.

### Solution

[Download CA certificate](https://curl.haxx.se/docs/caextract.html) and place somewhere in your project root.

eg. project/certificate/cacert.pem

In the gateway initialization object do like below.

```php
$gateway = Omnipay::create('PaywayRest_DirectDebit');

$gateway->setApiKeyPublic('REPLACE');
$gateway->setApiKeySecret('REPLACE');
$gateway->setMerchantId('REPLACE');
$gateway->setTestMode(true);

$gateway->setSSLCertificatePath('path/cacert.pem');
```

## Contributing

Contributions are **welcome** and will be fully **credited**.

Contributions can be made via a pull request on [Github](https://github.com/rotassator/omnipay-payway-restapi).

## Support

If you are having general issues with the package, feel free to report it to us.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/rotassator/omnipay-payway-restapi/issues),
or better yet, fork the library and submit a pull request.
