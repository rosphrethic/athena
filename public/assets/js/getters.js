let baseUrl = "/global/getAll";

// Nationalities
function loadSelectNationality() {
    $.ajax({
            type: "GET",
            url: `${baseUrl}/nationalities`
        })
        .done(function (data) {
            $.each(data, function (key, nationality) {
                $("#nationality_id").append(
                    `<option value='${nationality.id}'>${nationality.name}</option>`
                );
            });

        })
        .fail(function (data) {
            alert(
                "Ocurrió un error interno, comuníquese con el administrador de sistemas"
            );
        });
}

// Cities
function loadSelectCity() {
    $.ajax({
            type: "GET",
            url: `${baseUrl}/cities`
        })
        .done(function (data) {
            $.each(data, function (key, city) {
                $("#city_id").append(
                    `<option value='${city.id}'>${city.name}</option>`
                );
            });

        })
        .fail(function (data) {
            alert(
                "Ocurrió un error interno, comuníquese con el administrador de sistemas"
            );
        });
}

// Baccalaureates
function loadSelectBaccalaureate() {
    $.ajax({
            type: "GET",
            url: `${baseUrl}/baccalaureates`
        })
        .done(function (data) {
            $("#baccalaureate_id").empty().append(`
            <option disabled selected value="">Seleccione un bachillerato</option>
        `);

            $.each(data, function (key, baccalaureate) {
                $("#baccalaureate_id").append(`
                <option value='${baccalaureate.id}'>${baccalaureate.acronym} - ${baccalaureate.name}</option>
            `);
            });

        })
        .fail(function (data) {
            alert(
                "Ocurrió un error interno, comuníquese con el administrador de sistemas"
            );
        });
}

// Sections
function loadSelectSection() {
    $.ajax({
            type: "GET",
            url: `${baseUrl}/sections`
        })
        .done(function (data) {
            $.each(data, function (key, section) {
                $("#section_id").append(
                    `<option value='${section.id}'>${section.name}</option>`
                );
            });

        })
        .fail(function () {
            fail();
        });
}

// Grades
function loadSelectGrade() {
    $.ajax({
            type: "GET",
            url: `${baseUrl}/grades`
        })
        .done(function (data) {
            $.each(data, function (key, grade) {
                $("#grade_id").append(
                    `<option value='${grade.id}|${grade.has_baccalaureate}'>${grade.name} ${grade.name_alternative}</option>`
                );
            });
        })
        .fail(function () {
            fail();
        });
}

// Guardians
function loadSelectGuardian() {
    $.ajax({
            type: "GET",
            url: `${baseUrl}/guardians`
        })
        .done(function (data) {
            $.each(data, function (key, guardian) {
                $("#guardian_id").append(
                    `<option value='${guardian.id}'>${guardian.document_number} - ${guardian.name} ${guardian.lastname}</option>`
                );
            });

        })
        .fail(function () {
            fail();
        });
}

// Roles
function loadSelectRole() {
    $.ajax({
        type: "GET",
        url: `${baseUrl}/roles`
    }).done(function (data) {

        $.each(data, function (key, role) {
            $(".role_id").append(`<option value='${role.id}'>${role.name}</option>`);
        });

        $("select>option").each(function () {
            var $option = $(this);

            $option.siblings()
                .filter(function () {
                    return $(this).val() == $option.val()
                })
                .remove()
        });

        hideProgressBar();
    }).fail(function (data) {
        fail();
    });
}

// Company Data
function loadCompanyData() {
    $.ajax({
        type: "GET",
        url: `${baseUrl}/company-data`,
        data: {
            id: 1
        },
    }).done(function (data) {
        $("#company-data-img").attr("src", ``);
        $("#topbar-company-data-img").attr("src", ``);

        $('#form')[0].reset();
        $('#id').val(data.id);
        $('#name').val(data.name);
        $('#name_administration').val(data.name_administration);
        $('#slogan').val(data.slogan);
        $('#founder').val(data.founder);
        $('#foundation_date').val(data.foundation_date);
        $("#company-data-img").attr("src", `/storage/emblem/${data.emblem}`);
        $("#topbar-company-data-img").attr("src", `/storage/emblem/${data.emblem}`);
        $("#topbar-company-data-img2").attr("src", `/storage/emblem/${data.emblem}`);
    }).fail(function () {
        fail();
    });
}

// Requirements
function loadSelectRequirement() {
    $.ajax({
            type: "GET",
            url: `${baseUrl}/requirements`
        })
        .done(function (data) {
            $.each(data, function (key, requirement) {
                $("#requirement_id").append(
                    `<option value='${requirement.id}'>${requirement.name}</option>`
                );
            });

        })
        .fail(function () {
            fail();
        });
}

// Courses
function loadSelectCourse() {
    $.ajax({
            type: "GET",
            url: `${baseUrl}/courses`
        })
        .done(function (data) {
            $.each(data, function (key, course) {
                $("#course_id, .course_id").append(
                    `<option value='${course.id}'>${course.grade.name} "${course.section.name}" Turno ${course.shift} | ${course.baccalaureate ? course.baccalaureate.acronym : ''}</option>`
                );
            });

        })
        .fail(function () {
            fail();
        });
}

// Years
function loadSelectYear() {
    $.ajax({
            type: "GET",
            url: `${baseUrl}/years`
        })
        .done(function (data) {
            $.each(data, function (key, year) {
                $("#year").append(
                    `<option value='${year.year}'>${year.year}</option>`
                );
            });

        })
        .fail(function () {
            fail();
        });
}