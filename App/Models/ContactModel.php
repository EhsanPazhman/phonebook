<?php
namespace App\Models;

use App\Models\Contracts\MysqlBaseModel;

class contactModel extends MysqlBaseModel{
    protected $table = 'contacts';
    public $pageSize = 10;
}