

const modalObject = "#myModal";
const grid = "#gridEmpresas";

const loadEventos = () => {
    $("#addUsuario").on("click", function(){
        const url = '/empresas/create';

        Usage.loadModal(url, function(){
            $("#addUsuario").on("submit", function(e){
                e.preventDefault()
                setFormUser();
            });

            settingForm();
        });
    });

    $("#filterEmpresas").on("submit", function(e){
        e.preventDefault();

        renderGridEmpresas();
    });
}

const setFormUser = id => {
    const form = typeof id === "undefined" ? "#addUsuario" : "#editUsuario";
    const url =  typeof id === "undefined" ? "/empresas/store" : `/empresas/update/${id}`;
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

const settingForm = () => {
    $("#valCEP").on("change", function(){
        $.get(`/enderecos/getDataByCEP/${$(this).val()}`,
            function (response, textStatus, jqXHR) {
                $(`input[name='log_nom_logradouro']`).val(response.logradouro);
                $(`input[name='bai_nom_bairro']`).val(response.bairro);
            },
            "JSON"
        );

        $.get(`/enderecos/getLocationByCEP/${$(this).val()}`,
            function(response, textStauts, jqXHR){
                $(`input[name='end_num_lat']`).val(!!response.location.lat 
                    ? response.location.lat
                    : "1111"
                );
                $(`input[name='end_num_long']`).val(!!response.location.lng
                    ? response.location.lng 
                    : "1111"   
                );
            }
        )
    }); 
}

const renderGridEmpresas = () => {
    const url = '/empresas/';
    const formFilter = "#filterEmpresas";

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
        }
    });
}

$(() => {
    loadEventos();
})