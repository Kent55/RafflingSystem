<?php
/**
 * This controller is for all raffle related functions
 */
class RaffleController extends Controller
{
    public function __construct()
    {
        parent::_construct();
        
        Auth::checkAuthentication(); // Every method requires logged in state, therefore put it in the constructor.
    }
    
    public function index()
    {
        $this->View->render('raffle/index', array(
            'user_name' => Session::get('user_name'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type')
        ));
    }
    
    public function enterRaffle() 
    {
        $this->View->render('raffle/enterraffle', array(
            'user_name' => Session::get('user_name'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type')
        ));
    }
}