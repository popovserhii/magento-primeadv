<?php
/**
 * SalesDouble ReTag default Helper
 *
 * @category Popov
 * @package Popov_Primeadv
 * @author Popov Sergiy <popov@popov.com.ua>
 * @datetime: 20.04.14 14:54
 */
class Popov_Primeadv_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function setCookies() {
        $request = Mage::app()->getRequest();
        if (!$request->get('transaction_id')) {
            return false;
        }

        $cookie = Mage::getSingleton('core/cookie');
        $cookie->set('PRIMEADV_TRANSACTION_ID', $request->get('transaction_id'), time() + 7776000, '/'); // 90 days
        //$cookie->set('PRIMEADV_UTM_SOURCE', 'primelead', time() + 7776000, '/'); // 90 days

        return true;
    }

    public function clearCookies()
    {
        //$config = Mage::getConfig()->getNode('retargeting')->asArray();
        //$utmUidName = $config['modules']['Popov_Primeadv']['utm_uid_name'];
        $cookie = Mage::getSingleton('core/cookie');

        $cookie->delete('PRIMEADV_TRANSACTION_ID');
        //$cookie->delete('PRIMEADV_UTM_SOURCE');
    }
}
