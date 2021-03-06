<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeatherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'country_id' => 'required|int',
            'state_id' => 'nullable|int',
            'city_id' => 'nullable|int',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ];
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'country_id' => $this->country_id,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id
        ];
    }
}
