<?php
/**
 * Public view controller
 */
class PublicController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // don't require authentication.
    }
    
    // Take a language as an argument, defaulting to en_gb.
    public function index($locale)
    {
        if (isset($locale))
        {
            $this->View->render('public', array(
                'lang' => PublicModal::getLang($locale),
                'user_name' => Session::get('user_name'),
                'user_title' => Session::get('user_title'),
                'user_first_name' => Session::get('user_first_name'),
                'user_last_name' => Session::get('user_last_name'),
                'user_email' => Session::get('user_email'),
                'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
                'user_avatar_file' => Session::get('user_avatar_file'),
                'user_account_type' => Session::get('user_account_type')
            ));
        }
        else
        {
            $lang = Config::get('default_locale');
        }
    }
} 