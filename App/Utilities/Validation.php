<?php
namespace App\Utilities;
class Validation{
    public static function is_valid_email(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            return false;
        return true; 
    }
}