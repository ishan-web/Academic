<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class permissioncategory extends Model
{
    use HasFactory;

    

    public function permission()
    {
        return $this->hasmany('Spatie\Permission\Models\Permission','permissioncategory_id');
    }
}
