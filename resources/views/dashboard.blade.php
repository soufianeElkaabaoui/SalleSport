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
            <div class="details timetable-page">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Planing</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <div id="coach_name"></div>
    <div id="container" class="container-planing">
        <div>///</div>
        <div class="item"> 8->8:30 </div>
        <div class="item"> 8:30->9  </div>
        <div class="item"> 9->9:30 </div>
        <div class="item"> 9:30->10 </div>
        <div class="item"> 10->10:30 </div>
        <div class="item"> 10:30->11 </div>
        <div class="item"> 11->11:30 </div>
        <div class="item"> 11:30->12 </div>
        <div class="item"> 12->12:30 </div>
        <div class="item"> 12:30->13 </div>
        <div class="item"> 13->13:30 </div>
        <div class="item"> 13:30->14 </div>
        <div class="item"> 14->14:30 </div>
        <div class="item"> 14:30->15 </div>
        <div class="item"> 15->15:30 </div>
        <div class="item"> 15:30->16</div>
        <div class="item"> 16->16:30</div>
        <div class="item"> 16:30->17 </div>
        <div class="item"> 17->17:30 </div>
        <div class="item"> 17:30->18</div>
        <div class="item"> 18->18:30 </div>
        <div class="item"> 18:30->19</div>
        <div class="item"> 19->19:30</div>
        <div class="item"> 19:30->20</div>
        <div class="item"> 20->20:30</div>
        <div class="item"> 20:30->21</div>
        <div class="item"> 21->21:30</div>
        <div class="item"> 21:30->22</div>
        <div class="item"> 22->22:30</div>
        <div class="item"> 22:30->23</div>
        <div class="item"> 23->23:30</div>
        <div class="item"> 23:30->00:00</div>
        <div class="monday">monday</div>
        <div class="tuesday">tuesday</div>
        <div class="wednesday">wednesday</div>
        <div class="thursday">thursday</div>
        <div class="friday">friday</div>
        <div class="saturday">saturday</div>
        <div class="sunday">sunday</div>
    </div>
                </div>

                <!-- ================= New Customers ================ -->
                
            </div>
@endsection
