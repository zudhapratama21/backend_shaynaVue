<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $table ='transactions';

    protected $fillable=[
        'uuid',
        'name',
        'email','number',
        'address',
        'trancation_total',
        'trancation_status'
    ];
    protected $hidden =[
        
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class,'transaction_id');
    }


}
