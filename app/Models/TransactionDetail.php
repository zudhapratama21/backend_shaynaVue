<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TransactionDetail extends Model
{
    use SoftDeletes;
    protected $table ='transaction_detail';

    protected $fillable=[
        'products_id',
        'transaction_id',
    ];
    protected $hidden =[
        
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'transactions_id','id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'products_id','id');
    }

}
