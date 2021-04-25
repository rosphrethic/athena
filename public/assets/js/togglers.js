// Toggle containers
function toggleContainerVisibility(toShow, toHide) {
    toShow.forEach(element => {
        $(`#${element}`).show(500);
    });

    toHide.forEach(element => {
        $(`#${element}`).hide(500);
        if ($(`#${element.replace("container_", "")}`).is("select")) {
            $(`#${element.replace("container_", "")}`)
                .val("")
                .change();
        } else {
            $(`#${element.replace("container_", "")}`).val("");
        }
    });
}

// Toggle columns
function toggleColumnVisibility(columns) {
    $("#columns").empty();

    columns.forEach(element => {
        $("#columns").append(`
            <li class="list-group-item">
                <div class="form-check">
                    <input name="${
                        element[0]
                    }" class="form-check-input" type="checkbox" 
                        ${
                            element[0] == "column_created_at" ||
                            element[0] == "column_updated_at" ||
                            element[0] == "column_status"
                                ? ""
                                : "checked"
                        }>
                    <label class="form-check-label" for="${element[0]}">${
            element[1]
        }</label>
                </div>
            </li>
        `);
    });
}

// Reset form
function resetForm() {
    $("#form")[0].reset();
}

// Reset ID
function resetId() {
    $("#id").val("");
}

// Reset selects
function resetSelects() {
    $(".select2-r")
    .val("")
    .change();
}

// Hide error messages
function hideErrorsMessages() {
    $(".error").remove();
}

// Toggle progress bar
function showProgressBar() {
    $(".progress-bar-container").fadeIn();
}

function hideProgressBar() {
    $(".progress-bar-container, .blank-container").fadeOut();
}

// Toggle Modal
function toggleModal() {
    $("#modal").modal("toggle");
}

function hideModal() {
    $("#modal, .modal-backdrop").fadeOut();
}

// Toggle hidden inputs (status, created at, updated at)
function hideHiddenInputs() {
    $(".input-hidden").hide();
}

function showHiddenInputs() {
    $(".input-hidden").show();
}

// Toggle password
function showPassword() {
    $("#password")
        .parent()
        .parent()
        .show();
}

function hidePassword() {
    $("#password")
        .parent()
        .parent()
        .hide();
}

// Toggle reset attempts
function showResetAttempts() {
    $("#reset-attempts").show();
}

function hideResetAttempts() {
    $("#reset-attempts").hide();
}

// Toggle reset verified
function showResetVerified() {
    $("#reset-verified").show();
}

function hideResetVerified() {
    $("#reset-verified").hide();
}

// Toggle reactivate
function showReactivate() {
    $("#reactivate").show();
}

function hideReactivate() {
    $("#reactivate").hide();
}

// Toggle deactivate
function showDeactivate() {
    $("#deactivate").show();
}

function hideDeactivate() {
    $("#deactivate").hide();
}

// Toggle save
function showSave() {
    $("#save").show();
}

function hideSave() {
    $("#save").hide();
}

// Toggle save
function showClose() {
    $("#close").show();
}

function hideClose() {
    $("#close").hide();
}

// Toggle delete
function showDelete() {
    $("#delete").show();
}

function hideDelete() {
    $("#delete").hide();
}

// Toggle anull
function showAnull() {
    $("#anull").show();
}

function hideAnull() {
    $("#anull").hide();
}

// Toggle all buttons
function hideButtons() {
    hideResetAttempts();
    hideResetVerified();
    hideDeactivate();
    hideReactivate();
    hideDelete();
    hideAnull();
    hideClose();
    hideSave();
    hideCurriculum();
    hideOpen();
}

function showButtons() {
    showResetAttempts();
    showResetVerified();
    showDeactivate();
    showReactivate();
    showDelete();
    showAnull();
    showClose();
    showSave();
    showCurriculum();
    showOpen();
}

// Toggle baccalaureates
function showBaccalaureate() {
    $("#container_baccalaureate").show();
}

function hideSelectBaccalaureate() {
    $("#container_baccalaureate").hide();
}

// Disable inputs
function enableInputs() {
    $("#form :input").prop("disabled", false);
}

function disableInputs() {
    $("#form :input").prop("disabled", true);
}

// Toggle curriculum
function showCurriculum() {
    $("#curriculum").show();
}

function hideCurriculum() {
    $("#curriculum").hide();
}

// Toggle open
function showOpen() {
    $("#open").show();
}

function hideOpen() {
    $("#open").hide();
}