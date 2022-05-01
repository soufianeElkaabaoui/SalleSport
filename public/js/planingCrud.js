//Remplissage
let mapp_Time_GridLine =
{
    "08:00:00":2,
    "08:30:00":3,
    "09:00:00":4,
    "09:30:00":5,
    "10:00:00":6,
    "10:30:00":7,
    "11:00:00":8,
    "11:30:00":9,
    "12:00:00":10,
    "12:30:00":11,
    "13:00:00":12,
    "13:30:00":13,
    "14:00:00":14,
    "14:30:00":15,
    "15:00:00":16,
    "15:30:00":17,
    "16:00:00":18,
    "16:30:00":19,
    "17:00:00":20,
    "17:30:00":21,
    "18:00:00":22,
    "18:30:00":23,
    "19:00:00":24,
    "19:30:00":25,
    "20:00:00":26,
    "20:30:00":27,
    "21:00:00":28,
    "21:30:00":29,
    "22:00:00":30,
    "22:30:00":21,
    "23:00:00":32,
    "23:30:00":33,
    "00:00:00":34
}

$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
})
// Clear DATA From Inputs
function ClearInput() {
    $("#date-planing").val('');
    $("#start-time").val('');
    $("#end-time").val('');
    $("#id-Cour").val('');
    $("#idSalle").val('');
    $("#idCoach").val('');
}
$("#btn_save").show();
$("#btn_update").hide();
//---------------------Start Get All Planings---------------------
function getAllPlaning() {
    $.ajax({
        type: "GET",
        url: "/planing/all",
        success: function (response) {
            var num = 1;
            var data=""
            $.each(response, function (key,value) {
                data=data+"<tr>"
                data=data+"<td>"+num+"</td>"
                data=data+"<td>"+value.date_seance+"</td>"
                data=data+"<td>"+value.start_time+"</td>"
                data=data+"<td>"+value.end_time+"</td>"
                data=data+"<td>"+value.Cnom+"</td>"
                data=data+"<td>"+value.SNom+"</td>"
                data=data+"<td>"+value.nomCoach+"</td>"
                data=data+"<td>"
                    data=data+'<span class="status delivered"><a onclick="EditPlanings('+value.idPlaning+')"><ion-icon name="create-outline"></ion-icon></a></span>'
                    data=data+'<span class="status return"><a onclick="DeletePlaning('+value.idPlaning+')"><ion-icon name="trash-outline"></ion-icon></a></span>'
                data=data+"</td>"
                data=data+"</tr>"
                num++
            });
            $('#all-planings').html(data);
        }
    })
}
getAllPlaning()
//---------------------END Get All Planings-----------------------
//---------------------Start Add Planing-----------------------

function AddPlaning() {
    var datePlaning = $("#date-planing").val();
    var startTime = $("#start-time").val();
    var endTime = $("#end-time").val();
    var idCour = $("#id-Cour").val();
    var idSalle = $("#idSalle").val();
    var idCoach = $("#idCoach").val();
    $.ajax({
        type: "POST",
        url: "/planing/add_planing/",
        data: {
            date:datePlaning,
            start:startTime,
            endT:endTime,
            Cour:idCour,
            salle:idSalle,
            coach:idCoach
        },
        dataType: "json",
        success: function(response){
            ClearInput();
            getAllPlaning();
            //start alert
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Séance has been added successfuly',
                showConfirmButton: false,
                timer: 1500
            })
            //end alert
            },
            //detecter errors
            error:function(error){
                console.log(error.responseJSON.errors);
               //$("#date-planing_error").text(error.responseJSON.errors.datePlaning);
                // $("#start-time_error").text(error.responseJSON.errors.startTime);
                // $("#end-time_error").text(error.responseJSON.errors.endTime);
                // $("#id-Cour_error").text(error.responseJSON.errors.idCour);
                // $("#idSalle_error").text(error.responseJSON.errors.idSalle);
                // $("#idCoach_error").text(error.responseJSON.errors.idCoach);
            }
    });
}


//---------------------END Add Planing-----------------------
//---------------------Start Afficher Planing Selectionner---------------------
function EditPlanings(id) {
    $.ajax({
        type: "GET",
        url: "/planing/editPlaning/"+id,
        dataType: "json",
        success: function (response) {
            $("#id-planing").val(response.id);
            $("#date-planing").val(response.date_seance);
            $("#start-time").val(response.start_time);
            $("#end-time").val(response.end_time);
            $("#id-Cour").val(response.idCour);
            $("#idSalle").val(response.idSalle);
            $("#idCoach").val(response.idUser);
            $("#btn_save").hide();
            $("#btn_update").show();
        }
    });
   }
//---------------------END Afficher Planing Selectionner-----------------------

//---------------------Start Edit Planing Selectionner-------------------
function UpdatePlaning() {
    var id = $("#id-planing").val();
    var datePlaning = $("#date-planing").val();
    var startTime = $("#start-time").val();
    var endTime = $("#end-time").val();
    var idCour = $("#id-Cour").val();
    var idSalle = $("#idSalle").val();
    var idCoach = $("#idCoach").val();
  $.ajax({
      type: "POST",
      url: "/planing/updatePlaning/"+id,
      data: {
        date:datePlaning,
        start:startTime,
        endT:endTime,
        Cour:idCour,
        salle:idSalle,
        coach:idCoach
      },
      dataType: "json",
      success: function (response) {
        ClearInput();
        getAllPlaning();
          $("#btn_save").show();
          $("#btn_update").hide();
             //start alert
             Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Planing bien modifier',
          showConfirmButton: false,
          timer: 1500
      })
      //end alert
      },
      //detecter errors
      error:function(error){
        // console.log(error.responseJSON.errors.nom);
        //$("#date-planing_error").text(error.responseJSON.errors.datePlaning);
        // $("#start-time_error").text(error.responseJSON.errors.startTime);
        // $("#end-time_error").text(error.responseJSON.errors.endTime);
        // $("#id-Cour_error").text(error.responseJSON.errors.idCour);
        // $("#idSalle_error").text(error.responseJSON.errors.idSalle);
        // $("#idCoach_error").text(error.responseJSON.errors.idCoach);
      }
  })
}
//---------------------End Edit Planing Selectionner---------------------
//---------------------Start Delete Planing-----------------------
function DeletePlaning(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
    });

    swalWithBootstrapButtons
        .fire({
            title: "Are you sure?",
            text: "Vous voullez vraiment supprimer cette séance",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Oui, supprimer le!",
            cancelButtonText: "No, annuler!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: "/planing/deletePlaning/" + id,
                    dataType: "json",
                    success: function (response) {
                        $("#btn_save").show();
                        $("#btn_update").hide();
                        ClearInput();
                        getAllPlaning();
                    },
                });
                swalWithBootstrapButtons.fire(
                    "Suppression effectuer avec succes!",
                    "Séance selectionner est supprimer.",
                    "success"
                );
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    "Annuler",
                    "Vous avez annuler l'opération :)",
                    "error"
                );
            }
        });
}
  //---------------------End Delete Planing-----------------------

// Remplissage du select box par les horaire
const selectStartTime = document.getElementById('start-time');
const selectEndTime = document.getElementById('end-time');

$(document).ready(function($){
    for (const key in mapp_Time_GridLine) {
        const element = mapp_Time_GridLine[key];
        selectStartTime.innerHTML += "<option value="+key+">"+key+"</option>";
        selectEndTime.innerHTML += "<option value="+key+">"+key+"</option>";
    }
});

//---------------------Start Show Planing du semaine ---------------------
function getPlaningHebdo() {
    $.ajax({
        type: "GET",
        url: "/planing/hebdo",
        success: function (response) {
            var num = 1;
            var data=""
            $.each(response, function (key,value) {
                data=data+"<tr>"
                data=data+"<td>"+num+"</td>"
                data=data+"<td>"+value.date_seance+"</td>"
                data=data+"<td>"+value.start_time+"</td>"
                data=data+"<td>"+value.end_time+"</td>"
                data=data+"<td>"+value.Cnom+"</td>"
                data=data+"<td>"+value.SNom+"</td>"
                data=data+"<td>"+value.nomCoach+" "+value.prenomCoach+"</td>"
                data=data+"</tr>"
                num++
            });
            $('#planing-hebdo').html(data);
        }
    })
}
getPlaningHebdo()
//---------------------END Show Planing du semaine -----------------------
