<?php

class Webclues_Beautyprofiler_Adminhtml_BeutyprofilerController extends Mage_Adminhtml_Controller_Action
{
		protected function _isAllowed()
		{
		//return Mage::getSingleton('admin/session')->isAllowed('beautyprofiler/beutyprofiler');
			return true;
		}

		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("beautyprofiler/beutyprofiler")->_addBreadcrumb(Mage::helper("adminhtml")->__("Beutyprofiler  Manager"),Mage::helper("adminhtml")->__("Beutyprofiler Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Beautyprofiler"));
			    $this->_title($this->__("Manager Beutyprofiler"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("Beautyprofiler"));
				$this->_title($this->__("Beutyprofiler"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("beautyprofiler/beutyprofiler")->load($id);
				if ($model->getId()) {
					Mage::register("beutyprofiler_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("beautyprofiler/beutyprofiler");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Beutyprofiler Manager"), Mage::helper("adminhtml")->__("Beutyprofiler Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Beutyprofiler Description"), Mage::helper("adminhtml")->__("Beutyprofiler Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("beautyprofiler/adminhtml_beutyprofiler_edit"))->_addLeft($this->getLayout()->createBlock("beautyprofiler/adminhtml_beutyprofiler_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("beautyprofiler")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("Beautyprofiler"));
		$this->_title($this->__("Beutyprofiler"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("beautyprofiler/beutyprofiler")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("beutyprofiler_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("beautyprofiler/beutyprofiler");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Beutyprofiler Manager"), Mage::helper("adminhtml")->__("Beutyprofiler Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Beutyprofiler Description"), Mage::helper("adminhtml")->__("Beutyprofiler Description"));


		$this->_addContent($this->getLayout()->createBlock("beautyprofiler/adminhtml_beutyprofiler_edit"))->_addLeft($this->getLayout()->createBlock("beautyprofiler/adminhtml_beutyprofiler_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{
		$post_data=$this->getRequest()->getPost();
				if ($post_data) {
					try {
						$model = Mage::getModel("beautyprofiler/beutyprofiler")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Beutyprofiler was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setBeutyprofilerData(false);
						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setBeutyprofilerData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("beautyprofiler/beutyprofiler");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('profile_ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("beautyprofiler/beutyprofiler");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'beutyprofiler.csv';
			$grid       = $this->getLayout()->createBlock('beautyprofiler/adminhtml_beutyprofiler_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'beutyprofiler.xml';
			$grid       = $this->getLayout()->createBlock('beautyprofiler/adminhtml_beutyprofiler_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
