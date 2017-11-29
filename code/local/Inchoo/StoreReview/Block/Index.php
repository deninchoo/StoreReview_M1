<?php

class Inchoo_StoreReview_Block_Index extends Mage_Core_Block_Template
{
    public function getCustomer()
    {
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        if ($customer->getId()):
            return $customer;
        endif;

        return false;
    }

    public function getStoreReview()
    {
        $customerId = $this->getCustomer()->getId();
        $review = Mage::getModel('storereview/review')->load($customerId, 'customer_id');
        return $review;
    }

    public function getEditUrl()
    {
        return Mage::getUrl('storereview/index/edit');
    }

    public function getDeleteUrl()
    {
        return Mage::getUrl('storereview/index/delete');
    }

    public function getEditFormAction()
    {
        return Mage::getUrl('storereview/index/save');
    }

    public function getStoreId(){
        $storeId = Mage::app()->getStore()->getStoreId();
        return $storeId;
    }

    public function getStoreReviews()
    {

        $reviews = Mage::getModel('storereview/review')->getCollection();
        $reviews->addFieldToFilter('store_id', $this->getStoreId());
        return $reviews;
    }
}