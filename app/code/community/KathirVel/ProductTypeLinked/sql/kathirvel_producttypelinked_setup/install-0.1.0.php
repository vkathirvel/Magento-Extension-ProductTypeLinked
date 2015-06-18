<?php

/**
 * KathirVel ProductTypeLinked
 *
 * @package     KathirVel_ProductTypeLinked
 * @author      Kathir Vel (vkathirvel@gmail.com)
 * @copyright   Copyright (c) 2015 Kathir Vel
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
/**
 * @var $installer Mage_Catalog_Model_Resource_Setup
 */
$installer = $this;

$installer->startSetup();

$installer->addAttribute(
    Mage_Catalog_Model_Product::ENTITY, 'kv_linked_product_link', array(
        'type' => 'text',
        'backend' => '',
        'frontend' => '',
        'label' => 'Linked Product Link',
        'input' => 'text',
        'class' => '',
        'source' => '',
        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
        'visible' => true,
        'required' => true,
        'user_defined' => false,
        'default' => '',
        'searchable' => false,
        'filterable' => false,
        'comparable' => false,
        'visible_on_front' => false,
        'unique' => false,
        'apply_to' => 'linked',
        'is_configurable' => false,
        'used_in_product_listing' => false
    )
);

$attributeId = $installer->getAttributeId('catalog_product', 'kv_linked_product_link');

$defaultSetId = $installer->getAttributeSetId('catalog_product', 'default');

$installer->addAttributeGroup('catalog_product', $defaultSetId, 'Linked Product Information');

$groupId = $installer->getAttributeGroup('catalog_product', $defaultSetId, 'Linked Product Information', 'attribute_group_id');

if ($attributeId > 0) {
    $installer->addAttributeToSet('catalog_product', $defaultSetId, $groupId, $attributeId);
}

$attributes = array(
        'price',
        'special_price',
        'special_from_date',
        'special_to_date',
        'minimal_price',
        'tax_class_id'
);

foreach ($attributes as $attributeCode) {
    $applyTo = explode(',', $installer->getAttribute(Mage_Catalog_Model_Product::ENTITY, $attributeCode, 'apply_to'));

    if (!in_array('linked', $applyTo)) {
        $applyTo[] = 'linked';
        $installer->updateAttribute(Mage_Catalog_Model_Product::ENTITY, $attributeCode, 'apply_to', join(',', $applyTo));
    }
}

$installer->endSetup();
