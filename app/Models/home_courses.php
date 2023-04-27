<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home_courses extends Model
{
    use HasFactory;

    public function getShortDescriptionAttribute(){
    	return substr(strip_tags($this->attributes["desc"]),0,50).'...';
    }
}
