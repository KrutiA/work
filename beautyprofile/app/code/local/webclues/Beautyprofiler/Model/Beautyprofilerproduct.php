<?php

class Webclues_Beautyprofiler_Model_Beautyprofilerproduct extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
       $this->_init("beautyprofiler/beautyprofilerproduct");
    }
    public function applyCustomFilter($observer)
    { 
      if(Mage::registry('current_category'))
      {
      $current_cat_id = Mage::registry('current_category')->getId();
      $category = Mage::getModel('catalog/category')->load($current_cat_id);  
      }
      //if customer login and current category is filterable with beautyprofile attributes
       if(!null==Mage::getSingleton('customer/session')->getBeautyProfileId() && Mage::getSingleton('customer/session')->isLoggedIn() && Mage::registry('current_category') && $category->getLevel() != 2 && Mage::app()->getRequest()->getParam('opt') == null)
          {
           $selected_profile_id = Mage::getSingleton('customer/session')->getBeautyProfileId();
           //if current page is category page
            if (Mage::registry('current_category')) 
            {
              if($category = Mage::getModel('catalog/category')->load($current_cat_id)){
                      if($category->getLevel() == 4){
                      $column_name = 'sub_sub_cat_id';
                      }
                      if($category->getLevel() == 3){
                      $column_name = 'sub_cat_id';
                      }
                      if($category->getLevel() == 2){
                      $column_name = 'main_cat_id';
                      }
              }
            ##############START get beauty profile attribute related to current category#######
                    $beautyprofilebycategory = Mage::getModel('beautyprofiler/beautyprofilebycategory')->getCollection()->addFieldToFilter($column_name,$category->getId());
                   /* $beautyprofilebycategory->getSelect()->where($column_name.'=?',$category->getId()); */
                    $beautyprofile_fields = $beautyprofilebycategory->getFirstItem()->getBeautyprofileFields();
            ##############END get beauty profile attribute related to current category########
                $customerData = Mage::getSingleton('customer/session')->getCustomer();
                $check_profile = Mage::getSingleton('beautyprofiler/beutyprofiler')->getCollection()->addFieldToFilter('customer_entity_id',array('customer_entity_id',$customerData->getId()))->addFieldToFilter('profile_id',array('profile_id'=>$selected_profile_id))->getFirstItem();
                //check current profile belongs to particular user or not
                if(!null==$check_profile->getData())
                {
                return $this->getProductbyprofile($selected_profile_id,$customerData,$observer,$beautyprofile_fields);    
                }
                else
                {
                  return $collection = $observer->getEvent()->getCollection(); 
                }
            }
            else
            {
            return $collection = $observer->getEvent()->getCollection(); 
            }
          }
       else
       {
        /*if(Mage::registry('current_category') && $category->getLevel() == 2)
        {
          $beautyprofilebycategory_new = Mage::getModel('beautyprofiler/beautyprofilebycategory')->getCollection();
          $beautyprofilebycategory_new->getSelect()->where('main_cat_id=?',$category->getId());
          //echo $beautyprofilebycategory_new->getSelect()->__toString(); exit;
         

          //echo "<pre>"; print_r($beautyprofile_fields_new); exit;
          $customerData_new = Mage::getSingleton('customer/session')->getCustomer();
          //echo "<pre>"; print_r($customerData_new); exit;
          $selected_profile_id = Mage::getSingleton('customer/session')->getBeautyProfileId();
          $this->getmaincatProductbyprofile($selected_profile_id,$customerData_new,$observer,$beautyprofilebycategory_new->getData(),$category->getId());
        }
        else
        {*/
          return $collection = $observer->getEvent()->getCollection();   
       // }
       }
    }
    
    public function getProfilemessge($category)
    {
        $path = $category->getPath();
        $ids = explode('/', $path);
        if(isset($ids[2])){
        $parent_cat_id = $ids[2]; // like Skin, Makeup, Hair category
        $case = 'CASE WHEN main_table.multiple = 1 THEN "multi" ELSE "single" END';  
        $resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        $query="SELECT main_table.*, pcs.parent_field_id,pcs.beautyprofile_field AS multi_filter_column FROM ".$resource->getTableName('beautyprofiler/profilecompeletstatus')." AS main_table LEFT JOIN ".$resource->getTableName('beautyprofiler/profilecompeletstatussub')." AS pcs ON pcs.parent_field_id=main_table.id WHERE (main_table.parent_category_id=".$ids[2].")";  
        $results = $readConnection->fetchAll($query);
        /*if user not fill sensitive skin or open pores data*/
        $nullattrarray = array('sensitive_skin','face_open_pores','face_acne_prone');
        $customerData = Mage::getSingleton('customer/session')->getCustomer();
        $getProfile = Mage::getModel('beautyprofiler/beutyprofiler')->getCollection()->addFieldToFilter('customer_entity_id',$customerData->getId())->addFieldToFilter('is_default',array('is_default'=>1))/*->getFirstItem()*/;
          if($getProfile->getData() == null)
          {
             $retArr['status'] = 'complete';
             $retArr['flag'] = 'noprofile';
              return $retArr;
          }
          $getProfileforfiltercheck = Mage::getModel('beautyprofiler/beutyprofiler')->getCollection()->addFieldToFilter('customer_entity_id',$customerData->getId())->addFieldToFilter('is_default',array('is_default'=>1));
          foreach($results as $key => $res)
          {
              if($res['multiple'] == 1)
              {
                if(!empty($res['multi_filter_column']))
                { 
                $multiarr[$res['beautyprofile_field']][] = $res['multi_filter_column'];
                $keyarr[$res['beautyprofile_field']][] = array('neq'=>0);                
                }
              }
              else
              {
               // echo $res['beautyprofile_field']; echo "<br>";
                  if(in_array($res['beautyprofile_field'],$nullattrarray))
                  {
                  $getProfileforfiltercheck->addFieldToFilter($res['beautyprofile_field'],array('neq'=>''));   
                  }
                  else
                  {
                  $getProfileforfiltercheck->addFieldToFilter($res['beautyprofile_field'],array('neq'=>'0'));
                  }
              
              }
          }
        // echo "<pre>";print_r($multiarr); exit;
          if(!empty($multiarr))
          {
            $tempkey = '';
            foreach ($multiarr as $mkey => $mres) {
              if(!empty($mres))
              {
              $getProfileforfiltercheck->addFieldToFilter($mres,$keyarr[$mkey]);  
              }
            }
          }
       
          //echo "<pre>";
        //  print_r($multiarr); exit;
          /* echo "<pre>"; print_r($getProfileforfiltercheck->getSelect()->__toString()); 
         echo "<pre>"; print_r($getProfileforfiltercheck->getData()); exit;*/
          if(!empty($getProfileforfiltercheck->getData()))
          {
            $retArr['status'] = 'complete';
            $retArr['flag'] = 'complete';
            return $retArr;
          }
          else
          { 
            $getDefaultProfile = Mage::getSingleton('beautyprofiler/beutyprofiler')->getCollection()->addFieldToFilter('customer_entity_id',$customerData->getId())->addFieldToFilter('is_default',array('is_default'=>1));
            // echo "<pre>"; print_r($getDefaultProfile->getData()[0]); exit;
            $retArr['status'] = 'incomplete';
            $retArr['profile_id'] = $getDefaultProfile->getData()[0]['profile_id'];
            $profile_status['flag'] = 'yes';
            return $retArr;
          }
        }
        else
        {
          return false;
        }
    }
    private function getProductbyprofile($profile_id,$customer_entity_id=null,$observer=null,$beautyprofile_fields=array())
    { 
        //for category wise filter fields like for foundation its skin_type and sensitive skin
        $column_for_filter = explode(',',$beautyprofile_fields);
        /**********Below fields will not consider in product filter by profile**********/
        $not_filtered_column = array('profile_id','customer_entity_id','full_name','email','dob','profile_pic_url','hair_exposure_to_others_specify','hair_scalp_concern_others_specify','brand_face_wash','brand_eye_cream','barnd_finishing_powder','brand_miscellar','brand_eye_serum','brand_eye_pencil','brand_cleanser','brand_sunscreen','brand_eye_shadow','brand_toner','brand_bb_cream','brand_lipstick','brand_face_serum','barnd_foundation','brand_lipgloss','brand_face_cream','brand_compact','brand_perfume','profile_status','is_default');
        $extrafilter = array('skin_type','face_pigmentation_type','complexion','faceshape','hair_volume','hair_texture','hair_scalp_type','sensitive_skin');
        $extrafilter['skin_type'] = Webclues_Routinefinder_Model_Constant::extrafilterskintype();
        $extrafilter['complexion'] = Webclues_Routinefinder_Model_Constant::extrafiltercomplexion();
        $extrafilter['hair_volume'] = Webclues_Routinefinder_Model_Constant::extrafilterhirvolume();
       // $extrafilter['hair_texture'] = Webclues_Routinefinder_Model_Constant::extrafilterhirtexture();
        $extrafilter['hair_scalp_type'] = Webclues_Routinefinder_Model_Constant::extrafilterhirscalptype(); 
        /*$extrafilter['hair_scalp_concern_sensitive'] = array('hair_scalp_concern_sensitive'=>'hair_scalp_concern_sensitive'); 
        $extrafilter['hair_scalp_concern_flaky_scalp'] = array('hair_scalp_concern_flaky_scalp'=>'hair_scalp_concern_flaky_scalp');
        $extrafilter['hair_concern_dry_and_dull'] = array('hair_concern_dry_and_dull'=>'hair_concern_dry_and_dull');*/
       // $extrafilter['sensitive_skin'] = Webclues_Routinefinder_Model_Constant::extrafiltersensitiveskin();
        //get current beautyprofile 
        $getProfile = Mage::getSingleton('beautyprofiler/beutyprofiler')->getCollection()->addFieldToFilter('customer_entity_id',array('customer_entity_id',$customer_entity_id->getId()))->addFieldToFilter('profile_id',array('profile_id'=>$profile_id))->getFirstItem();
        //observe product collection
        $collection = $observer->getEvent()->getCollection();  
        $collection_attrmapping = Mage::getModel('beautyprofiler/attrmapping')->getCollection();

        foreach ($getProfile->getData() as $column => $item) 
        { 
          //check for not required fields for filter by category
            if(in_array($column,$column_for_filter))
            {
                if($item != 0){
                  if(($column == 'sensitive_skin') && ($item == 1))
                  {
                    $d[$column] = 'sensitive_skin_yes';
                    $beautyprofile_attributes_map_to_default[] = 'sensitive_skin_yes';
                  }
                  else if(in_array($column,$extrafilter))
                  {  
                    $d[$column] = $extrafilter[$column][$item];
                    $beautyprofile_attributes_map_to_default[] = $extrafilter[$column][$item];  
                  }
                  else
                  {
                    $d[$column] = $item;
                    $beautyprofile_attributes_map_to_default[] = $column;
                  }  
                }
                
            }
      }
      $collection_attrmapping->addFieldToFilter("beautyprofile_filter",$beautyprofile_attributes_map_to_default);
   //   echo $collection_attrmapping->getSelect()->__toString(); exit;
    // echo "<pre>"; print_r($beautyprofile_attributes_map_to_default); echo "</pre>"; 
      $setFalg = 'no';
      if(count($collection_attrmapping->getData()) > 0)
      {
        foreach($collection_attrmapping->getData() as $attrmapping)
        {
          /*$attrname[] = $attrmapping['attribute_name'];
          $aaaa[] = array($attrmapping['attribute_name'],array($attrmapping['option_id']));*/
        //  $parent_id = Mage::getSingleton('catalog/category')->load(Mage::registry('current_category')->getId())->getParentCategory()->getId();  exit;
          /*if($parent_id == '84')
          {
              
          }*/
          if($attrmapping['beautyprofile_filter'] == 'hair_scalp_type_oily')
              {
                $hairoilyscalpORcondition[] = array('attribute'=>$attrmapping['attribute_name'],'eq'=>$attrmapping['option_id']);
                  
              }
          else if($attrmapping['beautyprofile_filter'] == 'hair_scalp_type_normal')
          {
                $scalpFlag = 'normal';
                $hairnormalscalpORcondition[] = array('attribute'=>$attrmapping['attribute_name'],'eq'=>$attrmapping['option_id']);
          }
          else if($attrmapping['attribute_name'] == 'skin_type' || $attrmapping['attribute_name'] == 'skin_complexion')
          {
          ###############################OR CONDITION FOR SKIN TYPE AND COMPLEXION##############
              $collection->addAttributeToFilter($attrmapping['attribute_name'],array('finset'=>$attrmapping['option_id']));
          }
          else
          {
          ###############################OR CONDITION FOR ALL PROBLEMS/BENEFIT##################
            //$collection->addAttributeToFilter($attrmapping['attribute_name'],array('finset'=>$attrmapping['option_id']));
            $problemOrArr[] = array('attribute'=>$attrmapping['attribute_name'],'finset'=>$attrmapping['option_id']);
             //$collection->addAttributeToFilter($attrmapping['attribute_name'],array('finset'=>$attrmapping['option_id']));
             if($attrmapping['attribute_name'] == 'skin_type')
             {
              $setFalg = 'yes';
             }
          }
        }
        $collection->addAttributeToFilter($problemOrArr);
        
         if($hairoilyscalpORcondition != null && count($hairoilyscalpORcondition) > 0)
         {
          $collection->addAttributeToFilter($hairoilyscalpORcondition);
         } 
         if($hairnormalscalpORcondition != null && count($hairnormalscalpORcondition) > 0)
         {
          $hairnormalscalpORcondition[] = array('attribute'=>'scalp_type','neq'=>'587');
          $collection->addAttributeToFilter($hairnormalscalpORcondition);
         }  
      }
      //echo "<pre>"; print_r($problemOrArr);echo "</pre>";
     // echo "<br>"; 
     // echo $collection->getSelect()->__toString(); echo "<br>";
      /*if($d['skin_type'] != null && $d['skin_type'] != 'skin_type_very_oily' && $d['skin_type'] != 'skin_type_very_dry'){*/
        if($setFalg == 'yes')
        {
          //get texture ordering
        $texture_collection = Mage::getModel('beautyprofiler/skintypetexture ')->getCollection();

        $texture_collection->addFieldToFilter("skin_type",$d['skin_type']);
        //echo"<pre>";print_r($texture_collection->getData());exit;
        $collection->addAttributeToSelect('texture', array('eq', 0));

        $textureData = $texture_collection->getData();
       
        $order_by = '';
        $order_by .= 'CASE ';
        
        foreach ($textureData as $key => $option_id) {
        
           $texture_id = $option_id['texture_option_id'];
           $add = $key+1;
           $order_by .=  'WHEN at_texture.value = '."$texture_id".' THEN  '."$add".' ';
                          
        }
        $order_by .= 'END';

       
      $collection->getSelect()->columns(  
         
              array('order_by_texture' => new Zend_Db_Expr($order_by))
          );

     
      $collection->getSelect()->order('order_by_texture ASC'); 
        }
        
   /* }*/
   //echo $collection->getSelect()->__toString(); echo "<br>";
        return $collection;
    }
    public function addJavascriptBlock($observer)
    {
      $controller = $observer->getAction();
      $controller_name = Mage::app()->getFrontController()->getRequest()->getControllerName(); 
      $controller_action = Mage::app()->getFrontController()->getRequest()->getActionName();
      if($controller_name === 'category' && $controller_action === 'view') {
            $this->appendJS();
        }
    }
    //add js to observer
    private function appendJS() { 
    $category = Mage::registry('current_category'); //current page is category it will return true;
    if($category !== null)
        {
         $cat_id = $category->getId();
        }
        
        $current_url = $url=strtok(Mage::helper('core/url')->getCurrentUrl(),'?');
        $option_param = Mage::app()->getRequest()->getParam('opt');
        $opt = 
        $this->getcurrentcategoryFilter();
        $layout = Mage::app()->getLayout();
        $block = $layout->createBlock('core/text');
        $block->setText(
        '<script type="text/javascript">
        jQuery(document).ready(function () {
        jQuery("#changeprofile").change(function(){
        var current_url = "'.$current_url.'";
        var param = "'.$option_param.'";
        console.log(param);
        var selected_profile_id = this.value;
                $j.ajax({
                url: baseUrl+"beautyprofiler/index/setprofile",
                type: "POST",
                data: "selected_profile_id="+selected_profile_id+"&current_cat="+'.$cat_id.'+"&opt="+param,
                dataType: "json",
                success: function(data) { 
                   if(data.status != "no url")
                   { 
                    //alert(data.url);
                    window.location.href = current_url+"?"+data.url;
                   }
                   else
                   {
                    window.location.href = data.url;
                   }
                }
                });
        });
        });
            /*function hello() {
              alert("fhgjfhgfjghfkgh");
                console.log("Foo");
            }*/
            /*hello()*/;
        </script>'
        );        
        $layout->getBlock('head')->append($block);  
    }
    //get current category filters
    public function getcurrentcategoryFilter()
    {
    $category = Mage::registry('current_category'); //current page is category it will return true;
        if($category !== null)
        {
        $parent = Mage::getModel('catalog/category')
        ->load($category->getId())
        ->getParentCategory();
        $collection = Mage::getModel('beautyprofiler/filtercategory')->getCollection();
        $collection->addFieldToFilter('sub_cat_id',$parent->getId())->addFieldToFilter('sub_sub_cat_id',$category->getId())->addFieldToFilter('filter_type',$filter_type);
         return $collection->count();    
        }
        else
        { 
          echo "else"; exit;
             return 0;    
        }  
    }
    public function deleteItem($observer) 
    {

       $cart = Mage::getModel('checkout/cart')->getQuote();
       $allcatofcart = array();
       foreach($cart->getAllItems() as $item) {
          $allcatofcart = array_merge($allcatofcart,$item->getProduct()->getCategoryIds());
        }
        if(!array_intersect(Webclues_Routinefinder_Model_Constant::getsampleparentcat(),$allcatofcart))
        {
          $cartitemcat = array();
          foreach($cart->getAllItems() as $item) {
          $cartitemcat = $item->getProduct()->getCategoryIds();
            if(array_intersect($cartitemcat,Webclues_Routinefinder_Model_Constant::getsamplecat()))
            {
             $cart->removeItem($item->getId()); 
            }
          }
        }
    }

    ###########################EXTRA FUNCTION########################
    private function getmaincatProductbyprofile($profile_id,$customer_entity_id=null,$observer=null,$beautyprofile_fields_new=array(),$category_id)
    { 
      $a = 1;
      foreach($beautyprofile_fields_new as $all_fields)
      {
          $beautyprofile_fields = $all_fields['beautyprofile_fields'];
          $column_for_filter = explode(',',$beautyprofile_fields);
        //  echo "<pre>"; print_r($all_fields); echo "</pre>"; exit;
          /**********Below fields will not consider in product filter by profile**********/
          $not_filtered_column = array('profile_id','customer_entity_id','full_name','email','dob','profile_pic_url','hair_exposure_to_others_specify','hair_scalp_concern_others_specify','brand_face_wash','brand_eye_cream','barnd_finishing_powder','brand_miscellar','brand_eye_serum','brand_eye_pencil','brand_cleanser','brand_sunscreen','brand_eye_shadow','brand_toner','brand_bb_cream','brand_lipstick','brand_face_serum','barnd_foundation','brand_lipgloss','brand_face_cream','brand_compact','brand_perfume','profile_status','is_default');
          $extrafilter = array('skin_type','face_pigmentation_type','complexion','faceshape','hair_volume','hair_texture','hair_scalp_type','sensitive_skin');
          $extrafilter['skin_type'] = Webclues_Routinefinder_Model_Constant::extrafilterskintype();
          $extrafilter['complexion'] = Webclues_Routinefinder_Model_Constant::extrafiltercomplexion();
          $extrafilter['hair_volume'] = Webclues_Routinefinder_Model_Constant::extrafilterhirvolume();
          $extrafilter['hair_texture'] = Webclues_Routinefinder_Model_Constant::extrafilterhirtexture();
          $extrafilter['hair_scalp_type'] = Webclues_Routinefinder_Model_Constant::extrafilterhirscalptype();
          $extrafilter['sensitive_skin'] = Webclues_Routinefinder_Model_Constant::extrafiltersensitiveskin();
          //get current beautyprofile 
          $getProfile = Mage::getSingleton('beautyprofiler/beutyprofiler')->getCollection()->addFieldToFilter('customer_entity_id',array('customer_entity_id',$customer_entity_id->getId()))->addFieldToFilter('profile_id',array('profile_id'=>$profile_id))->getFirstItem();

          //observe product collection
          $collection = $observer->getEvent()->getCollection(); 
          
            foreach ($getProfile->getData() as $column => $item) 
            { 
              //check for not required fields for filter by category
                if(in_array($column,$column_for_filter))
                {

                    if(in_array($column,$extrafilter))
                    {  
                      
                      $d[$all_fields['sub_sub_cat_id']][$column] = $extrafilter[$column][$item];
                      $beautyprofile_attributes_map_to_default[$all_fields['sub_sub_cat_id']][] = $extrafilter[$column][$item];
                    }
                    else
                    {
                     
                      $d[$all_fields['sub_sub_cat_id']][$column] = $item;
                      $beautyprofile_attributes_map_to_default[$all_fields['sub_sub_cat_id']][] = $column;
                    }
                }
          }
       
          //echo $all_fields['sub_sub_cat_id'];
          
           $a++;
          
      }
      $collection_attrmapping = Mage::getModel('beautyprofiler/attrmapping')->getCollection();
      foreach ($beautyprofile_attributes_map_to_default as $key => $beautyprofile_attributes_map_to) {
        $collection_attrmapping->addFieldToFilter(array('beautyprofile_filter'),array($beautyprofile_attributes_map_to));
        $profilemapdata[$key] = $collection_attrmapping->getData();
   //    echo "<pre>"; print_r($collection_attrmapping->getData()); exit;
      }
      foreach($profilemapdata as $key => $profilemap) {
        foreach ($profilemap as $key => $profiled) {
        $filar[] = array('attribute' => $profiled['attribute_name'], 'finset' => $profiled['option_id']);
        }
        $collection->addFieldToFilter($filar);
       
        /*$collection->addFieldToFilter(array(
                                array('attribute' => 'name', 'finset' => '%blah%'),
                                array('attribute' => 'name', 'finset' => '%yes%')
                                ));
        $collection->addFieldToFilter($attr_value['attribute_name'],array('finset'=>$attr_value['option_id']));*/
      }
      //echo $collection->getSelect()->__toString();
      // print_r($collection->getData()); 
       //echo "<pre>"; print_r($profilemapdata); 

        /*  $collection = Mage::getModel('catalog/product')->getCollection();
          $collection->addFieldToFilter(array(
                                array('attribute' => 'name', 'like' => '%blah%'),
                                array('attribute' => 'name', 'like' => '%yes%')
                                ));
          $collection->addFieldToFilter(array(
                                array('attribute' => 'description', 'like' => '%blah%'),
                                array('attribute' => 'description', 'like' => '%yes%')
                                ));
          echo "<pre>"; print_r($d); echo "</pre>"; */
     // exit;
      //  echo "<pre>"; print_r($d); echo "</pre>"; exit;
    }

    public function ConsultDermitologistforissueoncartpage($type)
    {
      $array['pigmentation']['field'] = array('face_pigmentation_type','face_pigmentation_overall','face_pigmentation_around_mouth','face_pigmentation_cheeks','face_pigmentation_forehead');
      $array['pigmentation']['condition'] = array(array('neq'=>0),array('neq'=>0),array('neq'=>0),array('neq'=>0),array('neq'=>0));
      $array['darkcircle']['field'] = array('eyes_dark_circles');
      $array['darkcircle']['condition'] = array(array('neq'=>0));
      $array['acne']['field'] = array('face_acne_prone');
      $array['acne']['condition'] = array(array('neq'=>0));
      return $array[$type];
    }
}
   