<?php

class Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("beutyprofilerGrid");
				$this->setDefaultSort("profile_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("beautyprofiler/beutyprofiler")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("profile_id", array(
				"header" => Mage::helper("beautyprofiler")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "profile_id",
				));
                
				$this->addColumn("full_name", array(
				"header" => Mage::helper("beautyprofiler")->__("Customer Name"),
				"index" => "full_name",
				));
				$this->addColumn("email", array(
				"header" => Mage::helper("beautyprofiler")->__("Email"),
				"index" => "email",
				));
					$this->addColumn('dob', array(
						'header'    => Mage::helper('beautyprofiler')->__('Dob'),
						'index'     => 'dob',
						'type'      => 'datetime',
					));
						$this->addColumn('skin_type', array(
						'header' => Mage::helper('beautyprofiler')->__('Skin Type'),
						'index' => 'skin_type',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray5(),				
						));
						
						$this->addColumn('sensitive_skin', array(
						'header' => Mage::helper('beautyprofiler')->__('Sensitive Skin'),
						'index' => 'sensitive_skin',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray6(),				
						));
						
						$this->addColumn('sensitive_skin_reason', array(
						'header' => Mage::helper('beautyprofiler')->__('How did you know you have sensitive skin?'),
						'index' => 'sensitive_skin_reason',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray7(),				
						));
						
						$this->addColumn('sensitive_skin_rate', array(
						'header' => Mage::helper('beautyprofiler')->__('Rate your skin\'s sensitivity'),
						'index' => 'sensitive_skin_rate',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray8(),				
						));
						
						$this->addColumn('face_dehydrated_overall', array(
						'header' => Mage::helper('beautyprofiler')->__('Face Dehydrated Overall'),
						'index' => 'face_dehydrated_overall',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray9(),				
						));
						
						$this->addColumn('face_dehydrated_around_mouth', array(
						'header' => Mage::helper('beautyprofiler')->__('Face Dehydrated Around Mouth'),
						'index' => 'face_dehydrated_around_mouth',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray10(),				
						));
						
						$this->addColumn('face_dehydrated_around_cheeks', array(
						'header' => Mage::helper('beautyprofiler')->__('Face Dehydrated Around Cheeks'),
						'index' => 'face_dehydrated_around_cheeks',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray11(),				
						));
						
						$this->addColumn('face_dehydrated_around_forehead', array(
						'header' => Mage::helper('beautyprofiler')->__('Face Dehydrated Around Forehead'),
						'index' => 'face_dehydrated_around_forehead',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray12(),				
						));
						
						$this->addColumn('face_uneven_skin_tone_overall', array(
						'header' => Mage::helper('beautyprofiler')->__('Face uneven skin tone  overall'),
						'index' => 'face_uneven_skin_tone_overall',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray13(),				
						));
						
						$this->addColumn('face_uneven_skin_tone_around_mouth', array(
						'header' => Mage::helper('beautyprofiler')->__('Face uneven skin tone  around mouth'),
						'index' => 'face_uneven_skin_tone_around_mouth',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray14(),				
						));
						
						$this->addColumn('face_uneven_skin_tone_around_cheeks', array(
						'header' => Mage::helper('beautyprofiler')->__('Face uneven skin tone  around cheeks'),
						'index' => 'face_uneven_skin_tone_around_cheeks',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray15(),				
						));
						
						$this->addColumn('face_uneven_skin_tone_around_forehead', array(
						'header' => Mage::helper('beautyprofiler')->__('Face uneven skin tone  around forehead'),
						'index' => 'face_uneven_skin_tone_around_forehead',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray16(),				
						));
						
						$this->addColumn('face_uneven_skin_texture_overall', array(
						'header' => Mage::helper('beautyprofiler')->__('Face uneven skin texture overall'),
						'index' => 'face_uneven_skin_texture_overall',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray17(),				
						));
						
						$this->addColumn('face_uneven_skin_texture_around_mouth', array(
						'header' => Mage::helper('beautyprofiler')->__('Face uneven skin texture Around Mouth'),
						'index' => 'face_uneven_skin_texture_around_mouth',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray18(),				
						));
						
						$this->addColumn('face_uneven_skin_texture_around_cheeks', array(
						'header' => Mage::helper('beautyprofiler')->__('Face uneven skin texture Around Cheeks'),
						'index' => 'face_uneven_skin_texture_around_cheeks',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray19(),				
						));
						
						$this->addColumn('face_uneven_skin_texture_around_forehead', array(
						'header' => Mage::helper('beautyprofiler')->__('Face uneven skin texture Around Forehead'),
						'index' => 'face_uneven_skin_texture_around_forehead',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray20(),				
						));
						
						$this->addColumn('face_pigmentation_type', array(
						'header' => Mage::helper('beautyprofiler')->__('Pigmentation'),
						'index' => 'face_pigmentation_type',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray21(),				
						));
						
						$this->addColumn('face_pigmentation_overall', array(
						'header' => Mage::helper('beautyprofiler')->__('Pigmentation Overall'),
						'index' => 'face_pigmentation_overall',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray22(),				
						));
						
						$this->addColumn('face_pigmentation_around_mouth', array(
						'header' => Mage::helper('beautyprofiler')->__('Pigmentation around mouth'),
						'index' => 'face_pigmentation_around_mouth',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray23(),				
						));
						
						$this->addColumn('face_pigmentation_cheeks', array(
						'header' => Mage::helper('beautyprofiler')->__('Pigmentation Cheeks'),
						'index' => 'face_pigmentation_cheeks',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray24(),				
						));
						
						$this->addColumn('face_pigmentation_forehead', array(
						'header' => Mage::helper('beautyprofiler')->__('Pigmentation Forehead'),
						'index' => 'face_pigmentation_forehead',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray25(),				
						));
						
						$this->addColumn('face_aging_fine_lines', array(
						'header' => Mage::helper('beautyprofiler')->__('Aging Fine lines'),
						'index' => 'face_aging_fine_lines',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray26(),				
						));
						
						$this->addColumn('face_aging_deep_lines', array(
						'header' => Mage::helper('beautyprofiler')->__('Aging Deep lines'),
						'index' => 'face_aging_deep_lines',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray27(),				
						));
						
						$this->addColumn('face_aging_segging_dull_skin', array(
						'header' => Mage::helper('beautyprofiler')->__('Aging Sagging & dull skin'),
						'index' => 'face_aging_segging_dull_skin',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray28(),				
						));
						
						$this->addColumn('face_open_pores', array(
						'header' => Mage::helper('beautyprofiler')->__('Open pores'),
						'index' => 'face_open_pores',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray29(),				
						));
						
						$this->addColumn('face_acne_prone', array(
						'header' => Mage::helper('beautyprofiler')->__('Acne prone'),
						'index' => 'face_acne_prone',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray30(),				
						));
						
						$this->addColumn('face_acne_prone_type', array(
						'header' => Mage::helper('beautyprofiler')->__('Acne prone Type'),
						'index' => 'face_acne_prone_type',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray31(),				
						));
						
						$this->addColumn('face_acne_treatment', array(
						'header' => Mage::helper('beautyprofiler')->__('Acne treatment'),
						'index' => 'face_acne_treatment',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray32(),				
						));
						
						$this->addColumn('eyes_fine_lines', array(
						'header' => Mage::helper('beautyprofiler')->__('Eyes fine lines'),
						'index' => 'eyes_fine_lines',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray33(),				
						));
						
						$this->addColumn('eyes_deep_lines', array(
						'header' => Mage::helper('beautyprofiler')->__('Eyes deep lines'),
						'index' => 'eyes_deep_lines',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray34(),				
						));
						
						$this->addColumn('eyes_hydration', array(
						'header' => Mage::helper('beautyprofiler')->__('Eyes hydration'),
						'index' => 'eyes_hydration',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray35(),				
						));
						
						$this->addColumn('eyes_puffy_and_tired_eyes', array(
						'header' => Mage::helper('beautyprofiler')->__('Eyes hydration puffy and tired eyes'),
						'index' => 'eyes_puffy_and_tired_eyes',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray36(),				
						));
						
						$this->addColumn('eyes_dark_circles', array(
						'header' => Mage::helper('beautyprofiler')->__('Eyes hydration dark circles'),
						'index' => 'eyes_dark_circles',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray37(),				
						));
						
						$this->addColumn('hands_and_feet_dry', array(
						'header' => Mage::helper('beautyprofiler')->__('Hands and feet dry'),
						'index' => 'hands_and_feet_dry',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray38(),				
						));
						
						$this->addColumn('hands_and_feet_regular', array(
						'header' => Mage::helper('beautyprofiler')->__('Hands and feet regular'),
						'index' => 'hands_and_feet_regular',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray39(),				
						));
						
						$this->addColumn('complexion', array(
						'header' => Mage::helper('beautyprofiler')->__('Complexion'),
						'index' => 'complexion',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray40(),				
						));
						
						$this->addColumn('faceshape', array(
						'header' => Mage::helper('beautyprofiler')->__('Faceshape'),
						'index' => 'faceshape',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray41(),				
						));
						
						$this->addColumn('hair_volume', array(
						'header' => Mage::helper('beautyprofiler')->__('Hair volume'),
						'index' => 'hair_volume',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray42(),				
						));
						
						$this->addColumn('hair_texture', array(
						'header' => Mage::helper('beautyprofiler')->__('Hair Texture'),
						'index' => 'hair_texture',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray43(),				
						));
						
						$this->addColumn('hair_scalp_type', array(
						'header' => Mage::helper('beautyprofiler')->__('hair scalp type'),
						'index' => 'hair_scalp_type',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray44(),				
						));
						
						$this->addColumn('hair_exposure_to_colour_fashion', array(
						'header' => Mage::helper('beautyprofiler')->__('Colour Fashion'),
						'index' => 'hair_exposure_to_colour_fashion',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray45(),				
						));
						
						$this->addColumn('hair_exposure_to_grey_coverage', array(
						'header' => Mage::helper('beautyprofiler')->__('Colour coverage'),
						'index' => 'hair_exposure_to_grey_coverage',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray46(),				
						));
						
						$this->addColumn('hair_exposure_to_straightened', array(
						'header' => Mage::helper('beautyprofiler')->__('straightened'),
						'index' => 'hair_exposure_to_straightened',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray47(),				
						));
						
						$this->addColumn('hair_exposure_to_none', array(
						'header' => Mage::helper('beautyprofiler')->__('None'),
						'index' => 'hair_exposure_to_none',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray48(),				
						));
						
						$this->addColumn('hair_exposure_to_others', array(
						'header' => Mage::helper('beautyprofiler')->__('Other'),
						'index' => 'hair_exposure_to_others',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray49(),				
						));
						
				$this->addColumn("hair_exposure_to_others_specify", array(
				"header" => Mage::helper("beautyprofiler")->__("Other specify"),
				"index" => "hair_exposure_to_others_specify",
				));
						$this->addColumn('hair_concern_hair_fall', array(
						'header' => Mage::helper('beautyprofiler')->__('Hair fall'),
						'index' => 'hair_concern_hair_fall',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray51(),				
						));
						
						$this->addColumn('hair_concern_hair_breakage', array(
						'header' => Mage::helper('beautyprofiler')->__('Hair breakage'),
						'index' => 'hair_concern_hair_breakage',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray52(),				
						));
						
						$this->addColumn('hair_concern_lacks_volume', array(
						'header' => Mage::helper('beautyprofiler')->__('Lacks volume'),
						'index' => 'hair_concern_lacks_volume',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray53(),				
						));
						
						$this->addColumn('hair_concern_dry_and_dull', array(
						'header' => Mage::helper('beautyprofiler')->__('Dry & dull'),
						'index' => 'hair_concern_dry_and_dull',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray54(),				
						));
						
						$this->addColumn('hair_concern_frizzy', array(
						'header' => Mage::helper('beautyprofiler')->__('Frizzy'),
						'index' => 'hair_concern_frizzy',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray55(),				
						));
						
						$this->addColumn('hair_scalp_concern_sensitive', array(
						'header' => Mage::helper('beautyprofiler')->__('Sensitive'),
						'index' => 'hair_scalp_concern_sensitive',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray56(),				
						));
						
						$this->addColumn('hair_scalp_concern_flaky_scalp', array(
						'header' => Mage::helper('beautyprofiler')->__('Flaky scalp'),
						'index' => 'hair_scalp_concern_flaky_scalp',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray57(),				
						));
						
						$this->addColumn('air_scalp_concern_none', array(
						'header' => Mage::helper('beautyprofiler')->__('None'),
						'index' => 'air_scalp_concern_none',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray58(),				
						));
						
						$this->addColumn('hair_scalp_concern_others', array(
						'header' => Mage::helper('beautyprofiler')->__('Others'),
						'index' => 'hair_scalp_concern_others',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray59(),				
						));
						
				$this->addColumn("hair_scalp_concern_others_specify", array(
				"header" => Mage::helper("beautyprofiler")->__("Specify"),
				"index" => "hair_scalp_concern_others_specify",
				));
						$this->addColumn('prepare_face_cleanse_tone_face_wash', array(
						'header' => Mage::helper('beautyprofiler')->__('Face wash'),
						'index' => 'prepare_face_cleanse_tone_face_wash',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray61(),				
						));
						
						$this->addColumn('prepare_face_cleanse_tone_miscellar', array(
						'header' => Mage::helper('beautyprofiler')->__('Miscellar'),
						'index' => 'prepare_face_cleanse_tone_miscellar',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray62(),				
						));
						
						$this->addColumn('prepare_face_cleanse_tone_cleanser', array(
						'header' => Mage::helper('beautyprofiler')->__('Cleanser'),
						'index' => 'prepare_face_cleanse_tone_cleanser',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray63(),				
						));
						
						$this->addColumn('prepare_face_cleanse_tone_toner', array(
						'header' => Mage::helper('beautyprofiler')->__('Toner'),
						'index' => 'prepare_face_cleanse_tone_toner',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray64(),				
						));
						
						$this->addColumn('prepare_face_hydrate_protect_face_serum', array(
						'header' => Mage::helper('beautyprofiler')->__('Face serum'),
						'index' => 'prepare_face_hydrate_protect_face_serum',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray65(),				
						));
						
						$this->addColumn('prepare_face_hydrate_protect_cream', array(
						'header' => Mage::helper('beautyprofiler')->__('Face cream'),
						'index' => 'prepare_face_hydrate_protect_cream',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray66(),				
						));
						
						$this->addColumn('prepare_face_hydrate_protect_eye_cream', array(
						'header' => Mage::helper('beautyprofiler')->__('Eye cream'),
						'index' => 'prepare_face_hydrate_protect_eye_cream',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray67(),				
						));
						
						$this->addColumn('prepare_face_hydrate_protect_serum', array(
						'header' => Mage::helper('beautyprofiler')->__('Eye serum'),
						'index' => 'prepare_face_hydrate_protect_serum',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray68(),				
						));
						
						$this->addColumn('prepare_face_hydrate_protect_sunscreen', array(
						'header' => Mage::helper('beautyprofiler')->__('Sunscreen'),
						'index' => 'prepare_face_hydrate_protect_sunscreen',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray69(),				
						));
						
						$this->addColumn('prepare_face_grooming_bb_cream', array(
						'header' => Mage::helper('beautyprofiler')->__('Bb cream'),
						'index' => 'prepare_face_grooming_bb_cream',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray70(),				
						));
						
						$this->addColumn('prepare_face_grooming_sunscreen', array(
						'header' => Mage::helper('beautyprofiler')->__('Sunscreen'),
						'index' => 'prepare_face_grooming_sunscreen',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray71(),				
						));
						
						$this->addColumn('prepare_face_grooming_liogloss', array(
						'header' => Mage::helper('beautyprofiler')->__('Lipgloss'),
						'index' => 'prepare_face_grooming_liogloss',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray72(),				
						));
						
						$this->addColumn('prepare_face_grooming_foundation', array(
						'header' => Mage::helper('beautyprofiler')->__('Foundation'),
						'index' => 'prepare_face_grooming_foundation',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray73(),				
						));
						
						$this->addColumn('prepare_face_grooming_compact', array(
						'header' => Mage::helper('beautyprofiler')->__('Compact'),
						'index' => 'prepare_face_grooming_compact',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray74(),				
						));
						
						$this->addColumn('prepare_face_grooming_finishing_powder', array(
						'header' => Mage::helper('beautyprofiler')->__('Finishing powder'),
						'index' => 'prepare_face_grooming_finishing_powder',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray75(),				
						));
						
						$this->addColumn('prepare_face_grooming_eye_pencil', array(
						'header' => Mage::helper('beautyprofiler')->__('Eye pencil'),
						'index' => 'prepare_face_grooming_eye_pencil',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray76(),				
						));
						
						$this->addColumn('prepare_face_grooming_eye_shadow', array(
						'header' => Mage::helper('beautyprofiler')->__('Eye shadow'),
						'index' => 'prepare_face_grooming_eye_shadow',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray77(),				
						));
						
						$this->addColumn('prepare_face_grooming_lipstick', array(
						'header' => Mage::helper('beautyprofiler')->__('Lipstick'),
						'index' => 'prepare_face_grooming_lipstick',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray78(),				
						));
						
						$this->addColumn('prepare_face_grooming_perfume', array(
						'header' => Mage::helper('beautyprofiler')->__('Perfume'),
						'index' => 'prepare_face_grooming_perfume',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray79(),				
						));
						
						$this->addColumn('beauty_routine_cleanse_tone_face_wash', array(
						'header' => Mage::helper('beautyprofiler')->__('Face wash'),
						'index' => 'beauty_routine_cleanse_tone_face_wash',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray80(),				
						));
						
						$this->addColumn('beauty_routine_cleanse_tone_miscellar', array(
						'header' => Mage::helper('beautyprofiler')->__('Miscellar'),
						'index' => 'beauty_routine_cleanse_tone_miscellar',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray81(),				
						));
						
						$this->addColumn('beauty_routine_cleanse_tone_cleanser', array(
						'header' => Mage::helper('beautyprofiler')->__('Cleanser'),
						'index' => 'beauty_routine_cleanse_tone_cleanser',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray82(),				
						));
						
						$this->addColumn('beauty_routine_cleanse_tone_toner', array(
						'header' => Mage::helper('beautyprofiler')->__('Toner'),
						'index' => 'beauty_routine_cleanse_tone_toner',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray83(),				
						));
						
						$this->addColumn('beauty_routine_repair_rejusvenate_face_serum', array(
						'header' => Mage::helper('beautyprofiler')->__('Face serum'),
						'index' => 'beauty_routine_repair_rejusvenate_face_serum',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray84(),				
						));
						
						$this->addColumn('beauty_routine_repair_rejusvenate_face_cream', array(
						'header' => Mage::helper('beautyprofiler')->__('Face cream'),
						'index' => 'beauty_routine_repair_rejusvenate_face_cream',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray85(),				
						));
						
						$this->addColumn('beauty_routine_repair_rejusvenate_eye_cream', array(
						'header' => Mage::helper('beautyprofiler')->__('Eye cream'),
						'index' => 'beauty_routine_repair_rejusvenate_eye_cream',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray86(),				
						));
						
						$this->addColumn('beauty_routine_repair_rejusvenate_eye_serum', array(
						'header' => Mage::helper('beautyprofiler')->__('Eye serum'),
						'index' => 'beauty_routine_repair_rejusvenate_eye_serum',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray87(),				
						));
						
						$this->addColumn('beauty_routine_grooming_foot_cream', array(
						'header' => Mage::helper('beautyprofiler')->__('Foot cream'),
						'index' => 'beauty_routine_grooming_foot_cream',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray88(),				
						));
						
						$this->addColumn('beauty_routine_grooming_hand_cream', array(
						'header' => Mage::helper('beautyprofiler')->__('Hand cream'),
						'index' => 'beauty_routine_grooming_hand_cream',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray89(),				
						));

						$this->addColumn('undertone_neutral', array(
						'header' => Mage::helper('beautyprofiler')->__('Undertone Neutral'),
						'index' => 'undertone_neutral',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray90(),				
						));

						$this->addColumn('undertone_warm', array(
						'header' => Mage::helper('beautyprofiler')->__('Undertone Warm'),
						'index' => 'undertone_warm',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray91(),				
						));

						$this->addColumn('undertone_cool', array(
						'header' => Mage::helper('beautyprofiler')->__('Undertone Warm'),
						'index' => 'undertone_warm',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray92(),				
						));
						
				$this->addColumn("brand_face_wash", array(
				"header" => Mage::helper("beautyprofiler")->__("Face wash"),
				"index" => "brand_face_wash",
				));
				$this->addColumn("brand_eye_cream", array(
				"header" => Mage::helper("beautyprofiler")->__("Eye Cream"),
				"index" => "brand_eye_cream",
				));
				$this->addColumn("barnd_finishing_powder", array(
				"header" => Mage::helper("beautyprofiler")->__("Finishing powder"),
				"index" => "barnd_finishing_powder",
				));
				$this->addColumn("brand_miscellar", array(
				"header" => Mage::helper("beautyprofiler")->__("Miscellar"),
				"index" => "brand_miscellar",
				));
				$this->addColumn("brand_eye_serum", array(
				"header" => Mage::helper("beautyprofiler")->__("eye serum"),
				"index" => "brand_eye_serum",
				));
				$this->addColumn("brand_eye_pencil", array(
				"header" => Mage::helper("beautyprofiler")->__("eye pencil"),
				"index" => "brand_eye_pencil",
				));
				$this->addColumn("brand_cleanser", array(
				"header" => Mage::helper("beautyprofiler")->__("cleanser"),
				"index" => "brand_cleanser",
				));
				$this->addColumn("brand_sunscreen", array(
				"header" => Mage::helper("beautyprofiler")->__("sunscreen"),
				"index" => "brand_sunscreen",
				));
				$this->addColumn("brand_eye_shadow", array(
				"header" => Mage::helper("beautyprofiler")->__("eye shadow"),
				"index" => "brand_eye_shadow",
				));
				$this->addColumn("brand_toner", array(
				"header" => Mage::helper("beautyprofiler")->__("toner"),
				"index" => "brand_toner",
				));
				$this->addColumn("brand_bb_cream", array(
				"header" => Mage::helper("beautyprofiler")->__("Bb  cream"),
				"index" => "brand_bb_cream",
				));
				$this->addColumn("brand_lipstick", array(
				"header" => Mage::helper("beautyprofiler")->__("lipstick"),
				"index" => "brand_lipstick",
				));
				$this->addColumn("brand_face_serum", array(
				"header" => Mage::helper("beautyprofiler")->__("face serum"),
				"index" => "brand_face_serum",
				));
				$this->addColumn("barnd_foundation", array(
				"header" => Mage::helper("beautyprofiler")->__("foundation"),
				"index" => "barnd_foundation",
				));
				$this->addColumn("brand_lipgloss", array(
				"header" => Mage::helper("beautyprofiler")->__("lipgloss"),
				"index" => "brand_lipgloss",
				));
				$this->addColumn("brand_face_cream", array(
				"header" => Mage::helper("beautyprofiler")->__("face cream"),
				"index" => "brand_face_cream",
				));
				$this->addColumn("brand_compact", array(
				"header" => Mage::helper("beautyprofiler")->__("compact"),
				"index" => "brand_compact",
				));
				$this->addColumn("brand_perfume", array(
				"header" => Mage::helper("beautyprofiler")->__("perfume"),
				"index" => "brand_perfume",
				));
						$this->addColumn('skin_goals_radiant_and_smooth_skin', array(
						'header' => Mage::helper('beautyprofiler')->__('radiant and smooth skin'),
						'index' => 'skin_goals_radiant_and_smooth_skin',
						'type' => 'options',
						'options'=>Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray108(),				
						));
						
				$this->addColumn("skin_goals_clear_and_bright_skin", array(
				"header" => Mage::helper("beautyprofiler")->__("clear and bright skin"),
				"index" => "skin_goals_clear_and_bright_skin",
				));
				$this->addColumn("skin_goals_well_hydrate_and_supple", array(
				"header" => Mage::helper("beautyprofiler")->__("well hydrate and supple"),
				"index" => "skin_goals_well_hydrate_and_supple",
				));
				$this->addColumn("skin_goals_well_groomed_look", array(
				"header" => Mage::helper("beautyprofiler")->__("well groomed look"),
				"index" => "skin_goals_well_groomed_look",
				));
				$this->addColumn("skin_goals_maintain_and_improve_my_current_skin", array(
				"header" => Mage::helper("beautyprofiler")->__("maintain and improve my current skin"),
				"index" => "skin_goals_maintain_and_improve_my_current_skin",
				));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('profile_id');
			$this->getMassactionBlock()->setFormFieldName('profile_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_beutyprofiler', array(
					 'label'=> Mage::helper('beautyprofiler')->__('Remove Beutyprofiler'),
					 'url'  => $this->getUrl('*/adminhtml_beutyprofiler/massRemove'),
					 'confirm' => Mage::helper('beautyprofiler')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray5()
		{
            $data_array=array(); 
			$data_array[0]='Oily';
			$data_array[1]='Very oily';
			$data_array[2]='Dry';
			$data_array[3]='Very dry';
			$data_array[4]='Normal';
			$data_array[5]='Normal to dry';
			$data_array[6]='Normal to oily';
            return($data_array);
		}
		static public function getValueArray5()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray5() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray6()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray6()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray6() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray7()
		{
            $data_array=array(); 
			$data_array[0]='My doctor has  confirmed it';
			$data_array[1]='It is my own assessment of my skin as i have more than once experienced breakout, rashes, redness on my skin when i use any beauty product on me.';
            return($data_array);
		}
		static public function getValueArray7()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray7() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray8()
		{
            $data_array=array(); 
			$data_array[0]='Severe ';
			$data_array[1]='Mild to severe';
			$data_array[2]='Mild';
            return($data_array);
		}
		static public function getValueArray8()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray8() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray9()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray9()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray9() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray10()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='no';
            return($data_array);
		}
		static public function getValueArray10()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray10() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray11()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray11()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray11() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray12()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray12()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray12() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray13()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray13()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray13() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray14()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray14()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray14() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray15()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray15()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray15() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray16()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray16()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray16() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray17()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray17()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray17() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray18()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray18()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray18() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray19()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray19()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray19() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray20()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray20()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray20() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray21()
		{
            $data_array=array(); 
			$data_array[0]='Significant';
			$data_array[1]='Mild';
            return($data_array);
		}
		static public function getValueArray21()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray21() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray22()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray22()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray22() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray23()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray23()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray23() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray24()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray24()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray24() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray25()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray25()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray25() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray26()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray26()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray26() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray27()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray27()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray27() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray28()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray28()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray28() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray29()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray29()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray29() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray30()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray30()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray30() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray31()
		{
            $data_array=array(); 
			$data_array[0]='Severe';
			$data_array[1]='Mild';
			$data_array[2]='Had acne in pas. Currently not experiencing any.';
            return($data_array);
		}
		static public function getValueArray31()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray31() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray32()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray32()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray32() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray33()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray33()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray33() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray34()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray34()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray34() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray35()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray35()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray35() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray36()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray36()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray36() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray37()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray37()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray37() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray38()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray38()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray38() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray39()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray39()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray39() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray40()
		{
            $data_array=array(); 
			$data_array[0]='Very Fair';
			$data_array[1]='Fair';
			$data_array[2]='Wheatish/olive';
			$data_array[3]='Dusky';
			$data_array[4]='Very dusky';
            return($data_array);
		}
		static public function getValueArray40()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray40() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray41()
		{
            $data_array=array(); 
			$data_array[0]='Oval';
			$data_array[1]='Square';
			$data_array[2]='Diamond';
			$data_array[3]='Round';
            return($data_array);
		}
		static public function getValueArray41()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray41() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray42()
		{
            $data_array=array(); 
			$data_array[0]='Thick';
			$data_array[1]='Thin';
			$data_array[2]='Medium';
            return($data_array);
		}
		static public function getValueArray42()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray42() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray43()
		{
            $data_array=array(); 
			$data_array[0]='Straight';
			$data_array[1]='Straight with waves';
			$data_array[2]='Frizzy';
			$data_array[3]='Curly';
			$data_array[4]='Very Curly';
            return($data_array);
		}
		static public function getValueArray43()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray43() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray44()
		{
            $data_array=array(); 
			$data_array[0]='Dry';
			$data_array[1]='Oily';
			$data_array[2]='Normal';
            return($data_array);
		}
		static public function getValueArray44()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray44() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray45()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray45()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray45() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray46()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray46()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray46() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray47()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray47()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray47() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray48()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray48()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray48() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray49()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray49()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray49() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray51()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray51()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray51() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray52()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray52()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray52() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray53()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray53()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray53() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray54()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray54()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray54() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray55()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray55()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray55() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray56()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray56()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray56() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray57()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray57()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray57() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray58()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray58()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray58() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray59()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray59()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray59() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray61()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray61()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray61() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray62()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray62()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray62() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray63()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray63()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray63() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray64()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray64()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray64() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray65()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray65()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray65() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray66()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray66()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray66() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray67()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray67()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray67() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray68()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray68()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray68() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray69()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray69()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray69() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray70()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray70()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray70() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray71()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray71()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray71() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray72()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray72()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray72() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray73()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray73()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray73() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray74()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray74()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray74() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray75()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray75()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray75() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray76()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray76()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray76() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray77()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray77()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray77() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray78()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray78()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray78() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray79()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray79()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray79() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray80()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray80()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray80() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray81()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray81()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray81() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray82()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray82()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray82() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray83()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray83()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray83() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray84()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray84()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray84() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray85()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray85()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray85() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray86()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray86()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray86() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray87()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray87()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray87() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray88()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray88()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray88() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray89()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray89()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray89() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}

		static public function getOptionArray90()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray90()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray90() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}

		static public function getOptionArray91()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray91()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray91() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}

		static public function getOptionArray92()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray92()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getValueArray92() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}

		
		static public function getOptionArray108()
		{
            $data_array=array(); 
			$data_array[0]='Yes';
			$data_array[1]='No';
            return($data_array);
		}
		static public function getValueArray108()
		{
            $data_array=array();
			foreach(Webclues_Beautyprofiler_Block_Adminhtml_Beutyprofiler_Grid::getOptionArray108() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}