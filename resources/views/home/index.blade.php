@extends('layout.master')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading"> 
            <div class="panel-title"> 
                <h1> Dados 
                    <button id="addUsuario" class="btn btn-default pull-right"> Novo </a>    
                </h1> 
            </div>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead> 
                    <tr> 
                        <th> ID  </th>
                        <th> Nome </th>
                        <th> E-mail </th>
                        <th width="2%"> Ações </th>
                    </tr>
                </thead> 
                <tbody>     
                 
                </tbody>
            </table>
        </div>
    </div>
@endsection