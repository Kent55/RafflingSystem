<?php
/**
 * Permissions Model
 */

 class PermissionsModel {
    
    private static $access;
    private $acl;
    
    public function __construct() {
        $this->acl = new Acl_handle();
    }
    
    public static function get() {
        if (!self::$access) {
            self::$access = new PermissionsModel();
        }
        return self::$access;
    }
    
    public function hasPermission($perm_key) {
        return $this->acl->has_permission($perm_key);
    }
    
    public function userHasRole($role_id) {
        return $this->acl->user_has_role($role_id);
    }
    
    public function getUserPerms($user_id) {
        return $this->acl->get_user_perms($user_id);
    }
    
    public function doesRoleExist($role_id) {
        return $this->acl->does_role_exist($role_id);
    }
    
    public function getRoleNameFromId($role_id) {
        return $this->acl->get_role_name_from_id($role_id);
    }
    
    public function getRoleDescFromId($role_id) {
        return $this->acl->get_role_desc_from_id($role_id);
    }
    
    public function getUsersInRole($role_id) {
        return $this->acl->get_users_in_role($role_id);
    }
    
    public function getRolePerms($role_id) {
      return $this->acl->get_role_perms($role_id);
    }
    
    public function getAllPerms($format = 'ids') {
      return $this->acl->get_all_perms($format);
    }

    public function getUserRoles() {
        return $this->acl->get_user_roles();
    }
 }
 