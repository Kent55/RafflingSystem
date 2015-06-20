<?php
/**
 * Admin Controller
 */

 class AdminController extends Controller {
    private $acl_handle;
    public function __construct() {
        parent::__construct();
        
        Auth::checkAuthentication();
        
        // Check if user has adminCP permission
        $this->acl_handle = new Acl_handle();
        /*
        foreach ($this->acl_handle->get_users_in_role(1) AS $user) {
            echo $user->user_name . '<br />';
        }
        exit;
        */
        
        if (!PermissionsModel::get()->hasPermission('can_admincp')) {
            $this->View->render('error/no_permission', array(
            'user_name' => Session::get('user_name'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type'),
            ));
            exit;
        }
    }
    
    public function index() {
        $this->View->render('admin/index', array(
            'user_name' => Session::get('user_name'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type'),
            'roles' => $this->acl_handle->get_all_roles('full'),
            ));
    }
    
    public function usergroups($id = null) {
        if (!PermissionsModel::get()->hasPermission('can_manage_usergroups')) {
            $this->View->render('error/no_permission', array(
            'user_name' => Session::get('user_name'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type'),
            ));
            exit;
        }
        else {
            if (isset($id)) {
                if (Request::get('do')) {
                if (Request::get('do') == 'delete') {
                    // delete usergroup
                }
                else if (Request::get('do') == 'edit') {
                  if (!PermissionsModel::get()->doesRoleExist($id)) {
                     Redirect::to('admin/usergroups');
                  }
                  
                    $this->View->render('admin/usergroups/edit', array(
                    'user_name' => Session::get('user_name'),
                    'user_email' => Session::get('user_email'),
                    'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
                    'user_avatar_file' => Session::get('user_avatar_file'),
                    'user_account_type' => Session::get('user_account_type'),
                    'role_name' => PermissionsModel::get()->getRoleNameFromId($id),
                    'role_desc' => PermissionsModel::get()->getRoleDescFromId($id),
                    'members' => PermissionsModel::get()->getUsersInRole($id),
                    'rPerms' => PermissionsModel::get()->getRolePerms($id),
                    'aPerms' => PermissionsModel::get()->getAllPerms('full'),
                    ));
                }
                else {
                    Redirect::to('admin/usergroups/' . $id . '?do=edit');
                }
            }
                
            }
            else {
                // no id set, list all usergroups like on index method
                $this->View->render('admin/usergroups/index', array(
                'user_name' => Session::get('user_name'),
                'user_email' => Session::get('user_email'),
                'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
                'user_avatar_file' => Session::get('user_avatar_file'),
                'user_account_type' => Session::get('user_account_type'),
                'roles' => $this->acl_handle->get_all_roles('full'),
                ));
            }
        }
    }
    
    public function editGroup_Submit() {
      Auth::checkAuthentication();
      AdminModel::editUsergroup(Request::post(''));
      Redirect::to(Config::get('URL') . 'admin/usergroups');
    }
 }
 