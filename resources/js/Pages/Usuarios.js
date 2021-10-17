const { default: Swal } = require("sweetalert2");

const loadEventos = () => {
    $("#addUsuario").on("click", function(){
        const url = '/usuarios/create';

        Usage.loadModal(url, function(){
            $("#addUsuario").on("submit", function(e){
                e.preventDefault()
                setFormUser();
            });
        });
    });
}

const setFormUser = id => {
    const form = typeof id === "undefined" ? "#addUsuario" : "#editUsuario";
    const url =  typeof id === "undefined" ? "/usuarios/store" : `/usuarios/update/${id}`;
    const type = typeof id === "undefined" ? "POST" : "PUT";
    
    console.log($(form).serialize());

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

$(() => {
    loadEventos();
})