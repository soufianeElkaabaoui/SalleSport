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
                                <td>Nom Complete</td>
                                <td>Email</td>
                                <td>Password</td>
                                <td>Actions</td>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($users as $user)
                            <tr>
								<td>{{$user->id}}</td>
                                <td>{{$user->nom . " " . $user->prenom}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->password}}</td>
                                <td>
								<span class="status delivered"><a href="/edituser/{{$user->id}}"><ion-icon name="create-outline"></ion-icon></a></span>
								<span class="status return"><a href="deleteuser/{{$user->id}}"><ion-icon name="trash-outline"></ion-icon></a></span>
								</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>New Cours</h2>
                    </div>

                    <form id="frm_AddCours" method="POST">
						<!--   user name -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--   user name Input-->
							 <input class="form-input" id="txt-input" type="text" placeholder="Description" required>
						</div>

						<!--   user name -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--   user name Input-->
							 <input class="form-input" id="txt-input" type="text" placeholder="Prix" required>
						</div>

						<!--   user name -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--   user name Input-->
							 <input class="form-input" id="txt-input" type="text" placeholder="" required>
						</div>

						<!--   user name -->
						<div>
							<span class="input-item">
							   <i class="fa fa-user-circle"></i>
							 </span>
							<!--   user name Input-->
							 <input class="form-input" id="txt-input" type="text" placeholder="@UserName" required>
						</div>
                        <div>
                            <button type="submit" class="log-in"> Ajouter </button>
                        </div>
					</form>
                </div>
            </div>
@endsection
