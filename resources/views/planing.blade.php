@extends('layouts/app')

@section('content')
 <!-- ================ Order Details List ================= -->
 <div class="details curd-page">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>All Planings</h2>
                    </div>

                    <table id="example">
                        <thead>
                            <tr>
                                <td>N°</td>
                                <td>Date seance</td>
                                <td>Start time</td>
                                <td>End Time</td>
                                <td>Cour</td>
                                <td>Salle</td>
                                <td>Coach</td>
                                <td>Actions</td>
                            </tr>
                        </thead>

                        <tbody id="all-planings">

                        </tbody>
                    </table>
                </div>
                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>New Planing</h2>
                    </div>

                    <!-- <form id="frm_AddCour" method=""> -->
						<!--   Date Planing -->

						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
                             <!--   id Planing Input-->
							 <input class="form-input" id="id-planing" type="hidden" required>
                             <!--   date planing Input-->
							 <input class="form-input" id="date-planing" type="date" required>
                             <span style="color:red; margin:10px" id="date-planing_error"></span>
						</div>

						<!--   Start Time -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--   Start Time Input-->
                            <select name="" class="form-select" id="start-time">
                                 <option value="">Start Time</option>
                            </select>
                            <span style="color:red; margin:10px" id="start-time_error"></span>
						</div>

						<!--   End Time -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--   End Time Input-->
                            <select name="" id="end-time" class="form-select">
                                 <option value="">End Time</option>
                            </select>
                            <span style="color:red; margin:10px" id="end-time_error"></span>
						</div>

						<!--   Cour Id -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--   Cour Select-->
                             <select name="" id="id-Cour" class="form-select">
                                 <option value="">All Cour</option>
                                 @foreach($AllCour as $Cour)
                                 <option value="{{$Cour->id}}">{{$Cour->nom}}</option>
                                 @endforeach
                             </select>
                             <span style="color:red; margin:10px" id="id-Cour_error"></span>
						</div>

                        <!--   Salle Id -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--   Salle Select-->
                             <select name="" id="idSalle" class="form-select">
                                 <option value="">All Salle</option>
                                 @foreach($AllSalles as $salle)
                                 <option value="{{$salle->id}}">{{$salle->nom}}</option>
                                 @endforeach
                             </select>
                             <span style="color:red; margin:10px" id="idSalle_error"></span>
						</div>

                        <!--   Coaches Id -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--   Coach Select-->
                             <select name="" id="idCoach" class="form-select">
                                 <option value="">All Coach</option>
                                 @foreach($AllCoaches as $coach)
                                 <option value="{{$coach->id}}">{{$coach->nom}}</option>
                                 @endforeach
                             </select>
                             <span style="color:red; margin:10px" id="idCoach_error"></span>
						</div>
                        <div>
                            <button onclick="AddPlaning()" class="log-in" id="btn_save">Ajouter</button>
                            <button onclick="UpdatePlaning()" class="log-in" id="btn_update">Modifier</button>
                        </div>
					<!-- </form> -->
                </div>
            </div>
@endsection
@section('scripts')
<script src="{{asset('js/planingCrud.js')}}"></script>
@endsection
