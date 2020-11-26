<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblArea extends Model
{
    protected $table ='tblarea';
    protected $primaryKey = 'ID_Area';

	public function tblhotel()
    {
        return $this->hasMany('App\tblHotel','ID_Area','ID_Hotel');
    }
}
