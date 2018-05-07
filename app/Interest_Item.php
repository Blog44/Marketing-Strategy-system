<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest_Item extends Model
{
    protected $table= "interest_items";
    protected $guarded= ["id"];

    public function ad()
    {
        return $this->belongsTo('App\Ad');
    }
}
