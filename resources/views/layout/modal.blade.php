@extends('layout.master')
@section('modal')
    @hasSection('form-modal')
        <form id="@yield('form-modal')">
    @endif
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"> @yield('modal-header') </h4>
        </div>
        <div class="modal-body">
            @yield('modal-content')
        </div>
        <div class="modal-footer">
            @hasSection('btnClose')
                <button type="button" class="btn btn-default" data-dismiss="modal"> @yield('btnClose') </button>
            @endif

            @hasSection('btnSave')
                <button type="submit" type="button" class="btn btn-primary" id="btnSubmit"> @yield('btnSave') </button>
            @endif
        </div>
    </div>
    @hasSection('form-modal')
        </form>
    @endif  
@endsection
