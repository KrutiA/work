<?php

class Webclues_Beautyprofiler_Model_Beutyprofiler extends Mage_Core_Model_Abstract
{
    protected function _construct(){

       $this->_init("beautyprofiler/beutyprofiler");

    }
    public function saveImage($file_name)
    {
       if(count($_FILES['profile_pic_url']) > 0 and $_FILES['profile_pic_url']['name'] != '')
          {
            try
            {
                $uploader = new Varien_File_Uploader('profile_pic_url'); // Instantiate varien file uploader class with your $_FILE global variable
                
                $uploader->setAllowedExtensions(array('doc','pdf','txt','docx', 'png', 'jpeg', 'jpg')); //Allowed extension for file

                $uploader->setAllowCreateFolders(true); //for creating the directory if not exists
                $uploader->setAllowRenameFiles(false); //if true, uploaded file's name will be changed, if file with the same name already exists directory.
                $path = Mage::getBaseDir('media') . DS . 'beautyprofile/profile'; // Set your destination path for your file
                $ext = pathinfo($_FILES['profile_pic_url']['name'], PATHINFO_EXTENSION);
                $fname = $file_name.'.'.$ext; //file name 
              
                if($uploader->save($path, $fname)){
                $value = Mage::getSingleton('core/session')->getLastinsid().'.'.$ext;
                $row = Mage::getModel('beautyprofiler/beutyprofiler')->load(Mage::getSingleton('core/session')->getLastinsid());
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
    /*
    * admin site add new custom attribute in beautyprofiler
    */
 public function autoSavecustomattr($observer)
    {
      $post_data = Mage::getModel("beautyprofiler/beautyprofilerproduct");
      $field = $this->getFieldArray();
      unset($_POST['product']); //unset existing product fields
      unset($_POST['form_key']); //unset form fields

      $field_with_value = [];
      foreach($field as $key => $value)
      {
        if($key == 'product_id')
        {
          $field_with_value[$key] = $observer->getEvent()->getProduct()->getId();
        }
        else
        {
          if(array_key_exists($key, $_POST))
          {
              $field_with_value[$key] = $_POST[$key];
          }
          else
          {
            $field_with_value[$key] = $value;
          }
          }
      }

      $get_product_field = $post_data->getCollection()
                    ->addFieldToSelect('id')
                    ->addFieldToFilter('product_id', array('product_id' => $observer->getEvent()->getProduct()->getId()))
                    ->getFirstItem();

      try{
        if(isset($get_product_field) && !empty($get_product_field))
       {

        $post_data->load($get_product_field->getId())->addData($field_with_value)->save();
    //    Zend_Debug::dump($field_with_value); EXIT;
       }
       else{
         $post_data->addData($field_with_value)->save();
       }
         
          $lastId = $post_data->getId();
          }
        catch (Exception $e) {
            Zend_Debug::dump($e->getMessage());
        }
        //Mage::log($lastId,Zend_log::INFO,"logfile.log",true);
        if(isset($lastId) && ! empty($lastId))
        {
        return true;  
        }
        else
        {
        echo "There is some problem while inserting product with observer"; exit;   
        }
        
      
    }
    protected function getFieldArray()
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
          'skin_type_normal_to_oily'=>0,
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
          'undertone_neutral'=>0,
          'undertone_warm'=>0,
          'undertone_cool'=>0
          );

    }
    public function getRelation()
    {
      return array('self','friend','mother','daughter','cousin','others');
    }

    
}
	 
	 