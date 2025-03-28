<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class  Action extends Model{
    protected $fillable = ['date', 'emp_id', 'customer_id', 'type', 'outcome'];
    public $timestamps = false;
    public function customer()
{
    return $this->belongsTo(Customer::class, 'customer_id', 'customer_ID');}
public function employee()
{

    return $this->belongsTo( Employee::class,'emp_id', 'id');
}
}
