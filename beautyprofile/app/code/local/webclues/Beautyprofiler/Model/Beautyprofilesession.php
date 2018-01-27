<?php
class Webclues_Beautyprofiler_Model_Beautyprofilesession extends Mage_Core_Model_Abstract
{
    protected function _construct(){
       $this->_init("beautyprofiler/beautyprofilesession");
    }
    /*
    *add js for customers who don't have beautyprofile 
    * session after customer login
    */
    public function login()
    {
        $customerData = Mage::getSingleton('customer/session')->getCustomer();
        $defaultprofile = Mage::getModel('beautyprofiler/beutyprofiler')->getCollection()->addFieldToSelect('profile_id')->addFieldToFilter('is_default', array('is_default'=>1))->addFieldToFilter('customer_entity_id', array('customer_entity_id'=>$customerData->getId()))->load();
        $profile_id = $defaultprofile->getData()[0]['profile_id'];
    //    $profile_id = 300;
        Mage::getSingleton('customer/session')->setBeautyProfileId($profile_id);
        /*Check if current login customer have default profile or not*/
        $getprofile = Mage::getModel('beautyprofiler/beutyprofiler')->getCollection()->addFieldToSelect('profile_id')->addFieldToFilter('customer_entity_id', array('customer_entity_id'=>$customerData->getId()))->load();
        if(count($getprofile->getData()) == 0)
        {
            Mage::getSingleton('customer/session')->setNoprofile('yes');
        }
        Mage::getSingleton('customer/session')->setIncompleteprofile('yes');
        Mage::getSingleton('customer/session')->setRegisterprofile('yes');
    }
    public function logout()
    {
        Mage::getSingleton('customer/session')->unsBeautyProfileId();
    }
}