<?php

namespace App\Http\Resources;

use App\Http\Resources\Lookups\Category;
use App\Http\Resources\Lookups\Country;
use Illuminate\Http\Resources\Json\JsonResource;

class Opportunity extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this ->title,
            'organizer' => $this ->organizer,

            //'category' => $this ->category_id,
            // new Category() is a resource
            'category' => new Category($this->category),// $this->category is method in opportunity model
            // new Country() is a resource
            'country' => new Country($this->country),// $this->country is method in opportunity model
            // new User() is a resource
            'user' => new User($this->user),

            'deadLine' => $this->dead_line->toDayDateTimeString(),// we have casted the dead_line string to datetime in in opportunity model because the toDayDateTimeString() can only call date/time object
            'createdAt' => $this ->created_at->toDateTimeString(), // String formatting at https://carbon.nesbot.com/docs/
            'updateAt' => $this ->updated_at->toDateTimeString(),// String formatting at https://carbon.nesbot.com/docs/
        ];
    }
}
