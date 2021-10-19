@extends('layout.master')
@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title"> 
            <h4> Documentos <i class="far fa-file"></i>
                <a id="addDocumento" class="btn btn-default pull-right btn-xs">
                    <i class="fa fa-plus-square"> </i> Novo Documento
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
            <form id="filterDocumentos"> 
                <div class="row"> 
                    <div class="col-md-9">
                        <div class="form-group">
                            <label> Número do documento </label> 
                            <input name="doc_num_documento" class="form-control"/>
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
<div class="panel panel-default" id="gridDocumentos">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h4> Total de registros: {{ count($dataDocumentos)}} </h4>
            </div>
        </div>
        @if( count($dataDocumentos) > 0)
            <table class="table table-striped"> 
                <thead>
                    <tr> 
                        <th width="15%"> Imagem Documento </th>
                        <th> N Documento  </th>
                        <th> Data Criação </th>
                        <th> Tipo </th>
                        <th class="text-center"> Empresa </th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach($dataDocumentos as $documento) 
                       <tr> 
                            <td> 
                            
                                @if(!empty($documento->imagemDocumento->imd_arquivo))
                                    <img width="50px" src="{{$documento->imagemDocumento->imd_arquivo}}" alt="imgDocumento" />
                                @else 
                                   {{ "Não informado "}}
                                @endif
                            </td>
                            <td> {{ !empty($documento->doc_num_documento) 
                                    ?  $documento->doc_num_documento 
                                    : "Não informado" 
                            }}  </td>
                            <td> {{ 
                                    !empty($documento->doc_dat_cadastro) 
                                    ? converteData($documento->doc_dat_cadastro, 'd/m/Y') 
                                    : "Não informado"  
                                }} 
                            </td>
                            <td> 
                                {{ 
                                    !empty($documento->tipoDocumento->tdo_nome_tipo_documento) 
                                    ? $documento->tipoDocumento->tdo_nome_tipo_documento
                                    : "Não informado"  
                                }} 
                            </td>
                            <td> 
                                {{ 
                                    !empty($documento->empresa->emp_nom_empresa) 
                                    ? $documento->empresa->emp_nom_empresa
                                    : "Não informado"  
                                }} 
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