<?php

use App\Http\Controllers\Front\HomeController;

?>
@extends('front.template')
@section('title')
  Home
@stop
@section('custom_css')

@stop
@section('custom_js_top')

@stop
@section('main')

  <div class="container">
    <div class="panel">
    <div class="panel-body">
      <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto;"></div>
    </div>
    </div>

    <div class="panel">
    <div class="panel-body">
      <div id="recent">
        <h6>Recent Item</h6>
        <hr>
        <div>filter section</div>
        <ul>
          <!-- <li class="in">
            <label><a href="">Item Name</a></label>
            <span>2 hours ago</span>
            <div class="info">2 unit <a href="">items</a> from <a href="">supplier</a> enter the warehouse managed by <a href="">staff_name</a> at Sat, Oct 15 2016.</div>
          </li>
          <li class="out">
            <label><a href="">Item Name</a></label>
            <span>2 hours ago</span>
            <div class="info">2 unit <a href="">items</a> from <a href="">supplier</a> out from warehouse managed by <a href="">staff_name</a> at Sat, Oct 15 2016.</div>
          </li> -->
          @foreach($recent_items as $items)
          <li class="{{ $items->identity_id == 1 ? 'in' : 'out' }}" onclick="location.href='{{ url("/recent/".md5($items->id_item)) }}'" style="cursor:pointer">
            <label><a href="">{{ $items->item_name }}</a></label>
            <span>{{ HomeController::time_elapsed_string($items->added_at, false) }}</span>
            / {{ date('d-m-Y H:m:s', strtotime($items->added_at)) }}
            <div class="info">{{ $items->item_quantity }} unit <a href="{{ url('/item/'.strtolower($items->item_name)) }}">
              @if( $items->item_quantity > 1)
                {{ $items->item_name }}s
              @else
                {{ $items->item_name }}
              @endif
            </a> from <a href="{{ url('/supplier/'.strtolower($items->item_supplier)) }}">{{ $items->item_supplier }}</a> {{ $items->identity_id == 1 ? 'enter the' : 'out from' }} warehouse managed by <a href="{{ url('/staff/'.strtolower($items->by_staff)) }}">{{ $items->by_staff }}</a> on <?php echo date('D, M d <\s\u\p\>S</\s\u\p> Y', strtotime($items->added_at)) ?>.</div>
          </li>
          @endforeach
        </ul>
        <center><a href="" class="show_more">show more</a></center>
      </div>
    </div>
    </div>
  </div>

@stop
@section('custom_js_bottom')
  <script type="text/javascript">
  $('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
  })

  $('#myTabs a[href="#expenditure"]').tab('show') // Select tab by name
  $('#myTabs a:first').tab('show') // Select first tab
  $('#myTabs a:last').tab('show') // Select last tab
  $('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)
  </script>
  <script src="https://code.highcharts.com/stock/highstock.js"></script>
  <script src="http://code.highcharts.com/stock/modules/exporting.js"></script>
  <script type="text/javascript">
    $(function () {
    $.getJSON('{{ url("/chart") }}', function (data) {
        $('#container').highcharts({
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Sold Items over time'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                        'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: 'Sold Items rate'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                type: 'area',
                name: 'Income',
                data: data
            }]
        });
    });
    });
  </script>
@stop
