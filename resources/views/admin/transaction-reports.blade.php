@extends('layouts.admin')

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.9.8/chartist.min.js"></script>
    <script type="text/javascript" src="/bower_components/chartist-plugin-legend/chartist-plugin-legend.js"></script>

    <script type="text/javascript">

        new Chartist.Line('#ct-daily', {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            series: [
                [12, 9, 7, 8, 5],
                [2, 1, 3.5, 7, 3],
                [1, 3, 4, 5, 6]
            ]
        }, {
            fullWidth: true,
            chartPadding: {
                right: 40
            }
        });
    </script>

    <script type="text/javascript">
        new Chartist.Line('#ct-monthly', {
            labels: [1, 2, 3, 4, 5, 6, 7, 8],
            series: [
                [1, 2, 3, 1, -2, 0, 1, 0],
                [-2, -1, -2, -1, -3, -1, -2, -1],
                [0, 0, 0, 1, 2, 3, 2, 1],
                [3, 2, 1, 0.5, 1, 0, -1, -3]
            ]
        }, {
            high: 3,
            low: -3,
            fullWidth: true,
            // As this is axis specific we need to tell Chartist to use whole numbers only on the concerned axis
            axisY: {
                onlyInteger: true,
                offset: 20
            }
        });
    </script>

    <script type="text/javascript">
        new Chartist.Line('#ct-annually', {
            labels:  ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            series: [
                [12, 9, 7, 8, 5],
                [2, 1, 3.5, 7, 3],
                [1, 3, 4, 5, 6]
            ]
        }, {
            fullWidth: true,
            chartPadding: {
                right: 40
            }
        });
    </script>

    <script type="text/javascript">
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

            $('.ct-chart').each(function(i, e) {
                e.__chartist__.update();
            });
        });
    </script>
@stop

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.9.8/chartist.min.css" />
    <link rel="stylesheet" href="/bower_components/chartist-plugin-legend/chartist-plugin-legend.css">
@stop

@section('body')
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li role="presentation" class="active"> <a href="#daily" aria-controls="daily" role="tab" data-toggle="tab">Daily</a></li>
        <li role="presentation">                <a href="#monthly" aria-controls="monthly" role="tab" data-toggle="tab">Monthly</a></li>
        <li role="presentation">                <a href="#annually" aria-controls="annually" role="tab" data-toggle="tab">Annual</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="daily">
            <div class="ct-chart ct-perfect-fourth" id="ct-daily"></div>
        </div>

        <div role="tabpanel" class="tab-pane" id="monthly">
            <div class="ct-chart ct-perfect-fourth" id="ct-monthly"></div>
        </div>

        <div role="tabpanel" class="tab-pane" id="annually">
            <div class="ct-chart ct-perfect-fourth" id="ct-annually"></div>
        </div>
    </div>

@stop