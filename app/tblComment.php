<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblComment extends Model
{
    protected $table ='tblcomment';
    protected $primaryKey = 'ID_Comment';

	public function tbluser()
    {
        return $this->belongsTo('App\tblUser','ID_User','ID_User');
    }
    public function tblroom()
	{
		return $this->belongsTo('App\tblRoom','ID_Room','ID_Room');
	}
}
