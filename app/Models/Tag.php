<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['tag_name' , 'ad_id'];
    protected $hidden = ['created_at' , 'updated_at'];

    public function ad()
    {
        return $this->belongsTo(Ad::class , 'ad_id');
    }
}
