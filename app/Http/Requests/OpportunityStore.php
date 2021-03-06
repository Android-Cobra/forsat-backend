<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OpportunityStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;// User should be an authorized to use this request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        /*
        $table->string('title');
        $table->text('description');
        $table->unsignedTinyInteger('category_id');//in category table defined as $table->tinyIncrements('id');
        $table->unsignedSmallInteger('country_id');//in country table defined as  $table->smallIncrements('id');
        $table->timestamp('dead_line');
        $table->string('organizer');
        $table->unsignedBigInteger('created_by');// in user table defined as  $table->id();
        */

        return [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'categoryId' => 'required|numeric',
            'countryId' => 'required|numeric',
            'deadLine' => 'required|date',
            'organizer' => 'required|string|max:255',
            'createdBy' => 'required|numeric',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        //parent::failedValidation($validator); // TODO: Change the autogenerated stub
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }
}
