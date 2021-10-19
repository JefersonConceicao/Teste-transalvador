const setActive = () => {
    //REMOVE LINKS COM ACTIVE 
    $(".navbar-nav").find("li").removeClass("active");

    //COMPARA O PATHNAME (LINK ATUAL) COM O HREF DOS LINKS
    const elementLink = $(".navbar-nav").find("a");
    elementLink.each((index, element) => {
        const anchorage = $(element)

        if(anchorage.attr("href") == window.location.pathname){
            anchorage.parent().addClass("active");
        }
    })
}

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

$(() => {
    setActive()
})

module.exports = {
    loadModal,
    showMessagesValidator
}