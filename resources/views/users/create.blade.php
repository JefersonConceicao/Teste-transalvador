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
                <label> Nome Completo <span class="required-label"> * </span> </label>
                <input type="text" name="nome" class="form-control" />

                <div class="error_feedback"> </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label> E-mail <span class="required-label"> * </span> </label>
                <input type="email" name="email" class="form-control" />

                <div class="error_feedback"> </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label> Senha <span class="required-label"> * </span> </label>
            <input type="password" name="password" class="form-control"/> 

            <div class="error_feedback"> </div>
        </div>
        <div class="col-md-6">
            <label> Confirmar Senha <span class="required-label"> * </span> </label>
            <input type="password" name="password_confirmation" class="form-control"/>

            <div class="error_feedback"> </div>
        </div>
    </div>
@endsection
@section('btnClose', 'Fechar')
@section('btnSave', 'Salvar')
