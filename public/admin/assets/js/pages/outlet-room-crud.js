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
        ajax : "data-outlets-room",
        columnDefs : [
            { responsivePriority: 1, targets: -1 }
        ],
        columns : [
            {data : "id_outlet_room"},
            {data : "outlet.outlet_name"},
            {data : "outlet_room_number"},
            {data : "outlet_room_name"},
            {data : "outlet_room_status", 
                render: function(data){
                    if(data === "available"){
                        return "Tersedia"
                    } else {
                        return "Sudah di booking"
                    }
                }
            },
            {data : "id_outlet_room",
                render: function(data, type, row) {
                    return `<a id="editOutletRoom" class=" btn btn-md btn-success" data-id='`+data +`' style="color: white;">Ubah</a>
                            <a id="deleteOutletRoom" class=" btn btn-md btn-danger" data-id='`+data +`' style="color: white;">Hapus</a>`;
                }
            },
        ]
    });

    $('#addOutletRoom').click(function(){
        $('#formAddOutletRoom').trigger('reset');
        $('#modalOutletRoom').modal('show');
        $('#id_outlet_room').val('');
    });

    $(document).on('click', '#editOutletRoom', function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        $.get('/get-outlets-room/'+id, function(data){
            $('#modalOutletRoom').modal('show');
            $('#id_outlet_room').val(data.id_outlet_room);
            $('#id_outlet').val(data.id_outlet);
            $('#outlet_room_number').val(data.outlet_room_number);
            $('#outlet_room_name').val(data.outlet_room_name);
            $('#outlet_room_status').val(data.outlet_room_status);
        });
    });

    $(document).on('click', '#closeButton', function(e){
        e.preventDefault();
        $('#formAddOutletRoom').trigger("reset");
    });

    $('#submitButton').click(function(e){
        e.preventDefault();
        
        var formData = {
            id_outlet_room: $('#id_outlet_room').val(),
            id_outlet: $('#id_outlet').val(),
            outlet_room_number: $('#outlet_room_number').val(),
            outlet_room_name: $('#outlet_room_name').val(),
            outlet_room_status: $('#outlet_room_status').val(),
        }

        if(formData.id_outlet_room){
            $.ajax({
                data: formData,
                url: "update-outlets-room/"+formData.id_outlet_room,
                type: "PUT",
                dataType: "json",
                success : function(data){
                    $('#formAddOutletRoom').trigger("reset");
                    $('#modalOutletRoom').trigger("reset");
                    $('#modalOutletRoom').modal('hide');
                    $('#key-act-button').DataTable().ajax.reload();
                    Swal.fire("Successfull", data.message, "success");
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formAddOutletRoom').trigger("reset");
                    $('#modalOutletRoom').modal('hide');
                    $('#modalOutletRoom').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                }
            });
        } else {
            $.ajax({
                data: formData,
                url: "/add-outlets-room",
                type: "POST",
                dataType: "json",
                success : function(data){
                    $('#formAddOutletRoom').trigger("reset");
                    $('#modalOutletRoom').trigger("reset");
                    $('#modalOutletRoom').modal("hide");
                    $('#key-act-button').DataTable().ajax.reload();
                    Swal.fire("Successfull", data.message,"success");
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formAddOutletRoom').trigger("reset");
                    $('#modalOutletRoom').modal('hide');
                    $('#modalOutletRoom').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                }
            })
        }
    });

    $(document).on('click', '#deleteOutletRoom', function(e){
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
                    url: '/delete-outlets-room/'+id,
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