<?php

class Inchoo_StoreReview_Adminhtml_StorereviewController extends Mage_Adminhtml_Controller_Action
{
    public function IndexAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('storereview');
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('storereview');
        $this->_addContent($this->getLayout()->createBlock('storereview/adminhtml_edit'));
        $this->renderLayout();
    }

    public function editAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('storereview');
        $this->_addContent($this->getLayout()->createBlock('storereview/adminhtml_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        $request = $this->getRequest();
        $customerId = null;
        $reviewId = $request->getParam('id', null);

        $review = Mage::getModel('storereview/review')->load($reviewId, 'review_id');

        $review->setTitle($request->getParam('title'));
        $review->setReview($request->getParam('review'));
        $review->setCustomerName($request->getParam('customer_name'));
        $review->setStatusId($request->getParam('status_id'));
        $review->setStoreId($request->getParam('store_id'));
        $review->setUpdatedAt(null);
        $review->save();
        $this->_redirect('*/*/index');
    }

    public function deleteAction()
    {
        $reviewId = $this->getRequest()->getParam('id');
        $review = Mage::getModel('storereview/review')->load($reviewId, 'review_id');
        $review->delete();
        $this->_redirect('*/*/index');
    }

    public function getStoreReview()
    {

        $id = $this->getRequest()->getParam('id');
        $review = Mage::getModel('storereview/review')->load($id, 'review_id');
        return $review;
    }
}