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
            $('#address').val(response.address);
            $('#contact').val(response.contact);
            $('#instagram').val(response.instagram);
            $('#embed_address').text(response.embed_address);
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