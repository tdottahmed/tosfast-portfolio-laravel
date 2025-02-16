<?php

namespace App\Http\Requests\Admin;

use App\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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

    public function handle($blog = null)
    {
        if ($blog) {
            $this->update($this->validated(), $blog);
        } else {
            $blog = $this->store($this->validated());
        }
        return $blog;
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = filepondUpload($data['image'], 'blogs');
        }
        return Blog::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'author' => $data['author'],
            'designation' => $data['designation'],
            'image' => $data['image'],
        ]);
    }

    public function update(array $data, $blog)
    {
        if (isset($data['image'])) {
            $data['image'] = filepondUpload($data['image'], 'blogs');
        } else {
            unset($data['image']);
        }
        return $blog->update($data);
    }
}
