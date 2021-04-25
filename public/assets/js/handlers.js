// Handle add
function clickAdd() {
    resetId();
    resetForm();
    hideErrorsMessages();
    hideHiddenInputs();
    hideButtons();
    showClose();
    showSave();
    showCurriculum();
    toggleModal();
    resetSelects();
    enableInputs();

    $('#container_baccalaureate_id').hide(300);
    $('#container_subject_id').hide(300);
}

// Handle details
function clickDetalle() {
    hideButtons();
    showProgressBar();
    hideErrorsMessages();
    showHiddenInputs();
    resetForm();
    hidePassword();
    toggleModal();
    enableInputs();

    $('#container_subject_id').hide(300);
}


// Handle success
function success() {
    loadTable();
    toggleModal();
    hideModal();
    hideProgressBar();
    hideButtons();
    resetSelects();

    toastr.success('La operación ha sido exitosa!')
}

// Handle fail
function fail(errors = [], names = []) {
    errorCheck(errors, names);

    toastr.error('Athena estaría decepcionada en ti')
}

// Handle fail (custom message)
function failCustom(errors = [], names = [], message) {
    errorCheck(errors, names);
    
    hideProgressBar();

    toastr.error(message)
}

// Handle error messages
function errorCheck(errors, names) {
    $('.error').remove();

    for (let i = 0; i < Object.values(names).length; i++) {
        (eval(`errors.${names[i]}`)) ?
        $(`#${names[i]}`).parent().append(`<p class="error validation-error">${eval(`errors.${names[i]}`)}</p>`): $(`#${names[i]}`).parent().append(`<p class="error validation-success">Todo bien!</p>`);
    }
}

// Handle AJAX on send request
$(document).ajaxSend(function () {
    showProgressBar();
});

// Handle AJAX on complete request
$(document).ajaxComplete(function () {
    hideProgressBar();
});

// Handle document on ready (page load)
$(document).ready(function () {
    hideProgressBar();
});


$(document).on('click', '#add', function() {
    clickAdd();
});