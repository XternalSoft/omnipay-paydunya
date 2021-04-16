<?php

namespace Omnipay\PayDunya\Message\Request;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\ResponseInterface;

class CompletePurchase extends PaydunyaRequest
{

    public function getData(): array
    {
        $data = $this->getParameter('ipnData');
        if (hash('sha512', $this->getParameter('masterKey')) !== $data['hash']) {
            throw new InvalidRequestException('hash mismatch');
        }
        return $data;
    }

    public function sendData($data): ResponseInterface
    {
        return $this->response = new \Omnipay\PayDunya\Message\Response\CompletePurchase($this, $data);
    }
}