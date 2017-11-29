<?php

class Inchoo_StoreReview_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        if (!Mage::getSingleton('customer/session')->isLoggedIn()):
            $this->_redirect('customer/account/login');
            return;
        endif;
        $this->loadLayout();
        $this->renderLayout();
    }

    public function editAction()
    {
        $this->indexAction();
    }

    public function getCustomer()
    {
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        if ($customer->getId()):
            return $customer;
        endif;

        return false;
    }

    public function saveAction()
    {
        if (!$this->_validateFormKey()) {
            $this->_redirect('*/*');
            return;
        }

        $customerId = $this->getCustomer()->getId();
        $customerName = $this->getCustomer()->getName();
        $storeId = Mage::app()->getStore()->getStoreId();
        $review = Mage::getModel('storereview/review')->load($customerId, 'customer_id');
        if (!$review->getData()) {
            $review->setCustomerId($customerId);
        }
        $review->setTitle($this->getRequest()->getParam('title'));
        $review->setReview($this->getRequest()->getParam('review'));
        $review->setCustomerName($customerName);
        $review->setStatusId(0);
        $review->setStoreId($storeId);
        $review->setUpdatedAt(null);
        $review->save();
        $this->_redirectUrl('/storereview/index/index');
    }

    public function deleteAction()
    {
        $customerId = $this->getCustomer()->getId();
        if ($customerId):
            $review = Mage::getModel('storereview/review')->load($customerId, 'customer_id');
            $review->delete();
        endif;
        $this->_redirectUrl('/storereview/index/index');
    }
}