<?php
class Webclues_Beautyprofiler_Model_Mysql4_Beutyprofiler extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("beautyprofiler/beutyprofiler", "profile_id");
    }
}