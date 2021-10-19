const modalObject = "#myModal";
const grid = "#gridDocumentos";

const loadEventos = () => {
    $("#addDocumento").on("click", function(){
        const url = '/documentos/create';

        Usage.loadModal(url, function(){
            $("#addDocumentos").on("submit", function(e){
                e.preventDefault()
                setFormDocumentos();
            })
        });
    });


    $("#filterDocumentos").on("submit", function(e){
        e.preventDefault();
        renderGridDocumentos()
    })
}

const setFormDocumentos = id => {
    const form = typeof id === "undefined" ? "#addDocumentos" : "#editDocumentos";
    const url =  typeof id === "undefined" ? "/documentos/store" : `/documentos/update/${id}`;
    const type = typeof id === "undefined" ? "POST" : "PUT";
    
    $.ajax({
        type,
        url,
        data: new FormData($("#addDocumentos")[0]),
        dataType: "JSON",
        processData: false,
        contentType: false,
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
            renderGridDocumentos();
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


const renderGridDocumentos = () => {
    const url = '/documentos/';
    const formFilter = "#filterDocumentos";

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
})