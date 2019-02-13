<?php
namespace Omnipay\PaywayRest;

use Omnipay\Common\AbstractGateway;

/**
 * PayWay Credit Card gateway
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Westpac PayWay Credit Card';
    }

    public function getDefaultParameters()
    {
        return array(
            'apiKeyPublic' => '',
            'apiKeySecret' => '',
            'merchantId'   => '',
            'useSecretKey' => false,
        );
    }

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
     * Set SSL Certificate Path
     * @param  string $value SSL Certificate Path
     */
    public function setSSLCertificatePath($value)
    {
        return $this->setParameter('sslCertificatePath', $value);
    }

    /**
     * Get SSL Certificate Path
     * @return string SSL Certificate Path
     */
    public function getSSLCertificatePath()
    {
        return $this->getParameter('sslCertificatePath');
    }

    /**
     * Test the PayWay gateway
     * @param  array  $parameters Request parameters
     * @return \Omnipay\PaywayRest\Message\CheckNetworkRequest
     */
    public function testGateway(array $parameters = array())
    {
        return $this->createRequest(
            '\Omnipay\PaywayRest\Message\CheckNetworkRequest',
            $parameters
        );
    }

    /**
     * Purchase request
     *
     * @param array $parameters
     * @return \Omnipay\PaywayRest\Message\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        /** @todo create customer before payment if none supplied */

        // schedule regular payment
        if (isset($parameters['frequency']) && $parameters['frequency'] !== 'once') {
            return $this->createRequest('\Omnipay\PaywayRest\Message\RegularPaymentRequest', $parameters);
        }

        // process once-off payment
        return $this->createRequest('\Omnipay\PaywayRest\Message\PurchaseRequest', $parameters);
    }

    /**
     * Create singleUseTokenId with a CreditCard
     *
     * @param array $parameters
     * @return \Omnipay\PaywayRest\Message\CreateSingleUseCardTokenRequest
     */
    public function createSingleUseCardToken(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PaywayRest\Message\CreateSingleUseCardTokenRequest', $parameters);
    }

    /**
     * Create singleUseTokenId with a Bank Account
     *
     * @param array $parameters
     * @return \Omnipay\PaywayRest\Message\CreateSingleUseBankTokenRequest
     */
    public function createSingleUseBankToken(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PaywayRest\Message\CreateSingleUseBankTokenRequest', $parameters);
    }

    /**
     * Create Customer
     *
     * @param array $parameters
     * @return \Omnipay\PaywayRest\Message\CreateCustomerRequest
     */
    public function createCustomer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PaywayRest\Message\CreateCustomerRequest', $parameters);
    }

    /**
     * Update Customer contact details
     *
     * @param array $parameters
     * @return \Omnipay\PaywayRest\Message\UpdateCustomerContactRequest
     */
    public function updateCustomerContact(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PaywayRest\Message\UpdateCustomerContactRequest', $parameters);
    }

    /**
     * Get Customer details
     * @param  array  $parameters
     * @return \Omnipay\PaywayRest\Message\CustomerDetailRequest
     */
    public function getCustomerDetails(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PaywayRest\Message\CustomerDetailRequest', $parameters);

    }

    /**
     * Get Transaction details
     * @param  array  $parameters
     * @return \Omnipay\PaywayRest\Message\TransactionDetailRequest
     */
    public function getTransactionDetails(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PaywayRest\Message\TransactionDetailRequest', $parameters);

    }

    /**
     * Get List of Merchants
     * @param array $parameters
     * @return \Omnipay\PaywayRest\Message\MerchantListRequest
     */
    public function getMerchants(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PaywayRest\Message\MerchantListRequest', $parameters);
    }

    /**
     * Get List of Bank Accounts
     * @param array $parameters
     * @return \Omnipay\PaywayRest\Message\BankAccountListRequest
     */
    public function getBankAccounts(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PaywayRest\Message\BankAccountListRequest', $parameters);
    }
}
