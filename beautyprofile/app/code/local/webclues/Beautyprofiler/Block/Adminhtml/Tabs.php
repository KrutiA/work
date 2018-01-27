<?php

class Webclues_Beautyprofiler_Block_Adminhtml_Tabs extends Mage_Adminhtml_Block_Catalog_Product_Edit_Tabs
{
    private $parent;

    protected function _prepareLayout()
    {
        //get all existing tabs
        $this->parent = parent::_prepareLayout();
        //add new tab

       /* $this->addTab('tabid', array(
                     'label'     => Mage::helper('catalog')->__('Beauty Profile Attributes'),
                     'content'   => $this->getLayout()
             ->createBlock('beautyprofiler/adminhtml_tabs_tabid')->toHtml(),
        ));*/
        return $this->parent;
    }
}