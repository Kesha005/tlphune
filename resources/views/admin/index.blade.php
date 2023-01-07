@extends('layouts.admin.app')

@section('page_name')
Baş sahypa
@endsection

@section('main_section')

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-6">
                    <div class="card info-card sales-card">



                        <div class="card-body">
                            <h5 class="card-title">Täze ulanyjylar</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$users}}</h6>
                                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">Ösüş</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-6">
                    <div class="card info-card revenue-card">


                        <div class="card-body">
                            <h5 class="card-title">Täze bildirişler </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bookmark"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$events}}</h6>
                                    <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">Ösüş</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Revenue Card -->

                <!-- Customers Card -->
            </div>
        </div>


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hasabat</h5>

                    <!-- Line Chart -->
                    <div id="lineChart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            var users = <?php echo json_encode($users) ?>;
                            var events = <?php echo json_encode($events) ?>;
                            new ApexCharts(document.querySelector("#lineChart"), {
                                series: [{
                                        name: "Täze ulanyjylar",
                                        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, users, 0]
                                    }, {
                                        name: "Täze bildirişler",
                                        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, events, 0]
                                    },
                                ],
                                chart: {
                                    height: 350,
                                    type: 'line',
                                    zoom: {
                                        enabled: true
                                    }
                                },
                                markers: {
                                    size: 4
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    curve: 'smooth',
                                    width: 2
                                },

                                grid: {
                                    row: {
                                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                        opacity: 0.1,
                                        fill: {
                                            type: "gradient",
                                            gradient: {
                                                shadeIntensity: 1,
                                                opacityFrom: 0.5,
                                                opacityTo: 0.7,
                                                stops: [0, 90, 100]
                                            }
                                        },
                                    },
                                },
                                xaxis: {
                                    categories: ['Ýan', 'Feb', 'Mar', 'Apr', 'May', 'Iýun', 'Iýul', 'Aug', 'Sen', 'Okt', 'Noý', 'Dek'],
                                }
                            }).render();
                        });
                    </script>
                    <!-- End Line Chart -->

                </div>
            </div>
        </div>

    </div>
    <!-- End Right side columns -->

    </div>
</section>
@endsection