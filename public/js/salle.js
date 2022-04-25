$("#btn_save").show();
$("#btn_update").hide();
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
})

//---------------------Start Clear data----------------------- 
function ClearData() {
    $("#nom-input").val('');
   $("#capacity-input").val('');
   $("#nom_error").text('');
    $("#capacity_error").text('');
  }
  //---------------------ENd clear  data----------------------- 
  //---------------------Start afficher Salle----------------------- 
  
function AllSalle() {
$.ajax({
   type: "GET",
   url: "/salle/all",
   dataType: "json",
   success: function (response) {
       var data=""
       $.each(response, function (key, value) { 
           data=data+"<tr>"
           data=data+"<td>"+value.id+"</td>"
           data=data+"<td>"+value.nom+"</td>"
           data=data+"<td>"+value.capacity+"</td>"
           data=data+"<td>"
            data=data+'<span class="status delivered"><a onclick="EditSalle('+value.id+')"><ion-icon name="create-outline"></ion-icon></a></span>'
            data=data+'<span class="status return"><a onclick=" DeleteSalle('+value.id+')"><ion-icon name="trash-outline"></ion-icon></a></span>'
           data=data+"</td>"
           data=data+"</tr>"
       });
       $('tbody').html(data);
   }
});
 }
AllSalle();
//---------------------end afficher Salle----------------------- 

//---------------------Start Add Salle----------------------- 
 function AddSalle() {
    var nom =$("#nom-input").val();
    var capacity =$("#capacity-input").val();
    $.ajax({
        type: "POST",
        url: "/salle/Add_Salle/",
        data: {
            nom:nom,
            capacity:capacity
        },
        dataType: "json",
        success: function (response) {
            ClearData();
            AllSalle();
            //start alert
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Salle has been added successfuly',
            showConfirmButton: false,
            timer: 1500
        })
        //end alert
        },
        //detecter errors
        error:function(error){
            // console.log(error.responseJSON.errors.nom);
            $("#nom_error").text(error.responseJSON.errors.nom);
            $("#capacity_error").text(error.responseJSON.errors.capacity);
        }
    });
  }
  //---------------------end afficher Salle----------------------- EditSalle
  //---------------------Start Edite Salle----------------------- EditSalle
  function EditSalle(id) {
     $.ajax({
         type: "GET",
         url: "/salle/editSalle/"+id,
         dataType: "json",
         success: function (response) {
             $("#idSalle").val(response.id);
            $("#nom-input").val(response.nom);
            $("#capacity-input").val(response.capacity);
            $("#btn_save").hide();
            $("#btn_update").show();
         }
     });
    }
  //---------------------end Edite Salle----------------------- EditSalle
  function UpdateSalle() {
      debugger
    var id =$("#idSalle").val();
    var nom =$("#nom-input").val();
    var capacity =$("#capacity-input").val();
    $.ajax({
        type: "POST",
        url: "/salle/Update_Salle/"+id,
        data: {
            nom:nom,
            capacity:capacity
        },
        dataType: "json",
        success: function (response) {
            ClearData();
            AllSalle();
            $("#btn_save").show();
            $("#btn_update").hide();
               //start alert
               Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Salle has been Updated with successfuly',
            showConfirmButton: false,
            timer: 1500
        })
        //end alert
        },
        //detecter errors
        error:function(error){
            // console.log(error.responseJSON.errors.nom);
            $("#nom_error").text(error.responseJSON.errors.nom);
            $("#capacity_error").text(error.responseJSON.errors.capacity);
        }
    })
}
//---------------------Start Delete Salle----------------------- EditSalle
function DeleteSalle(id) {
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
                    url: "/salle/DeleteSalle/"+id,
                    dataType: "json",
                    success: function (response) {
                        $("#btn_save").show();
                        $("#btn_update").hide();
                    
                        ClearData();
                        AllSalle();
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