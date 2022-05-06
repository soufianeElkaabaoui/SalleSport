
$("#save").show();
$("#update").hide();
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
})

//---------------------Start Clear data-----------------------
function ClearData() {
    $("#nom").val('');
   $("#prenom").val('');
   $("#email").val('');
   $("#nom_error_coach").text('');
    $("#prenom_error_coach").text('');
    $("#email_error_coach").text('');
  }
  //---------------------ENd clear  data-----------------------
  //---------------------Start afficher Coach-----------------------

function AllCoaches() {
$.ajax({
   type: "GET",
   url: "/coach/all_Coaches",
   dataType: "json",
   success: function (response) {
       var data=""
       $.each(response, function (key, value) {
           data=data+"<tr>"
           data=data+"<td>"+value.id+"</td>"
           data=data+"<td>"+value.nom+"</td>"
           data=data+"<td>"+value.prenom+"</td>"
           data=data+"<td>"+value.email+"</td>"
           data=data+"<td>"
            data=data+'<span class="status delivered"><a onclick="EditCoach('+value.id+')"><ion-icon name="create-outline"></ion-icon></a></span>'
            data=data+'<span class="status return"><a onclick=" DeleteCoach('+value.id+')"><ion-icon name="trash-outline"></ion-icon></a></span>'
           data=data+"</td>"
           data=data+"</tr>"
       });
       $('tbody').html(data);
   }
});
 }
 AllCoaches();
//---------------------end afficher Coach-----------------------

//---------------------Start Add Coach-----------------------
 function AddCoach() {
    var nom =$("#nom").val();
    var prenom =$("#prenom").val();
    var email =$("#email").val();
    $.ajax({
        type: "POST",
        url: "/coach/Add_Coach/",
        data: {
            nom:nom,
            prenom:prenom,
            email:email
        },
        dataType: "json",
        success: function (response) {
            ClearData();
            AllCoaches();
            //start alert
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Coach has been added successfuly',
            showConfirmButton: false,
            timer: 1500
        })
        //end alert
        },
        //detecter errors
        error:function(error){
            // console.log(error.responseJSON.errors.nom);
            $("#nom_error_coach").text(error.responseJSON.errors.nom);
            $("#prenom_error_coach").text(error.responseJSON.errors.prenom);
            $("#email_error_coach").text(error.responseJSON.errors.email);

        }
    });
  }
  //---------------------end afficher Coach----------------------- EditCoach
  //---------------------Start Edite Coach----------------------- EditCoach
  function EditCoach(id) {
     $.ajax({
         type: "GET",
         url: "/coach/editCoach/"+id,
         dataType: "json",
         success: function (response) {
             debugger
             $("#id").val(response.id);
            $("#nom").val(response.nom);
            $("#prenom").val(response.prenom);
            $("#email").val(response.email);
			$("#Head").text('Update Coach');
            $("#save").hide();
            $("#update").show();
         }
     });
    }
  //---------------------end Edite Coach----------------------- EditCoach
  function UpdateCoach() {
      debugger
    var id =$("#id").val();
    var nom =$("#nom").val();
    var prenom =$("#prenom").val();
    var email =$("#email").val();
    $.ajax({
        type: "POST",
        url: "/coach/Update_Coach/"+id,
        data: {
            nom:nom,
            prenom:prenom,
            email:email
        },
        dataType: "json",
        success: function (response) {
            ClearData();
            AllCoaches();
            $("#save").show();
            $("#update").hide();
               //start alert
               Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Coach has been Updated with successfuly',
            showConfirmButton: false,
            timer: 1500
        })
        //end alert
        },
        //detecter errors
        error:function(error){
            // console.log(error.responseJSON.errors.nom);
            $("#nom_error_coach").text(error.responseJSON.errors.nom);
            $("#prenom_error_coach").text(error.responseJSON.errors.prenom);
            $("#email_error_coach").text(error.responseJSON.errors.email);
        }
    })
}
//---------------------Start Delete Salle----------------------- EditSalle
function DeleteCoach(id_coach) {
    const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    type: "GET",
                    url: "/coach/DeleteCoach/"+id_coach,
                    dataType: "json",
                    success: function (response) {
                        $("#save").show();
                        $("#update").hide();

                        ClearData();
                        AllCoaches();
                    }
                });
                    swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                    )
                }
                })

    }
  //---------------------end Delete Salle----------------------- EditSalle
