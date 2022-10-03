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
                <div class="col-4">
                    <div class="card info-card sales-card">



                        <div class="card-body">
                            <h5 class="card-title">Täze ulanyjylar</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>145</h6>
                                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">Ösüş</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-4">
                    <div class="card info-card revenue-card">


                        <div class="card-body">
                            <h5 class="card-title">Täze bildirişler </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bookmark"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>$3,264</h6>
                                    <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">Ösüş</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-4">

                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">Aktiwlik </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-speedometer"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>1244</h6>
                                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">Ösüş</span>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
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
                            new ApexCharts(document.querySelector("#lineChart"), {
                                series: [{
                                        name: "Täze ulanyjylar",
                                        data: [10, 41, 35, 51, 49, 62, 69, 91, 148, 32, 12, 2]
                                    }, {
                                        name: "Täze bildirişler",
                                        data: [2, 21, 15, 51, 20, 62, 29, 91, 12, 87, 56, 43]
                                    },
                                    {
                                        name: "Aktiwlik",
                                        data: [5, 31, 25, 11, 30, 32, 39, 21, 2, 76, 89, 50]
                                    }
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
                                    categories: ['Ýan', 'Feb', 'Mar', 'Apr', 'May', 'Iýun', 'Iýul', 'Aug', 'Sep', 'Okt', 'Noý', 'Dek'],
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