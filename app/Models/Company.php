<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{  
use HasFactory;

protected $fillable = [
    'name',
    'email',
    'phone',
    'address',
    'description',
    
]; 

public function suppliers()
{
    return $this->hasMany(Supplier::class);
}

public function products()
{
    return $this->hasMany(Product::class);
}

}
