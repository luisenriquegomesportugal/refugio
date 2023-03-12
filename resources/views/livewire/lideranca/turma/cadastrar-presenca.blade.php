@if($turmaChamada->presentes->contains($membro))
    <button wire:click.prevent="removerPresenca({{$membro->id}})"
            class="btn btn-success light px-2 d-inline-flex align-items-center">
        <i class="fa fa-check me-2" wire:loading.remove
           wire:target="removerPresenca({{$membro->id}})"></i>
        <i class="fa fa-spinner fa-spin me-2" wire:loading
           wire:target="removerPresenca({{$membro->id}})"></i>
        Presente
    </button>
@else
    <button wire:click.prevent="cadastrarPresenca({{$membro->id}})"
            class="btn btn-danger light px-2 d-inline-flex align-items-center">
        <i class="fa fa-spinner fa-spin me-2" wire:loading
           wire:target="cadastrarPresenca({{$membro->id}})"></i>
        <i class="fa fa-times me-2" wire:loading.remove
           wire:target="cadastrarPresenca({{$membro->id}})"></i>
        Faltou
    </button>
@endif
