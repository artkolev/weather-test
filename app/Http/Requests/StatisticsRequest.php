<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatisticsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'provider'     => ['nullable', 'string'],
            'temperature'  => ['nullable', 'numeric'],
            'wind_speed'   => ['nullable', 'numeric'],
            'created_at'   => ['nullable', 'array', 'size:2'],
            'created_at.*' => ['required_with:created_at', 'date', 'date_format:Y-m-d', 'before_or_equal:today', 'after_or_equal:today - 1 month'],
        ];
    }
}
