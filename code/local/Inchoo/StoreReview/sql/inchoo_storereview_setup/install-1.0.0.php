<?php

$setup = $this;

$setup->startSetup();

$table = $setup->getConnection()
    ->newTable($setup->getTable('storereview/review')
    )->addColumn('review_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => true,
        'primary' => true,
        'auto_increment' => true
    ), 'Review ID'

    )->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false,
    ), 'Review Title'

    )->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 10, array(
        'nullable' => true,
        'unsigned' => true
    ), 'Customer ID'

    )->addColumn('customer_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable' => true
    ),  'Customer Name'

    )->addColumn('review', Varien_Db_Ddl_Table::TYPE_VARCHAR, array(
        'nullable' => true
    ),  'Store Review'

    )->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable' => false,
        'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT
    ),  'Created At'

    )->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable' => false,
        'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT
    ),  'Updated At'

    )->addColumn('status_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, 1, array(
        'unsigned' => true
    ),  'Status ID'

    )->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, 5,array(
        'unsigned' => true
    ),  'Store View ID'

    )->addForeignKey(
        $setup->getFkName('inchoo_store_review', 'customer_id', 'customer_entity', 'entity_id'),
        'customer_id',
        $setup->getTable('customer_entity'),
        'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )->addForeignKey(
        $setup->getFkName('inchoo_store_review', 'store_id', 'core_store', 'store_id'),
        'store_id',
        $setup->getTable('core_store'),
        'store_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )->setComment(
        'Store Review Table'
    );

$setup->getConnection()->createTable($table);
$setup->endSetup();