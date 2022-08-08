@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Biểu đồ thu nhập</p>

                            {{-- <canvas id="order-chart"></canvas> --}}
                            <canvas id="chart_money" width="400" height="400"></canvas>

                        </div>
                    </div>
                </div>
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="card-title">Thống kê thu nhập theo thời gian</p>
                            </div>
                            <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">Thời gian</th>
                                    <th scope="col">Phí vận chuyển</th>
                                    <th scope="col">Bán hàng</th>
                                    <th scope="col">Gói tập</th>
                                    <th scope="col">Lớp</th>
                                    <th scope="col">Thuê PT</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">Ngày</th>
                                    <td>{{$day_ship[0]->money_ship}}</td>
                                    <td>{{$day_delivered[0]->money_delivered == null ? 0 :$day_delivered[0]->money_delivered}}</td>
                                    <td>{{$day_pack[0]->money_pack == null?0:$day_pack[0]->money_pack}}</td>
                                    <td>{{$day_class[0]->money_class == null?0:$day_class[0]->money_class}}</td>
                                    <td>{{$day_pt[0]->pt == null?0:$day_pt[0]->pt}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Tháng</th>
                                    <td>{{$month_ship[0]->money_ship}}</td>
                                    <td>{{$month_delivered[0]->money_delivered}}</td>
                                    <td>{{$month_pack[0]->money_pack}}</td>
                                    <td>{{$month_class[0]->money_class}}</td>
                                    <td>{{$month_pt[0]->pt}}</td>
                                  </tr>
                                </tbody>
                              </table>
                              <p class="mt-3" style="font-size: 20px">
                                Tổng thu nhập: {{ $delivered[0]->delivered + $pack[0]->pack + $class[0]->class + $pt[0]->pt - $ship[0]->ship}} VNĐ
                              </p>
                              <div id="sales-legend" class="chartjs-legend mt-1 mb-1"></div>
                            <canvas id="sales-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.php -->
        <!-- partial -->
    </div>
    <script>
        const chart_money = document.getElementById('chart_money');
        const myChart = new Chart(chart_money, {
            type: 'pie',
            data: {
                labels: ['Phí vận chuyển', 'Bán hàng', 'Gói tập', 'Lớp','Phí thuê PT'],
                datasets: [{
                    label: '# of Votes',
                    data: [{{$ship[0]->ship}}, {{$delivered[0]->delivered}}, {{$pack[0]->pack}}, {{$class[0]->class}}, {{$pt[0]->pt}}],
                    borderWidth: 1,
                    backgroundColor: ['#CB4335', '#1F618D', '#F1C40F', '#27AE60', '#131195'],
                }]
            }
            // options: {
            //     plugins: {
            //     legend: {
            //         onHover: handleHover,
            //         onLeave: handleLeave
            //     }
            //     }
            // }
        });
      var SalesChartCanvas = $("#sales-chart").get(0).getContext("2d");
      var SalesChart = new Chart(SalesChartCanvas, {
        type: 'bar',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
          datasets: [{
              label: 'Phí vận chuyển',
              data: [{{$total_money_month_ship[0]->Jan}}, {{$total_money_month_ship[0]->Feb}}, {{$total_money_month_ship[0]->Mar}}, {{$total_money_month_ship[0]->Apr}}, {{$total_money_month_ship[0]->May}}, {{$total_money_month_ship[0]->Jun}}, {{$total_money_month_ship[0]->Jul}}, {{$total_money_month_ship[0]->Aug}}, {{$total_money_month_ship[0]->Sep}}, {{$total_money_month_ship[0]->Oct}}, {{$total_money_month_ship[0]->Nov}}, {{$total_money_month_ship[0]->Dec}}],
              backgroundColor: '#CB4335'
            },
            {
              label: 'Bán hàng',
              data: [{{$total_money_month_delivered[0]->Jan}}, {{$total_money_month_delivered[0]->Feb}}, {{$total_money_month_delivered[0]->Mar}}, {{$total_money_month_delivered[0]->Apr}}, {{$total_money_month_delivered[0]->May}}, {{$total_money_month_delivered[0]->Jun}}, {{$total_money_month_delivered[0]->Jul}}, {{$total_money_month_delivered[0]->Aug}}, {{$total_money_month_delivered[0]->Sep}}, {{$total_money_month_delivered[0]->Oct}}, {{$total_money_month_delivered[0]->Nov}}, {{$total_money_month_delivered[0]->Dec}}],
              backgroundColor: '#1F618D'
            },
            {
              label: 'Gói tập',
              data: [{{$total_money_month_pack[0]->Jan}}, {{$total_money_month_pack[0]->Feb}}, {{$total_money_month_pack[0]->Mar}}, {{$total_money_month_pack[0]->Apr}}, {{$total_money_month_pack[0]->May}}, {{$total_money_month_pack[0]->Jun}}, {{$total_money_month_pack[0]->Jul}}, {{$total_money_month_pack[0]->Aug}}, {{$total_money_month_pack[0]->Sep}}, {{$total_money_month_pack[0]->Oct}}, {{$total_money_month_pack[0]->Nov}}, {{$total_money_month_pack[0]->Dec}}],
              backgroundColor: '#F1C40F'
            },
            {
              label: 'Lớp',
              data: [{{$total_money_month_class[0]->Jan}}, {{$total_money_month_class[0]->Feb}}, {{$total_money_month_class[0]->Mar}}, {{$total_money_month_class[0]->Apr}}, {{$total_money_month_class[0]->May}}, {{$total_money_month_class[0]->Jun}}, {{$total_money_month_class[0]->Jul}}, {{$total_money_month_class[0]->Aug}}, {{$total_money_month_class[0]->Sep}}, {{$total_money_month_class[0]->Oct}}, {{$total_money_month_class[0]->Nov}}, {{$total_money_month_class[0]->Dec}}],
              backgroundColor: '#27AE60'
            },
            {
              label: 'Thuê PT',
              data: [{{$total_money_month_pt[0]->Jan}}, {{$total_money_month_pt[0]->Feb}}, {{$total_money_month_pt[0]->Mar}}, {{$total_money_month_pt[0]->Apr}}, {{$total_money_month_pt[0]->May}}, {{$total_money_month_pt[0]->Jun}}, {{$total_money_month_pt[0]->Jul}}, {{$total_money_month_pt[0]->Aug}}, {{$total_money_month_pt[0]->Sep}}, {{$total_money_month_pt[0]->Oct}}, {{$total_money_month_pt[0]->Nov}}, {{$total_money_month_pt[0]->Dec}}],
              backgroundColor: '#131195'
            }
          ]
        },
        options: {
          cornerRadius: 5,
          responsive: true,
          maintainAspectRatio: true,
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 20,
              bottom: 0
            }
          },
          scales: {
            yAxes: [{
              display: true,
              gridLines: {
                display: true,
                drawBorder: false,
                color: "#F2F2F2"
              },
              ticks: {
                display: true,
                min: 0,
                max: {{$ship[0]->ship + $delivered[0]->delivered + $pack[0]->pack + $class[0]->class}},
                callback: function(value, index, values) {
                  return  value + '$' ;
                },
                autoSkip: true,
                maxTicksLimit: 10,
                fontColor:"#6C7383"
              }
            }],
            xAxes: [{
              stacked: false,
              ticks: {
                beginAtZero: true,
                fontColor: "#6C7383"
              },
              gridLines: {
                color: "rgba(0, 0, 0, 0)",
                display: false
              },
              barPercentage: 1
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }
        },
      });
      document.getElementById('sales-legend').innerHTML = SalesChart.generateLegend();
    </script>
@endsection
