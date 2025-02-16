<?php

namespace App\Http\Requests\Admin;

use App\Models\Banner;
use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'description' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ];
        if ($this->isMethod('post')) {
            $rules['image'] = 'required';
        } else {
            $rules['image'] = 'nullable';
        }
        return $rules;
    }

    public function handle($banner = null)
    {
        if ($banner) {
            $this->update($this->validated(), $banner);
        } else {
            $banner = $this->store($this->validated());
        }
        return $banner;
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = filepondUpload($data['image'], 'banners');
        }
        return Banner::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'] ?? null,
            'link' => $data['link'],
        ]);
    }

    public function update(array $data, $banner)
    {
        if (isset($data['image'])) {
            $data['image'] = filepondUpload($data['image'], 'banners');
        } else {
            unset($data['image']);
        }
        return $banner->update($data);
    }
}
