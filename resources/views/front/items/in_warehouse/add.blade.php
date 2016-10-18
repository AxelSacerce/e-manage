@extends('front.template')
@section('title')
  Add Item to Warehouse
@stop
@section('main')
  <div class="container">
    <div class="panel panel-primary">
    <div class="panel-heading">
      In Warehouse Items / Add an Item
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{!! url('/items/in-warehouse/create') !! }">

          <div class="form-group">
            <label for="item_name" class="col-md-4 control-label">Item Name</label>
              <div class="col-md-6">
                  <input id="item_name" type="text" class="form-control" name="item_name" value="" required autofocus>
              </div>
          </div>

          <div class="form-group">
            <label for="item_quantity" class="col-md-4 control-label">Quantity</label>
              <div class="col-md-6">
                  <input id="item_quantity" type="number" class="form-control" name="item_quantity" value="" min="1" required autofocus>
              </div>
          </div>

          <div class="form-group">
            <label for="item_supplier" class="col-md-4 control-label">Item Supplier</label>
              <div class="col-md-6">
                  <select class="form-control" name="item_supplier" required>
                    <option selected disabled>SELECT SUPPLIER</option>
                    <option>A</option>
                    <option>A</option>
                    <option>A</option>
                    <option>A</option>
                  </select>
              </div>
          </div>

          <div class="form-group">
            <label for="item_supplier" class="col-md-4 control-label">Added At</label>
              <div class="col-md-6">
                  <span>
                    <label><input type="radio" name="choice_date"> Automatic</label> &nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" name="choice_date"> Manually</label>
                  </span>

                  <!-- <select class="form-control" name="item_supplier" required>
                    <option selected disabled>SELECT SUPPLIER</option>
                  </select> -->
              </div>
          </div>

          <div class="form-group">
            <div class="col-md-4"></div>
            <div class="col-md-6">
              <input class="btn btn-primary btn-sm" type="button" name="name" value="SAVE">
              <a class="btn btn-default btn-sm" href="#">Add More</a>
            </div>
          </div>
        </form>
    </div>
    </div>
  </div>
@stop
