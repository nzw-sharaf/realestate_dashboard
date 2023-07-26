<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                {
                    return [
                        'name' =>[ 'required',Rule::unique('categories')->whereNull('deleted_at'), 'min:3','max:225'],
                        'status' => ['required', Rule::in(array_keys(config('constants.statuses')))]
                    ];
                }
            case 'PATCH':
            case 'PUT':
                {
                    return [
                        'name' => ['required',Rule::unique('categories')->ignore($this->category)->whereNull('deleted_at'), 'min:3','max:225'],
                        'status' => ['required', Rule::in(array_keys(config('constants.statuses')))]
                    ];
                }
            default: break;
        }
    }
}
