<?php

class Inchoo_StoreReview_Block_Adminhtml_Review_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                'method' => 'post'
            )
        );

        $form->setUseContainer(true);
        $this->setForm($form);

        $id = $this->getRequest()->getParam('id');
        $review = Mage::getSingleton('storereview/review')->load($id, 'review_id');

        $fieldset = $form->addFieldset('review_form', array(
            'legend' => $this->__('Submit a new review')
        ));

        if (!$review->getCustomerId()) {
            $fieldset->addField('customer_name', 'text', array(
                'label' => $this->__('Customer name'),
                'class' => 'required-entry',
                'required' => true,
                'name' => 'customer_name',
                'value' => $review->getCustomerName()
            ));
        }

        $fieldset->addField('title', 'text', array(
            'label' => $this->__('Review title'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'title',
            'value' => $review->getTitle()
        ));

        $fieldset->addField('review', 'textarea', array(
            'label' => $this->__('Review'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'review',
            'value' => $review->getReview()
        ));


        $field = $fieldset->addField('store_id', 'select', array(
            'name' => 'store_id',
            'label' => Mage::helper('cms')->__('Store View'),
            'title' => Mage::helper('cms')->__('Store View'),
            'required' => true,
            'values' => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
            'value' => $review->getStoreId()
        ));
        $renderer = $this->getLayout()->createBlock('adminhtml/store_switcher_form_renderer_fieldset_element');
        $field->setRenderer($renderer);

        $fieldset->addField('status_id', 'select', array(
            'label' => $this->__('Status'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'status_id',
            'values' => array(
                0 => 'Pending',
                1 => 'Approved',
                2 => 'Not Approved'
            ),
            'value' => $review->getStatusId()
        ));


        return parent::_prepareForm();
    }
//    protected function _prepareForm()
//    {
//        // instantiate a new form
//        $form = new Varien_Data_Form(array(
//            'id' => 'edit_form',
//            'action' => $this->getUrl(
//                'inchoo_storereview_admin/index/edit',
//                array(
//                    '_current' => true,
//                    'continue' => 0,
//                )
//            ),
//            'method' => 'post',
//        ));
//        $form->setUseContainer(true);
//        $this->setForm($form);
//
//        // define a new fieldset
//        $fieldset = $form->addFieldset(
//            'general',
//            array(
//                'legend' => $this->__('Title')
//            )
//        );
//
//        $reviewSingleton = Mage::getSingleton(
//            'storereview/review'
//        );
//
//        // editable fields
//        $this->_addFieldsToFieldset($fieldset, array(
//            'title' => array(
//                'label' => $this->__('Title'),
//                'input' => 'text',
//                'required' => true,
//            ),
//            'review' => array(
//                'label' => $this->__('Review'),
//                'input' => 'text',
//                'required' => true
//            )
//        ));
//
//        return $this;
//    }
}