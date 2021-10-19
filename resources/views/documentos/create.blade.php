@extends('layout.modal')
@section('modal-header', 'Novo Documento')
@section('form-modal', 'addDocumentos')
@section('modal-content')
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right"> <b> <span class="required-label"> * </span> Campos obrigatórios </b> </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label> Número do Documento <span class="required-label"> * </span> </label>
                <input type="text" name="doc_num_documento" class="form-control" required/>
                
                <div class="error_feedback"> </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label> Data Cadastro <span class="required-label"> * </span> </label>
                <input type="date" name="doc_dat_cadastro" class="form-control" required/>

                <div class="error_feedback"> </div>
            </div>  
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label> Tipo de Documento  <span class="required-label"> * </span> </label>
                <select name="doc_id_tdo" class="form-control">
                    <option value=""> Selecione </option>
                    @foreach($optionsTiposDocumentos as $k => $v)
                        <option value="{{$k}}"> {{ $v }} </option>
                    @endforeach
                </select> 

                <div class="error_feedback"> </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label> Empresa  <span class="required-label"> * </span>  </label>
                <select name="doc_id_emp" class="form-control">
                    <option value=""> Selecione </option>
                    @foreach($optionsTiposEmpresas as $k => $v)
                        <option value="{{$k}}"> {{ $v }} </option>
                    @endforeach
                </select> 

                <div class="error_feedback"> </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label> Imagem </label>
                <input type="file" name="imd_arquivo" accept="image/png, image/gif, image/jpeg" />
            </div>
        </div>
    </div>
@endsection
@section('btnClose', 'Fechar')
@section('btnSave', 'Salvar')