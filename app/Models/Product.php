<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table name (optional, Laravel defaults to plural form of model name)
    protected $table = 'products';

    // Define the primary key (optional, Laravel defaults to 'id')
    protected $primaryKey = 'id';

    // If your primary key is not an incrementing integer, uncomment the line below
    // public $incrementing = false;

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'name',
        'description',
        'barcode',
        'expiry_date',
        'manufacturer',
        'company_id',
        'category_id',
        'sell_price',
        'purchase_price',
        'supplier_id',
        'quantity',
        'status',
        'packet_sell_price',        // سعر بيع الباكيت
        'packet_purchase_price',     // سعر شراء الباكيت
        'strip_sell_price',          // سعر بيع الشريط
        'strip_purchase_price',      // سعر شراء الشريط
        'strip_quantity',            // كمية الشريط
        'packet_quantity',           // كمية الباكيت
        'second_unit_name',          // اسم الوحدة الثانية
        'packaging',                 // التعبئة
    ];

    // Define relationships (if necessary)
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
