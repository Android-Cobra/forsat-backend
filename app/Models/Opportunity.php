<?php

namespace App\Models;

use App\Models\Lookups\Category;
use App\Models\Lookups\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    protected $casts = [
      'dead_line' => 'datetime'
    ];

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'country_id',
        'dead_line',
        'organizer',
        'created_by'];

    public function detail() {
        //as Opportunity_id is foreign key in the OpportunityDetail table
        return $this ->hasOne(OpportunityDetail::class );
    }

    public function category() {
        return $this->belongsTo(Category::class);//Category is a model
    }

    public function country() {
        return $this->belongsTo(Country::class);//Country is a model
    }

    public function user() {
        return $this->belongsTo(User::class, 'created_by');//User is a model and created_by is foreign key.
    }
}
