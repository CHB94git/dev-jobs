<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class FilterVacantsBySearch extends Component
{
    public $term;
    public $category;
    public $salary;

    public function readDataForm()
    {
        $this->emit('termSearch', $this->term, $this->category, $this->salary);
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.filter-vacants-by-search', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
