<?php
class Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("beutyprofiler_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("beautyprofiler")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("beautyprofiler")->__("Item Information"),
				"title" => Mage::helper("beautyprofiler")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("beautyprofiler/adminhtml_beutyprofiler_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
