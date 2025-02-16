<?php

namespace App\Http\Requests\Admin;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'demo_link' => 'nullable|url',
        ];
        if ($this->isMethod('post')) {
            $rules['image'] = 'required';
        } else {
            $rules['image'] = 'nullable';
        }
        return $rules;
    }

    public function handle($product = null)
    {
        if ($product) {
            $this->update($this->validated(), $product);
        } else {
            $product = $this->store($this->validated());
        }
        return $product;
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = filepondUpload($data['image'], 'products');
        }
        return Product::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'],
        ]);
    }

    public function update(array $data, $product)
    {
        if (isset($data['image'])) {
            $data['image'] = filepondUpload($data['image'], 'products');
        } else {
            unset($data['image']);
        }
        return $product->update($data);
    }
}
