<div class="row">
    <div class="col-12">
            <table class="table table-borderless" id="refukids-chamada-presentes">
                @if(\Carbon\Carbon::parse($turmaChamada->dia)->isCurrentDay())
                    @foreach($membros as $membro)
                        <tr>
                            <td>
                                @livewire('lideranca.refukids.card-crianca', ['turma' => $turma, 'turmaChamada' => $turmaChamada, 'membro' => $membro, 'colunaAcao' => 'lideranca.turma.cadastrar-presenca'], key($membro->id))
                            </td>
                        </tr>
                    @endforeach
                @else
                    @foreach($turmaChamada->presentes as $membro)
                        <tr>
                            <td>
                                @livewire('lideranca.refukids.card-crianca', ['turma' => $turma, 'turmaChamada' => $turmaChamada, 'membro' => $membro], key($membro->id))
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="turma-chamada-presentes" wire:ignore.self>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Atualizar fotos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    @if($membroSelecionado != null)
                        <div class="modal-body">
                            <label class="form-label fw-bold text-capitalize">{{ $membroSelecionado->nome }}</label>
                            <div class="d-flex align-items-center">
                                <div class="form-file me-2">
                                    <input type="file" class="form-file-input form-control ps-2"
                                           wire:model="fotos.{{$membroSelecionado->id}}">
                                </div>
                                <span wire:loading
                                      wire:target="fotos.{{$membroSelecionado->id}}">
                                    <i class="fa fa-spinner fa-spin"></i>
                                </span>
                            </div>
                            @foreach(\App\Models\RefukidsResponsavel::where('crianca_id', $membroSelecionado->id)->get() as $responsavel)
                                <div class="mt-4">
                                    <label
                                        class="form-label fw-bold text-capitalize">{{ $responsavel->nome }}</label>
                                    <div class="d-flex align-items-center">
                                        <div class="form-file me-2">
                                            <input type="file" class="form-file-input form-control ps-2"
                                                   wire:model="fotos.{{$responsavel->id}}">
                                        </div>
                                        <span wire:loading
                                              wire:target="fotos.{{$responsavel->id}}">
                                            <i class="fa fa-spinner fa-spin"></i>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="modal-body d-flex justify-content-center align-items-center">
                            <i class="fa fa-spinner fa-spin"></i>
                        </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" wire:loading.attr="disabled" wire:target="fotos.*"
                                wire:click.prevent="salvarMembroSelecionado">
                            <i class="fa fa-spinner fa-spin me-2" wire:loading
                               wire:target="salvarMembroSelecionado"></i>
                            <i class="fa fa-check me-2" wire:loading.remove wire:target="salvarMembroSelecionado"></i>
                            Salvar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript" wire:ignore>
        (function ($) {
            $(document).on('hidden.bs.modal', '#turma-chamada-presentes', () => {
                Livewire.emit('turmaChamadaPresentesHidden');
            });

            Livewire.on('salvarMembroSelecionadoSucesso', () => {
                toastr.success("Imagens salvas com sucesso", "Sucesso", {
                    closeButton: true,
                    positionClass: "toast-top-right"
                });

                $('#turma-chamada-presentes').modal('hide');

            });
        })(jQuery);
    </script>
@endpush
