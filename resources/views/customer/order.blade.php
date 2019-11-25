@extends('layouts.customer')
@section('content')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">

                <tr>
                  <th>ID</th>
                  <th>Payment Id</th>
                  <th>Receipt Email</th>
                  <th>Status</th>
                  <th>Amount</th>
                  <th>Transaction Date</th>
                  <th>Created At</th>
                  <th>Invoice</th>
                  <th>Details</th>
                </tr>
				@foreach($orders as $key => $order)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $order->payment->id }}</td>
                  <td>{{ $order->payment->receipt_email }}</td>
                  <td><span class="label label-{{ $order->status->class }}">{{ $order->status->status }}</span></td>
                  <td>{{ number_format($order->payment->amount,2) }}</td>
                  <td>{{ $order->transaction_date }}</td>
                  <td>{{ $order->created_at }}</td>
                  <td>
                    <a href="{{$order->payment->receipt_url}}" target="_blank" class="btn btn-default">Print</a>
                  </td>
                  <td>
                    <button class="btn btn-primary btn-xs accordion-toggle" data-toggle="collapse" data-target="#demo{{ $key }}" ><i class="fa fa-eye"></i></button>
                  </td>
                </tr>

                <tr class="accordion-body collapse" id="demo{{ $key }}">
                  <td colspan="10">
                    <table class="table table-boardered">
                      <thead>
                        <tr style="background: #fff6d1">
                          <th>Item</th>
                          <th>Product Name</th>
                          <th>Product Category</th>
                          <th>Qty</th>
                          <th>Price</th>
                          <th>VAT</th>
                          <th>Amount(+VAT)</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($order->oItem as $key => $item)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $item->product->product_name }}</td>
                          <td>{{ $item->product->category->category_name }}</td>
                          <td>{{ $item->qty }}</td>
                          <td>{{ number_format($item->price,2) }}</td>
                          <td>{{ number_format($item->amount - $item->price,2) }}</td>
                          <td>{{ number_format($item->amount,2) }}</td>
                        </tr>
                        
                        @endforeach
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>Total</td>
                          <td>{{ number_format($order->payment->amount,2)}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>



                
                @endforeach

                 </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>

@endsection