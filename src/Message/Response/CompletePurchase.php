<?php

namespace Omnipay\PayDunya\Message\Response;

use Omnipay\Common\Message\AbstractResponse;

class CompletePurchase extends AbstractResponse
{
    public function isSuccessful(): bool
    {
        return isset($this->data['status']) && $this->data['status'] === 'completed';
    }

    public function getCode(): ?string
    {
        return $this->data['response_code'] ?? null;
    }

    public function getMessage(): ?string
    {
        return $this->data['response_text'] ?? null;
    }
}