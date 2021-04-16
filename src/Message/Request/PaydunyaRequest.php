<?php

namespace Omnipay\PayDunya\Message\Request;

use Omnipay\Common\Message\AbstractRequest;
use Paydunya\Setup;

abstract class PaydunyaRequest extends AbstractRequest
{
    public function getData(): array
    {
        Setup::setMasterKey($this->getParameter('masterKey'));
        Setup::setPublicKey($this->getParameter('publicKey'));
        Setup::setPrivateKey($this->getParameter('privateKey'));
        Setup::setToken($this->getToken());
        Setup::setMode($this->getTestMode() ? 'test' : 'live');

        return [];
    }

    public function setMasterKey($value)
    {
        return $this->setParameter('masterKey', $value);
    }

    public function setPublicKey($value)
    {
        return $this->setParameter('publicKey', $value);
    }

    public function setPrivateKey($value)
    {
        return $this->setParameter('privateKey', $value);
    }

    public function setCustomData($value)
    {
        return $this->setParameter('customData', $value);
    }

    public function setStoreName($value)
    {
        return $this->setParameter("storeName", $value);
    }

    public function setWebsiteUrl($value)
    {
        return $this->setParameter('websiteUrl', $value);
    }

    public function setLogoUrl($value)
    {
        return $this->setParameter('logoUrl', $value);
    }

    public function setIpnData($value){
        return $this->setParameter('ipnData',$value);
    }

}