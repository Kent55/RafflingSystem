<?php
/**
 * This controller is for all raffle related functions
 */
class RaffleController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        
        Auth::checkAuthentication(); // Every method requires logged in state, therefore put it in the constructor.
    }
    
    // Could probably make this a ternary operator, but leave it for now.
    public function index($filter = null)
    {
        if (!RaffleModel::getCurrentRaffles()) 
        {
            $this->View->render('raffle/index', array(
                'message' => 'Sorry, we couldn\'t find any available raffles. Please try again later.', // change into session error???TODO
                'user_name' => Session::get('user_name'),
                'user_email' => Session::get('user_email'),
                'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
                'user_avatar_file' => Session::get('user_avatar_file'),
                'user_account_type' => Session::get('user_account_type')
            ));
        }
        else 
        {
            $this->View->render('raffle/index', array(
                'raffles' => RaffleModel::getCurrentRaffles(),
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
    }
    
    public function enterRaffle($raffle_id) 
    {
        if (isset($raffle_id))
        {
            $this->View->render('raffle/enterRaffle', array(
                'raffle' => RaffleModel::getRaffle($raffle_id),
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
            Redirect::to('raffle');
        }
    }
    
    public static function submitForm_action()
    {
        RaffleModel::submitForm(Request::post('amount'), true);
        // TODO: fix the bloody form...
    }
}