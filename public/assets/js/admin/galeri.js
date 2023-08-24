let form = $("#formDialog");

$(document).ready(function(){
    var table = $('#tbl-data').DataTable({
        responsive: true,
        ajax: {
            url: currentUrl + "/get",
            type: 'POST',
        },
        columns: [{
                name: 'id',
                data: 'id',
                className: 'dt-center',
                render: function (_, _, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
            },
            {
                name: 'name',
                data: 'name',
            },
            {
                name: 'name_about',
                data: 'name_about',
            },
            {
                data: null,
                sortable: false,
                className: 'dt-center',
                render: function (_, _, row) {
                    return `<button class="btn btn-info btn-flat btn-edit" type="button" data-toggle="modal" onclick="edit('${row.id}')" data-target="#modal" data-id="${row.id}">Edit</button>`;
                },
            },
            {
                data: null,
                sortable: false,
                className: 'dt-center',
                render: function (data, _, row) {
                    return `<button onclick="remove('${row.id}')" data-id="${row.id}" type="button" class="btn btn-md btn-danger btn-flat" data-target="#deleteMdl" data-toggle="modal">Hapus</button>`;
                },
            }
        ],
        order: [
            [0, 'desc']
        ],
        pageLength: 10,
        processing: true,
        serverSide: true,
    });

    $(form).validate({
        rules: {
            name: {
                required: true
            },
            type: {
                required: true
            }
        },    
        submitHandler: function(form) {
            formSubmit(formUrl, form, table);
        }
    });

    $('[name="about"]').select2({
        width: 'resolve',
        theme: 'bootstrap4',
        allowClear: true,
        placeholder: 'Masukkan data.....',
        ajax: {
            type: 'POST',
            dataType: 'json',
            url: currentUrl + '/select',
            delay: 800,
            data: function (params) {
                return {
                    search: params.term
                }
            },
            processResults: function (data, page) {
                return {
                    results: data
                };
            },
        }
    });
});

$(document).on('click', '.btn-add', function(){
    $(form)[0].reset();
});

$(document).on('click','.btn-edit', function(){
    var id = $(this).data('id');

    $.ajax({
        type: "POST",
        url: currentUrl + "/data",
        data: {
            id: id
        },
        dataType: "json",
        success: function (response) {
            $('#name').val(response.name);
            $('#description').text(response.description);
            
            var $option = $("<option selected='selected'></option>").val(response.id_about).text(response.txt);
            $("#about").append($option).trigger('change');
        }
    });
});

$(document).on('click', '.btn-delete', function(){
    var id = $(this).data('id');

    $.ajax({
        type: "POST",
        url: currentUrl + "/delete",
        data: {
            id: id
        },
        dataType: "json",
        success: function (response) {
            location.reload();
        }
    });
});