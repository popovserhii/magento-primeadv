<?php

/**
 * Enter description here...
 *
 * @category Popov
 * @package Popov_<package>
 * @author Popov Sergiy <popow.serhii@gmail.com>
 * @datetime: 07.06.2017 17:48
 */
class Popov_Primeadv_Helper_PostBack extends Mage_Core_Helper_Abstract implements Popov_Retag_Helper_PostBackInterface
{
    public function getUrl()
    {
        $backUrl = Mage::getStoreConfig('popov_primeadv/settings/postback_url');

        return $backUrl;
    }

    public function getParams()
    {
        $cookie = Mage::getSingleton('core/cookie');
        $order = Mage::getModel('sales/order')->load(Mage::getSingleton('checkout/session')->getLastOrderId());

        $amount = $order->getGrandTotal() - $order->getShippingAmount() - $order->getShippingTaxAmount();
        $post = [
            'transaction_id' => $cookie->get('PRIMEADV_TRANSACTION_ID'),
            'adv_sub' => $order->getIncrementId(),
            'amount' => $amount,
        ];

        return $post;
    }
}