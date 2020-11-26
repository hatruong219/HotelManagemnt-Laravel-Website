<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblUser extends Model
{
    protected $table ='tbluser';
    protected $primaryKey = 'ID_User';

	public function tblroom()
    {
        return $this->hasMany('App\tblRoom','ID_User','ID_Room');
    }
    public function tbllike()
    {
        return $this->hasMany('App\tblLike','ID_User','ID_Like');
    }
    public function tblcomment()
    {
        return $this->hasMany('App\tblComment','ID_User','ID_Comment');
    }
}
