<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblBill extends Model
{
    protected $table ='tblbill';
    protected $primaryKey = 'ID_Bill';

	public function tbluser()
    {
        return $this->belongsTo('App\tblUser','ID_User','ID_User');
    }
    public function tblroom()
	{
		return $this->belongsTo('App\tblRoom','ID_Room','ID_Room');
	}
}
