<?php
namespace App\Controllers;

use App\Models\Contact;
use App\Models\contactModel;

class HomeController{
    private $contactModel;
    public function __construct()
    {
     $this->contactModel = new contactModel();
    }
    public function index(){
        global $request;
        $where = ['ORDER' => ['created_at' => 'DESC']];
        $searchKeyword = $request->input('s');
        if (!is_null($request->input('s'))) {
            $where['OR'] = [
                  'name[~]' => $searchKeyword,
                  'mobile[~]' => $searchKeyword,
                  'email[~]' => $searchKeyword
            ];
        }
        $contacts = $this->contactModel->get('*',$where);
        $data = [
            'contacts' => $contacts,
            'pageCount' => $this->pageCount(),
            'searchKeyword' => $searchKeyword
        ];
        view('home.index',$data);
    }
    public function pageCount()
    {
       $rowCount = $this->contactModel->count([]); 
       $pageCount = $rowCount/$this->contactModel->pageSize; 
        return (int) ceil($pageCount) ;
    }
}