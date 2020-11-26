<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblRoom extends Model
{
    protected $table ='tblroom';
    protected $primaryKey = 'ID_Room';

	public function tblbill()
    {
        return $this->belongsTo('App\tblBill','ID_Room','ID_Bill');
    }
    public function tblhotel()
    {
        return $this->belongsTo('App\tblHotel','ID_Hotel','ID_Hotel');
    }
    public function tbllike()
    {
        return $this->hasMany('App\tblLike','ID_Room','ID_Like');
    }
    public function tblcomment()
    {
        return $this->hasMany('App\tblComment','ID_Room','ID_Comment');
    }
}
