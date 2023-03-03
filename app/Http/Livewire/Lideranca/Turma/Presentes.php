<?php

namespace App\Http\Livewire\Lideranca\Turma;

use App\Models\Membro;
use App\Models\RefukidsResponsavel;
use App\Models\Turma;
use App\Models\TurmaChamada;
use App\Repositories\Interfaces\MembroRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class Presentes extends Component
{
    use WithFileUploads;

    public Turma $turma;
    public TurmaChamada $turmaChamada;

    public $membros;
    public $membroSelecionado;
    public $fotos;

    protected $listeners = ['turmaChamadaPresentesHidden' => 'limparMembroSelecionado'];

    protected $rules = ['fotos.*' => 'image'];

    public function selecionarMembro(Membro $membro)
    {
        $this->membroSelecionado = $membro;
    }

    public function salvarMembroSelecionado(MembroRepositoryInterface $membroRepository)
    {
        foreach ($this->fotos as $membro_id => $foto)
        {
            $membroRepository->atualizarFoto($membro_id, $foto);
        }

        $this->membroSelecionado
            ->refresh();

        $this->emit('salvarMembroSelecionadoSucesso');
    }

    public function limparMembroSelecionado()
    {
        $this->membroSelecionado = null;
    }

    public function cadastrarPresenca($membro_id)
    {
        $this->turmaChamada
            ->presentes()
            ->attach($membro_id);

        $this->turmaChamada->refresh();
    }

    public function removerPresenca($membro_id)
    {
        $this->turmaChamada
            ->presentes()
            ->detach($membro_id);

        $this->turmaChamada->refresh();
    }

    public function render()
    {
        return view('livewire.lideranca.turma.presentes');
    }
}
