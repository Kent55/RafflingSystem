<?php
/**
 * Archive Raffle Listing.
 */
class ArchiveRaffleList {
    
    public function __construct() {
        $this->check_old_raffles();
    }
    
    private function check_old_raffles() {
        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "SELECT * FROM raffles WHERE draw_date > CURDATE()";
        
        $query = $database->prepare($sql);
        $query->execute();
        
        if ($query->rowCount() > 0) {
            // We have records to archive
            $insert = "INSERT INTO archived_raffles (playing, last_entry, description, date_created, draw_date, colour)
                VALUES (:playing, :last_entry, :description, :date_created, :draw_date, :colour)";
            $delete = "DELETE * FROM raffles WHERE draw_date > CURDATE()";
            
            if ($insert->execute()) {
                $delete->execute();
            }
            else {
                // log task error.
            }
        }
        else {
            return false;
        }
    }
} 