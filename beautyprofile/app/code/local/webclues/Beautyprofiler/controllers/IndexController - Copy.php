<?php
class Webclues_Beautyprofiler_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
    Mage::getSingleton('core/session')->unsLastinsid();
    //for edit profile set profile id in session for further process
    if(null !== Mage::app()->getRequest()->getParam('id') && !empty(Mage::app()->getRequest()->getParam('id')))
    {
        Mage::getSingleton('core/session')->setLastinsid(Mage::app()->getRequest()->getParam('id'));
        Mage::register('',$profileData);
    }
    //if customer login then only can add profile otherwise redirect to login page
    if(Mage::getSingleton('customer/session')->isLoggedIn()) {
          $this->loadLayout();
          $this->getLayout()->getBlock("head")->setTitle($this->__("Beauty Profiler"));
          $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
          $breadcrumbs->addCrumb("home", array(
                  "label" => $this->__("Home Page"),
                  "title" => $this->__("Home Page"),
                  "link"  => Mage::getBaseUrl()
          ));
          $breadcrumbs->addCrumb("beauty profiler", array(
                  "label" => $this->__("Beauty Profiler"),
                  "title" => $this->__("Beauty Profiler")
          ));
          $this->renderLayout(); 
      }
    else{
        $celurl=Mage::getBaseUrl().'beautyprofiler/';
        Mage::getSingleton('customer/session')->setBeforeAuthUrl($celurl);
        $redirect_url = Mage::getUrl('customer/account/login/');
        Mage::app()->getFrontController()->getResponse()->setRedirect($redirect_url);
      }  
    }
     public function SaveallAction() {
        if(isset($_FILES['profile_pic_url']) && !empty($_FILES['profile_pic_url']))
        {
           Mage::getModel('beautyprofiler/beutyprofiler')->saveImage(Mage::getSingleton('core/session')->getLastinsid());
        }
       Mage::getSingleton('core/session')->unsLastinsid();
       $this->_redirectUrl(Mage::getBaseUrl()."beautyprofiler/list");
         Mage::getSingleton('core/session')->addSuccess('Saved Successfully.');
     }
     public function SaveAction() 
     {
<<<<<<< .mine


      foreach($this->getTableField() as $key => $val){         
            if(!in_array($key,$post_data))
            {
              $post_data[$key] = 0;
            }
          }

      //echo "<pre>"; print_r($_POST);die;
=======

        /* foreach($this->getTableField() as $key => $val) {
             if (!array_key_exists($key, $_POST)) {
                 $_POST[$key] = 0;
             }
         }
         echo '<pre>'; print_r($_POST);exit;*/
>>>>>>> .r184
     $_POST['email'] = $_POST['useremail'];
     $customerData = Mage::getSingleton('customer/session')->getCustomer();

     $_POST['customer_entity_id'] =  $customerData->getId();
     $post_data = Mage::getModel("beautyprofiler/beutyprofiler");
     

    
     //final step insetion in last step

     echo Mage::getSingleton('core/session')->getLastinsid();exit();

     if(null !== (Mage::getSingleton('core/session')->getLastinsid()))
      {

        if($this->checkEmail())
        {
          $_POST['profile_status'] = 1;
<<<<<<< .mine
     
=======

>>>>>>> .r184
      $post_data->load(Mage::getSingleton('core/session')->getLastinsid())->addData($_POST);
//       try{

//         //$post_data = Mage::getModel("beautyprofiler/beautyprofilerproduct");
//       //$field = $this->getFieldArray();\
//       //echo "<pre>";print_r($post_data);exit;
// //Arjun 
     // /echo "<pre>"; print_r($post_data);die;   
      
//  }
// }catch (Exception $e) {
//             Zend_Debug::dump($e->getMessage());
//         }

              $post_data->save(); 
            }
        
        //Arjun
       }
     

     else
      {

          if($this->checkEmail())
          {
            //if user on profile edit page it then profile status is automatically active
            if(null !== Mage::app()->getRequest()->getParam('id') && !empty(Mage::app()->getRequest()->getParam('id')))
            {
            $_POST['profile_status'] = 1;
            }
            else
            {
            $_POST['profile_status'] = 0;  
            }

              $post_data->addData($_POST);
            try{
                  $post_data->save(); 
                  $lastId = $post_data->getId(); // Last id
              }
              catch (Exception $e) {
                  Zend_Debug::dump($e->getMessage());
              }
              Mage::getSingleton('core/session')->setLastinsid($lastId); 
              $myValue = Mage::getSingleton('core/session')->getLastinsid();
              $data['last_id'] = $myValue;
          }
      }


         if(isset($_POST['curstep']) && $_POST['curstep'] == 'step-4')
            {

                $this->getSummaryhtml();

            }
            else
            {
              $html['skin_goal'] = array();
              $html['face_data'] = array();
              $html['eyes_data'] = array();
              echo json_encode($html); exit;

            }
        
      }

     /* protected function getTableField()
      {
        return
            array(
                'product_id'=>0,
                'skin_type_oily'=>0,
                'skin_type_very_oily'=>0,
                'skin_type_dry'=>0,
                'skin_type_very_dry'=>0,
                'skin_type_normal'=>0,
                'skin_type_normal_to_dry'=>0,
                'sensitive_skin'=>0,
                'sensitive_skin_reason'=>0,
                'sensitive_skin_rate'=>0,
                'face_dehydrated_overall'=>0,
                'face_dehydrated_around_mouth'=>0,
                'face_dehydrated_around_cheeks'=>0,
                'face_dehydrated_around_forehead'=>0,
                'face_uneven_skin_tone_overall'=>0,
                'face_uneven_skin_tone_around_mouth'=>0,
                'face_uneven_skin_tone_around_cheeks'=>0,
                'face_uneven_skin_tone_around_forehead'=>0,
                'face_uneven_skin_texture_overall'=>0,
                'face_uneven_skin_texture_around_mouth'=>0,
                'face_uneven_skin_texture_around_cheeks'=>0,
                'face_uneven_skin_texture_around_forehead'=>0,
                'pigmentation_type_significant'=>0,
                'pigmentation_type_mild'=>0,
                'face_pigmentation_overall'=>0,
                'face_pigmentation_around_mouth'=>0,
                'face_pigmentation_cheeks'=>0,
                'face_pigmentation_forehead'=>0,
                'face_aging_fine_lines'=>0,
                'face_aging_deep_lines'=>0,
                'face_aging_segging_dull_skin'=>0,
                'face_open_pores'=>0,
                'face_acne_prone'=>0,
                'face_acne_prone_type'=>0,
                'face_acne_treatment'=>0,
                'eyes_fine_lines'=>0,
                'eyes_deep_lines'=>0,
                'eyes_hydration'=>0,
                'eyes_puffy_and_tired_eyes'=>0,
                'eyes_dark_circles'=>0,
                'hands_and_feet_dry'=>0,
                'hands_and_feet_regular'=>0,
                'complexion_very_fair'=>0,
                'complexion_fair'=>0,
                'complexion_wheatish_olive'=>0,
                'complexion_dusky'=>0,
                'complexion_very_dusky'=>0,
                'faceshape_oval'=>0,
                'faceshape_square'=>0,
                'faceshape_diamond'=>0,
                'faceshape_round'=>0,
                'hair_volume_thick'=>0,
                'hair_volume_thin'=>0,
                'hair_volume_medium'=>0,
                'hair_texture_straight'=>0,
                'hair_texture_straight_with_waves'=>0,
                'hair_texture_frizzy'=>0,
                'hair_texture_curly'=>0,
                'hair_texture_very_curly'=>0,
                'hair_scalp_type_dry'=>0,
                'hair_scalp_type_oily'=>0,
                'hair_scalp_type_normal'=>0,
                'hair_exposure_to_colour_fashion'=>0,
                'hair_exposure_to_grey_coverage'=>0,
                'hair_exposure_to_straightened'=>0,
                'hair_exposure_to_none'=>0,
                'hair_exposure_to_others'=>0,
                'hair_exposure_to_others_specify'=>'',
                'hair_concern_hair_fall'=>0,
                'hair_concern_hair_breakage'=>0,
                'hair_concern_lacks_volume'=>0,
                'hair_concern_dry_and_dull'=>0,
                'hair_concern_frizzy'=>0,
                'hair_scalp_concern_sensitive'=>0,
                'hair_scalp_concern_flaky_scalp'=>0,
                'hair_scalp_concern_none'=>0,
                'hair_scalp_concern_others'=>0,
                'hair_scalp_concern_others_specify'=>'',
                'prepare_face_cleanse_tone_face_wash'=>0,
                'prepare_face_cleanse_tone_miscellar'=>0,
                'prepare_face_cleanse_tone_cleanser'=>0,
                'prepare_face_cleanse_tone_toner'=>0,
                'prepare_face_hydrate_protect_face_serum'=>0,
                'prepare_face_hydrate_protect_face_cream'=>0,
                'prepare_face_hydrate_protect_eye_cream'=>0,
                'prepare_face_hydrate_protect_eye_serum'=>0,
                'prepare_face_hydrate_protect_sunscreen'=>0,
                'prepare_face_grooming_bb_cream'=>0,
                'prepare_face_grooming_sunscreen'=>0,
                'prepare_face_grooming_liogloss'=>0,
                'prepare_face_grooming_foundation'=>0,
                'prepare_face_grooming_compact'=>0,
                'prepare_face_grooming_finishing_powder'=>0,
                'prepare_face_grooming_eye_pencil'=>0,
                'prepare_face_grooming_eye_shadow'=>0,
                'prepare_face_grooming_lipstick'=>0,
                'prepare_face_grooming_perfume'=>0,
                'beauty_routine_cleanse_tone_face_wash'=>0,
                'beauty_routine_cleanse_tone_miscellar'=>0,
                'beauty_routine_cleanse_tone_cleanser'=>0,
                'beauty_routine_cleanse_tone_toner'=>0,
                'beauty_routine_repair_rejusvenate_face_serum'=>0,
                'beauty_routine_repair_rejusvenate_face_cream'=>0,
                'beauty_routine_repair_rejusvenate_eye_cream'=>0,
                'beauty_routine_repair_rejusvenate_eye_serum'=>0,
                'beauty_routine_grooming_foot_cream'=>0,
                'beauty_routine_grooming_hand_cream'=>0,
                'brand_face_wash'=>0,
                'brand_eye_cream'=>0,
                'barnd_finishing_powder'=>0,
                'brand_miscellar'=>0,
                'brand_eye_serum'=>0,
                'brand_eye_pencil'=>0,
                'brand_cleanser'=>0,
                'brand_sunscreen'=>0,
                'brand_eye_shadow'=>0,
                'brand_toner'=>0,
                'brand_bb_cream'=>0,
                'brand_lipstick'=>0,
                'brand_face_serum'=>0,
                'barnd_foundation'=>0,
                'brand_lipgloss'=>0,
                'brand_face_cream'=>0,
                'brand_compact'=>0,
                'brand_perfume'=>0,
                'skin_goals_radiant_and_smooth_skin'=>0,
                'skin_goals_clear_and_bright_skin'=>0,
                'skin_goals_well_hydrate_and_supple'=>0,
                'skin_goals_well_groomed_look'=>0,
                'skin_goals_maintain_and_improve_my_current_skin'=>0,
            );
    }*/




      /*
      *purpose : function checks current session with email exist
      *developer : Kruti Aparnathi
      */
       protected function checkEmail(){
         $profile = Mage::getModel('beautyprofiler/beutyprofiler')->getCollection()
                    ->addFieldToSelect('profile_id')
                    ->addFieldToFilter('email', array('email' => $_POST['useremail']))
                    ->load();     
            if(isset($profile->getData()[0]['profile_id']) && !empty($profile->getData()[0]['profile_id']))
              {
                if(null !== (Mage::getSingleton('core/session')->getLastinsid()) && Mage::getSingleton('core/session')->getLastinsid() == $profile->getData()[0]['profile_id'])
                {
              
                 return true;
                }
                else
                {
                  
                 $html['error'] = 'Email already exist';
                echo json_encode($html); exit;
                }
              }
              else
              {
               
                return true;
              }
      }
   protected function getSummaryhtml()
   {
    $profiledata = $this->getProfileInfo();
        $skin_goal_html = '<h4 class="title_diff">Skin goals</h4>
            <ol>';
        
       
        if(!empty($profiledata['skin_goals']))
        {
          foreach ($profiledata['skin_goals'] as $skin_goals) {
            $skin_goal_html .= '<li>'.$skin_goals.'</li>';    
           }   
        }
        $skin_goal_html .= '</ol>';
        $ImgUrl =  Mage::getBaseUrl().'/media/beautyprofile/ff1.png';
         $face_data_html = '  <div class="face-box">
                        <div class="new_bdr bdr-div change_box">
                            <img src="'.$ImgUrl.'">
                            <h5 class="font_change">Face</h5>
                        </div>
                        <div class="bdr-div change_box padding_pre"><h5 class="title_second_diff">Dehydrate </h5>';
    
        if(!empty($profiledata['face_data']['dehydrated']))
        {
          foreach ($profiledata['face_data']['dehydrated'] as $value) {
           $face_data_html .= '<p class="medium_change_font">';
           $face_data_html .= $value;
           $face_data_html .= '</p><br>';
          }

        }
        else
        {
           $face_data_html .= '<p class="medium_change_font">';
           $face_data_html .= '-';
           $face_data_html .= '</p><br>';
        }
        $face_data_html .= '<h5 class="title_second_diff">Pigmentation</h5>';
        if(!empty($profiledata['face_data']['pigmentation']))
        {
          foreach ($profiledata['face_data']['pigmentation'] as $value) {
           $face_data_html .= ' <p class="medium_change_font">';
           $face_data_html .= $value;
           $face_data_html .= '</p>';
          }
        }
        else
        {
           $face_data_html .= '<p class="medium_change_font">';
           $face_data_html .= '-';
           $face_data_html .= '</p><br>';
        }
         $face_data_html .= '</div>';
         $face_data_html .= '<div class="bdr-div change_box">
                            <h5 class="font_change_new">Barunii tips</h5>
                            <p class="roman_change_font">1.Drink lots of water and fluids at room temperature.</p>
                            <p class="roman_change_font">2.Keep facial mist handy to spray your face if in ac or sun.
                                You may alternate between facial mist and hydrating gel creams.</p></div>
                        <h6 class="view_font">VIEW RECOMMENDED PRODUCTS</h6>
                    </div>';
       $ImgUrl1 =  Mage::getBaseUrl().'/media/beautyprofile/f2.png';
        $eye_data_html = '<div class="face-box">
                        <div class="new_bdr bdr-div change_box">
                            <img src="'.$ImgUrl1.'">
                            <h5 class="font_change">Eyes</h5>
                        </div>';
        if(!empty($profiledata['eye_data']))
        {
          foreach ($profiledata['eye_data'] as $value) {
           $eye_data_html .= ' <p class="medium_change_font">';
           $eye_data_html .= $value;
           $eye_data_html .= '</p>';
          }
        }
        else
        {
           $eye_data_html .= '<p class="medium_change_font">';
           $eye_data_html .= '-';
           $eye_data_html .= '</p><br>';
        }




       $eye_data_html .= '<div class="bdr-div change_box padding_pre">
                            <h5 class="title_second_diff">Dark circles </h5>
                            <p class="medium_change_font">Very dark</p><br>
                            <h5 class="title_second_diff">Puffy and tired </h5>
                            <p class="medium_change_font">Eyes </p>
                        </div>
                        <div class="bdr-div change_box">
                            <h5 class="font_change_new">Barunii tips</h5>
                            <p class="roman_change_font">1.Apply moisturiser every night.</p>
                            <p class="roman_change_font">2.Drink 4 litres of water daily.</p>
                            <p class="roman_change_font">3.Use leave-in conditioner.</p>

                        </div>
                        <h6 class="view_font">VIEW RECOMMENDED PRODUCTS</h6>
                    </div>';
        $html['skin_goal'] = $skin_goal_html;
        $html['face_data'] = $face_data_html;
        $html['eyes_data'] = $eye_data_html;

        echo json_encode($html); exit;
   }
   protected function getProfileInfo()
   {
     $post_data = Mage::getModel("beautyprofiler/beutyprofiler");

     $data = $post_data->load(Mage::getSingleton('core/session')->getLastinsid());
     $alldata = $data->getData();

    //echo "<pre>"; print_r($alldata); 
     $profiledata['skin_goals'] = array();
     if($alldata['skin_goals_radiant_and_smooth_skin'] == 1){
      $profiledata['skin_goals'][] = 'Radiant & smooth skin';
     }
     if($alldata['skin_goals_clear_and_bright_skin'] == 1){
      $profiledata['skin_goals'][] = 'Clear & bright skin';
     }
     if($alldata['skin_goals_well_hydrate_and_supple'] == 1){
      $profiledata['skin_goals'][] = 'Well hydrate and supple';
     }
     if($alldata['skin_goals_well_groomed_look'] == 1){
      $profiledata['skin_goals'][] = 'Well groomed look';
     }
     if($alldata['skin_goals_maintain_and_improve_my_current_skin'] == 1){
      $profiledata['skin_goals'][] = 'Maintain & improve my current skin';
     }
     $profiledata['face_data']['dehydrated'] = array();
     if($alldata['face_dehydrated_overall'] == 1){
      $profiledata['face_data']['dehydrated'][] = 'Overall';
     }
     if($alldata['face_dehydrated_around_mouth'] == 1){
      $profiledata['face_data']['dehydrated'][] = 'Mouth';
     }
     if($alldata['face_dehydrated_around_cheeks'] == 1){
      $profiledata['face_data']['dehydrated'][] = 'Cheeks';
     }
     if($alldata['face_dehydrated_around_forehead'] == 1){
      $profiledata['face_data']['dehydrated'][] = 'Forehead';
     }
     $profiledata['face_data']['pigmentation'] = array();
     $profiledata['face_data']['pigmentation'] = array();
     if($alldata['face_pigmentation_overall'] == 1){
      $profiledata['face_data']['pigmentation'][] = 'Overall';
     }
     if($alldata['face_pigmentation_around_mouth'] == 1){
      $profiledata['face_data']['pigmentation'][] = 'Mouth';
     }
     if($alldata['face_pigmentation_cheeks'] == 1){
      $profiledata['face_data']['pigmentation'][] = 'Cheeks';
     }
     if($alldata['face_pigmentation_forehead'] == 1){
      $profiledata['face_data']['pigmentation'][] = 'Forehead';
     }
     $profiledata['eye_data'] = array();
     if($alldata['eyes_fine_lines'] == 1){
      $profiledata['eye_data'][] = 'Fine lines';
     }
     if($alldata['eyes_deep_lines'] == 1){
      $profiledata['eye_data'][] = 'Deep lines';
     }
     if($alldata['eyes_hydration'] == 1){
      $profiledata['eye_data'][] = 'Hydration';
     }
     if($alldata['eyes_puffy_and_tired_eyes'] == 1){
      $profiledata['eye_data'][] = 'Puffy and tired eyes';
     }
     if($alldata['eyes_dark_circles'] == 1){
      $profiledata['eye_data'][] = 'Dark Circle';
     }
 
     return $profiledata;
   }
   protected function getProductByProfile($profile_id=null)
   {
    $profile_id = 4;
    $profilecollection = Mage::getSingleton('beautyprofiler/beutyprofiler')->load(4);

    /*non atrribute columns*/
    $nonattr = array('profile_id','customer_entity_id','full_name','email','dob','profile_pic_url','hair_exposure_to_others_specify','hair_scalp_concern_others_specify','skin_type','sensitive_skin_reason','sensitive_skin_rate');
    $filters = array();
    $temp = 1;
    foreach($profilecollection->getData() as $profilekey => $profiledata){
      if(!in_array($profilekey,$nonattr))
      {
       $filter[] = array('attribute' => $this->getAttributeCode($profilekey), 'eq' => $profiledata);
       // $filter[] = array('attribute' => 'face_dehydrated_overall', 'eq' => 1);
       // $filter[] = array('attribute' => 'sensitive_skin', 'eq' => 1);
       
       if($temp == 55)
       {
        break;
       }
       $temp++;
      }
    }
   
    echo "<pre>";
    print_r($filter);
    $productcollection = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('sku')
            ->addAttributeToSelect('name');
    $productcollection->addAttributeToFilter($filter);
    $productcollection->load();
     print_r($productcollection->getData());
    foreach($productcollection as $product){
              echo $product->getId();
              echo $product->getName();
              echo "<br>";
            }
    exit;
/*
/*$filter['face_dehydrated_overall'] = array(
        'eq',
        1
    );
   $filter['beauty_rout_groom_hand_cream'] = array(
        'eq',
        1
    );*/

/*$filter[] = array(
        'attribute' => 'face_dehydrated_overall',
        'finset'    => 1
    );
$filter[] = array(
        'attribute' => 'beauty_rout_groom_hand_cream',
        'finset'    => 1
    );*/
echo "<pre>";print_r($profilecollection->getData());

   //echo $profilecollection->getFullName(); 
      

//$filters[] = array('face_dehydrated_overall' => $profilecollection->getFaceDehydratedOverll());

//foreach ($filters as $attributeCode => $value) {
        /*$productcollection->addAttributeToSelect($attributeCode);*/
     //   $productcollection->addAttributeToFilter($attributeCode, $value);
//}
      /*  echo $profilecollection->getFaceDehydratedOverall();

$filter[] = array(
        'attribute' => 'face_dehydrated_overall',
        'finset'    => $profilecollection->getFaceDehydratedOverall()
    );
$filter[] = array(
        'attribute' => 'beauty_routine_grooming_hand_cream',
        'finset'    => $profilecollection->getBeautyRoutineGroomingHandCream()
    );

//$collection->addAttributeToFilter($filter);

//$productcollection->addAttributeToFilter('face_dehydrated_overall',$profilecollection->getFaceDehydratedOverall())->load();
$productcollection->addAttributeToFilter($filter)->load();

            echo count($productcollection); echo "<br>";
            foreach($productcollection as $product){
              echo $product->getId();
              echo $product->getName();
              echo "<br>";
            }
            
            /*->addAttributeToSelect('attribute_set_id')
            ->addAttributeToSelect('type_id');
*/
   }

   protected function getAttributeCode($column_field) {
       $profilecollection = Mage::getModel('beautyprofiler/beautyprofilerattrmapaing')->getCollection()->addFieldToSelect('attribute_code')->addFieldToFilter('field_name', array('field_name' => $column_field))->getFirstItem();
       return $profilecollection->getAttributeCode();
   }


   protected  function getTableField()
   {
    return    
     array(
          'product_id'=>0,
          'skin_type_oily'=>0,
          'skin_type_very_oily'=>0,
          'skin_type_dry'=>0,
          'skin_type_very_dry'=>0,
          'skin_type_normal'=>0,
          'skin_type_normal_to_dry'=>0,
          'sensitive_skin'=>0,
          'sensitive_skin_reason'=>0,
          'sensitive_skin_rate'=>0,
          'face_dehydrated_overall'=>0,
          'face_dehydrated_around_mouth'=>0,
          'face_dehydrated_around_cheeks'=>0,
          'face_dehydrated_around_forehead'=>0,
          'face_uneven_skin_tone_overall'=>0,
          'face_uneven_skin_tone_around_mouth'=>0,
          'face_uneven_skin_tone_around_cheeks'=>0,
          'face_uneven_skin_tone_around_forehead'=>0,
          'face_uneven_skin_texture_overall'=>0,
          'face_uneven_skin_texture_around_mouth'=>0,
          'face_uneven_skin_texture_around_cheeks'=>0,
          'face_uneven_skin_texture_around_forehead'=>0,
          'pigmentation_type_significant'=>0,
          'pigmentation_type_mild'=>0,
          'face_pigmentation_overall'=>0,
          'face_pigmentation_around_mouth'=>0,
          'face_pigmentation_cheeks'=>0,
          'face_pigmentation_forehead'=>0,
          'face_aging_fine_lines'=>0,
          'face_aging_deep_lines'=>0,
          'face_aging_segging_dull_skin'=>0,
          'face_open_pores'=>0,
          'face_acne_prone'=>0,
          'face_acne_prone_type'=>0,
          'face_acne_treatment'=>0,
          'eyes_fine_lines'=>0,
          'eyes_deep_lines'=>0,
          'eyes_hydration'=>0,
          'eyes_puffy_and_tired_eyes'=>0,
          'eyes_dark_circles'=>0,
          'hands_and_feet_dry'=>0,
          'hands_and_feet_regular'=>0,
          'complexion_very_fair'=>0,
          'complexion_fair'=>0,
          'complexion_wheatish_olive'=>0,
          'complexion_dusky'=>0,
          'complexion_very_dusky'=>0,
          'faceshape_oval'=>0,
          'faceshape_square'=>0,
          'faceshape_diamond'=>0,
          'faceshape_round'=>0,
          'hair_volume_thick'=>0,
          'hair_volume_thin'=>0,
          'hair_volume_medium'=>0,
          'hair_texture_straight'=>0,
          'hair_texture_straight_with_waves'=>0,
          'hair_texture_frizzy'=>0,
          'hair_texture_curly'=>0,
          'hair_texture_very_curly'=>0,
          'hair_scalp_type_dry'=>0,
          'hair_scalp_type_oily'=>0,
          'hair_scalp_type_normal'=>0,
          'hair_exposure_to_colour_fashion'=>0,
          'hair_exposure_to_grey_coverage'=>0,
          'hair_exposure_to_straightened'=>0,
          'hair_exposure_to_none'=>0,
          'hair_exposure_to_others'=>0,
          'hair_exposure_to_others_specify'=>'',
          'hair_concern_hair_fall'=>0,
          'hair_concern_hair_breakage'=>0,
          'hair_concern_lacks_volume'=>0,
          'hair_concern_dry_and_dull'=>0,
          'hair_concern_frizzy'=>0,
          'hair_scalp_concern_sensitive'=>0,
          'hair_scalp_concern_flaky_scalp'=>0,
          'hair_scalp_concern_none'=>0,
          'hair_scalp_concern_others'=>0,
          'hair_scalp_concern_others_specify'=>'',
          'prepare_face_cleanse_tone_face_wash'=>0,
          'prepare_face_cleanse_tone_miscellar'=>0,
          'prepare_face_cleanse_tone_cleanser'=>0,
          'prepare_face_cleanse_tone_toner'=>0,
          'prepare_face_hydrate_protect_face_serum'=>0,
          'prepare_face_hydrate_protect_face_cream'=>0,
          'prepare_face_hydrate_protect_eye_cream'=>0,
          'prepare_face_hydrate_protect_eye_serum'=>0,
          'prepare_face_hydrate_protect_sunscreen'=>0,
          'prepare_face_grooming_bb_cream'=>0,
          'prepare_face_grooming_sunscreen'=>0,
          'prepare_face_grooming_liogloss'=>0,
          'prepare_face_grooming_foundation'=>0,
          'prepare_face_grooming_compact'=>0,
          'prepare_face_grooming_finishing_powder'=>0,
          'prepare_face_grooming_eye_pencil'=>0,
          'prepare_face_grooming_eye_shadow'=>0,
          'prepare_face_grooming_lipstick'=>0,
          'prepare_face_grooming_perfume'=>0,
          'beauty_routine_cleanse_tone_face_wash'=>0,
          'beauty_routine_cleanse_tone_miscellar'=>0,
          'beauty_routine_cleanse_tone_cleanser'=>0,
          'beauty_routine_cleanse_tone_toner'=>0,
          'beauty_routine_repair_rejusvenate_face_serum'=>0,
          'beauty_routine_repair_rejusvenate_face_cream'=>0,
          'beauty_routine_repair_rejusvenate_eye_cream'=>0,
          'beauty_routine_repair_rejusvenate_eye_serum'=>0,
          'beauty_routine_grooming_foot_cream'=>0,
          'beauty_routine_grooming_hand_cream'=>0,
          'brand_face_wash'=>0,
          'brand_eye_cream'=>0,
          'barnd_finishing_powder'=>0,
          'brand_miscellar'=>0,
          'brand_eye_serum'=>0,
          'brand_eye_pencil'=>0,
          'brand_cleanser'=>0,
          'brand_sunscreen'=>0,
          'brand_eye_shadow'=>0,
          'brand_toner'=>0,
          'brand_bb_cream'=>0,
          'brand_lipstick'=>0,
          'brand_face_serum'=>0,
          'barnd_foundation'=>0,
          'brand_lipgloss'=>0,
          'brand_face_cream'=>0,
          'brand_compact'=>0,
          'brand_perfume'=>0,
          'skin_goals_radiant_and_smooth_skin'=>0,
          'skin_goals_clear_and_bright_skin'=>0,
          'skin_goals_well_hydrate_and_supple'=>0,
          'skin_goals_well_groomed_look'=>0,
          'skin_goals_maintain_and_improve_my_current_skin'=>0,
          );
   }

}