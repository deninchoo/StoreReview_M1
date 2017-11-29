<?php

class Inchoo_StoreReview_Block_Adminhtml_Review_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        // Set some defaults for our grid
        $this->setDefaultSort('updated_at');
        $this->setId('inchoo_storereview_grid');
        $this->setDefaultDir('desc');
        $this->setSaveParametersInSession(true);
    }

    protected function _getCollectionClass()
    {
        // This is the model we are using for the grid
        return 'storereview/review_collection';
    }

    protected function _prepareCollection()
    {
        // Get and set our collection for the grid
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $collection->getSelect()->joinLeft(array('store'=>'core_store'),'main_table.store_id = store.store_id');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        // Add the columns that should appear in the grid
        $this->addColumn('id',
            array(
                'header' => $this->__('ID'),
                'align' => 'right',
                'width' => '50px',
                'index' => 'review_id'
            )
        );

        $this->addColumn('customer',
            array(
                'header' => $this->__('Customer Name'),
                'width' => '200px',
                'index' => 'customer_name'
            )
        );

        $this->addColumn('title',
            array(
                'header' => $this->__('Title'),
                'index' => 'title'
            )
        );

        $this->addColumn('review',
            array(
                'header' => $this->__('Review'),
                'index' => 'review'
            )
        );

        $this->addColumn('store',
            array(
                'header'    => $this->__('Store View'),
                'index'     => 'name'
            ));

        $this->addColumn('created_at',
            array(
                'header' => $this->__('Date Created'),
                'width' => '150px',
                'index' => 'created_at'
            )
        );

        $this->addColumn('updated_at',
            array(
                'header' => $this->__('Last Modified'),
                'width' => '150px',
                'index' => 'updated_at'
            )
        );

        $this->addColumn('status',
            array(
                'header'    => $this->__('Status'),
                'type'      => 'options',
                'index'     => 'status_id',
                'options'   => array(
                    0 => 'Pending',
                    1 => 'Approved',
                    2 => 'Not Approved'
                )
            ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        // This is where our row data will link to
        return $this->getUrl('*/*/edit', array('id' => $row->getReviewId()));
    }
}