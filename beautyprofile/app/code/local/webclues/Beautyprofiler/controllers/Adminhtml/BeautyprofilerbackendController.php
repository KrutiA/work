<?php
class Webclues_Beautyprofiler_Adminhtml_BeautyprofilerbackendController extends Mage_Adminhtml_Controller_Action
{

	protected function _isAllowed()
	{
		//return Mage::getSingleton('admin/session')->isAllowed('beautyprofiler/beautyprofilerbackend');
		return true;
	}

	public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("Beauty Profiles"));
	   $this->renderLayout();
    }
}