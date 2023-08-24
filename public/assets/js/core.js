let baseUrl = $("#baseUrl").text();
let currentUrl = $("#currentUrl").text();
let formUrl;

function reloadTable(table)
{
    table.ajax.reload();
}

function add(){
    $('.modal-title').text('Tambah Data');
    $('#btn-submit').text('Tambah');

    formUrl = currentUrl +  '/add';
}

function edit(data){
    $('#id').val(data);
    $('.modal-title').text('Edit Data');
    $('#btn-submit').text('Edit');

    formUrl = currentUrl +  '/edit';
}

function remove(data){
    $('.btn-delete').data('id', data);
}

function formSubmit(url, form, table){
    $.ajax({
        type: "post",
        url: url,
        data: new FormData($(form)[0]),
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (response) {
            toastr.success(response.msg);
            reloadTable(table);
        },
        error: function (response) { 
            toastr.warning(response.msg);
            reloadTable(table);
        }
    });
}

$(document).ready(function () {
    $('select').select2();
});