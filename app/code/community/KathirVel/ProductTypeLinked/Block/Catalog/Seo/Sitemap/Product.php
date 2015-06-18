<?php

/**
 * KathirVel ProductTypeLinked Block Catalog Seo Sitemap Product
 *
 * @package     KathirVel_ProductTypeLinked
 * @author      Kathir Vel (vkathirvel@gmail.com)
 * @copyright   Copyright (c) 2015 Kathir Vel
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class KathirVel_ProductTypeLinked_Block_Catalog_Seo_Sitemap_Product extends Mage_Catalog_Block_Seo_Sitemap_Product
{

    /**
     * Initialize products collection
     *
     * @return Mage_Catalog_Block_Seo_Sitemap_Category
     */
    protected function _prepareLayout()
    {
        $collection = Mage::getModel('catalog/product')->getCollection();
        /* @var $collection Mage_Catalog_Model_Resource_Eav_Mysql4_Product_Collection */

        $collection->addAttributeToSelect('name');
        $collection->addAttributeToSelect('url_key');

        /* Exclude Linked product type */
        $collection->addAttributeToFilter('type_id', array('neq' => 'linked'));

        $collection->addStoreFilter();

        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($collection);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($collection);

        $this->setCollection($collection);

        return $this;
    }

}
