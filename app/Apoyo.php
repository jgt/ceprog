<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apoyo extends Model
{
    

     protected $fillable = [ 'usuario', 'mensaje', 'filename', 'mime', 'original_filename', 'actividad_id', 'user_id'];


	public function actividad()
	{
		return $this->belongsTo('App\Actividad');
	}

	public function user()
	{

		return $this->belongsTo('App\User');
	}

	public function scopeName($query, $name)
   	 {
        if (trim($name) != "") {
            
              $query->where('original_filename', "LIKE", "%$name%");
        }
      
    }

     public function hasMaterial($id, $user)
	{

	return 	Apoyo::where('actividad_id', $id)
    		->where('user_id', $user)
            ->count();
	}
}
