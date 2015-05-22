<?php
/**
 * Access Control List
 * session_start(); has to already have been called
 */

class Acl {
    
    public $perms = array();
    public $uid = 0;
    public $usergroups = array();
    
    public function __construct($uid = '') {
        if ($uid != '') {
            $this->uid = $uid;
        }
        else {
            $this->uid = Session::get('uid');
        }
        
        $this->usergroups = $this->getUsergroups('ids');
        $this->buildACL();
    }
    
    private function buildACL() {
        if (count($this->usergroups) > 0) {
            $this->usergroups = array_merge($this->perms, $this->getUsergroupPerms($this->usergroups));
        }
        
        $this->perms = array_merge($this->perms, $this->getUserPerms($this->uid));
    }
    
    private function getPermKeyFromID($pid) {
        $sql = "SELECT permKey FROM permissions WHERE id = :pid LIMIT 1";
        $query = DatabaseFactory::getFactory()->getConnection()->prepare($sql)->execute(array(':pid' => $pid));
        
        $row = $query->fetch(PDO::FETCH_ASSOC);
        
        return $row[0];
    }
    
    private function getPermNameFromID($pid) {
        $sql = "SELECT permName FROM permissions WHERE id = :pid LIMIT 1";
        $query = DatabaseFactory::getFactory()->getConnection()->prepare($sql)->execute(array(':pid' => $pid));
        
        $row = $query->fetch(PDO::FETCH_ASSOC);
        
        return $row[0];
    }
    
    private function getUsergroupNameFromID($gid) {
        $sql = "SELECT roleName FROM roles WHERE id = :gid";
        $query = DatabaseFactory::getFactory()->getConnection()->prepare($sql)->execute(array(':gid' => $gid));
        
        $row = $query->fetch(PDO::FETCH_ASSOC);
        
        return $row[0];
    }
    
    private function getUserRoles() {
        $sql = "SELECT * FROM user_roles WHERE ID = :uid";
        $query = DatabaseFactory::getFactory()->getConnection()->prepare($sql)->execute(array(':uid' => $this->uid));
        
        $resp = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $resp[] = $row['roleID'];
        }
        
        return $resp;
    }
    
    public function getAllRoles($format = 'ids') {
        $format = strtolower($format);
        $sql = "SELECT * FROM roles ORDER BY roleName ASC";
        $query = DatabaseFactory::getFactory()->getConnection()->prepare($sql)->execute();
        
        $resp = array();
        
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            if ($format == 'full') {
                $resp[] = array('id' => $row['id'], 'Name' => $row['roleName']);
            }
            else {
                $resp[] = $row['id'];
            }
        }
        
        return $resp;
    }
    
    public function getAllPerms($format = 'ids') {
        $format = strtolower($format);
        $sql = "SELECT * FROM permissions ORDER BY permName ASC";
        $query = DatabaseFactory::getFactory()->getConnection()->prepare($sql)->execute();
        
        $resp = array();
        
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            if ($format == 'full') {
                $resp[$row['permKey']] = array('id' => $row['id'], 'Name' => $row['permName'], 'Key' => $row['permKey']);
        }
        else {
            $resp[] = $row['id'];
        }
    }
    
        return $resp;
    }
    
    public function getRolePerms($role) {
        if (is_array($role)) {
            $sql = "";
        }
        else {
            $sql = "";
        }
    }
}