<?php
namespace App\Controllers;

use App\Models\contactModel;
use App\Models\ContractModel;
use App\Utilities\Validation;

class ContactController{
    private $contactModel;
    public function __construct()
    {
        $this->contactModel = new contactModel();
    }
    public function add()
    {
        global $request;
        $data['alreadyExists'] = false;
        $count = $this->contactModel->count(['mobile' => $request->input('mobile')]);
        if ($count) {
            $data['alreadyExists'] = true;
            view_die('contact.add-result',$data);
        }
        if (!Validation::is_valid_email($request->input('email'))) {
            $data = ['success' => false, 'message' => 'Invalid Email Adress'];
            view_die('contact.add-result',$data);
        }
            $contactId = $this->contactModel->create([
                'name' => $request->input('name'),
                'mobile' => $request->input('mobile'),
                'email' => $request->input('email')
            ]);
            $data['contactId'] = $contactId;
            $data['success'] = true;
            $data['message'] = "Contact with id $contactId Created Successfully";
            view_die('contact.add-result',$data);
        // var_dump($data);
    }
    public function delete()
    {
        global $request;
        $id = $request->get_route_param('id');
        $data['deleted_count'] = $this->contactModel->delete(['id' => $id]);
        view('contact.delete-result',$data);
    }
}
