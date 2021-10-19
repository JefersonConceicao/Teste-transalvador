@extends('layout.modal')
@section('modal-header', 'Novo Tipo de Documento')
@section('form-modal', 'addDocumentosTipos')
@section('modal-content')
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right"> <b> <span class="required-label"> * </span> Campos obrigatórios </b> </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label> Nome <span class="required-label"> * </span> </label>
                <input type="text" name="tdo_nome_tipo_documento" class="form-control" required/>
                
                <div class="error_feedback"> </div>
            </div>
        </div>
    </div>
@endsection
@section('btnClose', 'Fechar')
@section('btnSave', 'Salvar')