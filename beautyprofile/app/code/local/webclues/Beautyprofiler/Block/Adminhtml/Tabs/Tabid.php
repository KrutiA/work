<?php
class Webclues_Beautyprofiler_Block_Adminhtml_Tabs_Tabid extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$productparam = Mage::app()->getRequest()->getParams();
		/*->addFieldToFilter('profile_id',array('profile_id'=>$profile_id))->getFirstItem();*/
		$productdata = Mage::getModel('beautyprofiler/beautyprofilerproduct')->getCollection()->addFieldToFilter('product_id',array('product_id' => $productparam['id']))->getFirstItem();
		//zend_debug::dump($productdata);
		//echo'<pre>';print_r($productdata);exit;
				$fieldset = $form->addFieldset("custom_form", array("legend"=>Mage::helper("beautyprofiler")->__("Attribute information")));

					$fieldset->addField('skin_type_oily', 'select', array(
			          'label'     => Mage::helper('beautyprofiler')->__('Skin Type Olily'),
			          'name'      => 'skin_type_oily',
			          'onclick' => "",
			          'onchange' => "",
			          'value'  => $productdata->getSkinTypeOily(),
			          'values' => array('1' => 'Yes','0' => 'No'),
			          'tabindex' => 1
			        ));
			        $fieldset->addField('skin_type_very_oily', 'select', array(
			          'label'     => Mage::helper('beautyprofiler')->__('Skin Type Very Oily'),
			          'name'      => 'skin_type_very_oily',
			          'onclick' => "",
			          'onchange' => "",
			          'value'  => $productdata->getSkinTypeVeryOily(),
			          'values' => array('1' => 'Yes','0' => 'No'),
			          'tabindex' => 1
			        ));
			        $fieldset->addField('skin_type_dry', 'select', array(
			          'label'     => Mage::helper('beautyprofiler')->__('Skin Type Dry'),
			          'name'      => 'skin_type_dry',
			          'onclick' => "",
			          'onchange' => "",
			          'value'  => $productdata->getSkinTypeDry(),
			          'values' => array('1' => 'Yes','0' => 'No'),
			          'tabindex' => 1
			        ));
			        $fieldset->addField('skin_type_very_dry', 'select', array(
			          'label'     => Mage::helper('beautyprofiler')->__('Skin Type Very Dry'),
			          'name'      => 'skin_type_very_dry',
			          'onclick' => "",
			          'onchange' => "",
			          'value'  => $productdata->getSkinTypeVeryDry(),
			          'values' => array('1' => 'Yes','0' => 'No'),
			          'tabindex' => 1
			        ));
			        $fieldset->addField('skin_type_normal', 'select', array(
			          'label'     => Mage::helper('beautyprofiler')->__('Skin Type Normal'),
			          'name'      => 'skin_type_normal',
			          'onclick' => "",
			          'onchange' => "",
			          'value'  => $productdata->getSkinTypeNormal(),
			          'values' => array('1' => 'Yes','0' => 'No'),
			          'tabindex' => 1
			        ));
			        $fieldset->addField('skin_type_normal_to_dry', 'select', array(
			          'label'     => Mage::helper('beautyprofiler')->__('Skin Type Normal to Dry'),
			          'name'      => 'skin_type_normal_to_dry',
			          'onclick' => "",
			          'onchange' => "",
			          'value'  => $productdata->getSkinTypeNormalToDry(),
			          'values' => array('1' => 'Yes','0' => 'No'),
			          'tabindex' => 1
			        ));	
			        $fieldset->addField('skin_type_normal_to_oily', 'select', array(
			          'label'     => Mage::helper('beautyprofiler')->__('Skin Type Normal to Oily'),
			          'name'      => 'skin_type_normal_to_oily',
			          'onclick' => "",
			          'onchange' => "",
			          'value'  => $productdata->getSkinTypeNormalToOily(),
			          'values' => array('1' => 'Yes','0' => 'No'),
			          'tabindex' => 1
			        ));	

					/*$fieldset->addField('skin_type', 'radios', array(
				        'label'     => Mage::helper('beautyprofiler')->__('Skin Type'),
				        'name'      => 'skin_type',
						'onclick' => "",
						'onchange' => "",
						'value' => $productdata->getSkinType(),
						'values' => array(
                            array('value'=>'1','label'=>'Oily'),
                            array('value'=>'2','label'=>'Very Oily'),
                            array('value'=>'3','label'=>'Dry'),
                            array('value'=>'4','label'=>'Very Dry'),
                            array('value'=>'5','label'=>'Normal'),
                            array('value'=>'6','label'=>'Normal to dry'),
                            array('value'=>'7','label'=>'Normal to oily'),
                        ),
						'disabled' => false,
						'readonly' => false,
						'after_element_html' => '',
						'tabindex' => 1
					));*/
					$fieldset->addField('sensitive_skin', 'radios', array(
				        'label'     => Mage::helper('beautyprofiler')->__('Sensitive Skin'),
				        'name'      => 'sensitive_skin',
						'onclick' => "",
						'onchange' => "",
						'value' => $productdata->getSensitiveSkin(),
						'values' => array(
                            array('value'=>'1','label'=>'Yes'),
                            array('value'=>'0','label'=>'No'),
                        ),
						'disabled' => false,
						'readonly' => false,
						'after_element_html' => '',
						'tabindex' => 1
					));
					$fieldset->addField('sensitive_skin_reason', 'radios', array(
				        'label'     => Mage::helper('beautyprofiler')->__('Sensitive Skin Reason'),
				        'name'      => 'sensitive_skin_reason',
						'onclick' => "",
						'onchange' => "",
						'value' => $productdata->getSensitiveSkinReason(),
						'values' => array(
                            array('value'=>'1','label'=>'Doctor Confirmation'),
                            array('value'=>'2','label'=>'Own assessment'),
                        ),
						'disabled' => false,
						'readonly' => false,
						'after_element_html' => '',
						'tabindex' => 1
					));
					$fieldset->addField('sensitive_skin_rate', 'radios', array(
				        'label'     => Mage::helper('beautyprofiler')->__('Sensitive Skin Rate'),
				        'name'      => 'sensitive_skin_rate',
						'onclick' => "",
						'onchange' => "",
						'value' => $productdata->getSensitiveSkinRate(),
						'values' => array(
                            array('value'=>'1','label'=>'Severe'),
                            array('value'=>'2','label'=>'Mild to severe'),
                            array('value'=>'3','label'=>'Mild'),
                        ),
						'disabled' => false,
						'readonly' => false,
						'after_element_html' => '',
						'tabindex' => 1
					));
						$fieldset->addField('face_dehydrated_overall', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face dehydrated overall'),
						'name'      => 'face_dehydrated_overall',
						'checked' => $productdata->getFaceDehydratedOverall(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('face_dehydrated_around_mouth', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face dehydrated around mouth'),
						'name'      => 'face_dehydrated_around_mouth',
						'checked' => $productdata->getFaceDehydratedAroundMouth(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('face_dehydrated_around_cheeks', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face dehydrated around cheeks'),
						'name'      => 'face_dehydrated_around_cheeks',
						'checked' => $productdata->getFaceDehydratedAroundCheeks(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('face_dehydrated_around_forehead', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face dehydrated around forehead'),
						'name'      => 'face_dehydrated_around_forehead',
						'checked' => $productdata->getFaceDehydratedAroundForehead(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('face_uneven_skin_tone_overall', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face uneven skin tone overall'),
						'name'      => 'face_uneven_skin_tone_overall',
						'checked' => $productdata->getFaceUnevenSkinToneOverall(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('face_uneven_skin_tone_around_mouth', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face uneven skin tone around mouth'),
						'name'      => 'face_uneven_skin_tone_around_mouth',
						'checked' => $productdata->getFaceUnevenSkinToneAroundMouth(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('face_uneven_skin_tone_around_cheeks', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face uneven skin tone around cheeks'),
						'name'      => 'face_uneven_skin_tone_around_cheeks',
						'checked' => $productdata->getFaceUnevenSkinToneAroundCheeks(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('face_uneven_skin_tone_around_forehead', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face uneven skin tone around forehead'),
						'name'      => 'face_uneven_skin_tone_around_forehead',
						'checked' => $productdata->getFaceUnevenSkinToneAroundForehead(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('face_uneven_skin_texture_overall', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face uneven skin texture overall'),
						'name'      => 'face_uneven_skin_texture_overall',
						'checked' => $productdata->getFaceUnevenSkinTextureOverall(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('face_uneven_skin_texture_around_mouth', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face uneven skin texture around mouth'),
						'name'      => 'face_uneven_skin_texture_around_mouth',
						'checked' => $productdata->getFaceUnevenSkinTextureAroundMouth(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('face_uneven_skin_texture_around_cheeks', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face uneven skin texture around cheeks'),
						'name'      => 'face_uneven_skin_texture_around_cheeks',
						'checked' => $productdata->getFaceUnevenSkinTextureAroundCheeks(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('face_uneven_skin_texture_around_forehead', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face uneven skin texture around forehead'),
						'name'      => 'face_uneven_skin_texture_around_forehead',
						'checked' => $productdata->getFaceUnevenSkinTextureAroundForehead(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('pigmentation_type_significant', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Pigmentation Type Significant'),
				          'name'      => 'pigmentation_type_significant',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getPigmentationTypeSignificant(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('pigmentation_type_mild', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Pigmentation Type Mild'),
				          'name'      => 'pigmentation_type_mild',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getPigmentationTypeMild(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						/*$fieldset->addField('face_pigmentation_type', 'radios', array(
				        'label'     => Mage::helper('beautyprofiler')->__('Face face pigmentation type'),
				        'name'      => 'face_pigmentation_type',
						'onclick' => "",
						'onchange' => "",
						'value' => $productdata->getFacePigmentationType(),
						'values' => array(
                            array('value'=>'1','label'=>'Significant'),
                            array('value'=>'2','label'=>'Mild'),
                        ),
						'disabled' => false,
						'readonly' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));*/
						$fieldset->addField('face_pigmentation_overall', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face pigmentation overall'),
						'name'      => 'face_pigmentation_overall',
						'checked' => $productdata->getFacePigmentationOverall(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('face_pigmentation_around_mouth', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face pigmentation around mouth'),
						'name'      => 'face_pigmentation_around_mouth',
						'checked' => $productdata->getFacePigmentationAroundMouth(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						
						$fieldset->addField('face_pigmentation_cheeks', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face pigmentation around cheeks'),
						'name'      => 'face_pigmentation_cheeks',
						'checked' => $productdata->getFacePigmentationCheeks(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('face_pigmentation_forehead', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face pigmentation forehead'),
						'name'      => 'face_pigmentation_forehead',
						'checked' => $productdata->getFacePigmentationForehead(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('face_aging_fine_lines', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face aging fine lines'),
						'name'      => 'face_aging_fine_lines',
						'checked' => $productdata->getFaceAgingFineLines(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('face_aging_deep_lines', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face aging deep lines'),
						'name'      => 'face_aging_deep_lines',
						'checked' => $productdata->getFaceAgingDeepLines(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('face_aging_segging_dull_skin', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face aging segging dull skin'),
						'name'      => 'face_aging_segging_dull_skin',
						'checked' => $productdata->getFaceAgingSeggingDullSkin(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('face_open_pores', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face open pores'),
						'name'      => 'face_open_pores',
						'value' => $productdata->getFaceOpenPores(),
						'onclick' => "",
						'onchange' => "",
						'values' => array(
                            array('value'=>'1','label'=>'Yes'),
                            array('value'=>'0','label'=>'No'),
                        ),
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('face_acne_prone', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face acne pores'),
						'name'      => 'face_acne_prone',
						'value' => $productdata->getFaceAcneProne(),
						'onclick' => "",
						'onchange' => "",
						'values' => array(
                            array('value'=>'1','label'=>'Yes'),
                            array('value'=>'0','label'=>'No'),
                        ),
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('face_acne_prone_type', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face acne pores'),
						'name'      => 'face_acne_prone_type',
						'value' => $productdata->getFaceAcneProneType(),
						'onclick' => "",
						'onchange' => "",
						'values' => array(
                            array('value'=>'1','label'=>'Severe'),
                            array('value'=>'2','label'=>'Mild'),
                            array('value'=>'3','label'=>'had acne in past'),
                        ),
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('face_acne_treatment', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Face acne treatment'),
						'name'      => 'face_acne_treatment',
						'checked' => $productdata->getFaceAcneTreatment(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('eyes_fine_lines', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Eye fine lines'),
						'name'      => 'eyes_fine_lines',
						'checked' => $productdata->getEyesFineLines(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('eyes_deep_lines', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Eye deep lines'),
						'name'      => 'eyes_deep_lines',
						'checked' => $productdata->getEyesDeepLines(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('eyes_hydration', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Eyes hydration'),
						'name'      => 'eyes_hydration',
						'checked' => $productdata->getEyesHydration(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('eyes_puffy_and_tired_eyes', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Eyes puffy and tired eyes'),
						'name'      => 'eyes_puffy_and_tired_eyes',
						'checked' => $productdata->getEyesPuffyAndTiredEyes(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('eyes_dark_circles', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Eyes dark circles'),
						'name'      => 'eyes_dark_circles',
						'checked' => $productdata->getEyesDarkCircles(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('hands_and_feet_dry', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hands and feet dry'),
						'name'      => 'hands_and_feet_dry',
						'checked' => $productdata->getHandsAndFeetDry(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('hands_and_feet_regular', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hands and feet regular'),
						'name'      => 'hands_and_feet_regular',
						'checked' => $productdata->getHandsAndFeetRegular(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('complexion_very_fair', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Skin Complexion very fair'),
				          'name'      => 'complexion_very_fair',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getComplexionVeryFair(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('complexion_fair', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Skin Complexion Fair'),
				          'name'      => 'complexion_fair',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getComplexionFair(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('complexion_wheatish_olive', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Skin Complexion Wheatish/Olive'),
				          'name'      => 'complexion_wheatish_olive',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getComplexionWheatishOlive(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('complexion_dusky', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Skin Complexion Dusky'),
				          'name'      => 'complexion_dusky',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getComplexionDusky(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('complexion_very_dusky', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Skin Complexion Very Dusky'),
				          'name'      => 'complexion_very_dusky',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getComplexionVeryDusky(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						/*$fieldset->addField('complexion', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Complexion'),
						'name'      => 'complexion',
						'value' => $productdata->getComplexion(),
						'onclick' => "",
						'onchange' => "",
						'values' => array(
                            array('value'=>'1','label'=>'Very Fair'),
                            array('value'=>'2','label'=>'Fair'),
                            array('value'=>'3','label'=>'Weatish/olive'),
                            array('value'=>'4','label'=>'Dusky'),
                            array('value'=>'5','label'=>'Very dusky'),
                        ),
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	*/	
						$fieldset->addField('faceshape_oval', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Faceshape - Oval'),
				          'name'      => 'faceshape_oval',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getFaceshapeOval(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('faceshape_square', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Faceshape - Square'),
				          'name'      => 'faceshape_square',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getFaceshapeSquare(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('faceshape_diamond', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Faceshape - Diamond'),
				          'name'      => 'faceshape_diamond',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getFaceshapeDiamond(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('faceshape_round', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Faceshape - Round'),
				          'name'      => 'faceshape_round',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getFaceshapeRound(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						/*$fieldset->addField('faceshape', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Complexion'),
						'name'      => 'faceshape',
						'value' => $productdata->getFaceshape(),
						'onclick' => "",
						'onchange' => "",
						'values' => array(
                            array('value'=>'1','label'=>'Oval'),
                            array('value'=>'2','label'=>'Square'),
                            array('value'=>'3','label'=>'Diamond'),
                            array('value'=>'4','label'=>'Round'),
                        ),
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	*/
						$fieldset->addField('hair_volume_thick', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Hair Volume - Thick'),
				          'name'      => 'hair_volume_thick',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getHairVolumeThick(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('hair_volume_thin', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Hair Volume - Thin'),
				          'name'      => 'hair_volume_thin',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getHairVolumeThin(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('hair_volume_medium', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Hair Volume - Medium'),
				          'name'      => 'hair_volume_medium',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getHairVolumeMedium(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						/*$fieldset->addField('hair_volume', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair Volume'),
						'name'      => 'hair_volume',
						'value' => $productdata->getHairVolume(),
						'onclick' => "",
						'onchange' => "",
						'values' => array(
                            array('value'=>'1','label'=>'Thick'),
                            array('value'=>'2','label'=>'Thin'),
                            array('value'=>'3','label'=>'Medium'),
                        ),
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	*/
						$fieldset->addField('hair_texture_straight', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Hair Texture - Straight'),
				          'name'      => 'hair_texture_straight',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getHairTextureStraight(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('hair_texture_straight_with_waves', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Hair Texture - Straight with Waves'),
				          'name'      => 'hair_texture_straight_with_waves',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getHairTextureStraightWithWaves(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('hair_texture_frizzy', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Hair Texture - Frizzy'),
				          'name'      => 'hair_texture_frizzy',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getHairTextureFrizzy(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('hair_texture_curly', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Hair Texture - Curly'),
				          'name'      => 'hair_texture_curly',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getHairTextureCurly(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('hair_texture_very_curly', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Hair Texture - Very Curly'),
				          'name'      => 'hair_texture_very_curly',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getHairTextureVeryCurly(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						/*$fieldset->addField('hair_texture', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair Texture'),
						'name'      => 'hair_texture',
						'value' => $productdata->getHairTexture(),
						'onclick' => "",
						'onchange' => "",
						'values' => array(
                            array('value'=>'1','label'=>'Straight'),
                            array('value'=>'2','label'=>'Straight with waves'),
                            array('value'=>'3','label'=>'Frizzy'),
                            array('value'=>'4','label'=>'Curly'),
                            array('value'=>'5','label'=>'Very Curly'),
                        ),
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));		*/
						$fieldset->addField('hair_scalp_type_dry', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Hair Scalp Type - Dry'),
				          'name'      => 'hair_scalp_type_dry',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getHairScalpTypeDry(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('hair_scalp_type_oily', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Hair Scalp Type - Oily'),
				          'name'      => 'hair_scalp_type_oily',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getHairScalpTypeOily(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						$fieldset->addField('hair_scalp_type_normal', 'select', array(
				          'label'     => Mage::helper('beautyprofiler')->__('Hair Scalp Type - Normal'),
				          'name'      => 'hair_scalp_type_normal',
				          'onclick' => "",
				          'onchange' => "",
				          'value'  => $productdata->getHairScalpTypeNormal(),
				          'values' => array('1' => 'Yes','0' => 'No'),
				          'tabindex' => 1
				        	));
						/*$fieldset->addField('hair_scalp_type', 'radios', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair Scalp type'),
						'name'      => 'hair_scalp_type',
						'value' => $productdata->getHairScalpType(),
						'onclick' => "",
						'onchange' => "",
						'values' => array(
                            array('value'=>'1','label'=>'Dry'),
                            array('value'=>'2','label'=>'Oily'),
                            array('value'=>'3','label'=>'Normal'),
                        ),
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	*/
						$fieldset->addField('hair_exposure_to_colour_fashion', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair exposure to Colour - fashion'),
						'name'      => 'hair_exposure_to_colour_fashion',
						'checked' => $productdata->getHairExposureToColourFashion(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('hair_exposure_to_grey_coverage', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair exposure to Grey coverage'),
						'name'      => 'hair_exposure_to_grey_coverage',
						'checked' => $productdata->getHairExposureToGreyCoverage(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('hair_exposure_to_straightened', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair exposure to Straightened'),
						'name'      => 'hair_exposure_to_straightened',
						'checked' => $productdata->getHairExposureToStraightened(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('hair_exposure_to_none', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair exposure to None'),
						'name'      => 'hair_exposure_to_none',
						'checked' => $productdata->getHairExposureToNone(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('hair_exposure_to_others', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair exposure to others'),
						'name'      => 'hair_exposure_to_others',
						'checked' => $productdata->getHairExposureToOthers(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						
						$fieldset->addField('hair_concern_hair_fall', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair concern hair fall'),
						'name'      => 'hair_concern_hair_fall',
						'checked' => $productdata->getHairConcernHairFall(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('hair_concern_hair_breakage', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair concern hair breakage'),
						'name'      => 'hair_concern_hair_breakage',
						'checked' => $productdata->getHairConcernHairBreakage(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('hair_concern_lacks_volume', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair concern lacks volume'),
						'name'      => 'hair_concern_lacks_volume',
						'checked' => $productdata->getHairConcernLacksVolume(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('hair_concern_dry_and_dull', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair concern dry and dull'),
						'name'      => 'hair_concern_dry_and_dull',
						'checked' => $productdata->getHairConcernDryAndDull(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('hair_concern_frizzy', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair concern frizzy'),
						'name'      => 'hair_concern_frizzy',
						'checked' => $productdata->getHairConcernFrizzy(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('hair_scalp_concern_sensitive', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair scalp sensitivity'),
						'name'      => 'hair_scalp_concern_sensitive',
						'checked' => $productdata->getHairScalpConcernSensitive(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('hair_scalp_concern_flaky_scalp', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair scalp concern flacky scalp'),
						'name'      => 'hair_scalp_concern_flaky_scalp',
						'checked' => $productdata->getHairScalpConcernFlakyScalp(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('hair_scalp_concern_none', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair scalp concern none'),
						'name'      => 'hair_scalp_concern_none',
						'checked' => $productdata->getHairScalpConcernNone(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('hair_scalp_concern_others', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Hair scalp concern others'),
						'name'      => 'hair_scalp_concern_others',
						'checked' => $productdata->getHairScalpConcernOthers(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_cleanse_tone_face_wash', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face cleanse tone face wash'),
						'name'      => 'prepare_face_cleanse_tone_face_wash',
						'checked' => $productdata->getPrepareFaceCleanseToneFaceWash(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_cleanse_tone_miscellar', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face cleanse tone miscellar'),
						'name'      => 'prepare_face_cleanse_tone_miscellar',
						'checked' => $productdata->getPrepareFaceCleanseToneMiscellar(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_cleanse_tone_cleanser', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face cleanse tone cleanser'),
						'name'      => 'prepare_face_cleanse_tone_cleanser',
						'checked' => $productdata->getPrepareFaceCleanseToneCleanser(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_cleanse_tone_toner', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face cleanse tone toner'),
						'name'      => 'prepare_face_cleanse_tone_toner',
						'checked' => $productdata->getPrepareFaceCleanseToneToner(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_hydrate_protect_face_serum', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face hydrate protect face serum'),
						'name'      => 'prepare_face_hydrate_protect_face_serum',
						'checked' => $productdata->getPrepareFaceHydrateProtectFaceSerum(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_hydrate_protect_face_cream', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face hydrate protect face cream'),
						'name'      => 'prepare_face_hydrate_protect_face_cream',
						'checked' => $productdata->getPrepareFaceHydrateProtectFaceCream(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_hydrate_protect_eye_cream', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face hydrate protect eye cream'),
						'name'      => 'prepare_face_hydrate_protect_eye_cream',
						'checked' => $productdata->getPrepareFaceHydrateProtectEyeCream(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('prepare_face_hydrate_protect_eye_serum', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face hydrate protect eye serum'),
						'name'      => 'prepare_face_hydrate_protect_eye_serum',
						'checked' => $productdata->getPrepareFaceHydrateProtectEyeSerum(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_hydrate_protect_sunscreen', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face hydrate protect sunscreen'),
						'name'      => 'prepare_face_hydrate_protect_sunscreen',
						'checked' => $productdata->getPrepareFaceHydrateProtectSunscreen(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_grooming_bb_cream', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face grooming bb cream'),
						'name'      => 'prepare_face_grooming_bb_cream',
						'checked' => $productdata->getPrepareFaceGroomingBbCream(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_grooming_sunscreen', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face grooming sunscreen'),
						'name'      => 'prepare_face_grooming_sunscreen',
						'checked' => $productdata->getPrepareFaceGroomingSunscreen(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_grooming_liogloss', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face grooming lipgloss'),
						'name'      => 'prepare_face_grooming_liogloss',
						'checked' => $productdata->getPrepareFaceGroomingLiogloss(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_grooming_foundation', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face grooming foundation'),
						'name'      => 'prepare_face_grooming_foundation',
						'checked' => $productdata->getPrepareFaceGroomingFoundation(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_grooming_compact', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face grooming compact'),
						'name'      => 'prepare_face_grooming_compact',
						'checked' => $productdata->getPrepareFaceGroomingCompact(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('prepare_face_grooming_finishing_powder', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face grooming finishing powder'),
						'name'      => 'prepare_face_grooming_finishing_powder',
						'checked' => $productdata->getPrepareFaceGroomingFinishingPowder(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('prepare_face_grooming_eye_pencil', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face grooming eye pencil'),
						'name'      => 'prepare_face_grooming_eye_pencil',
						'checked' => $productdata->getPrepareFaceGroomingEyePencil(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('prepare_face_grooming_eye_shadow', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face grooming eye shadow'),
						'name'      => 'prepare_face_grooming_eye_shadow',
						'checked' => $productdata->getPrepareFaceGroomingEyeShadow(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_grooming_lipstick', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face grooming lipstick'),
						'name'      => 'prepare_face_grooming_lipstick',
						'checked' => $productdata->getPrepareFaceGroomingLipstick(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('prepare_face_grooming_perfume', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Prepare face grooming perfume'),
						'name'      => 'prepare_face_grooming_perfume',
						'checked' => $productdata->getPrepareFaceGroomingPerfume(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('beauty_routine_cleanse_tone_face_wash', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Beauty routine cleanse tone face wash'),
						'name'      => 'beauty_routine_cleanse_tone_face_wash',
						'checked' => $productdata->getBeautyRoutineCleanseToneFaceWash(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('beauty_routine_cleanse_tone_miscellar', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Beauty routine cleanse tone miscellar'),
						'name'      => 'beauty_routine_cleanse_tone_miscellar',
						'checked' => $productdata->getBeautyRoutineCleanseToneMiscellar(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('beauty_routine_cleanse_tone_cleanser', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Beauty routine cleanse tone cleanser'),
						'name'      => 'beauty_routine_cleanse_tone_cleanser',
						'checked' => $productdata->getBeautyRoutineCleanseToneCleanser(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('beauty_routine_cleanse_tone_toner', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Beauty routine cleanse tone toner'),
						'name'      => 'beauty_routine_cleanse_tone_toner',
						'checked' => $productdata->getBeautyRoutineCleanseToneToner(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('beauty_routine_repair_rejusvenate_face_serum', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Beauty routine repair rejusvenate face serum'),
						'name'      => 'beauty_routine_repair_rejusvenate_face_serum',
						'checked' => $productdata->getBeautyRoutineRepairRejusvenateFaceSerum(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('beauty_routine_repair_rejusvenate_face_cream', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Beauty routine repair rejusvenate face cream'),
						'name'      => 'beauty_routine_repair_rejusvenate_face_cream',
						'checked' => $productdata->getBeautyRoutineRepairRejusvenateFaceCream(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('beauty_routine_repair_rejusvenate_eye_cream', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Beauty routine repair rejusvenate eye cream'),
						'name'      => 'beauty_routine_repair_rejusvenate_eye_cream',
						'checked' => $productdata->getBeautyRoutineRepairRejusvenateEyeCream(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('beauty_routine_repair_rejusvenate_eye_serum', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Beauty routine repair rejusvenate eye serum'),
						'name'      => 'beauty_routine_repair_rejusvenate_eye_serum',
						'checked' => $productdata->getBeautyRoutineRepairRejusvenateEyeSerum(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('beauty_routine_grooming_foot_cream', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Beauty routine grooming foot cream'),
						'name'      => 'beauty_routine_grooming_foot_cream',
						'checked' => $productdata->getBeautyRoutineGroomingFootCream(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('beauty_routine_grooming_hand_cream', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Beauty routine grooming hand cream'),
						'name'      => 'beauty_routine_grooming_hand_cream',
						'checked' => $productdata->getBeautyRoutineGroomingHandCream(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						
						$fieldset->addField('brand_face_wash', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Barnd of face wash'),
						'name'      => 'brand_face_wash',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandFaceWash(),
						'after_element_html' => '',
						));

						$fieldset->addField('brand_eye_cream', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of eye cream'),
						'name'      => 'brand_eye_cream',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandEyeCream(),
						'after_element_html' => '',
						));

						$fieldset->addField('barnd_finishing_powder', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of finishing powder'),
						'name'      => 'barnd_finishing_powder',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBarndFinishingPowder(),
						'after_element_html' => '',
						));

						$fieldset->addField('brand_miscellar', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of miscellar'),
						'name'      => 'brand_miscellar',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandMiscellar(),
						'after_element_html' => '',
						));

						$fieldset->addField('brand_eye_serum', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of eye serum'),
						'name'      => 'brand_eye_serum',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandEyeSerum(),
						'after_element_html' => '',
						));

						$fieldset->addField('brand_eye_pencil', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of eye pencil'),
						'name'      => 'brand_eye_pencil',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandEyePencil(),
						'after_element_html' => '',
						));

						$fieldset->addField('brand_cleanser', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of cleanser'),
						'name'      => 'brand_cleanser',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandCleanser(),
						'after_element_html' => '',
						));

						$fieldset->addField('brand_sunscreen', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of sunscreen'),
						'name'      => 'brand_sunscreen',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandSunscreen(),
						'after_element_html' => '',
						));

						$fieldset->addField('brand_eye_shadow', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of eye shadow'),
						'name'      => 'brand_eye_shadow',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandEyeShadow(),
						'after_element_html' => '',
						));

						$fieldset->addField('brand_toner', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of toner'),
						'name'      => 'brand_toner',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandToner(),
						'after_element_html' => '',
						));

						$fieldset->addField('brand_bb_cream', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of bb cream'),
						'name'      => 'brand_bb_cream',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandBbCream(),
						'after_element_html' => '',
						));

						$fieldset->addField('brand_lipstick', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of lipstick'),
						'name'      => 'brand_lipstick',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandLipstick(),
						'after_element_html' => '',
						));

						$fieldset->addField('brand_face_serum', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of face serum'),
						'name'      => 'brand_face_serum',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandFaceSerum(),
						'after_element_html' => '',
						));

						$fieldset->addField('barnd_foundation', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of foundation'),
						'name'      => 'barnd_foundation',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBarndFoundation(),
						'after_element_html' => '',
						));

						$fieldset->addField('brand_lipgloss', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of lip gloss'),
						'name'      => 'brand_lipgloss',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandLipgloss(),
						'after_element_html' => '',
						));

						$fieldset->addField('brand_face_cream', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of face cream'),
						'name'      => 'brand_face_cream',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandFaceCream(),
						'after_element_html' => '',
						));
						
						$fieldset->addField('brand_compact', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of compact'),
						'name'      => 'brand_compact',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandCompact(),
						'after_element_html' => '',
						));
					
						$fieldset->addField('brand_perfume', 'text', array(
						'label'     => Mage::helper('beautyprofiler')->__('Brand of perfume'),
						'name'      => 'brand_perfume',
						'onclick' => "",
						'onchange' => "",
						'style'   => "",
						'value'  => $productdata->getBrandPerfume(),
						'after_element_html' => '',
						));
					
						$fieldset->addField('skin_goals_radiant_and_smooth_skin', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Skin goal - radiant and smooth skin'),
						'name'      => 'skin_goals_radiant_and_smooth_skin',
						'checked' => $productdata->getSkinGoalsRadiantAndSmoothSkin(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						
						$fieldset->addField('skin_goals_clear_and_bright_skin', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Skin goal - clear and bright skin'),
						'name'      => 'skin_goals_clear_and_bright_skin',
						'checked' => $productdata->getSkinGoalsClearAndBrightSkin(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('skin_goals_well_hydrate_and_supple', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Skin goal - well hydrate and supple'),
						'name'      => 'skin_goals_well_hydrate_and_supple',
						'checked' => $productdata->getSkinGoalsWellHydrateAndSupple(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('skin_goals_well_groomed_look', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Skin goal - well groomed look'),
						'name'      => 'skin_goals_well_groomed_look',
						'checked' => $productdata->getSkinGoalsWellGroomedLook(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('skin_goals_maintain_and_improve_my_current_skin', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Skin goal - maintain and improve my current skin'),
						'name'      => 'skin_goals_maintain_and_improve_my_current_skin',
						'checked' => $productdata->getSkinGoalsMaintainAndImproveMyCurrentSkin(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('undertone_neutral', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Undertone Neutral'),
						'name'      => 'undertone_neutral',
						'checked' => $productdata->getUndertoneNeutral(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));	
						$fieldset->addField('undertone_warm', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Undertone Warm'),
						'name'      => 'undertone_warm',
						'checked' => $productdata->getUndertoneWarm(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						$fieldset->addField('undertone_cool', 'checkbox', array(
						'label'     => Mage::helper('beautyprofiler')->__('Undertone Cool'),
						'name'      => 'undertone_cool',
						'checked' => $productdata->getUndertoneCool(),
						'onclick' => "",
						'onchange' => "",
						'value'  => '1',
						'disabled' => false,
						'after_element_html' => '',
						'tabindex' => 1
						));
						
						
				if (Mage::getSingleton("adminhtml/session")->getCustomData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getCustomData());
					Mage::getSingleton("adminhtml/session")->setCustomData(null);
				} 
				elseif(Mage::registry("custom_data")) {
				    $form->setValues(Mage::registry("custom_data")->getData());
				}
			
				return parent::_prepareForm();
		}
}
