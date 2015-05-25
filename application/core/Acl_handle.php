<?php
/**
 * Access Control List Handle
 * This is for user permissions, roles etc.
 */

 class Acl_Handle {
    
    private $perms = array();
    private $current_user_id = 0; // ID of current user
    private $user_roles = array();
    
    public function __construct($user_id = '') {
        if ($user_id != '') {
            $this->current_user_id = intval($user_id);
        }
        else {
            $this->current_user_id = Session::get('user_id');
        }
        
        $this->user_roles = $this->get_user_roles('ids');
        $this->buildACL();
    }
    
    private function buildACL() {
        if (count($this->user_roles) > 0) {
            $this->perms = array_merge($this->perms, $this->get_role_perms($this->user_roles));
        }
        $this->perms = array_merge($this->perms, $this->get_user_perms($this->current_user_id));
    }
    
    private function get_perm_key_from_id($perm_id) {
        $sql = "SELECT perm_key FROM permissions WHERE id = :perm_id LIMIT 1";
        $database = DatabaseFactory::getFactory()->getConnection();
        $data = $database->prepare($sql);
        $data->bindValue(':perm_id', intval($perm_id), PDO::PARAM_INT);
        $data->execute();
        $row = $data->fetch();
        return current((array)$row);
    }
    
    private function get_perm_name_from_id($perm_id) {
        $sql = "SELECT perm_name FROM permissions WHERE id = :perm_id LIMIT 1";
        $database = DatabaseFactory::getFactory()->getConnection();
        $data = $database->prepare($sql);
        $data->bindValue(':perm_id', intval($perm_id), PDO::PARAM_INT);
        $data->execute();
        $row = $data->fetch();
        return current((array)$row);
    }
    
    private function get_role_name_from_id($role_id) {
        $sql = "SELECT role_name FROM roles WHERE id = :role_id LIMIT 1";
        $database = DatabaseFactory::getFactory()->getConnection();
        $data = $database->prepare($sql);
        $data->bindValue(':role_id', intval($role_id), PDO::PARAM_INT);
        $data->execute();
        $row = $data->fetch();
        return current((array)$row);
    }
    
    private function get_user_roles() {
        $sql = "SELECT * FROM user_roles WHERE user_id = :user_id ORDER BY add_date ASC";
        $database = DatabaseFactory::getFactory()->getConnection();
        $data = $database->prepare($sql);
        $data->bindValue(':user_id', $this->current_user_id, PDO::PARAM_INT);
        $data->execute();
        $resp = array();
        while ($row = $data->fetch()) {
            $resp[] = $row->role_id;
        }
        return $resp;
    }
    
    private function get_all_roles($format = 'ids') {
        $format = strtolower($format);
        $sql = "SELECT * FROM roles ORDER BY role_name ASC";
        $database = DatabaseFactory::getFactory()->getConnection();
        $data = $database->prepare($sql)->execute();
        $resp = array();
        while ($row = $data->fetch()) {
            if ($format == 'full') {
                $resp[] = array('id' => $row['id'], 'name' => $row['role_name']);
            }
            else {
                $resp[] = $row['id'];
            }
        }
        return $resp;
    }
    
    private function get_all_perms($format = 'ids') {
        $sql = "SELECT * FROM permissions ORDER BY perm_name ASC";
        $database = DatabaseFactory::getFactory()->getConnection();
        $data = $database->prepare($sql)->execute();
        $resp = array();
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            if ($format == 'full') {
                $resp[$row['perm_key']] = array('id' => $row['id'], 'name' => $row['perm_name'], 'key' => $row['perm_key']);
            }
            else {
                $resp[] = $row['id'];
            }
        }
        return $resp;
    }
    
    private function get_role_perms($role) {
        if (is_array($role)) {
            $sql = "SELECT * FROM role_perms WHERE role_id IN (" . implode(',', array_fill(0, count($role), '?')) . ")
                    ORDER BY id ASC";
        }
        else {
            $sql2 = "SELECT * FROM role_perms WHERE role_id = :role ORDER BY id ASC";
        }
        
        $database = DatabaseFactory::getFactory()->getConnection();
        if ($sql) {
            $data = $database->prepare($sql);
            foreach ($role AS $k => $r) {
                $data->bindValue(($k + 1), $r);
            }
            $data->execute();
        }
        else {
            $data = $database->prepare($sql2);
            $data->bindValue(':role_id', intval($role_id), PDO::PARAM_INT);
            $data->execute();
        }
        
        $perms = array();
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            $perm_key = strtolower($this->get_perm_key_from_id($row['perm_id']));
            if ($perm_key == '') {
                continue;
            }
            if ($row['value'] === '1') {
                $has_permission = true;
            }
            else {
                $has_permission = false;
            }
            $perms[$perm_key] = array('perm'       => $perm_key,
                                      'inheritted' => true,
                                      'value'      => $has_permission,
                                      'name'       => $this->get_perm_name_from_id($row['perm_id']),
                                      'id'         => $row['perm_id']);
        }
        return $perms;
    }
    
    private function get_user_perms($user_id) {
        $sql = "SELECT * FROM user_perms WHERE user_id = :user_id ORDER BY add_date ASC";
        $database = DatabaseFactory::getFactory()->getConnection();
        $data = $database->prepare($sql);
        $data->bindValue(':user_id', intval($user_id), PDO::PARAM_INT);
        $data->execute();
        $perms = array();
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            $perm_key = strtolower($this->get_perm_key_from_id($row['perm_id']));
            if ($perm_key == '') {
                continue;
            }
            if ($row['value'] == '1') {
                $has_permission = true;
            }
            else {
                $has_permission = false;
            }
            $perms[$perm_key] = array('perm'       => $perm_key,
                                      'inheritted' => true,
                                      'value'      => $has_permission,
                                      'name'       => $this->get_perm_name_from_id($row['perm_id']),
                                      'id'         => $row['perm_id']);
        }
        return $perms;
    }
    
    public function user_has_role($role_id) {
        foreach ($this->user_roles AS $key => $value) {
            if (intval($value) === intval($role_id)) {
                return true;
            }
        }
        return false;
    }
    
    public function has_permission($perm_key) {
        $perm_key = strtolower($perm_key);
        if (array_key_exists($perm_key, $this->perms)) {
            if ($this->perms[$perm_key]['value'] === '1' OR $this->perms[$perm_key]['value'] === true) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
 }
 