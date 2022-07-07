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
        ajax : "/data-outlets-facility",
        columnDefs : [
            { responsivePriority: 1, targets: -1 }
        ],
        columns : [
            {data : "id_outlet_facility"},
            {data : "id_outlet"},
            {data : "icon_outlet_facility",
                render: function(data, type, row){
                    return '<img src="' + data + '" height="50" width="50"/>';
                }
            },
            {data : "description_outlet_facility"},
            {data : "created_at"},
            {data : "updated_at"},
            {data : "id_outlet_facility",
                render: function(data, type, row) {
                    return `<a id="editOutletFacility" class=" btn btn-md btn-success" data-id='`+data +`' style="color: white;"> Edit</a>
                            <a id="deleteOutletFacility" class=" btn btn-md btn-danger" data-id='`+data +`' style="color: white;"> Delete</a>`;
                }
            },
        ],
    });

    $('#addOutletFacility').click(function(){
        $('#formAddOutletFacility').trigger('reset');
        $('#modalOutletFacility').modal('show');
        $('#id_outlet_facility').val('');
    });

    $(document).on('click', '#editOutletFacility', function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        $.get('/get-outlets-facility/'+id, function(data){
            $('#modalOutletFacility').modal('show');
            $('#id_outlet_facility').val(data.id_outlet_facility);
            $('#id_outlet').val(data.id_outlet);
            $('#icon_outlet_facility').val(data.icon_outlet_facility);
            $('#description_outlet_facility').val(data.description_outlet_facility);
        });
    });

    $(document).on('click', '#closeButton', function(e){
        e.preventDefault();
        $('#formAddOutletFacility').trigger("reset");
    });

    $('#submitButton').click(function(e){
        e.preventDefault();
        
        var formData = {
            id_outlet_facility: $('#id_outlet_facility').val(),
            id_outlet: $('#id_outlet').val(),
            icon_outlet_facility: $('#icon_outlet_facility').val(),
            description_outlet_facility: $('#description_outlet_facility').val(),
        }

        console.log(formData);

        if(formData.id_outlet_facility){
            $.ajax({
                data: formData,
                url: "update-outlets-facility/"+formData.id_outlet_facility,
                type: "PUT",
                dataType: "json",
                success : function(data){
                    $('#formAddOutletFacility').trigger("reset");
                    $('#modalOutletFacility').trigger("reset");
                    $('#modalOutletFacility').modal('hide');
                    $('#key-act-button').DataTable().ajax.reload();
                    Swal.fire("Successfull", data.message, "success");
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formAddOutletFacility').trigger("reset");
                    $('#modalOutletFacility').modal('hide');
                    $('#modalOutletFacility').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                }
            });
        } else {
            $.ajax({
                data: formData,
                url: "/add-outlets-facility",
                type: "POST",
                dataType: "json",
                success : function(data){
                    $('#formAddOutletFacility').trigger("reset");
                    $('#modalOutletFacility').trigger("reset");
                    $('#modalOutletFacility').modal("hide");
                    $('#key-act-button').DataTable().ajax.reload();
                    Swal.fire("Successfull", data.message,"success");
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formAddOutletFacility').trigger("reset");
                    $('#modalOutletFacility').modal('hide');
                    $('#modalOutletFacility').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                }
            })
        }
    });

    $(document).on('click', '#deleteOutletFacility', function(e){
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
                    url: '/delete-outlets-facility/'+id,
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