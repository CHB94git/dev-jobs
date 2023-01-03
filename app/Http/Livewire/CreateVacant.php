<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacant;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVacant extends Component
{
    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'title' => ['required', 'string'],
        'salary' => ['required'],
        'category' => ['required'],
        'company' => ['required'],
        'last_day' => ['required'],
        'description' => ['required'],
        'image' => ['required', 'image', 'max:2048'],
    ];

    public function createVacant()
    {
        $data = $this->validate();

        // Almacenar la imagen
        $image = $this->image->store('public/vacants');
        $data['image'] = str_replace('public/vacants/', '', $image);
        // $imageStoredDB = str_replace('public/vacants/', '', $image);

        // dd($imageStoredDB);

        // Crear la vacante
        Vacant::create([
            'title' => $data['title'],
            'salary_id' => $data['salary'],
            'category_id' => $data['category'],
            'company' => $data['company'],
            'last_day' => $data['last_day'],
            'description' => $data['description'],
            'image' => $data['image'],
            // 'image' => $imageStoredDB,
            'user_id' => Auth::user()->id,
        ]);

        // Crear un mensaje
        // session()->flash('message', 'The vacancy has been successfully published');

        // Redireccionar al usuario
        return to_route('vacants.index')->with('message', 'The vacancy has been successfully published');
    }

    public function render()
    {
        // Consultar DB - traer todos los datos
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.create-vacant', [
            'salaries' => $salaries,
            'categories' => $categories,
        ]);
    }
}
