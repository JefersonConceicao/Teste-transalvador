@extends('layout.modal')
@section('modal-header', 'Novo Usuário')
@section('form-modal', 'addUsuario')
@section('modal-content')
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right"> <b> <span class="required-label"> * </span> Campos obrigatórios </b> </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"> 
            <div class="form-group">
                <label> Nome Empresa <span class="required-label"> * </span> </label>
                <input type="text" name="emp_nom_empresa" class="form-control" required/>

                <div class="error_feedback"> </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label> Data Inicial de Atividade  </label>
                <input type="date" name="emp_dti_atividade" class="form-control" />

                <div class="error_feedback"> </div>
            </div>
        </div>
        <div class="col-md-6">
            <label> Data Final de Atividade  </label>
            <input type="date" name="emp_dtf_atividade" class="form-control"/> 

            <div class="error_feedback"> </div>
        </div>
    </div>
<hr/>
    <div class="row">
        <div class="col-md-6"> 
            <div class="form-group">    
                <label> CEP <span class= "required-label"> * </span> </label>
                <input type="text" class="form-control" name="log_num_cep" id="valCEP" required/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label> Logradouro <span class="required-label"> * </span> </label>
                <input type="text" class="form-control" name="log_nom_logradouro" required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label> Bairro <span class="required-label">  * </span> </label>
                <input type="text"  class="form-control" name="bai_nom_bairro" required/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group"> 
                <label> Número <span class="required-label"> * </span>  </label>
                <input type="text" class="form-control" name="end_num_numero" required/>
            </div> 
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label> Complemento </label>
                <input type="text" class="form-control" name="end_nom_complemento" /> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <input hidden name="end_num_lat" />
            <input hidden name="end_num_long" />
        </div>
    </div>
@endsection
@section('btnClose', 'Fechar')
@section('btnSave', 'Salvar')
