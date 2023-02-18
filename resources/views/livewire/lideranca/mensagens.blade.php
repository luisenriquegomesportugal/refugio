@if($show)
    <div class="row">
        <div class="col">
            @if(session()->has('alerta'))
                <div class="alert alert-warning left-icon-big alert-dismissible fade show">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i
                                class="mdi mdi-btn-close"></i></span>
                    </button>
                    <div class="media">
                        <div class="alert-left-icon-big">
                            <span><i class="mdi mdi-help-circle-outline"></i></span>
                        </div>
                        <div class="media-body">
                            <h5 class="mt-1 mb-2">Atenção!</h5>
                            <p class="mb-0">{{ session('alerta') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if(session()->has('sucesso'))
                <div class="alert alert-success left-icon-big alert-dismissible fade show">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    <span>
                        <i class="mdi mdi-btn-close"></i>
                    </span>
                    </button>
                    <div class="media">
                        <div class="alert-left-icon-big">
                        <span>
                            <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                        </div>
                        <div class="media-body">
                            <h5 class="mt-1 mb-2">Parabéns!</h5>
                            <p class="mb-0">{{ session('sucesso') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if(session()->has('erro'))
                <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i
                                class="mdi mdi-btn-close"></i></span>
                    </button>
                    <div class="media">
                        <div class="alert-left-icon-big">
                            <span><i class="mdi mdi-alert"></i></span>
                        </div>
                        <div class="media-body">
                            <h5 class="mt-1 mb-2">Ixii, deu erro!</h5>
                            <p class="mb-0">{{ session('erro') }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
