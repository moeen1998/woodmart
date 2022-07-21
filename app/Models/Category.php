<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get all of the products for the category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function producs()
    {
        // return $this->hasMany(Comments::class, 'foreign_key', 'local_key');
        return $this->hasMany(product::class);
    }


    
}
