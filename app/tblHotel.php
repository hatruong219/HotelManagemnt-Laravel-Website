<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblHotel extends Model
{
    protected $table ='tblhotel';
    protected $primaryKey = 'ID_Hotel';

	public function tblarea()
    {
        return $this->belongsTo('App\tblArea','ID_Area','ID_Area');
    }
    public function tblroom()
    {
        return $this->hasMany('App\tblRoom','ID_Hotel','ID_Room');
    }
  
}
