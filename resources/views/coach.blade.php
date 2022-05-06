@extends('layouts/app')

@section('content')
 <!-- ================ Order Details List ================= -->
 <div class="details curd-page">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Coaches</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
								<td>N°</td>
                                <td>Nom</td>
                                <td>Prenom</td>
                                <td>Email</td>
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
                        <h2 id="Head">New Coach</h2>
                    </div>

                    {{-- <form id="frm_AddCours" method="POST"> --}}
						<!--   user name -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--   user name Input-->
							<input class="form-input" id="id" type="hidden">
							 <input class="form-input" id="nom" type="text" placeholder="NOM" required>
							 <span style="color:red; margin:10px" id="nom_error_coach"></span>
						</div>

						<!--   user name -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--   user name Input-->
							 <input class="form-input" id="prenom" type="text" placeholder="Prenom" required>
							 <span style="color:red; margin:10px" id="prenom_error_coach"></span>
						</div>

						<!--   user name -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--   user name Input-->
							 <input class="form-input" id="email" type="text" placeholder="email" required>
							 <span style="color:red; margin:10px" id="email_error_coach"></span>
							</div>
                        <div>
                            <button type="submit" class="log-in" id="save" onclick="AddCoach();"> Ajouter </button>
                            <button type="submit" class="log-in" id="update" onclick="UpdateCoach()"> update </button>
                        </div>
					{{-- </form> --}}
                </div>
            </div>
@endsection
@section('scripts')
<script src="{{asset('js/coach.js')}}"></script>
@endsection
