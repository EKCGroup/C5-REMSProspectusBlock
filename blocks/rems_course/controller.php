<?php  

namespace Concrete\Package\RemsCourse\Block\RemsCourse;
use \Concrete\Core\Block\BlockController, BlockType, Loader;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends BlockController {
		
    protected $btTable = 'btREMSCourse';
    protected $btInterfaceWidth = "400";
    protected $btInterfaceHeight = "300";
    protected $btWrapperClass = 'ccm-ui';
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
		
    public function getBlockTypeName() {
        return t("REMS");
    }
    public function getBlockTypeDescription() {
        return t("Show course information from REMS DB Prospectus Export");
    }
    public function registerAssets(){
   	$this->requireAsset('javascript', 'jquery');
    }
}