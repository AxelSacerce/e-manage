@extends('front.template')
@section('title')
  In Warehouse Items
@stop
@section('custom_js_top')
<script type="text/javascript">
function show_sidebar()
{
document.getElementById('sidebar').style.visibility="visible";
}

function hide_sidebar()
{
document.getElementById('sidebar').style.visibility="hidden";
}
</script>
@stop
@section('main')
  <div class="container">
    <div class="panel panel-primary">
    <div class="panel-heading">
      In Warehouse Items
    </div>
    <div class="panel-body">
        <div class="">
          <a href="{!! url('/items/in-warehouse/add') !!}" class="btn btn-success btn-sm">Add an Item Manually</a>
          <a href="#" class="btn btn-success btn-sm">See New Items Income Today</a>
        </div>
        <br>
        <div class="">
          <form class="" action="{!! url('/items/in_warehouse/result') !!}" method="POST">
            {{ csrf_field() }}
            <div class="col-md-6 col-md-offset-2">
              <input style="font-size:12px;" type="text" name="adv_filter" placeholder="Advanced Filter: @item from @supplier income at @date with staff name @username" class="form-control">
            </div>
            <input type="button" name="filter" class="btn btn-primary" value="Let's filter it">
          </form>
        </div>
        <br>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Item Name</th>
              <th>Quantity</th>
              <th>Supplier</th>
              <th>Added by</th>
              <th>Modify</th>
            </tr>
          </thead>

          <tbody>
            <!-- {{ $i = ($items->currentpage()-1)*$items->perpage()+1 }} -->
            @foreach($items as $item)
            <tr>
              <th scope="row">{{ $i++ }}</th>
              <td>{{ $item->item_name }}</td>
              <td>{{ $item->item_quantity }}</td>
              <td>{{ $item->item_supplier }}</td>
              <td>
                <span data-toggle="tooltip" data-placement="right" title="{{ '@'.$item->by_staff }}">
                  @if($item->username=="admin")
                    <b style="color:blue">{{ $item->name }}</b>
                  @else
                    {{ $item->name }}
                  @endif
                </span>
              </td>
              <td>
                <a href="{{ url('/items/in-warehouse/edit/id').'/'.$item->id_item }}" data-toggle="tooltip" data-placement="top" title="Edit">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
                <a href="{{ url('/items/in-warehouse/delete/id').'/'.$item->id_item }}" data-toggle="tooltip" data-placement="top" title="Delete">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <center>
          {{ $items->links() }}
        </center>
        <center>
          Showing {{($items->currentpage()-1)*$items->perpage()+1}} to {{$items->currentpage()*$items->perpage()}}
            of  {{$items->total()}} total items
        </center>
        <!-- <center>
          <nav aria-label="">
            <ul class="pagination">
              <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
              <li><a href="#">Previous</a></li>
              <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
              <li class=""><a href="#">2 <span class="sr-only">(current)</span></a></li>
              <li class=""><a href="#">3 <span class="sr-only">(current)</span></a></li>
              <li class=""><a href="#">4 <span class="sr-only">(current)</span></a></li>
              <li class=""><a href="#">5 <span class="sr-only">(current)</span></a></li>
              <li><a href="#">Next</a></li>
              <li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
          </nav>
        </center> -->
    </div>
    </div>
  </div>
@stop
