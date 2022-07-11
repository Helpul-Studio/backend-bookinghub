$(document).ready(function() {
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    //crud ajaxSetup
    $('#key-act-button').DataTable({
        // dom: 'Bfrtip',
        // buttons: [
        //     'copyHtml5',
        //     'excelHtml5',
        //     'csvHtml5',
        //     'pdfHtml5'
        // ],
        processing: true,
        lengthMenu : [10,50,100],
        ajax : "data-outlets-image",
        columnDefs : [
            { responsivePriority: 1, targets: -1 }
        ],
        columns : [
            {data : "id_image_outlet"},
            {data : "outlet.outlet_name"},
            {data : "photo_outlet",
                render: function(data){
                    return '<img src="' + data + '" height="50" width="50"/>';
                }
            },
            {data : "created_at"},
            {data : "updated_at"},
            {data : "id_image_outlet",
                render: function(data, type, row) {
                    return `<a id="editOutletImage" class=" btn btn-md btn-success" data-id='`+data +`' style="color: white;"> Edit</a>
                            <a id="deleteOutletImage" class=" btn btn-md btn-danger" data-id='`+data +`' style="color: white;"> Delete</a>`;
                }
            },
        ]
    });

    $('#addOutletImage').click(function(){
        $('#formAddOutletImage').trigger('reset');
        $('#modalOutletImage').modal('show');
        $('#id_image_outlet').val('');
    });

    $(document).on('click', '#editOutletImage', function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        $.get('/get-outlets-image/'+id, function(data){
            $('#modalOutletImage').modal('show');
            $('#id_image_outlet').val(data.id_image_outlet);
            $('#id_outlet').val(data.id_outlet);
        });
    });

    $(document).on('click', '#closeButton', function(e){
        e.preventDefault();
        $('#formAddOutletImage').trigger("reset");
    });

    $('#submitButton').click(function(e){
        e.preventDefault();
        
        var formData = {
            data: new FormData(document.getElementById('formAddOutletImage')),
            id_image_outlet: $('#id_image_outlet').val(),
            id_outlet: $('#id_outlet').val(),
        }

        if(formData.id_image_outlet){
            formData.data.append('_method', 'PUT'),
            $.ajax({
                processData: false,
                contentType: false,
                data: formData.data,
                url: "update-outlets-image/"+formData.id_image_outlet,
                type: "POST",
                dataType: "json",
                success : function(data){
                    $('#formAddOutletImage').trigger("reset");
                    $('#modalOutletImage').trigger("reset");
                    $('#modalOutletImage').modal('hide');
                    $('#key-act-button').DataTable().ajax.reload();
                    Swal.fire("Successfull", data.message, "success");
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formAddOutletImage').trigger("reset");
                    $('#modalOutletImage').modal('hide');
                    $('#modalOutletImage').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                }
            });
        } else {
            $.ajax({
                processData: false,
                contentType: false,
                data: formData.data,
                url: "/add-outlets-image",
                type: "POST",
                dataType: "json",
                success : function(data){
                    $('#formAddOutletImage').trigger("reset");
                    $('#modalOutletImage').trigger("reset");
                    $('#modalOutletImage').modal("hide");
                    $('#key-act-button').DataTable().ajax.reload();
                    Swal.fire("Successfull", data.message,"success");
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formAddOutletImage').trigger("reset");
                    $('#modalOutletImage').modal('hide');
                    $('#modalOutletImage').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                }
            })
        }
    });

    $(document).on('click', '#deleteOutletImage', function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        Swal.fire({
            title: "You want to delete this data?",
            type: "warning",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
            cancelButtonText: "No"
        }).then((result)=> {
            if(result.value){
                $.ajax({
                    url: '/delete-outlets-image/'+id,
                    type: "DELETE",
                    success : function(data){
                        if(data.status === true){
                            $('#key-act-button').DataTable().ajax.reload();
                            Swal.fire("Successfull", data.message, "success");
                        } else {
                            Swal.fire("Wrong request", data.message, "error");
                        }
                    }
                });
            } else if(result.dismiss){
                Swal.fire("Canceled", "Your data is safe", "error");
            }
        });
    });

});