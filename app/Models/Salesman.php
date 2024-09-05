<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    use HasFactory;

    protected $table = 'salesmans';
    
    public $timestamps = false;
    
    protected $primaryKey = 'salesman_id';
    protected $fillable = [
        'salesman_name',
        'salesman_city',
        'commission'
    ];
}
