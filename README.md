# Omnipay: PayWay REST API

**WestPac PayWay REST API driver for the Omnipay PHP payment processing library**

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements PayWay REST API support for Omnipay.

This module aims to implement a usable subset of the [PayWay REST API](https://www.payway.com.au/rest-docs/index.html) (a product of Westpac Bank). The API is extensive, so the initial aim is to implement the following features:

* create and maintain customers
* generate single-use tokens
* take payments using tokenised credit card details (aiding PCI compliance)
* schedule regular payments

These initial features have now been implemented.

See the [official PayWay documentation](https://www.payway.com.au/rest-docs/index.html) for full details.

