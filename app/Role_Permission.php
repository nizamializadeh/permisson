<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_Permission extends Model
{
    protected $fillable = ['table_name','role_id',"permission_id"];

}
