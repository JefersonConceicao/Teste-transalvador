@extends('layout.master')
@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title"> 
            <h4> Documentos Tipos <i class="far fa-file"></i>
                <a id="addTipoDocumento" class="btn btn-default pull-right btn-xs">
                    <i class="fa fa-plus-square"> </i> Novo Tipo de Documento
                </a>    
            </h4> 
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <b> Filtro <i class="fa fa-filter"> </i> </b>
                <button 
                    aria-expandend="false" 
                    class="btn btn-default pull-right" 
                    data-toggle="collapse" 
                    href="#filterContent"
                > 
                    <i class="fas fa-angle-down"></i> 
                </button>
            </div>
        </div>
        <div id="filterContent" class="collapse">
            <hr/>
            <form id="filterTiposDocumentos"> 
                <div class="row"> 
                    <div class="col-md-9">
                        <div class="form-group">
                            <label> Nome </label> 
                            <input name="tdo_nome_tipo_documento" class="form-control"/>
                        </div>
                    </div>  

                    <div class="col-md-3" style="margin-top:2%">
                        <div class="form-group">
                            <label> &nbsp </label>
                            <button type="submit" class="btn btn-primary pull-right"> 
                                <i class="fa fa-search"> </i> Pesquisar 
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="panel panel-default" id="gridTiposDocumento">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h4> Total de registros: {{ count($dataTiposDocumentos) }} </h4>
            </div>
        </div>
            @if(count($dataTiposDocumentos)  > 0)
                <table class="table table-striped"> 
                    <thead>
                        <tr> 
                            <th> Nome </th>
                            <th width="2%"> Ações </th>
                        </tr>
                    </thead>
                    <tbody>     
                        @foreach($dataTiposDocumentos as $tiposDocumento)
                            <tr> 
                                <td> 
                                    {{ !empty($tiposDocumento->tdo_nome_tipo_documento) 
                                        ? $tiposDocumento->tdo_nome_tipo_documento
                                        : "Não infomrado"
                                    }} 
                                </td>
                                <td> 
                                    <button class="btn btn-danger deleteTipoDocumento" id="{{$tiposDocumento->tdo_id_tdo}}"> <i class="fa fa-trash"> </i> </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4 class="text-center"> Nenhum registro encontrado. </h4>
            @endif
    </div>
</div>
@endsection