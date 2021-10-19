const modalObject = "#myModal";
const grid = "#gridTiposDocumento";

const loadEventos = () => {
    $("#addTipoDocumento").on("click", function(){
        const url = '/documentosTipos/create';

        Usage.loadModal(url, function(){
            $("#addDocumentosTipos").on("submit", function(e){
                e.preventDefault()
                setFormTiposDocumentos();
            })
        });
    });
}

const habilitaBotoes = () => {
    $(".deleteTipoDocumento").on("click", function(){
        const url = '/documentosTipos/delete/' + $(this).attr("id");
      
        $.ajax({
            type: "DELETE",
            url,
            dataType: "JSON",
            success: function (response) {
                Swal.fire({
                    icon: !response.error ? 'success' : 'error',
                    title: response.msg,
                    toast:true,
                    position:'top-end',
                    timer:4000,
                    showConfirmButton:false,
                }) 
                
                renderGridEmpresas();
            }
        });
    });
}


const setFormTiposDocumentos = id => {
    const form = typeof id === "undefined" ? "#addDocumentosTipos" : "#editDocumentosTipos";
    const url =  typeof id === "undefined" ? "/documentosTipos/store" : `/documentosTipos/update/${id}`;
    const type = typeof id === "undefined" ? "POST" : "PUT";
    
    $.ajax({
        type,
        url,
        data: $(form).serialize(),
        dataType: "JSON",
        beforeSend:function(){
            $("#btnSubmit").prop("disabled", true).html("Carregando....")
        },
        success: function (response) {
            Swal.fire({
                icon: !response.error ? 'success' : 'error',
                title: response.msg,
                toast:true,
                position:'top-end',
                timer:4000,
                showConfirmButton:false,
            })

            $(modalObject).modal('hide');
            renderGridEmpresas();
        },
        error:function(jqXHR, textStatus, error){
            const errors = jqXHR.responseJSON.errors;
            Usage.showMessagesValidator(form, errors);
        },
        complete:function(){
            $("#btnSubmit").prop("disabled", false).html("Salvar");
        }
    });
}


const renderGridEmpresas = () => {
    const url = '/documentosTipos/';
    const formFilter = "#filterTiposDocumentos";

    $.ajax({
        type: "GET",
        url,
        data: $(formFilter).serialize(),
        dataType: "HTML",
        beforeSend:function(){
            $(grid).closest(grid);
        },
        success: function (response) {
            $(grid).html($(response).find(`${grid} >`))
            habilitaBotoes();
        }
    });
}


$(() => {
    loadEventos();
    habilitaBotoes();
})