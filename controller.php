<?php

namespace Concrete\Package\RemsCourse;
use BlockType, Package, Loader;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package {

    protected $pkgHandle = 'rems_course';
    protected $appVersionRequired = '5.7.0';
    protected $pkgVersion = '2.0';

    public function getPackageName() {
        return t("REMS Course Information");
    }
    public function getPackageDescription() {
        return t("Show course information from REMS DB Prospectus Export");
    }

    public function install() {
        $pkg = parent::install();
        BlockType::installBlockTypeFromPackage('rems_course', $pkg); 
    }
    public function uninstall(){
        parent::uninstall();
        $db = Loader::db();
        $db->Execute('DROP TABLE IF EXISTS btREMSCourse');
    }
}