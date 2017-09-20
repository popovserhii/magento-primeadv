<?php

/**
 * Enter description here...
 *
 * @category Agere
 * @package Agere_<package>
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 07.06.2017 17:48
 */
class Popov_SalesDoubler_Helper_PostBack
{
    public function send()
    {
        $cookie = Mage::getSingleton('core/cookie');
		if (!$cookie->get('AFF_ID')) {
			return false;
		}
        $order = Mage::getModel('sales/order')->load(Mage::getSingleton('checkout/session')->getLastOrderId());

        $backUrl = rtrim(Mage::getStoreConfig('popov_salesDoubler/settings/postback_url'), '/') . '/' . $cookie->get('AFF_SUB');

        $post = [
            //'action_id' => $cookie->get('AFF_ID'),
            'trans_id' => $order->getId(),
            'sale_amount' => $order->getGrandTotal(),
            'token' => Mage::getStoreConfig('popov_salesDoubler/settings/postback_key')
        ];

        Mage::helper('popov_salesDoubler/postBack')->send($backUrl, $post);

    }
}