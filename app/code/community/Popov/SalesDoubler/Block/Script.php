<?php

/**
 * SalesDouble ReTag Script
 *
 * @category Popov
 * @package Popov_SalesDoubler
 * @author Popov Sergiy <popov@popov.com.ua>
 * @datetime: 25.04.2017 17:15
 */
class Popov_SalesDoubler_Block_Script extends Mage_Page_Block_Html_Wrapper
{
    protected function _toHtml()
    {
        if ('checkout_onepage_success' === $this->getData('action')) {
            $script = '<script>
(function (js) {
var scr = document.createElement(\'script\');
scr.setAttribute("src", js + "?ts=" + (new Date().getTime()));
scr.setAttribute("async", true);
document.getElementsByTagName("head")[0].appendChild(scr);
}("//www.dmpcloud.net/spx/art-market.com.ua/spx-thy.js"));
</script>';
        } else {
            $script = '<script type="text/javascript">
(function (js) {
var scr = document.createElement(\'script\');
scr.setAttribute("src", js + "?ts=" + (new Date().getTime()));
scr.setAttribute("async", true);
document.getElementsByTagName("head")[0].appendChild(scr);
}("//www.dmpcloud.net/spx/art-market.com.ua/spx.js"));
</script>';
        }

        return $script;
    }
}