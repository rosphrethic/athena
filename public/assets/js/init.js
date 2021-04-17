// CSRF Token
let CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

// Button variables
let btnGenerate = "generate";

// Columns to show in PDF reports
let areaId = ["column_area_id", "Área"];
let nationalityId = ["column_area_id", "Nacionalidad"];
let cityId = ["column_city_id", "Ciudad"];

let name = ["column_name", "Nombre"];
let lastName = ["column_last_name", "Apellido"];
let nameAlternative = ["column_name_alternative", "Nombre Alternativo"];
let documentType = ["column_document_type", "Tipo de Documento"];
let documentNumber = ["column_document_number", "Número de Documento"];
let birthDate = ["column_birth_date", "Fecha de Nacimiento"];
let address = ["column_address", "Dirección de Domicilio"];
let telephone = ["column_telephone", "Teléfono"];
let telephoneAlternative = [
    "column_telephone_alternative",
    "Teléfono Alternativo"
];
let type = ["column_type", "Tipo"];
let acronym = ["column_acronym", "Acrónimo"];
let status = ["column_status", "Estado"];
let createdAt = ["column_created_at", "Fecha de creación"];
let updatedAt = ["column_updated_at", "Fecha de actualización"];

// Container variables from Reports
let containerGenerate = "container_generate";
let containerColumns = "container_columns";

let containerNationalityId = "container_nationality_id";
let containerCityId = "container_city_id";

let containerDocumentType = "container_document_type";
let containerBirthDate = "container_birth_date";
let containerBirthDateFrom = "container_birth_date_from";
let containerBirthDateTo = "container_birth_date_to";
let containerSex = "container_sex";

const SPANISH = {
    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "loadingRecords": "Cargando...",
    "paginate": {
        "next": "Siguiente",
        "previous": "Anterior"
    },
}

// Toastr options
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": 300,
    "hideDuration": 1000,
    "timeOut": 3000,
    "extendedTimeOut": 1000,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}