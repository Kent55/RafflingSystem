<?php
/**
 * Administration Area model
 */

 class AdminModel {
    
    public static function get_statistic($what) {
        $what = strtolower($what);
        switch ($what) {
            case 'php_version':
                return php_version();
            break;
        
            case 'member_count':
                //TODO
        }
    }
    
    public static function get_faq_items() {
         $database = DatabaseFactory::getFactory()->getConnection();
    }
    
    public static function delete_usergroup($id) {
      //TODO
    }
 }
 