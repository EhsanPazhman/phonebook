<?php
namespace App\Controllers;

use App\Models\contactModel;
use App\Models\ContractModel;
class ContactController{
    private $contactModel;
    public function __construct()
    {
        $this->contactModel = new contactModel();
    }
    public function add()
    {
        global $request;
        var_dump($request);
    }
}
