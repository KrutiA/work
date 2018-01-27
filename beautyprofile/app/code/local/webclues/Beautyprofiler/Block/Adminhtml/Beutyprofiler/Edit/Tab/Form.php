<?php
class Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
$checkboxelement = array('face_dehydrated_overall',
				    	  'face_dehydrated_around_mouth',
				    	  'face_dehydrated_around_cheeks',
				    	  'face_dehydrated_around_forehead',
				    	  'face_uneven_skin_tone_overall',
				    	  'face_uneven_skin_tone_around_mouth',
				    	  'face_uneven_skin_tone_around_cheeks',
				    	  'face_uneven_skin_tone_around_forehead',
				    	  'face_uneven_skin_texture_overall',
				    	  'face_uneven_skin_texture_around_mouth',
				    	  'face_uneven_skin_texture_around_cheeks',
				    	  'face_uneven_skin_texture_around_forehead',
				    	  'face_pigmentation_overall',
				    	  'face_pigmentation_around_mouth',
				    	  'face_pigmentation_cheeks',
				    	  'face_pigmentation_forehead',
				    	  'face_aging_fine_lines',
				    	  'face_aging_deep_lines',
				    	  'face_aging_segging_dull_skin',
				    	  'eyes_fine_lines',
				    	  'eyes_deep_lines',
				    	  'eyes_hydration',
				    	  'eyes_puffy_and_tired_eyes',
				    	  'eyes_dark_circles',
				    	  'hands_and_feet_dry',
				    	  'hands_and_feet_regular',
				    	  'hair_exposure_to_colour_fashion',
				    	  'hair_exposure_to_grey_coverage',
				    	  'hair_exposure_to_straightened',
				    	  'hair_exposure_to_none',
				    	  'hair_exposure_to_others',
				    	  'hair_concern_hair_fall',
				    	  'hair_concern_hair_breakage',
				    	  'hair_concern_lacks_volume',
				    	  'hair_concern_dry_and_dull',
				    	  'hair_concern_frizzy',
				    	  'hair_scalp_concern_sensitive',
				    	  'hair_scalp_concern_flaky_scalp',
				    	  'air_scalp_concern_none',
				    	  'hair_scalp_concern_others',
				    	  'prepare_face_cleanse_tone_face_wash',
				    	  'prepare_face_cleanse_tone_miscellar',
				    	  'prepare_face_cleanse_tone_cleanser',
				    	  'prepare_face_cleanse_tone_toner',
				    	  'prepare_face_hydrate_protect_face_serum',
				    	  'prepare_face_hydrate_protect_cream',
				    	  'prepare_face_hydrate_protect_eye_cream',
				    	  'prepare_face_hydrate_protect_serum',
				    	  'prepare_face_hydrate_protect_sunscreen',
				    	  'prepare_face_grooming_bb_cream',
				    	  'prepare_face_grooming_sunscreen',
				    	  'prepare_face_grooming_liogloss',
				    	  'prepare_face_grooming_foundation',
				    	  'prepare_face_grooming_compact',
				    	  'prepare_face_grooming_finishing_powder',
				    	  'prepare_face_grooming_eye_pencil',
				    	  'prepare_face_grooming_eye_shadow',
				    	  'prepare_face_grooming_lipstick',
				    	  'prepare_face_grooming_perfume',
				    	  'beauty_routine_cleanse_tone_face_wash',
				    	  'beauty_routine_cleanse_tone_miscellar',
				    	  'beauty_routine_cleanse_tone_cleanser',
				    	  'beauty_routine_cleanse_tone_toner',
				    	  'beauty_routine_repair_rejusvenate_face_serum',
				    	  'beauty_routine_repair_rejusvenate_face_cream',
				    	  'beauty_routine_repair_rejusvenate_eye_cream',
				    	  'beauty_routine_repair_rejusvenate_eye_serum',
				    	  'beauty_routine_grooming_foot_cream',
				    	  'beauty_routine_grooming_hand_cream',
				    	  'undertone_neutral',
				    	  'undertone_warm',
				    	  'undertone_cool'
				    	  );
				if(Mage::registry("beutyprofiler_data")) {
				    Mage::registry("beutyprofiler_data")->getData();
							foreach ($checkboxelement as $value) {
								if(Mage::registry("beutyprofiler_data")->getData()[$value] != 0)
								{
								$rescheck[$value] = true;		
								}
								else
								{
								$rescheck[$value] = false;			
								}
							}
				}
				else
				{
						foreach ($checkboxelement as $value) {
								
								$rescheck[$value] = false;			
								
							}
				}


				
				$fieldset = $form->addFieldset("beautyprofiler_form", array("legend"=>Mage::helper("beautyprofiler")->__("Item information")));

				
						$fieldset->addField("full_name", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("Customer Name"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "full_name",
						));
					
						$fieldset->addField("email", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("Email"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "email",
						));
					
						$dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(
							Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
						);

						$fieldset->addField('dob', 'date', array(
						'label'        => Mage::helper('beautyprofiler')->__('Dob'),
						'name'         => 'dob',					
						"class" => "required-entry",
						"required" => true,
						'time' => true,
						'image'        => $this->getSkinUrl('images/grid-cal.gif'),
						'format'       => $dateFormatIso
						));			
						$fieldset->addField('skin_type', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Skin Type'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray5(),
						'name' => 'skin_type',					
						
						));				
						 $fieldset->addField('sensitive_skin', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Sensitive Skin'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray6(),
						'name' => 'sensitive_skin',
						));				
						 $fieldset->addField('sensitive_skin_reason', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('How did you know you have sensitive skin?'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray7(),
						'name' => 'sensitive_skin_reason',
						));				
						 $fieldset->addField('sensitive_skin_rate', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Rate your skin\'s sensitivity'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray8(),
						'name' => 'sensitive_skin_rate',
						));		

						/*Customization*/

						$fieldset->addField('face', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Face'),
        				));


        				$fieldset->addField('face_dehydrated', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Dehydrated'),
        				));
						 $fieldset->addField('face_dehydrated_overall', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Overall'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'checked' => $rescheck['face_dehydrated_overall'],
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray9(),
						'name' => 'face_dehydrated_overall',
						));				
						 $fieldset->addField('face_dehydrated_around_mouth', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Around Mouth'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray10(),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'checked' => $rescheck['face_dehydrated_around_mouth'],
						'name' => 'face_dehydrated_around_mouth',
						));				
						 $fieldset->addField('face_dehydrated_around_cheeks', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Cheeks'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray11(),
						'checked' => $rescheck['face_dehydrated_around_cheeks'],
						'name' => 'face_dehydrated_around_cheeks',
						));				
						 $fieldset->addField('face_dehydrated_around_forehead', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Forehead'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray12(),
						'name' => 'face_dehydrated_around_forehead',
						'checked' => $rescheck['face_dehydrated_around_forehead'],
						'class' => 'fieldset-wide',
						));		


						 $fieldset->addField('face_unevent_skin_tone', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Uneven Skin Tone'),
        				));

						 $fieldset->addField('face_uneven_skin_tone_overall', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Overall'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray13(),
						'checked' => $rescheck['face_uneven_skin_tone_overall'],
						'name' => 'face_uneven_skin_tone_overall',
						));				
						 $fieldset->addField('face_uneven_skin_tone_around_mouth', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Around mouth'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray14(),
						'checked' => $rescheck['face_uneven_skin_tone_around_mouth'],
						'name' => 'face_uneven_skin_tone_around_mouth',
						));				
						 $fieldset->addField('face_uneven_skin_tone_around_cheeks', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Around cheeks'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray15(),
						'checked' => $rescheck['face_uneven_skin_tone_around_cheeks'],
						'name' => 'face_uneven_skin_tone_around_cheeks',
						));				
						 $fieldset->addField('face_uneven_skin_tone_around_forehead', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Around forehead'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray16(),
						'checked' => $rescheck['face_uneven_skin_tone_around_forehead'],
						'name' => 'face_uneven_skin_tone_around_forehead',
						));				

						$fieldset->addField('face_unevent_skin_texture', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Uneven Skin Texture'),
        				));
						 $fieldset->addField('face_uneven_skin_texture_overall', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Overall'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray17(),
						'checked' => $rescheck['face_uneven_skin_texture_overall'],
						'name' => 'face_uneven_skin_texture_overall',
						));				
						 $fieldset->addField('face_uneven_skin_texture_around_mouth', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Around Mouth'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray18(),
						'checked' => $rescheck['face_uneven_skin_texture_around_mouth'],
						'name' => 'face_uneven_skin_texture_around_mouth',
						));				
						 $fieldset->addField('face_uneven_skin_texture_around_cheeks', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Around Cheeks'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray19(),
						'checked' => $rescheck['face_uneven_skin_texture_around_cheeks'],
						'name' => 'face_uneven_skin_texture_around_cheeks',
						));				
						 $fieldset->addField('face_uneven_skin_texture_around_forehead', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Around Forehead'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray20(),
						'checked' => $rescheck['face_uneven_skin_texture_around_forehead'],
						'name' => 'face_uneven_skin_texture_around_forehead',
						));				


						$fieldset->addField('pigmentation', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Pigmentation'),
        				));
						 $fieldset->addField('face_pigmentation_type', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Pigmentation'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray21(),
						'checked' => $rescheck['face_pigmentation_type'],
						'name' => 'face_pigmentation_type',
						));				
						 $fieldset->addField('face_pigmentation_overall', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Overall'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray22(),
						'checked' => $rescheck['face_pigmentation_overall'],
						'name' => 'face_pigmentation_overall',
						));				
						 $fieldset->addField('face_pigmentation_around_mouth', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Around mouth'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray23(),
						'checked' => $rescheck['face_pigmentation_around_mouth'],
						'name' => 'face_pigmentation_around_mouth',
						));				
						 $fieldset->addField('face_pigmentation_cheeks', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Cheeks'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray24(),
						'checked' => $rescheck['face_pigmentation_cheeks'],
						'name' => 'face_pigmentation_cheeks',
						));				
						 $fieldset->addField('face_pigmentation_forehead', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Forehead'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray25(),
						'checked' => $rescheck['face_pigmentation_forehead'],
						'name' => 'face_pigmentation_forehead',
						));		



						$fieldset->addField('aging', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Aging'),
        				));
						$fieldset->addField('face_aging_fine_lines', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Fine lines'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray26(),
						'checked' => $rescheck['face_aging_fine_lines'],
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'name' => 'face_aging_fine_lines',
						));			
						 $fieldset->addField('face_aging_deep_lines', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Deep lines'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray27(),
						'checked' => $rescheck['face_aging_deep_lines'],
						'name' => 'face_aging_deep_lines',
						));				
						 $fieldset->addField('face_aging_segging_dull_skin', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Sagging & dull skin'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray28(),
						'checked' => $rescheck['face_aging_segging_dull_skin'],
						'name' => 'face_aging_segging_dull_skin',
						));				


						 $fieldset->addField('face_open_pores', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Open pores'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray29(),
						'checked' => $rescheck['face_open_pores'],
						'name' => 'face_open_pores',
						));			



						 $fieldset->addField('face_acne_prone', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Acne prone'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray30(),
						'checked' => $rescheck['face_acne_prone'],
						'name' => 'face_acne_prone',
						));				
						 $fieldset->addField('face_acne_prone_type', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Acne prone Type'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray31(),
						'checked' => $rescheck['face_acne_prone_type'],
						'name' => 'face_acne_prone_type',
						));				
						 $fieldset->addField('face_acne_treatment', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Acne treatment'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray32(),
						'checked' => $rescheck['face_acne_treatment'],
						'name' => 'face_acne_treatment',
						));				



						$fieldset->addField('eyes', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Eyes'),
        				));
						 $fieldset->addField('eyes_fine_lines', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Fine lines'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray33(),
						'checked' => $rescheck['eyes_fine_lines'],
						'name' => 'eyes_fine_lines',
						));				
						 $fieldset->addField('eyes_deep_lines', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Deep lines'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray34(),
						'checked' => $rescheck['eyes_deep_lines'],
						'name' => 'eyes_deep_lines',
						));				
						 $fieldset->addField('eyes_hydration', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hydration'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray35(),
						'checked' => $rescheck['eyes_hydration'],
						'name' => 'eyes_hydration',
						));				
						 $fieldset->addField('eyes_puffy_and_tired_eyes', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Puffy and tired eyes'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray36(),
						'checked' => $rescheck['eyes_puffy_and_tired_eyes'],
						'name' => 'eyes_puffy_and_tired_eyes',
						));				
						 $fieldset->addField('eyes_dark_circles', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Dark circles'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray37(),
						'checked' => $rescheck['eyes_dark_circles'],
						'name' => 'eyes_dark_circles',
						));				



						$fieldset->addField('hands_feet', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Hands & Feets'),
        				));
						 $fieldset->addField('hands_and_feet_dry', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Dry'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray38(),
						'checked' => $rescheck['hands_and_feet_dry'],
						'name' => 'hands_and_feet_dry',
						));				
						 $fieldset->addField('hands_and_feet_regular', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Regular'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray39(),
						'checked' => $rescheck['hands_and_feet_regular'],
						'name' => 'hands_and_feet_regular',
						));		



						 $fieldset->addField('complexion', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Complexion'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray40(),
						'name' => 'complexion',
						));	

		
						 $fieldset->addField('faceshape', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Faceshape'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray41(),
						'name' => 'faceshape',
						));				



						 $fieldset->addField('hair', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Hair'),
        				));
						 $fieldset->addField('hair_volume', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Volume'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray42(),
						'name' => 'hair_volume',
						));	

						$fieldset->addField('hair_texture', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Texture'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray43(),
						'name' => 'hair_texture',
						));				

						 $fieldset->addField('hair_scalp_type', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Scalp type'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray44(),
						'name' => 'hair_scalp_type',
						));		

						 $fieldset->addField('hair_exposure_to', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Hair exposure to'),
        				));
						 $fieldset->addField('hair_exposure_to_colour_fashion', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Colour - Fashion'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray45(),
						'checked' => $rescheck['hair_exposure_to_colour_fashion'],
						'name' => 'hair_exposure_to_colour_fashion',
						));				
						 $fieldset->addField('hair_exposure_to_grey_coverage', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Colour - grey coverage'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray46(),
						'checked' => $rescheck['hair_exposure_to_grey_coverage'],
						'name' => 'hair_exposure_to_grey_coverage',
						));				
						 $fieldset->addField('hair_exposure_to_straightened', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Straightened'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray47(),
						'checked' => $rescheck['hair_exposure_to_straightened'],
						'name' => 'hair_exposure_to_straightened',
						));				
						 $fieldset->addField('hair_exposure_to_none', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('None'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray48(),
						'checked' => $rescheck['hair_exposure_to_none'],
						'name' => 'hair_exposure_to_none',
						));				
						 $fieldset->addField('hair_exposure_to_others', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Other'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray49(),
						'checked' => $rescheck['hair_exposure_to_others'],
						'name' => 'hair_exposure_to_others',
						));
						$fieldset->addField("hair_exposure_to_others_specify", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("Other specify"),
						"name" => "hair_exposure_to_others_specify",
						));
						

						$fieldset->addField('hair_concern', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Hair concern'),
        				));
						 $fieldset->addField('hair_concern_hair_fall', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair fall'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray51(),
						'checked' => $rescheck['hair_concern_hair_fall'],
						'name' => 'hair_concern_hair_fall',
						));				
						 $fieldset->addField('hair_concern_hair_breakage', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair breakage'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray52(),
						'checked' => $rescheck['hair_concern_hair_breakage'],
						'name' => 'hair_concern_hair_breakage',
						));				
						 $fieldset->addField('hair_concern_lacks_volume', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Lacks volume'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray53(),
						'checked' => $rescheck['hair_concern_lacks_volume'],
						'name' => 'hair_concern_lacks_volume',
						));				
						 $fieldset->addField('hair_concern_dry_and_dull', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Dry & dull'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray54(),
						'checked' => $rescheck['hair_concern_dry_and_dull'],
						'name' => 'hair_concern_dry_and_dull',
						));				
						 $fieldset->addField('hair_concern_frizzy', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Frizzy'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray55(),
						'checked' => $rescheck['hair_concern_frizzy'],
						'name' => 'hair_concern_frizzy',
						));			


						$fieldset->addField('scalp_concern', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Scalp concern'),
        				));
						 $fieldset->addField('hair_scalp_concern_sensitive', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Sensitive'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray56(),
						'checked' => $rescheck['hair_scalp_concern_sensitive'],
						'name' => 'hair_scalp_concern_sensitive',
						));				
						 $fieldset->addField('hair_scalp_concern_flaky_scalp', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Flaky scalp'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray57(),
						'checked' => $rescheck['hair_scalp_concern_flaky_scalp'],
						'name' => 'hair_scalp_concern_flaky_scalp',
						));				
						 $fieldset->addField('air_scalp_concern_none', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('None'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray58(),
						'checked' => $rescheck['air_scalp_concern_none'],
						'name' => 'air_scalp_concern_none',
						));				
						 $fieldset->addField('hair_scalp_concern_others', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Others'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray59(),
						'checked' => $rescheck['hair_scalp_concern_others'],
						'name' => 'hair_scalp_concern_others',
						));
						$fieldset->addField("hair_scalp_concern_others_specify", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("Specify"),
						"name" => "hair_scalp_concern_others_specify",
						));
							


						$fieldset->addField('how_prepare', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('How do your prepare your face every morning?'),
        				));	

        				$fieldset->addField('cleanser_toner', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Cleanse & Tone'),
        				));								
						 $fieldset->addField('prepare_face_cleanse_tone_face_wash', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face wash'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray61(),
						'checked' => $rescheck['prepare_face_cleanse_tone_face_wash'],
						'name' => 'prepare_face_cleanse_tone_face_wash',
						));				
						 $fieldset->addField('prepare_face_cleanse_tone_miscellar', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Miscellar'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray62(),
						'checked' => $rescheck['prepare_face_cleanse_tone_miscellar'],
						'name' => 'prepare_face_cleanse_tone_miscellar',
						));				
						 $fieldset->addField('prepare_face_cleanse_tone_cleanser', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Cleanser'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray63(),
						'checked' => $rescheck['prepare_face_cleanse_tone_cleanser'],
						'name' => 'prepare_face_cleanse_tone_cleanser',
						));				
						 $fieldset->addField('prepare_face_cleanse_tone_toner', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Toner'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray64(),
						'checked' => $rescheck['prepare_face_cleanse_tone_toner'],
						'name' => 'prepare_face_cleanse_tone_toner',
						));				

						 $fieldset->addField('hydrate_protect', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Hydrate & Protect'),
        				));		
						 $fieldset->addField('prepare_face_hydrate_protect_face_serum', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face serum'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray65(),
						'checked' => $rescheck['prepare_face_hydrate_protect_face_serum'],
						'name' => 'prepare_face_hydrate_protect_face_serum',
						));				
						 $fieldset->addField('prepare_face_hydrate_protect_cream', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face cream'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray66(),
						'checked' => $rescheck['prepare_face_hydrate_protect_cream'],
						'name' => 'prepare_face_hydrate_protect_cream',
						));				
						 $fieldset->addField('prepare_face_hydrate_protect_eye_cream', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Eye cream'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray67(),
						'checked' => $rescheck['prepare_face_hydrate_protect_eye_cream'],
						'name' => 'prepare_face_hydrate_protect_eye_cream',
						));				
						 $fieldset->addField('prepare_face_hydrate_protect_serum', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Eye serum'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray68(),
						'checked' => $rescheck['prepare_face_hydrate_protect_serum'],
						'name' => 'prepare_face_hydrate_protect_serum',
						));				
						 $fieldset->addField('prepare_face_hydrate_protect_sunscreen', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Sunscreen'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray69(),
						'checked' => $rescheck['prepare_face_hydrate_protect_sunscreen'],
						'name' => 'prepare_face_hydrate_protect_sunscreen',
						));				

						$fieldset->addField('grooming', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Grooming'),
        				));	
						 $fieldset->addField('prepare_face_grooming_bb_cream', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Bb cream'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray70(),
						'checked' => $rescheck['prepare_face_grooming_bb_cream'],
						'name' => 'prepare_face_grooming_bb_cream',
						));				
						 $fieldset->addField('prepare_face_grooming_sunscreen', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Sunscreen'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray71(),
						'checked' => $rescheck['prepare_face_grooming_sunscreen'],
						'name' => 'prepare_face_grooming_sunscreen',
						));				
						 $fieldset->addField('prepare_face_grooming_liogloss', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Lipgloss'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray72(),
						'checked' => $rescheck['prepare_face_grooming_liogloss'],
						'name' => 'prepare_face_grooming_liogloss',
						));				
						 $fieldset->addField('prepare_face_grooming_foundation', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Foundation'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray73(),
						'checked' => $rescheck['prepare_face_grooming_foundation'],
						'name' => 'prepare_face_grooming_foundation',
						));				
						 $fieldset->addField('prepare_face_grooming_compact', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Compact'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray74(),
						'checked' => $rescheck['prepare_face_grooming_compact'],
						'name' => 'prepare_face_grooming_compact',
						));				
						 $fieldset->addField('prepare_face_grooming_finishing_powder', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Finishing powder'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray75(),
						'checked' => $rescheck['prepare_face_grooming_finishing_powder'],
						'name' => 'prepare_face_grooming_finishing_powder',
						));				
						 $fieldset->addField('prepare_face_grooming_eye_pencil', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Eye pencil'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray76(),
						'checked' => $rescheck['prepare_face_grooming_eye_pencil'],
						'name' => 'prepare_face_grooming_eye_pencil',
						));				
						 $fieldset->addField('prepare_face_grooming_eye_shadow', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Eye shadow'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray77(),
						'checked' => $rescheck['prepare_face_grooming_eye_shadow'],
						'name' => 'prepare_face_grooming_eye_shadow',
						));				
						 $fieldset->addField('prepare_face_grooming_lipstick', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Lipstick'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray78(),
						'checked' => $rescheck['prepare_face_grooming_lipstick'],
						'name' => 'prepare_face_grooming_lipstick',
						));				
						 $fieldset->addField('prepare_face_grooming_perfume', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Perfume'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray79(),
						'checked' => $rescheck['prepare_face_grooming_perfume'],
						'name' => 'prepare_face_grooming_perfume',
						));				



						$fieldset->addField('beauty_routine', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Share with us your daily beauty routine before you go to sleep at night?'),
        				));	
        				$fieldset->addField('beauty_routine_cleans_tone', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Cleanse & Tone'),
        				));	
						 $fieldset->addField('beauty_routine_cleanse_tone_face_wash', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face wash'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray80(),
						'checked' => $rescheck['beauty_routine_cleanse_tone_face_wash'],
						'name' => 'beauty_routine_cleanse_tone_face_wash',
						));				
						 $fieldset->addField('beauty_routine_cleanse_tone_miscellar', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Miscellar'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray81(),
						'checked' => $rescheck['beauty_routine_cleanse_tone_miscellar'],
						'name' => 'beauty_routine_cleanse_tone_miscellar',
						));				
						 $fieldset->addField('beauty_routine_cleanse_tone_cleanser', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Cleanser'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray82(),
						'checked' => $rescheck['beauty_routine_cleanse_tone_cleanser'],
						'name' => 'beauty_routine_cleanse_tone_cleanser',
						));				
						 $fieldset->addField('beauty_routine_cleanse_tone_toner', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Toner'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray83(),
						'checked' => $rescheck['beauty_routine_cleanse_tone_toner'],
						'name' => 'beauty_routine_cleanse_tone_toner',
						));				


						 $fieldset->addField('beauty_routine_repair_rejusvenate', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Repair & Rejusvenate'),
        				));	
						 $fieldset->addField('beauty_routine_repair_rejusvenate_face_serum', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face serum'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray84(),
						'checked' => $rescheck['beauty_routine_repair_rejusvenate_face_serum'],
						'name' => 'beauty_routine_repair_rejusvenate_face_serum',
						));				
						 $fieldset->addField('beauty_routine_repair_rejusvenate_face_cream', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face cream'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray85(),
						'checked' => $rescheck['beauty_routine_repair_rejusvenate_face_cream'],
						'name' => 'beauty_routine_repair_rejusvenate_face_cream',
						));				
						 $fieldset->addField('beauty_routine_repair_rejusvenate_eye_cream', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Eye cream'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray86(),
						'checked' => $rescheck['beauty_routine_repair_rejusvenate_eye_cream'],
						'name' => 'beauty_routine_repair_rejusvenate_eye_cream',
						));				
						 $fieldset->addField('beauty_routine_repair_rejusvenate_eye_serum', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Eye serum'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray87(),
						'checked' => $rescheck['beauty_routine_repair_rejusvenate_eye_serum'],
						'name' => 'beauty_routine_repair_rejusvenate_eye_serum',
						));	


						$fieldset->addField('beauty_routine_repair_grooming', 'label', array(
          				'label'     => Mage::helper('beautyprofiler')->__('Grooming'),
        				));			
						 $fieldset->addField('beauty_routine_grooming_foot_cream', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Foot cream'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray88(),
						'checked' => $rescheck['beauty_routine_grooming_foot_cream'],
						'name' => 'beauty_routine_grooming_foot_cream',
						));				
						 $fieldset->addField('beauty_routine_grooming_hand_cream', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hand cream'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray89(),
						'checked' => $rescheck['beauty_routine_grooming_hand_cream'],
						'name' => 'beauty_routine_grooming_hand_cream',
						));



						$fieldset->addField("brand_face_wash", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("Face wash"),
						"name" => "brand_face_wash",
						));
					
						$fieldset->addField("brand_eye_cream", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("Eye Cream"),
						"name" => "brand_eye_cream",
						));
					
						$fieldset->addField("barnd_finishing_powder", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("Finishing powder"),
						"name" => "barnd_finishing_powder",
						));
					
						$fieldset->addField("brand_miscellar", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("Miscellar"),
						"name" => "brand_miscellar",
						));
					
						$fieldset->addField("brand_eye_serum", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("eye serum"),
						"name" => "brand_eye_serum",
						));
					
						$fieldset->addField("brand_eye_pencil", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("eye pencil"),
						"name" => "brand_eye_pencil",
						));
					
						$fieldset->addField("brand_cleanser", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("cleanser"),
						"name" => "brand_cleanser",
						));
					
						$fieldset->addField("brand_sunscreen", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("sunscreen"),
						"name" => "brand_sunscreen",
						));
					
						$fieldset->addField("brand_eye_shadow", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("eye shadow"),
						"name" => "brand_eye_shadow",
						));
					
						$fieldset->addField("brand_toner", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("toner"),
						"name" => "brand_toner",
						));
					
						$fieldset->addField("brand_bb_cream", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("Bb  cream"),
						"name" => "brand_bb_cream",
						));
					
						$fieldset->addField("brand_lipstick", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("lipstick"),
						"name" => "brand_lipstick",
						));
					
						$fieldset->addField("brand_face_serum", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("face serum"),
						"name" => "brand_face_serum",
						));
					
						$fieldset->addField("barnd_foundation", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("foundation"),
						"name" => "barnd_foundation",
						));
					
						$fieldset->addField("brand_lipgloss", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("lipgloss"),
						"name" => "brand_lipgloss",
						));
					
						$fieldset->addField("brand_face_cream", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("face cream"),
						"name" => "brand_face_cream",
						));
					
						$fieldset->addField("brand_compact", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("compact"),
						"name" => "brand_compact",
						));
					
						$fieldset->addField("brand_perfume", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("perfume"),
						"name" => "brand_perfume",
						));
									
						 $fieldset->addField('skin_goals_radiant_and_smooth_skin', 'select', array(
						'label'     => Mage::helper('beautyprofiler')->__('radiant and smooth skin'),
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray108(),
						'name' => 'skin_goals_radiant_and_smooth_skin',
						));
						$fieldset->addField("skin_goals_clear_and_bright_skin", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("clear and bright skin"),
						"name" => "skin_goals_clear_and_bright_skin",
						));
					
						$fieldset->addField("skin_goals_well_hydrate_and_supple", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("well hydrate and supple"),
						"name" => "skin_goals_well_hydrate_and_supple",
						));
					
						$fieldset->addField("skin_goals_well_groomed_look", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("well groomed look"),
						"name" => "skin_goals_well_groomed_look",
						));
					
						$fieldset->addField("skin_goals_maintain_and_improve_my_current_skin", "text", array(
						"label" => Mage::helper("beautyprofiler")->__("maintain and improve my current skin"),
						"name" => "skin_goals_maintain_and_improve_my_current_skin",
						));

					
						 $fieldset->addField('undertone_neutral', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Undertone Neutral'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray90(),
						'checked' => $rescheck['undertone_neutral'],
						'name' => 'undertone_neutral',
						));		

						 $fieldset->addField('undertone_warm', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Undertone Warm'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray91(),
						'checked' => $rescheck['undertone_warm'],
						'name' => 'undertone_warm',
						));

						  $fieldset->addField('undertone_cool', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Undertone Cool'),
						'onclick'   => 'this.value = this.checked ? 1 : 0;',
						'values'   => Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray92(),
						'checked' => $rescheck['undertone_cool'],
						'name' => 'undertone_cool',
						));
						
					

				if (Mage::getSingleton("adminhtml/session")->getBeutyprofilerData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getBeutyprofilerData());
					Mage::getSingleton("adminhtml/session")->setBeutyprofilerData(null);
				} 
				elseif(Mage::registry("beutyprofiler_data")) {
				    $form->setValues(Mage::registry("beutyprofiler_data")->getData());
				}
				return parent::_prepareForm();
		}
}
