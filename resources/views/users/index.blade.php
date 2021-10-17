@extends('layout.master')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading"> 
            <div class="panel-title"> 
                <h1> Usuários 
                    <a href="/usuarios/create" class="btn btn-default pull-right"> Novo </a>    
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
                    @foreach ($dataUsers as $user)
                        <tr> 
                           <td> {{ $user->id}} </td> 
                           <td> {{ $user->nome}} </td>
                           <td> {{ $user->email}} </td>
                           <td> 
                               <div class="table-actions"> 
                                    <button class="btn btn-primary btn-xs">
                                        Edit 
                                    </button>
                                    <button class="btn btn-danger btn-xs">
                                        Delete
                                    </button>
                               </div>
                           </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection