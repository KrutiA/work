<?php   
class Webclues_Beautyprofiler_Block_Step1 extends Mage_Core_Block_Template{   


public function __construct()
{
	parent::__construct();
	$collection = Mage::getModel('beautyprofiler/beutyprofiler')->getCollection()->addFieldToFilter('profile_id', array('profile_id' => Mage::app()->getRequest()->getParam('id')));
    $this->setCollection($collection);	

    
}


}