@extends('layouts/app')

@section('content')
        <!-- ======================= Cards ================== -->
        <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">{{$userCount}}</div>
                        <div class="cardName">Coach</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">{{$salleCount}}</div>
                        <div class="cardName">Salles</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="easel-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">{{$courCount}}</div>
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
                        <a href="/plannings" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>N°</td>
                                <td>Date seance</td>
                                <td>Start time</td>
                                <td>End Time</td>
                                <td>Cour</td>
                                <td>Salle</td>
                                <td>Coach</td>
                            </tr>
                        </thead>
                        <tbody id="planing-hebdo">

                        </tbody>
                    </table>
                </div>

                <!-- ================= Coaches ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Coaches</h2>
                    </div>

                    <table>
                    </table>
                </div>
            </div>
@endsection
@section('scripts')
<script src="{{asset('js/planingCrud.js')}}"></script>
@endsection
