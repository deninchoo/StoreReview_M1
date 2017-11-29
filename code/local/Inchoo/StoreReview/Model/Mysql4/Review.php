<?php

class Inchoo_StoreReview_Model_Mysql4_Review extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('storereview/review', 'review_id');
    }
}