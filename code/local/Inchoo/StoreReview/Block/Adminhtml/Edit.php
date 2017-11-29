<?php

class Inchoo_StoreReview_Block_Adminhtml_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'review_id';
        $this->_blockGroup = 'storereview';
        $this->_controller = 'adminhtml_review';
        $this->_mode = 'edit';

        $newOrEdit = $this->getRequest()->getParam('id')
            ? $this->__('Edit')
            : $this->__('New');

        $this->_headerText = $newOrEdit . ' ' . $this->__('Store Review');
    }
//        parent::__construct();
//
//        $this->_objectId = 'id';
//        $this->_blockGroup = 'storereview';
//        $this->_controller = 'adminhtml_review';
//        $this->_mode = 'edit';
//
//        $newOrEdit = $this->getRequest()->getParam('id')
//            ? $this->__('Edit')
//            : $this->__('New');
//
//        $this->_headerText = $newOrEdit . ' ' . $this->__('Store Review');
//    }
//
//    public function getHeaderText()
//    {
//        return $this->__('New Store Review');
//    }
//
//    public function getBackUrl(){
//        return $this->getUrl('*/*/');
//    }
}