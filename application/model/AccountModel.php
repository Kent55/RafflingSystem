<?php
/**
 * Account model
 */

 class AccountModel {
    
    public static function get_user_profile() {
        return UserModel::getPublicProfileOfUser(Session::get('user_id'));
    }
    
    public static function get_user_settings() {
      $all_settings = UserModel::get_settings_of_user(Session::get('user_id'));
      
    }
 }