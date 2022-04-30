@extends('layouts/app')

@section('content')
 <!-- ================ Order Details List ================= -->
 <div class="details curd-page">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Salles</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
								<td>N°</td>
                                <td>Nom Salle</td>
                                <td>Capacity</td>
                                <td>Actions</td>
                            </tr>
                        </thead>

                        <tbody>
                           
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>New Salle</h2>
                    </div>

                    {{-- <form> --}}
						<!--   Salle name -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--   salle name Input-->
                            <input id='idSalle' type="hidden"/>
							 <input class="form-input" id="nom-input" type="text" name="nom" placeholder="Nom Salle" >
                             <span style="color:red; margin:10px" id="nom_error"></span>
						</div>
						
						<!--   user name -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--   user name Input-->
							 <input class="form-input" id="capacity-input" type="text" placeholder="Capicty" name="capacity" >
                             <span style="color:red; margin:10px" id="capacity_error"></span>
						</div>
                        <div>
                            <button id="btn_save" class="log-in" onclick="AddSalle();"> Ajouter </button>
                            <button id="btn_update" class="log-in" onclick="UpdateSalle()">Update </button>
                        </div>
					{{-- </form> --}}
                </div>
            </div>
@endsection
@section('scripts')
<script src="{{asset('js/salle.js')}}"></script>
@endsection