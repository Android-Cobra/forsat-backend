<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'opportunity_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function opportunity(){
        return $this->belongsTo(Opportunity::class);
    }
}
