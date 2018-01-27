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
        $celurl=Mage::getBaseUrl().'beautyprofiler/list/dashboard';
        Mage::getSingleton('customer/session')->setBeforeAuthUrl($celurl);
        $redirect_url = Mage::getUrl('customer/account/login/');
        Mage::app()->getFrontController()->getResponse()->setRedirect($redirect_url);
      }  
    }
     public function SaveallAction() {
        /*if(isset($_FILES['profile_pic_url']) && !empty($_FILES['profile_pic_url']))
        {
           Mage::getModel('beautyprofiler/beutyprofiler')->saveImage(Mage::getSingleton('core/session')->getLastinsid());
        }*/
       Mage::getSingleton('core/session')->unsLastinsid();
       $this->_redirectUrl(Mage::getBaseUrl()."beautyprofiler/list/dashboard");
       Mage::getSingleton('core/session')->addSuccess('Saved Successfully.');
     }

     public function SaveimgAction()
     { 
      if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name']))
      {
         $file_name = Mage::getSingleton('core/session')->getLastinsid();
        // print_r($file_name);exit;
         if(count($_FILES['file']['name']) > 0 and $_FILES['file']['name'] != '')
          {
            try
            { 
                $uploader = new Varien_File_Uploader('file'); // Instantiate varien file uploader class with your $_FILE global variable
                $uploader->setAllowedExtensions(array('doc','pdf','txt','docx', 'png', 'jpeg', 'jpg')); //Allowed extension for file

                $uploader->setAllowCreateFolders(true); //for creating the directory if not exists
                $uploader->setAllowRenameFiles(false); //if true, uploaded file's name will be changed, if file with the same name already exists directory.
                $path = Mage::getBaseDir('media') . DS . 'beautyprofile/profile'; // Set your destination path for your file
               
                $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $fname = $file_name.'.'.$ext; //file name 
              
                if($uploader->save($path, $fname)){
                $value = Mage::getSingleton('core/session')->getLastinsid().'.'.$ext;
                //print_r($value);exit;
                $row = Mage::getModel('beautyprofiler/beutyprofiler')->load(Mage::getSingleton('core/session')->getLastinsid());
                //print_r($row);exit;
                if(file_exists($value)){
                    unset($value);                      
                }
      
                $row->setProfilePicUrl($value)->save();
                 return true;
              }
                else{
                  echo 'File Uploading error'; exit;
                }
          }
           catch (Exception $e)
            {
               echo 'Error Message: '.$e->getMessage();
            }
          
        }
      }
        //print_r($_FILES['file']['name']);exit;
     }
     public function SaveAction() 
     {
        foreach($this->getTableField() as $key => $val) {
             if (!array_key_exists($key, $_POST)) {
                 $_POST[$key] = 0;
             }
         }

     $_POST['email'] = $_POST['useremail'];
     $customerData = Mage::getSingleton('customer/session')->getCustomer();

     $_POST['customer_entity_id'] =  $customerData->getId();
     $post_data = Mage::getModel("beautyprofiler/beutyprofiler");
   
     //final step insetion in last step
     if(null !== (Mage::getSingleton('core/session')->getLastinsid()))
      {
        if($this->checkEmail())
        {
          $_POST['profile_status'] = 1;

      $post_data->load(Mage::getSingleton('core/session')->getLastinsid())->addData($_POST);
      try{

            $post_data->save(); 
            }
        catch (Exception $e) {
            Zend_Debug::dump($e->getMessage());
        }
        }
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

      protected function getTableField()
      {
        return
            array(

                'skin_type'=>0,
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
                'face_pigmentation_type'=>0,
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
                'complexion'=>0,
                'faceshape'=>0,
                'hair_volume'=>0,
                'hair_texture'=>0,
                'hair_scalp_type'=>0,
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
                'undertone_warm'=>0,
                'undertone_neutral'=>0,
                'undertone_cool'=>0
            );
    }




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
              { //print_r(Mage::getSingleton('core/session')->getLastinsid());exit;
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

        //face data
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
           $face_data_html .= '</p>';
          }

        }
        else
        {
           $face_data_html .= '<p class="medium_change_font">';
           $face_data_html .= '-';
           $face_data_html .= '</p>';
        }
        $pigmentation_type = (isset($profiledata['face_data']['pigmentation_type'][0])) ? $profiledata['face_data']['pigmentation_type'][0] : '';
        $face_data_html .= '<br><h5 class="title_second_diff">'.$pigmentation_type.' pigmentation</h5>';

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
                        
                    </div>';

        //eye data
       $ImgUrl1 =  Mage::getBaseUrl().'/media/beautyprofile/f2.png';
        $eye_data_html = '<div class="face-box">
                        <div class="new_bdr bdr-div change_box">
                            <img src="'.$ImgUrl1.'">
                            <h5 class="font_change">Eyes</h5>
                        </div>
                        <h5 class="title_second_diff">Eyes</h5>';
        
        if(!empty($profiledata['eye_data']))
        { 
          foreach($profiledata['eye_data'] as $value) { 
           $eye_data_html .= '<p class="medium_change_font">';
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
                        
                        </div>
                        <div class="bdr-div change_box">
                            <h5 class="font_change_new">Barunii tips</h5>
                            <p class="roman_change_font">1.Apply moisturiser every night.</p>
                            <p class="roman_change_font">2.Drink 4 litres of water daily.</p>
                            <p class="roman_change_font">3.Use leave-in conditioner.</p>

                        </div>
                        
                    </div>';

        //hand and feet data
        $ImgUrl2 =  Mage::getBaseUrl().'/media/beautyprofile/f3.png';
        $hand_feet_data_html = '<div class="face-box">
                        <div class="new_bdr bdr-div change_box">
                            <img src="'.$ImgUrl2.'">
                            <h5 class="font_change">Hands & feet</h5>
                        </div>';

         if(!empty($profiledata['hand_and_feet']))
        { 
          foreach($profiledata['hand_and_feet'] as $value) { 
           $hand_feet_data_html .= '<p class="medium_change_font">';
           $hand_feet_data_html .= $value;
           $hand_feet_data_html .= '</p>';
          }
        }
        else
        {
           $hand_feet_data_html .= '<p class="medium_change_font">';
           $hand_feet_data_html .= '-';
           $hand_feet_data_html .= '</p>';
        }

                        
           $hand_feet_data_html .=  '<div class="bdr-div change_box padding_pre">
                        
                        </div>
                        <div class="bdr-div change_box">
                        <h5 class="font_change_new">Barunii tips</h5>
                        <p class="roman_change_font">1.Apply moisturiser every night.</p>
                        <p class="roman_change_font">2.Drink 4 litres of water daily.</p>
                        <p class="roman_change_font">3.Use leave-in conditioner.</p>

                    </div>
                   
                </div>';

        //hair data
          $ImgUrl3 =  Mage::getBaseUrl().'/media/beautyprofile/f4.png';
          $hair_data = '<div class="face-box">
                        <div class="new_bdr bdr-div change_box">
                            <img src="'.$ImgUrl3.'">
                            <h5 class="font_change">Hair</h5>
                        </div>';



           $hair_data .=  '<div class="bdr-div change_box padding_pre">
                            <h5 class="title_second_diff">Hair </h5>';
                            

                            if(!empty($profiledata['hair_concern']))
                              { 
                                foreach($profiledata['hair_concern'] as $value) { 
                                 $hair_data .= '<p class="medium_change_font">';
                                 $hair_data .= $value;
                                 $hair_data .= '</p>';
                                }
                              }
                              else
                              {
                                 $hair_data .= '<p class="medium_change_font">';
                                 $hair_data .= '-';
                                 $hair_data .= '</p>';
                              }

            $hair_data .= '<br>
                            <h5 class="title_second_diff">Scalp</h5>';

                            
                              if(!empty($profiledata['hair_scalp']))
                              { 
                                foreach($profiledata['hair_scalp'] as $value) { 
                                 $hair_data .= '<p class="medium_change_font">';
                                 $hair_data .= $value;
                                 $hair_data .= '</p>';
                                }
                              }
                              else
                              {
                                 $hair_data .= '<p class="medium_change_font">';
                                 $hair_data .= '-';
                                 $hair_data .= '</p>';
                              }

               $hair_data .=   '</div>';




             $hair_data .=  '<div class="bdr-div change_box">
                            <h5 class="font_change_new">Barunii tips</h5>
                            <p class="roman_change_font">1.Apply moisturiser every night.</p>
                            <p class="roman_change_font">2.Drink 4 litres of water daily.</p>
                            <p class="roman_change_font">3.Use leave-in conditioner.</p>

                        </div>
                        
                    </div>';

        $html['skin_goal'] = $skin_goal_html;
        $html['face_data'] = $face_data_html;
        $html['eyes_data'] = $eye_data_html;
        $html['hand_feet_data'] = $hand_feet_data_html;
        $html['hair_data'] = $hair_data;
        //print_r($html);exit;
        echo json_encode($html); exit;
   }
   protected function getProfileInfo()
   { 
     $post_data = Mage::getModel("beautyprofiler/beutyprofiler");
     $data = $post_data->load(Mage::getSingleton('core/session')->getLastinsid());
     $alldata = $data->getData();
     
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

     if($alldata['face_pigmentation_type'] == 1){
        $profiledata['face_data']['pigmentation_type'][] = 'Significant';
     }
     if($alldata['face_pigmentation_type'] == 2){
        $profiledata['face_data']['pigmentation_type'][] = 'Mild';
     }
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
     //hand and feet data
     if($alldata['hands_and_feet_dry'] == 1){
      $profiledata['hand_and_feet'][] = 'Dry';
     }
     if($alldata['hands_and_feet_regular'] == 1){
      $profiledata['hand_and_feet'][] = 'Regular';
     }
     if($alldata['undertone_warm'] == 1){
      $profiledata['hand_and_feet'][] = 'Warm';
     }
    if($alldata['undertone_neutral'] == 1){
      $profiledata['hand_and_feet'][] = 'Neutral';
     }
     if($alldata['undertone_cool'] == 1){
      $profiledata['hand_and_feet'][] = 'Cool';
     }

     //hair concern
     if($alldata['hair_concern_hair_fall'] == 1){
      $profiledata['hair_concern'][] = 'Hair fall';
     }
     if($alldata['hair_concern_hair_breakage'] == 1){
      $profiledata['hair_concern'][] = 'Hair breakage';
     }
     if($alldata['hair_concern_lacks_volume'] == 1){
      $profiledata['hair_concern'][] = 'Lacks volume';
     }
     if($alldata['hair_concern_dry_and_dull'] == 1){
      $profiledata['hair_concern'][] = 'Dry & dull';
     }
    if($alldata['hair_concern_frizzy'] == 1){
      $profiledata['hair_concern'][] = 'Frizzy';
     }

     //hair scalp
      if($alldata['hair_scalp_concern_sensitive'] == 1){
      $profiledata['hair_scalp'][] = ' Sensitive(itchy etc)';
     }
     if($alldata['hair_scalp_concern_flaky_scalp'] == 1){
      $profiledata['hair_scalp'][] = ' Flacky scalp';
     }
     if($alldata['hair_scalp_concern_none'] == 1){
      $profiledata['hair_scalp'][] = ' None';
     }
     /*if($alldata['hair_scalp_concern_others'] == 1){
      $profiledata['hair_scalp'][] = ' Others(specify)';
     }*/
    if($alldata['hair_scalp_concern_others'] == 1){
      $profiledata['hair_scalp'][] = $alldata['hair_scalp_concern_others_specify'];
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


 /*
  *purpose : generate summary pdf
  *developer : Ashish Bhalodia
  */
   public function SummarypdfAction()
   {  
      //call tcpdf library
      set_include_path(get_include_path() . PATH_SEPARATOR . Mage::getBaseDir('lib') . '/tcpdf');
      require_once(Mage::getBaseDir('lib') . '/tcpdf/tcpdf.php');

       $param = base64_decode($this->getRequest()->getParam('id'));

       if($param == null){
          $profile_id = Mage::getSingleton('core/session')->getLastinsid();
       }else{
          $profile_id = $param;  
       }

       $advice = $this->getFilterAdvice();
        

      $collection = Mage::getModel('beautyprofiler/beautyprofilesummary')->getCollection();
      $collection->addFieldToSelect('*')->getSelect()->join(array('wso' => 'wc_summery_option'),'main_table.advisor_id = wso.id')->join(array('wdr' => 'wc_daily_recommended'),'main_table.recommendation_id = wdr.id');
      $where = '';
      
      $loop_count = 1;
      foreach($advice['face_concern'] as $k => $ad){ 
        if($loop_count != 1){          
        $where .= ' OR ';
      }
          $where .= 'face_concern='.trim($ad).' AND ';
            
          if($ad == "'aging_fine_lines'" || $ad == "'aging_deep_lines'" || $ad == "'aging_dull_and_sagging_skin'" || $ad == "'eyes_fine_lines'" || $ad == "'eyes_deep_lines'" || $ad == "'eyes_puffy_and_tired_eyes'" || $ad == "'eyes_dark_circles'" || $ad == "'eyes_hydration'" || $ad == "'hair_fall'" || $ad == "'hair_breakage'" || $ad == "'lacks_volume'" || $ad == "'dry_and_dull_hair'" || $ad == "'frizzy_hair'" || $ad == "'itchy_scalp'" || $ad == "'sensitive_scalp'"){

              //aging vise fetch data
              if($ad == "'aging_fine_lines'"){
                  $skntp = "'fine_lines'";
              }
              elseif($ad == "'aging_deep_lines'"){
                  $skntp = "'deep_lines'";
              }
              elseif($ad == "'aging_dull_and_sagging_skin'"){
                  $skntp = "'dull_and_sagging_skin'";
              }

              //eyes vise fetch data
              if($ad == "'eyes_fine_lines'"){
                  $skntp = "'fine_lines'";
              }
              elseif($ad == "'eyes_deep_lines'"){
                  $skntp = "'deep_lines'";
              }
              elseif($ad == "'eyes_puffy_and_tired_eyes'"){
                  $skntp = "'puffy_and_tired_eyes'";
              }
              elseif($ad == "'eyes_dark_circles'"){
                  $skntp = "'dark_circles'";
              }
              elseif($ad == "'eyes_hydration'"){
                  $skntp = "'hydration'";
              }

              //hair vise fetch data
              if($ad == "'hair_fall'"){
                  $skntp = "'hair_fall'";
              }
              elseif($ad == "'hair_breakage'"){
                  $skntp = "'hair_breakage'";
              }
              elseif($ad == "'lacks_volume'"){
                  $skntp = "'lacks_volume'";
              }
              elseif($ad == "'dry_and_dull_hair'"){
                  $skntp = "'dry_and_dull_hair'";
              }
              elseif($ad == "'frizzy_hair'"){
                  $skntp = "'frizzy_hair'";
              }
              elseif($ad == "'itchy_scalp'"){
                  $skntp = "'itchy_scalp'";
              }
              elseif($ad == "'sensitive_scalp'"){
                  $skntp = "'sensitive_scalp'";
              }

              $where .= 'skin_type='.$skntp;  
          }else{
              $where .= 'skin_type='.$advice['skin_type'];  
          }
          
           
         $loop_count++;
      }
      //echo $where; exit;
      if(!empty($where)){
        $collection->getSelect()->where($where);  
        //echo $collection->getSelect()->__toString(); exit;
        Mage::register('advice-data',$collection);
      }
      
      // create new PDF document        
      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
      $pdfcontent = $this->getLayout()->createBlock('core/template')->setTemplate('beautyprofiler/summarypdf.phtml')->toHtml();
      
      
      $pdf->AddPage();

      // output the PDF content
      $pdf->writeHTML($pdfcontent, true, 0, true, true);
      $pdf->LastPage();
      
      //set download location
      $file_name = $profile_id.'.pdf';
      $file_name_path = Mage::getBaseDir().'/media/beautyprofile/summary_pdf/'.$file_name;
     
      ob_clean();
      
      //if($param != null){
         if(file_exists($file_name_path))
         {
            unlink($file_name_path);
         } 
         $pdf->Output($file_name_path, 'F');
     
   }

   protected function getFilterAdvice()
   { 
      $post_data = Mage::getModel("beautyprofiler/beutyprofiler");
      $data = $post_data->load(Mage::getSingleton('core/session')->getLastinsid());
      $alldata = $data->getData();
      //print_r($alldata);exit;
    
      $profiledata['skin_type'] = $alldata['skin_type'];
     
      //dehydration
     if($alldata['face_dehydrated_overall'] == 1 || $alldata['face_dehydrated_around_mouth'] == 1 || $alldata['face_dehydrated_around_cheeks'] == 1 || $alldata['face_dehydrated_around_forehead'] == 1){ 

        $profiledata['face_concern'][] = "'dehydrated'";
       
     }
    
    //pigmentation
     if($alldata['face_pigmentation_type'] == 1){
 
        $profiledata['face_concern'][] = "'pigmentation_mild'";
      
     }
     elseif($alldata['face_pigmentation_type'] == 2)
     {
        $profiledata['face_concern'][] = "'pigmentation_severe'";  
     }

     //uneven skin tone
     if($alldata['face_uneven_skin_tone_overall'] == 1 || $alldata['face_uneven_skin_tone_around_mouth'] == 1 || $alldata['face_uneven_skin_tone_around_cheeks'] == 1 || $alldata['face_uneven_skin_tone_around_forehead'] == 1)
      {  
        $profiledata['face_concern'][] = "'uneven_skin_tone'"; 
      }

      //uneven skin texture
     if($alldata['face_uneven_skin_texture_overall'] == 1 || $alldata['face_uneven_skin_texture_around_mouth'] == 1 || $alldata['face_uneven_skin_texture_around_cheeks'] == 1 || $alldata['face_uneven_skin_texture_around_forehead'] == 1)
      { 
        $profiledata['face_concern'][] = "'uneven_skin_texture'";
      }

      if($alldata['face_open_pores'] == 1)
      {
        $profiledata['face_concern'][] = "'open_pores'";
      }

      if($alldata['face_acne_prone'] == 1)
      {
        $profiledata['face_concern'][] = "'acne'";
      }

     
      
      //aging
      if($alldata['face_aging_fine_lines'] == 1)
      {
        $profiledata['face_concern'][] = "'aging_fine_lines'";
      }

      if($alldata['face_aging_deep_lines'] == 1)
      {
        $profiledata['face_concern'][] = "'aging_deep_lines'";      
      }

      if($alldata['face_aging_segging_dull_skin'] == 1)
      {
        $profiledata['face_concern'][] = "'aging_dull_and_sagging_skin'";
      }

       //eyes
      if($alldata['eyes_fine_lines'] == 1)
      {
          $profiledata['face_concern'][] = "'eyes_fine_lines'";
      } 
      if($alldata['eyes_deep_lines'] == 1) 
      {
          $profiledata['face_concern'][] = "'eyes_deep_lines'";
      }
      if($alldata['eyes_puffy_and_tired_eyes'] == 1)
      {
          $profiledata['face_concern'][] = "'eyes_puffy_and_tired_eyes'";
      }
      if($alldata['eyes_dark_circles'] == 1)
      {
          $profiledata['face_concern'][] = "'eyes_dark_circles'";
      }
      if($alldata['eyes_hydration'] == 1)
      {
          $profiledata['face_concern'][] = "'eyes_hydration'";
      }

      //hair
      if($alldata['hair_concern_hair_fall'] == 1)
      {
          $profiledata['face_concern'][] = "'hair_fall'";
      } 
      if($alldata['hair_concern_hair_breakage'] == 1)
      {
          $profiledata['face_concern'][] = "'hair_breakage'";
      } 
      if($alldata['hair_concern_lacks_volume'] == 1)
      {
          $profiledata['face_concern'][] = "'lacks_volume'";
      }
      if($alldata['hair_concern_dry_and_dull'] == 1)
      {
          $profiledata['face_concern'][] = "'dry_and_dull_hair'";
      } 
      if($alldata['hair_concern_frizzy'] == 1)
      {
          $profiledata['face_concern'][] = "'frizzy_hair'";
      }
      if($alldata['hair_scalp_concern_sensitive'] == 1)
      {
          $profiledata['face_concern'][] = "'itchy_scalp'";
      } 
      if($alldata['hair_scalp_concern_flaky_scalp'] == 1)
      {
          $profiledata['face_concern'][] = "'sensitive_scalp'";
      } 
      //print_r($profiledata);exit;
      return $profiledata;
   }
    /*
    *purpose : set new profile id in session
    *developer : Kruti Aparnathi
    */
    public function SetprofileAction()
    {
      $changed_profile = Mage::app()->getRequest()->getParam('selected_profile_id');
      $current_cat = Mage::app()->getRequest()->getParam('current_cat');
      Mage::getSingleton('customer/session')->setBeautyProfileId($changed_profile);
    //  echo Mage::getSingleton('customer/session')->getBeautyProfileId(); exit;
      $url = $this->getCategoryfilter($current_cat);
      if($url == '')
      {
      $status = 'no url';
      $url = Mage::getModel('catalog/category')->load($current_cat)->getUrl();
      }
      else
      {
      $url = $url; 
      }
      $json = array('status'=>'success','url'=>$url, 'status'=>$status);
      echo json_encode($json); exit;
    }
    private function getCategoryfilter($current_cat)
    {
        if($current_cat !== null)
        {
        $parent = Mage::getModel('catalog/category')->load($current_cat)->getParentCategory();
        $collection = Mage::getModel('beautyprofiler/filterableattributes')->getCollection();
        $collection->addFieldToFilter('sub_cat_id',$parent->getId())->addFieldToFilter('sub_sub_cat_id',$current_cat);
       // print_r($collection->getData()); exit;
          $url = '';
          //get beautyprofile
          $check_profile = Mage::getSingleton('beautyprofiler/beutyprofiler')->getCollection()->addFieldToFilter('profile_id',array('profile_id'=>Mage::getSingleton('customer/session')->getBeautyProfileId()))->getFirstItem();
          $profileData = $check_profile->getData();
       //  print_r($profileData); exit;
          if(Mage::getSingleton('customer/session')->getBeautyProfileId() != 0)
          {
            foreach($collection->getData() as $filter)
              {
                if($filter['beautyprofile_attribute'] == 'skin_type')
                {
                  //echo "<pre>"; print_r($profileData);echo "</pre>";
                 
                  $skin_type = Webclues_Routinefinder_Model_Constant::getSkinTypewithid($profileData[$filter['beautyprofile_attribute']]); 
                  $collection_attrmapping = Mage::getModel('beautyprofiler/attrmapping')->getCollection()->addFieldToFilter('beautyprofile_filter',$skin_type);
                 // print_r($collection_attrmapping->getData()); exit;
                 
                 // $url .= $filter['beautyprofile_attribute'].'='.$skin_type.'&';
                  $urlArr['skin_type'] = $collection_attrmapping->getData()[0]['attribute_name'].'='.$collection_attrmapping->getData()[0]['option_id'];
                  //$url .= $collection_attrmapping->getData()[0]['attribute_name'].'='.$collection_attrmapping->getData()[0]['option_id'].'&';
                }
                else if($filter['beautyprofile_attribute'] == 'complexion')
                {
                  $complexion = Webclues_Routinefinder_Model_Constant::getComplexionwithid($profileData[$filter['beautyprofile_attribute']]); 
                  $collection_attrmapping = Mage::getModel('beautyprofiler/attrmapping')->getCollection()->addFieldToFilter('beautyprofile_filter',$complexion);
                   //$url .= $filter['beautyprofile_attribute'].'='.$complexion.'&';
                  $urlArr['skin_complexion'] = $collection_attrmapping->getData()[0]['attribute_name'].'='.$collection_attrmapping->getData()[0]['option_id'];
                 // $url .= $collection_attrmapping->getData()[0]['attribute_name'].'='.$collection_attrmapping->getData()[0]['option_id'].'&';
                }
                /*else if($filter['beautyprofile_attribute'] == 'undertone')
                {

                }*/
                else
                {
                
                }
              }
              $url = implode('&',$urlArr);
              return  rtrim($url,'&'); 
          }
          else
          {
            return '';        
          }
        }
        else
        { 
             return '';    
        }  
    }

    public function sendbeautyprofilesummaryAction(){
        
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        $loggedin_customer_email = $customer->getEmail();
        $loggedin_customer_id = $customer->getId();
        $loggedin_customer_name = $customer->getName();
        $store_sales_email_add = Mage::getStoreConfig('trans_email/ident_sales/email');
        $img = Mage::getDesign()->getSkinUrl('images/logotp.jpg');
        $body = '<table border="0" cellpadding="0" cellspacing="0" width="600px" style="border: 1px solid #ebebeb; color: #000000; margin: 0 auto;">
<tbody>
<tr>
<td>
<table border="0" cellpadding="0" cellspacing="0" width="600px" style="background-color: #4c4c4c;">
<tr>
<td align="center" height="64px">
<a href="#"><img src="'.$img.'" height="30px"> </a>
</td>
</tr>
</table>
</td>
</tr>
<tr>
        <td>
            <table border="0" cellpadding="0" cellspacing="0" width="600px">
             <tr>
                    <td height="15px"></td>
                </tr>
                <tr>
                    <td><p style="font-size:13px;padding:0px 15px;color:#000;font-family:Verdana,Arial; margin-bottom:10px;">Hi, Zohannn</p></td>
                </tr>
            </table>
            </td>
            </tr>


      <tr>
        <td>
            <table width="600px" cellpadding="0" cellspacing="0" border="0" style="border-top: none !important; background-color: #f7f4f4; font-family:Verdana, Arial, Helvetica, sans-serif;">
                <tr>
                    <td align="centre">
                        <p style="font-weight: bold; margin-top: 15px; text-align: center; letter-spacing: 2px; font-size:13px;">BARUNII BEAUTY PRIVATE LIMITED</p>
                    </td>
                </tr>
                <tr><td align="centre" height="10px"></td></tr>
                <tr>
                    <td align="centre">
                        <p  style="margin-top: 0px !important; text-align: center; color: #5c5c5c; font-size:13px;">414, A Wing, Express Zone, Near Oberoi Mall, Off W. E. Highway,
                            <br>Goregaon East Mumbai Mumbai City MH 400063 IN</p>
                    </td>
                </tr>
                <tr><td align="centre" height="10px"></td></tr>
                <tr>
                    <td align="centre" style="text-decoration: none !important; color: #333333 !important;">
                        <p  style="text-align:center; text-decoration: none !important; color: #333333 !important; margin-top: 0px !important; font-size:14px; margin-bottom: 4px !important; "><a href="http://www.webcluesstudio.com/qa/barunii" style="text-decoration: none !important; color: #333;">www.barunii.com </a>| 9820284129</p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-size:13px;">
                        <a href="https://www.facebook.com" style="text-decoration: none; color: #000 !important;">Facebook</a> | <a href="https://twitter.com" style="text-decoration: none; color: #000 !important;">Twitter</a> | <a href="https://in.pinterest.com" style="text-decoration: none; color: #000 !important;">Pinterest</a>
                    </td>
                </tr>
                <tr>
                    <td align="centre">
                        <p  style="text-align:center; color: #c4a148; margin-top: 4px !important; font-size:14px;">Barunii Beauty Pvt. Ltd. All rights reserved.</p>
                    </td>
                </tr>
                <tr><td align="centre" height="20px"></td></tr>
            </table>
        </td>
    </tr>
</tbody>
</table>';
       
        $id = base64_decode($this->getRequest()->getParam('id'));
        
        if($id == null){
          $profile_id = Mage::getSingleton('core/session')->getLastinsid();
        }else{
          $profile_id = $id;  
        }

        // Email
        $connection = Mage::getSingleton('core/resource')->getConnection('core_read');
        $sql        = " SELECT email FROM `beauty_profiler` WHERE `profile_id` LIKE $profile_id ";
        $rows       = $connection->fetchAll($sql); 
        $beauty_profile_entered_email = $rows[0]['email'];
        
        echo $loggedin_customer_email;
        echo $beauty_profile_entered_email;
        // Email

        require(Mage::getBaseDir().DS.'SMTP_demo'.DS.'PHPMailerAutoload.php');

        $mail = new PHPMailer; 
        $mail->AddReplyTo('replyto@email.com', 'Reply to name');
        $mail->setFrom($store_sales_email_add,' Barunii Sales '); 
        $mail->addAddress($loggedin_customer_email,$loggedin_customer_name); 
        $mail->addAddress($beauty_profile_entered_email,$loggedin_customer_name);
        $mail->Subject = 'Your beautyprofile summary'; 

        // Attach the uploaded file 
        $pdf_name = $profile_id.'.pdf'; 
        $pdf_path = Mage::getBaseDir('media') . DS . 'beautyprofile/summary_pdf'.DS.$pdf_name;
        $mail->addAttachment($pdf_path, $pdf_name); 
        $mail->Body = $body;
        $mail->IsHTML(true); 

        if (!$mail->send()) { 
          Mage::getSingleton('core/session')->addError('There was some error sending mail. Please try again later.');
            echo "Mailer Error: " . $mail->ErrorInfo; 
        } else { 
            Mage::getSingleton('core/session')->addSuccess('Message sent!');
            //echo "Message sent!"; 
        }

        
      
    }
    
}