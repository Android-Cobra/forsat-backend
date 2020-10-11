<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityDetail extends Model
{
    use HasFactory;

    public function opportunity() {
        //as Opportunity_id is foreign key in the OpportunityDetail table
        return $this->belongsTo(Opportunity::class );
        //return $this->belongsTo(Opportunity::class, 'id');

    }
}
