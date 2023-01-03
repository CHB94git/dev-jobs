<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowVacants extends Component
{
    protected $listeners = ['deleteVacant'];

    public function deleteVacant(Vacant $vacant)
    {
        $vacant->delete();
    }

    public function render()
    {
        $vacants = Vacant::where('user_id', Auth::user()->id)->paginate(10);

        return view('livewire.show-vacants', [
            'vacants' => $vacants
        ]);
    }
}
