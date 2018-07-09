# Omnipay: PayWay REST API

**WestPac PayWay REST API driver for the Omnipay PHP payment processing library**

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
    $gateway->setTestMode('REPLACE');

    try {
        $response = $gateway->createSingleUseCardToken(array(
            'card' => new CreditCard(array(
                'firstName' => 'Sujip',
                'lastName' => 'Thapa',
                'number' => '4564710000000004',
                'expiryMonth' => '02',
                'expiryYear' => '2019',
                'cvv' => '847',
            )),
        ))->send();

        $singleUseTokenId = $response->getData('singleUseTokenId');
    } catch (Exception $e) {
        // handle error
    }

    if (empty($singleUseTokenId)) {
        // handle error
    }

    try {
        $request = $gateway->purchase(array(
            'singleUseTokenId' => $singleUseTokenId,
            'customerNumber' => 'AB1245',
            'principalAmount' => '10.00',
            'currency' => 'AUD',
            'orderNumber' => 12,
        ));

        $response = $request->send();

        if ($response->isSuccessful()) {
            // update order
            // showpayment success message
        }
    } catch (Exception $e) {
        // handle error
    }

```
