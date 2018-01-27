<?php   
class Webclues_Beautyprofiler_Block_Pagination extends Mage_Core_Block_Template{   
public function __construct()
    {
        parent::__construct();
        //set your own collection (get data from database so you can list it)
        $customerData = Mage::getSingleton('customer/session')->getCustomer();
        $collection = Mage::getModel('beautyprofiler/beutyprofiler')->getCollection()
        			->addFieldToSelect('*')
                    ->addFieldToFilter('customer_entity_id', array('customer_entity_id' => $customerData->getId()))
                    ->load();
        $this->setCollection($collection);
    }
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        //this is toolbar we created in the previous step
        $toolbar = $this->getLayout()->createBlock('beautyprofiler/toolbar');
        //get collection of your model
        $customerData = Mage::getSingleton('customer/session')->getCustomer();
        $collection = Mage::getModel('beautyprofiler/beutyprofiler')->getCollection()
        			->addFieldToSelect('*')
                    ->addFieldToFilter('customer_entity_id', array('customer_entity_id' => $customerData->getId()))
                    ->load();
        //this is where you set what options would you like to  have for sorting your grid. Key is your column in your database, value is just value that will be shown in template
        $toolbar->setAvailableOrders(array('email'=> 'Email','profile_id'=>'ID'));
        $toolbar->setDefaultOrder('profile_id');
        $toolbar->setDefaultDirection("asc");
        $toolbar->setCollection($collection);
        $this->setChild('toolbar', $toolbar);
        $this->getCollection()->load();
        return $this;
    }
 
    //this is what you call in your .phtml file to render toolbar
    public function getToolbarHtml()
    {
        return $this->getChildHtml('toolbar');
    }


}