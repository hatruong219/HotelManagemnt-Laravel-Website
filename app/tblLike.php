<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblLike extends Model
{
    protected $table ='tblhotel';
    protected $primaryKey = 'ID_Hotel';

	public function tblUser()
    {
        return $this->belongsTo('App\tblUser','ID_User','ID_User');
    }
    public function tblroom()
    {
        return $this->belongsTo('App\tblRoom','ID_Room','ID_Room');
    }
}
