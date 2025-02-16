<?php

namespace App\Http\Requests\Admin;

use App\Models\Team;
use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'designation' => 'required|string|max:255',
        ];
        if ($this->isMethod('post')) {
            $rules['image'] = 'required';
        } else {
            $rules['image'] = 'nullable';
        }
        return $rules;
    }

    public function handle($team = null)
    {
        if ($team) {
            $this->update($this->validated(), $team);
        } else {
            $team = $this->store($this->validated());
        }
        return $team;
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = filepondUpload($data['image'], 'teams');
        }
        return Team::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'designation' => $data['designation'],
            'image' => $data['image'],
        ]);
    }

    public function update(array $data, $team)
    {
        if (isset($data['image'])) {
            $data['image'] = filepondUpload($data['image'], 'teams');
        } else {
            unset($data['image']);
        }
        return $team->update($data);
    }
}
