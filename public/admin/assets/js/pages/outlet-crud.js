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
        ajax : "data-outlets",
        columnDefs : [
            { responsivePriority: 1, targets: -1 }
        ],
        columns : [
            {data : "id_outlet"},
            {data : "outlet_name"},
            {data : "outlet_location_latitude"},
            {data : "outlet_location_longitude"},
            {data : "opening_hours"},
            {data : "closing_hours"},
            {data : "outlet_phone"},
            {data : "instagram_link"},
            {data : "price_outlet_per_hour"},
            {data : "created_at"},
            {data : "updated_at"},
            {data : "id_outlet",
                render: function(data, type, row) {
                    return `<a id="editOutlet" class=" btn btn-md btn-success" data-id='`+data +`' style="color: white;"> Edit</a>
                            <a id="deleteOutlet" class=" btn btn-md btn-danger" data-id='`+data +`' style="color: white;"> Delete</a>`;
                }
            },
        ]
    });

    $('#addOutlet').click(function(){
        $('#formAddOutlet').trigger('reset');
        $('#modalOutlet').modal('show');
        $('#id_outlet').val('');
    });

    $(document).on('click', '#editOutlet', function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        $.get('/get-outlets/'+id, function(data){
            $('#modalOutlet').modal('show');
            $('#outlet_name').val(data.outlet_name);
            $('#outlet_location_latitude').val(data.outlet_location_latitude);
            $('#outlet_location_longitude').val(data.outlet_location_longitude);
            $('#opening_hours').val(data.opening_hours);
            $('#closing_hours').val(data.closing_hours);
            $('#outlet_phone').val(data.outlet_phone);
            $('#instagram_link').val(data.instagram_link);
            $('#price_outlet_per_hour').val(data.price_outlet_per_hour);
        });
    });

    $(document).on('click', '#closeButton', function(e){
        e.preventDefault();
        $('#formAddOutlet').trigger("reset");
    });

    $('#submitButton').click(function(e){
        e.preventDefault();
        
        var formData = {
            id_outlet: $('#id_outlet').val(),
            outlet_name: $('#outlet_name').val(),
            outlet_location_latitude: $('#outlet_location_latitude').val(),
            outlet_location_longitude: $('#outlet_location_longitude').val(),
            opening_hours: $('#opening_hours').val(),
            closing_hours: $('#closing_hours').val(),
            outlet_phone: $('#outlet_phone').val(),
            instagram_link: $('#instagram_link').val(),
            price_outlet_per_hour: $('#price_outlet_per_hour').val(),
        }

        console.log(formData);

        if(formData.id_outlet){
            $.ajax({
                data: formData,
                url: "update-outlets/"+formData.id_outlet,
                type: "PUT",
                dataType: "json",
                success : function(data){
                    $('#formAddOutlet').trigger("reset");
                    $('#modalOutlet').trigger("reset");
                    $('#modalOutlet').modal('hide');
                    $('#key-act-button').DataTable().ajax.reload();
                    Swal.fire("Successfull", data.message, "success");
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formAddOutlet').trigger("reset");
                    $('#modalOutlet').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                }
            });
        } else {
            $.ajax({
                data: formData,
                url: "/add-outlets",
                type: "POST",
                dataType: "json",
                success : function(data){
                    $('#formAddOutlet').trigger("reset");
                    $('#modalOutlet').trigger("reset");
                    $('#modalOutlet').modal("hide");
                    $('#key-act-button').DataTable().ajax.reload();
                    Swal.fire("Successfull", data.message,"success");
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formAddOutlet').trigger("reset");
                    $('#modalOutlet').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                }
            })
        }
    });

    $(document).on('click', '#deleteOutlet', function(e){
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
                    url: '/delete-outlets/'+id,
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