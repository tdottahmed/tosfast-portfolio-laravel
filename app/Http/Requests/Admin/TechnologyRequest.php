<?php

namespace App\Http\Requests\Admin;

use App\Models\Technology;
use Illuminate\Foundation\Http\FormRequest;

class TechnologyRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
        if ($this->isMethod('post')) {
            $rules['image'] = 'required';
        } else {
            $rules['image'] = 'nullable';
        }
        return $rules;
    }

    public function handle($technology = null)
    {
        if ($technology) {
            $this->update($this->validated(), $technology);
        } else {
            $technology = $this->store($this->validated());
        }
        return $technology;
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = filepondUpload($data['image'], 'technologies');
        }
        return Technology::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'],
        ]);
    }

    public function update(array $data, $technology)
    {
        if (isset($data['image'])) {
            $data['image'] = filepondUpload($data['image'], 'technologies');
        } else {
            unset($data['image']);
        }
        return $technology->update($data);
    }
}
