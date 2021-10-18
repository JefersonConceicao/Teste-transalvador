const loadModal = (url, callback = null) => {
    const modalObject = $("#myModal");

    modalObject.modal({ backdrop: 'static' });
    modalObject.load(`${url} .modal-dialog`, function(){
        if(!!callback) callback();
    });
}

const showMessagesValidator = (form, errors) => {
    $(".error_feedback").html("");
    $(form).find('.control-error').removeClass("control-error");

    let nameInputs = Object.keys(errors);
    nameInputs.forEach(value => {
       const elementInput = $(form).find(`input[name='${value}']`)
       const divFeedack = elementInput.parent().find(".error_feedback");
        
       if(errors[value].length > 0){
            errors[value].forEach(value => {
                divFeedack.append(`<p class="required-label"> ${value} </p>`)
            })
        }

        elementInput.addClass('control-error');
    }); 
}

module.exports = {
    loadModal,
    showMessagesValidator
}