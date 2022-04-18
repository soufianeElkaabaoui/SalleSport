@extends('layouts/app')

@section('content')
        <!-- ======================= Cards ================== -->
        <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">{{$countUsers}}</div>
                        <div class="cardName">Coach</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Salles</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="easel-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Cours</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="book-outline"></ion-icon>
                    </div>
                </div>

            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Planing</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Payment</td>
                                <!-- <td>Status</td> -->
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <!-- <td><span class="status delivered">Delivered</span></td> -->
                            </tr>

                            <tr>
                                <td>Dell Laptop</td>
                                <td>$110</td>
                                <td>Due</td>
                                <!-- <td><span class="status pending">Pending</span></td> -->
                            </tr>

                            <tr>
                                <td>Apple Watch</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <!-- <td><span class="status return">Return</span></td> -->
                            </tr>

                            <tr>
                                <td>Addidas Shoes</td>
                                <td>$620</td>
                                <td>Due</td>
                                <!-- <td><span class="status inProgress">In Progress</span></td> -->
                            </tr>

                            <tr>
                                <td>Star Refrigerator</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <!-- <td><span class="status delivered">Delivered</span></td> -->
                            </tr>

                            <tr>
                                <td>Dell Laptop</td>
                                <td>$110</td>
                                <td>Due</td>
                                <!-- <td><span class="status pending">Pending</span></td> -->
                            </tr>

                            <tr>
                                <td>Apple Watch</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <!-- <td><span class="status return">Return</span></td> -->
                            </tr>

                            <tr>
                                <td>Addidas Shoes</td>
                                <td>$620</td>
                                <td>Due</td>
                                <!-- <td><span class="status inProgress">In Progress</span></td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Coaches</h2>
                    </div>

                    <table>
                        @foreach ($users as $user)
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="{{ asset('imgs/customer02.jpg') }}" alt=""></div>
                            </td>
                            <td>
                                <h4>{{$user->nom}} <br> <span>{{$user->prenom}}</span></h4>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
@endsection
