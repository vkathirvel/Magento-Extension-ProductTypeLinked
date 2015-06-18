<?php

/**
 * KathirVel ProductTypeLinked Model Product Type
 *
 * @package     KathirVel_ProductTypeLinked
 * @author      Kathir Vel (vkathirvel@gmail.com)
 * @copyright   Copyright (c) 2015 Kathir Vel
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class KathirVel_ProductTypeLinked_Model_Product_Type extends Mage_Catalog_Model_Product_Type_Virtual
{

    const TYPE_LINKED = 'linked';
    const XML_PATH_AUTHENTICATION = 'catalog/linked/authentication';

    protected function _prepareProduct(Varien_Object $buyRequest, $product,
                                       $processMode)
    {
        if ($this->_isStrictProcessMode($processMode)) {
            return Mage::helper('kathirvel_producttypelinked')->__('This product (%s) cannot be added to the cart.', $product->getName());
        }
        return parent::_prepareProduct($buyRequest, $product, $processMode);
    }

}
