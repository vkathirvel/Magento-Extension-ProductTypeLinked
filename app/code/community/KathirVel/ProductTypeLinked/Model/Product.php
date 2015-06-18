<?php

/**
 * KathirVel ProductTypeLinked Model Product
 *
 * @package     KathirVel_ProductTypeLinked
 * @author      Kathir Vel (vkathirvel@gmail.com)
 * @copyright   Copyright (c) 2015 Kathir Vel
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class KathirVel_ProductTypeLinked_Model_Product extends Mage_Catalog_Model_Product
{

    public function getProductUrl($useSid = true)
    {
        if ($this->getData('type_id') == 'linked') {
            $productData = Mage::getModel('catalog/product')->load($this->getId());
            if ($productData->getId()) {
                $linkedProductLink = $productData->getData('kv_linked_product_link');
                if ($linkedProductLink) {
                    return $productData->getData('kv_linked_product_link');
                }
            }
        }
        return $this->getUrlModel()->getProductUrl($this, $useSid);
    }

    public function getCanShowPrice()
    {
        if ($this->getData('type_id') == 'linked') {
            return FALSE;
        }
        return;
    }

}
