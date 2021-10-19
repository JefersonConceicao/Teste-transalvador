@extends('layout.master')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title"> 
                <h4> Empresas <i class="far fa-building"></i>
                    <a id="addUsuario" class="btn btn-default pull-right btn-xs">
                        <i class="fa fa-plus-square"> </i> Nova Empresa 
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
                <form id="filterEmpresas"> 
                    <div class="row"> 
                        <div class="col-md-9">
                            <div class="form-group">
                                <label> Nome da empresa </label> 
                                <input name="emp_nom_empresa" class="form-control"/>
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
    <div class="panel panel-default" id="gridEmpresas">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <h4> Total de registros: {{ count($dataEmpresas) }} </h4>
                </div>
            </div>
            @if(count($dataEmpresas) > 0)
                <table class="table table-striped"> 
                    <thead>
                        <tr> 
                            <th> Nome Empresa </th>
                            <th> Data Inicio Atividade  </th>
                            <th> Data Fim Atividade</th>
                            <th> Endereço </th>
                            <th> CEP </th>
                            <th width="2%"> Ações </th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach($dataEmpresas as $empresa)
                            <tr> 
                                <td> {{ !empty($empresa->emp_nom_empresa) ? $empresa->emp_nom_empresa : "Não informado" }} </td>
                                <td> 
                                    {{ !empty($empresa->emp_dti_atividade) 
                                        ? converteData($empresa->emp_dti_atividade, 'd/m/Y') 
                                        : "Não informado" }} 
                                </td>
                                <td> 
                                    {{ !empty($empresa->emp_dtf_atividade) 
                                        ? converteData($empresa->emp_dtf_atividade, 'd/m/Y')
                                        : "Não informado" 
                                    }} 
                                </td>
                                <td> 
                                    {{ !empty($empresa->endereco->logradouro->log_nom_logradouro) 
                                        ? $empresa->endereco->logradouro->log_nom_logradouro 
                                        : "Não informado" 
                                    }}
                                </td>
                                <td> {{ !empty($empresa->endereco->logradouro->log_num_cep) 
                                    ? $empresa->endereco->logradouro->log_num_cep 
                                    : "Não informado" }}
                                </td>
                                <td class="text-center"> 
                                    <div>
                                        @if(!empty($empresa->endereco))
                                            <a 
                                                href="https://maps.google.com/maps/place/{{$empresa->endereco->end_num_lat}},{{$empresa->endereco->end_num_long}}"
                                                target="__blank"
                                                title="Ver no mapa"
                                            > 
                                                <i class="fas fa-map-marker-alt"></i>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else 
                <h4 class="text-center">  Nenhum registro encontrado. </h4>
            @endif
        </div>
    </div>
@endsection
