<?php


class Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_beutyprofiler";
	$this->_blockGroup = "beautyprofiler";
	$this->_headerText = Mage::helper("beautyprofiler")->__("Beutyprofiler Manager");
	$this->_addButtonLabel = Mage::helper("beautyprofiler")->__("Add New Item");
	parent::__construct();
	
	}

}