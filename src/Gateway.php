<?php


namespace Omnipay\PayDunya;


use Omnipay\Common\AbstractGateway;
use Omnipay\PayDunya\Message\Request\CompletePurchase;
use Omnipay\PayDunya\Message\Request\PurchaseRequest;

/**
 * @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface fetchTransaction(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
 */
class Gateway extends AbstractGateway
{

    public function getName(): string
    {
        return 'PayDunya';
    }

    public function getDefaultParameters(): array
    {
        return [
            'masterKey' => '',
            'publicKey' => '',
            'privateKey' => '',
            'token' => '',
            'currency' => 'XOF',
            'testMode' => false
        ];
    }

    public function purchase(array $options = array())
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    public function completePurchase(array $options = array())
    {
        return $this->createRequest(CompletePurchase::class, $options);
    }

}