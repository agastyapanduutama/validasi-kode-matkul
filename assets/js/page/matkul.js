$(document).ready(function() {
    table = $('#list_matkul').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": baseUrl + 'admin/matkul/data',
            "type": "POST",
            "complete": function() {},
            "error": function(error) {
                errorCode(error)
            }
        },

        "columnDefs": [{
                "sClass": "text-center",
                "targets": [0],
                "orderable": false
            },
            {
                "targets": [1],
                "orderable": true
            },
            {
                "targets": [2],
                "orderable": true
            },
            {
                "targets": [3],
                "orderable": true
            },
        ],
        "dom": 'Blfrtip',
        "buttons": [
            'csv', 'excel', 'pdf', 'print'
        ],
    });
})

$('#list_matkul').on('click', '#delete', function() {
    let id = $(this).data('id');
    confirmSweet("Data akan terhapus secara permanen !")
        .then(result => {
            if (result) {
                $.ajax({
                    url: baseUrl + 'admin/matkul/delete/' + id,
                    type: "GET",
                    success: function(result) {
                        response = JSON.parse(result)
                        if (response.status == 'ok') {
                            table.ajax.reload(null, false)
                            msgSweetSuccess(response.msg)
                                // msgSweetSuccess(response.msg)
                        } else {
                            msgSweetWarning(response.msg)
                                // msgSweetError(response.msg)
                        }
                    },
                    error: function(error) {
                        errorCode(error)
                    }
                })
            }
        })
})


$('#list_matkulNa').on('click', '#delete', function() {
    let id = $(this).data('id');
    console.log(id)
    confirmSweet("Data akan terhapus secara permanen !")
        .then(result => {
            if (result) {
                $.ajax({
                    url: baseUrl + 'admin/duplikat/delete/' + id,
                    type: "GET",
                    success: function(result) {
                        response = JSON.parse(result)
                        if (response.status == 'ok') {
                            table.ajax.reload(null, false)
                            msgSweetSuccess(response.msg)
                            location.reload();
                            // msgSweetSuccess(response.msg)
                        } else {
                            location.reload();
                            msgSweetWarning(response.msg)
                                // msgSweetError(response.msg)
                        }
                    },
                    error: function(error) {
                        errorCode(error)
                    }
                })
            }
        })
})


$("#tambahMatkul").submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: baseUrl + "admin/matkul/insert",
        type: "post",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function() {
            // disableButton()
        },
        complete: function() {
            enableButton()
        },
        success: function(result) {
            let response = JSON.parse(result)
            if (response.status == "fail") {
                msgSweetError(response.msg)
            } else {
                table.ajax.reload(null, false)
                msgSweetSuccess(response.msg)
                clearInput($("input"))
            }
        },
        error: function(event) {
            errorCode(event)
        }
    });
})

$("#cekhMatkul").submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: baseUrl + "admin/matkul/cek",
        type: "post",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function() {
            // disableButton()
        },
        complete: function() {
            enableButton()
        },
        success: function(result) {
            let response = JSON.parse(result)
            if (response.status == "fail") {
                msgSweetError(response.msg)
            } else {
                table.ajax.reload(null, false)
                msgSweetSuccess(response.msg)
                clearInput($("input"))
            }
        },
        error: function(event) {
            errorCode(event)
        }
    });
})