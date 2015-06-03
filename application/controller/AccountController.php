<?php
/**
 * Account Controller
 */

 class AccountController extends controller {
    
    public function __construct() {
        parent::__construct();
        
        Auth::checkAuthentication();
    }
    
    public function index() {
        $this->View->render('account/index', array(
            'user_name' => Session::get('user_name'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type'),
			'page' => 'account',
            'account_data' => AccountModel::get_user_profile(),
			'title_array' => array('Ms' => 'Ms', 'Miss' => 'Miss', 'Mrs' => 'Mrs', 'Mr' => 'Mr', 'Master' => 'Master'),
			'user_settings' => AccountModel::get_user_settings(),
        ));
    }
	
	public function deleteAvatar_action() {
	    Auth::checkAuthentication();
        AvatarModel::deleteAvatar(Session::get('user_id'));
        Redirect::to('account');;
	}
	
	public function editProfile_action() {
		 Auth::checkAuthentication();
		 
		 
	}
 }
 