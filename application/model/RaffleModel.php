<?php
/**
 * Raffle Model, handles all raffle related thingys.
 */
class RaffleModel 
{

    public static function getCurrentRaffles()
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        // could probably get away with not fetching the colour here actually??? TODO
        // Or even better, maybe check if the colour is already set? Like a mini cache.
        $sql = "SELECT id, playing, last_entry, description, date_created, draw_date, colour FROM raffles WHERE last_entry >= CURDATE()
                ORDER BY date_created DESC;";
        $query = $database->prepare($sql);
        $query->execute();
        
        $current_raffles = array();
        $current_date = strtotime(date('Y-m-d'));
        
        if ($query->rowCount() == 0)
        {
            return false;
        }
        else
        {
            foreach ($query->fetchAll() as $raffle)
            {
                @array_walk_recursive($raffle, 'self::XSSFilter');
            
                $current_raffles[$raffle->id] = new stdClass();
                $current_raffles[$raffle->id]->id = $raffle->id;
                $current_raffles[$raffle->id]->playing = $raffle->playing;
                $current_raffles[$raffle->id]->last_entry = $raffle->last_entry;
                $current_raffles[$raffle->id]->description = $raffle->description;
                $current_raffles[$raffle->id]->date_created = $raffle->date_created;
                $current_raffles[$raffle->id]->draw_date = $raffle->draw_date;
                
                $date_difference = strtotime($current_raffles[$raffle->id]->last_entry) - $current_date;
                $difference = floor($date_difference / (60 * 60 * 24));
                
                if ($difference == 0)
                {
                    $current_raffles[$raffle->id]->colour = 'red';
                }
                else if ($difference > 1) 
                {
                    $current_raffles[$raffle->id]->colour = 'green';
                }
                else if ($difference > 0) 
                {
                    $current_raffles[$raffle->id]->colour = 'orange';
                }
                else if ($difference < -1)
                {
                    // Raffle is over so, just set to red for the purpose of doing so
                    $current_raffles[$raffle->id]->colour = 'red';
                }
                else 
                {
                    // Raffle is over so, just set to red for the purpose of doing so
                    $current_raffles[$raffle->id]->colour = 'red';
                }
                
                // This = performance killer. TODO: need to improve, maybe with the new connections in every method.
                self::setColour($current_raffles[$raffle->id]->id, $current_raffles[$raffle->id]->colour);
            }
            
            return $current_raffles;
        }
    }
    
    // Setting the colour, from the looks of running this in the method above
    // it's gonna be a bitch for performance, but for now it'll have to do.
    protected static function setColour($raffle_id, $colour)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        
        $sql = "UPDATE raffles SET colour = :colour WHERE id = :raffle_id";
        $query = $database->prepare($sql);
        $query->execute(array(':colour' => $colour, ':raffle_id' => $raffle_id));
        
        if ($query->rowCount()) 
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
    
    public static function getRaffle($raffle_id)
    {
        
        $database = DatabaseFactory::getFactory()->getConnection();
        
        $sql = "SELECT id, playing, last_entry, description, date_created, draw_date, colour FROM raffles WHERE id = :raffle_id AND last_entry >= CURDATE() LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':raffle_id' => $raffle_id));
        
        $raffle = $query->fetch();
        
        if ($query->rowCount() == 1)
        {
            // We have a record, so let them enter it, well first we need to return the record :p
            // do nothing lol
        }
        else
        {
            // Doesn't exist.
            Session::add('feedback_negative', Text::get('FEEDBACK_RAFFLE_DOES_NOT_EXIST'));
        }
        
        // all elements of array passed to self::XSSFilter for XSS sanitation.
        @array_walk_recursive($raffle, 'self::XSSFilter');
        
        return $raffle;
    }
    
    public static function submitForm($amount)
    {
        if (!csrf_token_is_valid() OR !csrf_token_is_recent())
        {
            Session::add('feedback_negative', Text::get('FEEDBACK_INVALID_SECURITY_TOKEN'));
        }
        else
        {
            if (empty($amount))
            {
                Session::add('feedback_negative', Text::get('FEEDBACK_RAFFLE_AMOUNT_EMPTY'));
                return false;
            }
            
            if (!is_int($amount))
            {
                Session::add('feedback_negative', Text::get('FEEDBACK_RAFFLE_AMOUNT_NOT_INT'));
                return false;
            }
            
            Session::add('feedback_positive', Text::get('FEEDBACK_REDIRECTING_TO_PAYPAL'));
            return true;
        }
    }
    
    /**
     * Passes value through htmlspecialchars, for XSS prevention.
     */
    public static function XSSFilter(&$value) {
        if (is_string($value)) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
    }
} 