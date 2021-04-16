<?php

namespace Omnipay\PayDunya\Message\Response;

use Omnipay\Common\Message\AbstractResponse;

class PurchaseResponse extends AbstractResponse
{

    /**
     * Is the response successful?
     *
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return $this->getCode() === 0;
    }

    /**
     * Does the response require a redirect?
     *
     * @return bool
     */
    public function isRedirect(): bool
    {
        return array_key_exists('redirectUrl', $this->data);
    }

    public function getRedirectUrl()
    {
        return $this->data['redirectUrl'] ?? null;
    }

    /**
     * Response code
     *
     * @return int A response code from the payment gateway
     */
    public function getCode(): int
    {
        return (int)$this->data['errorCode'];
    }

    public function getMessage()
    {
        return $this->data['errorMessage'] ?? '';
    }

    public function getTransactionReference()
    {
        return $this->data['transactionReference'];
    }
}