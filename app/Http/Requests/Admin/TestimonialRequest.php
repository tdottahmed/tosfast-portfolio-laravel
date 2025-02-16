<?php

namespace App\Http\Requests\Admin;

use App\Models\Testimonial;
use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
            'author' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
        ];
        if ($this->isMethod('post')) {
            $rules['image'] = 'required';
        } else {
            $rules['image'] = 'nullable';
        }
        return $rules;
    }

    public function handle($testimonial = null)
    {
        if ($testimonial) {
            $this->update($this->validated(), $testimonial);
        } else {
            $testimonial = $this->store($this->validated());
        }
        return $testimonial;
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = filepondUpload($data['image'], 'testimonials');
        }
        return Testimonial::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'author' => $data['author'],
            'designation' => $data['designation'],
            'image' => $data['image'],
        ]);
    }

    public function update(array $data, $testimonial)
    {
        if (isset($data['image'])) {
            $data['image'] = filepondUpload($data['image'], 'testimonials');
        } else {
            unset($data['image']);
        }
        return $testimonial->update($data);
    }
}
