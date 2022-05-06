@extends('layouts/app')

@section('content')
 <!-- ================ Order Details List ================= -->
 <div class="details curd-page">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Cour</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
								<td>N°</td>
                                <td>Nom Cour</td>
                                <td>Image</td>
                                <td>Actions</td>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <form id="image-upload" enctype="multipart/form-data" method="POST">

                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2 id="Head">New Cours</h2>
                    </div>
						<!--  Cour name -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--  Cour name Input-->

                            <input type="hidden" name="id" id="idCours">
							 <input name="nom" class="form-input" id="Nom_Cour" type="text" placeholder="Nom Cours" required>
                             <span style="color:red; margin:10px" id="Nom_error_Cour"></span>
						</div>

						<!--   photo_path name -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--    photo_path Input-->
							 <input name="path" class="form-input" id="Photo_path" type="file" placeholder="Choisie une image" required>
                             <span style="color:red; margin:10px" id="PhotoPath_error_Cour"></span>
						</div>

                        <div>
							 <img id="selected_photo" style='margin-top: 15px;width: 80px;height: 80px;border-radius: 50%;' src="{{asset('storage/files/no_image.png')}}" alt="image cours">
						</div>

                        <div>
                            <button type="submit" class="log-in upload-image" id="btn_save_Cour"> Ajouter </button>
                            <button type="submit" class="log-in upload-image" id="btn_update_Cour"> update </button>
                        </div>
                </div>
            </form>
            </div>
@endsection
@section('scripts')
<script src="{{asset('js/cour.js')}}"></script>
@endsection
