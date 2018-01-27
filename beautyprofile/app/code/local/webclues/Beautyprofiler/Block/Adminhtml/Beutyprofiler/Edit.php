<?php
	
class Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "profile_id";
				$this->_blockGroup = "beautyprofiler";
				$this->_controller = "adminhtml_beutyprofiler";
				$this->_updateButton("save", "label", Mage::helper("beautyprofiler")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("beautyprofiler")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("beautyprofiler")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("beutyprofiler_data") && Mage::registry("beutyprofiler_data")->getId() ){

				    return Mage::helper("beautyprofiler")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("beutyprofiler_data")->getId()));

				} 
				else{

				     return Mage::helper("beautyprofiler")->__("Add Item");

				}
		}
}