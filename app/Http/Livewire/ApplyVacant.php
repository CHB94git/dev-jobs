<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use App\Notifications\NewCandidate;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacant extends Component
{
    public $cv;
    public $vacant;

    use WithFileUploads;

    protected $rules = [
        'cv' => ['required', 'mimes:pdf']
    ];

    public function mount(Vacant $vacant)
    {
        $this->vacant = $vacant;
    }

    public function applyVacant()
    {
        $data = $this->validate();

        // Almacenar el CV
        $cv = $this->cv->store('public/cv');
        $data['cv'] = str_replace('public/cv/', '', $cv);

        // Crear el candidato a la vacante
        $this->vacant->candidates()->create([
            'user_id' => Auth::user()->id,
            'cv' => $data['cv'],
        ]);

        // Crear notificación y enviar
        $this->vacant->recruiter->notify(new NewCandidate($this->vacant->id, $this->vacant->title, Auth::user()->id));

        // Mostrar al usuario un mensaje exitoso
        return redirect()->back()->with('message', 'Your information was sent correctly, success!');
    }

    public function render()
    {
        return view('livewire.apply-vacant');
    }
}
