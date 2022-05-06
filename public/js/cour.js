$("#btn_save_Cour").show();
$("#btn_update_Cour").hide();
$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});
//---------------------Start Clear data-----------------------
function ClearData() {
    $("#Nom_Cour").val("");
    $("#Photo_path").val("");
    $("#selected_photo").attr('src', 'storage/files/no_image.png');
    $("#Nom_error_Cour").text("");
    $("#PhotoPath_error_Cour").text("");
}
//---------------------ENd clear  data-----------------------
//---------------------Start afficher Coach-----------------------

function AllCours() {
    $.ajax({
        type: "GET",
        url: "/cours/All_Cours",
        dataType: "json",
        success: function (response) {
            var data = "";
            $.each(response, function (key, value) {
                data = data + "<tr>";
                data = data + "<td>" + value.id + "</td>";
                data = data + "<td>" + value.nom + "</td>";
                data =
                    data +
                    "<td><img src='storage/files/"+value.photopath+
                    "' style='width: 80;width: 80px;height: 80px;border-radius: 50%;'></td>";
                data = data + "<td>";
                data =
                    data +
                    '<span class="status delivered"><a onclick="EditCour(' +
                    value.id +
                    ')"><ion-icon name="create-outline"></ion-icon></a></span>';
                data =
                    data +
                    '<span class="status return"><a onclick=" DeleteCour(' +
                    value.id +
                    ')" ><ion-icon name="trash-outline"></ion-icon></a></span>';
                data = data + "</td>";
                data = data + "</tr>";
            });
            $("tbody").html(data);
        },
    });
}
AllCours();
//---------------------end afficher Coach-----------------------

//---------------------Start Add Coach-----------------------
// $("#image-upload").submit(function (e) {
//     e.preventDefault();
//     debugger;
// var formData = new FormData(this);
//     Add_Cour(formData);

// });
$("#btn_save_Cour").on("click", function (event) {
    event.preventDefault();
    postedForm = $(this).parents("form");
    debugger;
    console.log(postedForm);
    var formData = new FormData(postedForm[0]);
    Add_Cour(formData);
});
$("#btn_update_Cour").on("click", function (event) {
    event.preventDefault();
    postedForm = $(this).parents("form");
    debugger;
    console.log(postedForm);
    var formData = new FormData(postedForm[0]);
    UpdateCour(formData);
});
function Add_Cour(formdata) {
    $.ajax({
        type: "POST",
        url: "/cours/Add_Cour/",
        data: formdata,
        cache: false,
        async: false,
        contentType: false,
        processData: false,
        success: (data) => {
            debugger
            ClearData();
            AllCours();
            //start alert
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Course  has been added successfuly",
                showConfirmButton: false,
                timer: 1500,
            });
            //end alert
        },
    });
}
//---------------------end afficher Coach----------------------- EditCoach
//---------------------Start Edite Coach----------------------- EditCoach
function EditCour(id) {
    // debugger;
    $.ajax({
        type: "GET",
        url: "/cours/editCour/" + id,
        dataType: "json",
        success: function (response) {
            // debugger;
            $("#idCours").val(response.id);
            $("#Nom_Cour").val(response.nom);
            $("#selected_photo").attr('src', 'storage/files/' + response.photopath)
            // $("#Photo_path").val(response.photopath);
            $("#btn_save_Cour").hide();
            $("#btn_update_Cour").show();
        },
    });
}
//---------------------end Edite Coach----------------------- EditCoach
function UpdateCour(formData) {
    // debugger;
    // var id = $("#idCours").val();
    // var nom = $("#Nom_Cour").val();
    // var path = $("#Photo_path").val();
    $.ajax({
        type: "POST",
        url: "/cours/Update_Cour",
        data: formData,
        cache: false,
        async: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            debugger
            if (response.status == 500) {
                alert('Il y a un probléme au niveau de la modification.');
                return;
            }
            ClearData();
            AllCours();
            $("#btn_save_Cour").show();
            $("#btn_update_Cour").hide();
            //start alert
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Cours has been Updated with successfuly",
                showConfirmButton: false,
                timer: 1500,
            });
            //end alert
        },
        // //detecter errors
        error: function (error) {
            debugger
            // console.log(error.responseJSON.errors.nom);
            $("#Nom_error_Cour").text(error.responseJSON.errors.nom);
            $("#PhotoPath_error_Cour").text(
                error.responseJSON.errors.photopath
            );
        },
    });
}
//---------------------Start Delete Salle----------------------- EditSalle
function DeleteCour(id_cour) {
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
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: "/cours/DeleteCour/" + id_cour,
                    dataType: "json",
                    success: function (response) {
                        $("#btn_save_Cour").show();
                        $("#btn_update_Cour").hide();

                        ClearData();
                        AllCours();
                    },
                });
                swalWithBootstrapButtons.fire(
                    "Deleted!",
                    "Your file has been deleted.",
                    "success"
                );
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    "Cancelled",
                    "Your imaginary file is safe :)",
                    "error"
                );
            }
        });
}
//---------------------end Delete Salle----------------------- EditSalle
