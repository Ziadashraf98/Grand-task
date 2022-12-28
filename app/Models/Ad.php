<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $fillable = ['type','title','description','start_date','advertiser_id','category_id'];
    protected $hidden = ['created_at' , 'updated_at'];

    // public function advertiser()
    // {
    //     return $this->belongsTo(User::class , 'advertiser_id');
    // }
}
