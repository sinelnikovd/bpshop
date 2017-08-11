<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Заказы</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <div class="row">
            <div class="col-md-7">
                <div class="pad">
                    <canvas id="myChart" height="150"></canvas>

                </div>

            </div>
            <div class="col-md-5">
                <div class="pad box-pane-right" style="min-height: 280px">
                    <table class="table">
                        <caption>Новые заказы</caption>
                        <thead>
                            <tr class="info">
                                <th>#</th>
                                <th>Пользователь</th>
                                <th>Товар</th>
                                <th>Кол-во</th>
                                <th>Цена</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($newOrders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->count }}</td>
                                    <td>{{ $order->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        var data = {!! $data !!};
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options:{
                legend:{
                    display: false
                },
                layout: {
                    padding: 10
                },
                scales: {
                    yAxes:[{
                        ticks: {
                            beginAtZero: true,
                        }
                    }]

                }
            }
        });
        /*
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {!! $data !!},
            options:{
                legend:{
                    display: false
                },
                layout: {
                    padding: 10
                },
                scales: {
                    xAxes: [{
                        stacked: true,
                        barThickness: 50,
                    }],
                    yAxes:[{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]

                }
            }
        });*/
    </script>