<?php

namespace Omnipay\PaymentgateRu\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

class AuthorizeResponse extends AbstractCurlResponse implements RedirectResponseInterface
{
    /**
     * Does the response require a redirect?
     * Success response is a redirect
     *
     * @return bool
     */
    public function isRedirect(): ?bool
    {
        return $this->isSuccessful();
    }

    /**
     * Gets the redirect target url.
     *
     * @return string
     */
    public function getRedirectUrl(): ?string
    {
        return $this->data['formUrl'];
    }

    /**
     * Get the transaction ID as generated by the merchant website.
     *
     * @return string|null
     */
    public function getTransactionId(): ?string
    {
        return $this->isSuccessful() ? $this->data['orderId'] : null;
    }
}
