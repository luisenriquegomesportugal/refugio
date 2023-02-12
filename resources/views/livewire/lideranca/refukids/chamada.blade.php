@extends('layouts.lideranca')
@section('titulo', 'Chamada refukids')

@section('styles')
    <!-- Datatable -->
    <link href="{{ asset("/assets/lideranca/vendor/datatables/css/jquery.dataTables.min.css") }}" rel="stylesheet">
@endsection

@section('scripts')
    <!-- Datatable -->
    <script src="{{ asset("/assets/lideranca/vendor/datatables/js/jquery.dataTables.min.js") }}"></script>
    <script>
        (function($) {
            "use strict"

            let table = $('#chamada-refukids').DataTable({
                select: false,
                lengthChange:false,
                language: {
                    paginate: {
                        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                    }
                }
            });
        })(jQuery);
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-sm-flex d-block">
                <div class="me-auto mb-sm-0 mb-3">
                    <h4 class="card-title mb-2">Chamada refukids</h4>
                    <span>{{ $turmaDescricao }}</span>
                </div>
                <a href="javascript:void(0);" class="btn btn-info">+ Nova chamada</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table style-1" id="chamada-refukids">
                        <thead>
                        <tr>
                            <th>Dia</th>
                            <th>Presentes</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <h6 class="m-0">12/02/2023</h6>
                            </td>
                            <td>
                                30 crianças
                            </td>
                            <td>
                                <div class="d-flex action-button">
                                    <a href="javascript:void(0);" class="btn btn-info btn-xs light px-2">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
