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
                                <td>Description</td>
                                <td>Prix</td>
                                <td>Actions</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
								<td>1</td>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>
								<span class="status delivered"><a href="#"><ion-icon name="create-outline"></ion-icon></a></span>
								<span class="status return"><a href="#"><ion-icon name="trash-outline"></ion-icon></a></span>
								</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>
								<span class="status delivered"><a href="#"><ion-icon name="create-outline"></ion-icon></a></span>
								<span class="status return"><a href="#"><ion-icon name="trash-outline"></ion-icon></a></span>
								</td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>
								<span class="status delivered"><a href="#"><ion-icon name="create-outline"></ion-icon></a></span>
								<span class="status return"><a href="#"><ion-icon name="trash-outline"></ion-icon></a></span>
								</td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>
								<span class="status delivered"><a href="#"><ion-icon name="create-outline"></ion-icon></a></span>
								<span class="status return"><a href="#"><ion-icon name="trash-outline"></ion-icon></a></span>
								</td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>
								<span class="status delivered"><a href="#"><ion-icon name="create-outline"></ion-icon></a></span>
								<span class="status return"><a href="#"><ion-icon name="trash-outline"></ion-icon></a></span>
								</td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>
								<span class="status delivered"><a href="#"><ion-icon name="create-outline"></ion-icon></a></span>
								<span class="status return"><a href="#"><ion-icon name="trash-outline"></ion-icon></a></span>
								</td>
                            </tr>

                            <tr>
                                <td>7</td>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>
								<span class="status delivered"><a href="#"><ion-icon name="create-outline"></ion-icon></a></span>
								<span class="status return"><a href="#"><ion-icon name="trash-outline"></ion-icon></a></span>
								</td>
                            </tr>

                            <tr>
                                <td>8</td>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>
								<span class="status delivered"><a href="#"><ion-icon name="create-outline"></ion-icon></a></span>
								<span class="status return"><a href="#"><ion-icon name="trash-outline"></ion-icon></a></span>
								</td>
                            </tr>
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