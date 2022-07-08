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
        ajax : "/data-user",
        columnDefs : [
            { responsivePriority: 1, targets: -1 }
        ],
        columns : [
            {data : "id_user"},
            {data : "name"},
            {data : "email"},
            {data : "gender"},
            {data : "date_of_birth"},
            {data : "role"},
            {data : "phone_number"},
            {data : "photo_profile"},
            {data : "created_at"},
            {data : "updated_at"},
            {data : "id_user",
                render: function(data, type, row) {
                    return `<a id="editRoom" class=" btn btn-md btn-success" data-id='`+data +`' style="color: white;"> Edit</a>
                            <a id="deleteRoom" class=" btn btn-md btn-danger" data-id='`+data +`' style="color: white;"> Delete</a>`;
                }
            },
        ]
    });

    $('#addUser').click(function(){
        $('#formAddUser').trigger('reset');
        $('#modalUser').modal('show');
        $('#id_user').val('');
    });

    $(document).on('click', '#editRoom', function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        
        $.get('/get-user/'+id, function(data){
            $('#modalUser').modal('show');
            $('#id_user').val(data.id_user);
            $('#name').val(data.name);
            $('#email').val(data.email);            
            $('#gender').val(data.gender);
            $('#date_of_birth').val(data.date_of_birth);
            $('#role').val(data.role);
            $('#phone_number').val(data.phone_number);
            $('#photo_profile').val(data.photo_profile);
        });
    });

    $(document).on('click', '#closeButton', function(e){
        e.preventDefault();
        $('#formAddUser').trigger("reset");
    });

    $('#submitButton').click(function(e){
        e.preventDefault();
        
        var formData = {
            id_user: $('#id_user').val(),
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            gender: $('#gender').val(),
            date_of_birth: $('#date_of_birth').val(),
            role: $('#role').val(),
            phone_number: $('#phone_number').val(),
            photo_profile: $('#photo_profile').val(),
        }

        if(formData.id_user){
            $.ajax({
                data: formData,
                url: "update-user/"+formData.id_user,
                type: "PUT",
                dataType: "json",
                success : function(data){
                    $('#formAddUser').trigger("reset");
                    $('#modalUser').trigger("reset");
                    $('#modalUser').modal('hide');
                    $('#key-act-button').DataTable().ajax.reload();
                    Swal.fire("Successfull", data.message, "success");
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formAddUser').trigger("reset");
                    $('#modalUser').modal('hide');
                    $('#modalUser').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                }
            });
            console.log(formData);
        } else {
            $.ajax({
                data: formData,
                url: "/add-user",
                type: "POST",
                dataType: "json",
                success : function(data){
                    $('#formAddUser').trigger("reset");
                    $('#modalUser').trigger("reset");
                    $('#modalUser').modal("hide");
                    $('#key-act-button').DataTable().ajax.reload();
                    Swal.fire("Successfull", data.message,"success");
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formAddUser').trigger("reset");
                    $('#modalUser').modal('hide');
                    $('#modalUser').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                }
            })
        }
    });

    $(document).on('click', '#deleteRoom', function(e){
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
                    url: '/delete-user/'+id,
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