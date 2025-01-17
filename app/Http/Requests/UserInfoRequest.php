<?php

namespace App\Http\Requests;

use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' =>'nullable|string',
            'gender' => 'required|sometimes|string|in:male,female',
            'target' => 'required|sometimes|string|in:lose_weight,build_muscle,keep_fit',
            'level' => 'nullable|string|in:beginner,intermediate,advanced',
            'weight' => 'required|sometimes|numeric|min:45|max:220',
            'tall' => 'required|sometimes|numeric|min:140|max:220',
            'preferred_time' => 'required|sometimes',
            'focus_area' => 'required|sometimes|in:arm,leg,all,abs,chest|string',
            'training_days' => 'required|sometimes|array',
            'diseases' => 'required|sometimes|in:heart,none,knee,breath,diabetes,blood_pressure',
            'activity' => 'required|sometimes|in:Sedentary,none,Lightly_Active,Very_Active',
            'image' => 'nullable|image|mimes:png,jpeg,webp|',
            'bio'=>'nullable|string|max:49',
        ];
    }

    protected function failedValidation(Validator $validator){
        return throw new ValidationException($validator,$this->response($validator));
    }
    protected function response($validator){
        return response()->json([
            'status' => false,
            'message' => 'validation failed',
            'errors' => $validator->errors()
        ], 422);
    }
}
