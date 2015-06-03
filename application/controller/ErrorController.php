<?php

/**
 * Class Error
 * This controller simply shows a page that will be displayed when a controller/method is not found. Simple 404.
 */
class ErrorController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This method controls what happens / what the user sees when a page does not exist (404)
     */
    public function index()
    {
        header('HTTP/1.0 404 Not Found');
        $this->View->render('error/index', array(
            'user_name' => Session::get('user_name'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type')
        ));
    }
    
    public function no_permission() {
        Auth::checkAuthentication();
        $this->View->render('error/no_permission', array(
            'user_name' => Session::get('user_name'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type')
        ));
    }
}
