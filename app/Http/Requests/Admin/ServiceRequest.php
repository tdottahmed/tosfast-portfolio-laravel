<?php

namespace App\Http\Requests\Admin;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'description' => 'required|string',
        ];
        if ($this->isMethod('post')) {
            $rules['image'] = 'required';
        } else {
            $rules['image'] = 'nullable';
        }
        return $rules;
    }


    public function handle($service = null)
    {
        if ($service) {
            $this->update($this->validated(), $service);
        } else {
            $service = $this->store($this->validated());
        }
        return $service;
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = filepondUpload($data['image'], 'services');
        }
        return Service::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'],
        ]);
    }

    public function update(array $data, $service)
    {
        if (isset($data['image'])) {
            $data['image'] = filepondUpload($data['image'], 'services');
        } else {
            unset($data['image']);
        }
        return $service->update($data);
    }
}
