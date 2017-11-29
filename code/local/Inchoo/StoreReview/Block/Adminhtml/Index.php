<?php

class Inchoo_StoreReview_Block_Adminhtml_Index extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'storereview';
        $this->_controller = 'adminhtml_review';
        $this->_headerText = $this->__('Store Reviews');

        parent::__construct();
    }
}