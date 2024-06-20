<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['uuid', 'name', 'email', 'phone', 'transaction_total', 'transaction_status'];
    protected $hidden = [];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
