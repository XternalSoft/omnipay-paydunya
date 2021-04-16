<?php

namespace Omnipay\PayDunya\Message\Request;

use Omnipay\Common\Message\ResponseInterface;
use Omnipay\PayDunya\Message\Response\PurchaseResponse;
use Paydunya\Checkout\CheckoutInvoice;
use Paydunya\Checkout\Store;

class PurchaseRequest extends PaydunyaRequest
{

    public function createResponse($data): ResponseInterface
    {
        return new PurchaseResponse($this, $data);
    }

    public function sendData($data): ResponseInterface
    {

        Store::setName($this->getParameter('storeName'));
        Store::setWebsiteUrl($this->getParameter('websiteUrl'));
        Store::setLogoUrl($this->getParameter('logoUrl'));

        Store::setReturnUrl($this->getParameter('returnUrl'));
        Store::setCancelUrl($this->getParameter('cancelUrl'));
        if ($this->getParameter('notifyUrl')) {
            Store::setCallbackUrl($this->getParameter('notifyUrl'));
        }

        $invoice = new CheckoutInvoice();

        $customData = $this->getParameter('customData');
        if ($customData !== null) {
            foreach ($customData as $customDataName => $customDataValue) {
                $invoice->addCustomData($customDataName, $customDataValue);
            }
        }
        $invoice->setTotalAmount($this->getAmount());

        if ($invoice->create()) {
            return $this->createResponse(
                [
                    'errorCode' => 0,
                    'redirectUrl' => $invoice->getInvoiceUrl(),
                    'transactionReference' => $invoice->token
                ]
            );
        }

        return $this->createResponse(
            ['errorCode' => $invoice->response_code, 'errorMessage' => $invoice->response_text]
        );
    }
}