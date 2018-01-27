<?php
class Webclues_Beautyprofiler_ListController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      
    if(Mage::getSingleton('customer/session')->isLoggedIn()) {
      $this->loadLayout();
      $this->getLayout()->getBlock('head')->setTitle($this->__('My Profiles'));
      $this->renderLayout();
      }
    else{
        Mage::getSingleton( 'customer/session' )->setData( 'validationMessages', "Please Login First");
        return $this->_redirectUrl($this->_getRefererUrl());
      }
    }


    public function deleteAction()
     {
      if(null !== Mage::app()->getRequest()->getParam('delete') && !empty(Mage::app()->getRequest()->getParam('delete')))
       {

        $collection = Mage::getModel('beautyprofiler/beutyprofiler')->getCollection()->addFieldToSelect('profile_pic_url')->addFieldToFilter('profile_id', array('profile_id' => Mage::app()->getRequest()->getParam('delete')))->getFirstItem();
        if(!empty($collection->getProfilePicUrl()))
        {
          $img_path = Mage::getBaseDir('media'). "/beautyprofile/profile/" . $collection->getProfilePicUrl();
       
          if (file_exists($img_path)) {
            unlink($img_path);
          }
        }
        Mage::getModel('beautyprofiler/beutyprofiler')->setProfileId(Mage::app()->getRequest()->getParam('delete'))->delete();
        return $this->_redirect('beautyprofiler/list/dashboard');
      }
     }

     public function selectdefaultAction(){
      
      $id = Mage::app()->getRequest()->getParam('id');
      $val = Mage::app()->getRequest()->getParam('val');



      // set all is default to zero

      if(Mage::getSingleton('customer/session')->isLoggedIn()) {
        $customerData = Mage::getSingleton('customer/session')->getCustomer();
        $customer_id = $customerData->getId();
       }

        $resource = Mage::getSingleton('core/resource');
        $writeConnection = $resource->getConnection('core_write');
        $table = $resource->getTableName('beautyprofiler/beutyprofiler');
        $query = "UPDATE $table SET is_default = 0 WHERE customer_entity_id = $customer_id";
        $writeConnection->query($query);


        // $data = array('is_default'=>0);
        // $model = Mage::getModel('beautyprofiler/beutyprofiler')->load($customer_id)->addData($data);
        // try {
        //         $model->setCustomerEntityId($customer_id)->save();
        //         //echo "Data updated successfully.";
        //     } catch (Exception $e){
        //         echo $e->getMessage(); 
        // }

        // set the default selected to 1
        $data = array('is_default'=>$val);
        $model = Mage::getModel('beautyprofiler/beutyprofiler')->load($id)->addData($data);
        try {
                $model->setId($id)->save();
                echo "Data updated successfully.";
               
            } catch (Exception $e){
                echo $e->getMessage(); 
        }
      
     }

     public function dashboardAction(){

      $this->loadLayout();
      $this->getLayout()->getBlock('head')->setTitle($this->__('My Dashboard'));
      $this->renderLayout();

     }     
}