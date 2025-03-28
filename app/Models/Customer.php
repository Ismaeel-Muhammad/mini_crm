<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class  Customer extends Model{
    protected $primaryKey = 'customer_ID';

    protected $fillable = ['name', 'phone', 'emp_id', 'tag_id'];
    public $timestamps = false;
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }
public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }

}
