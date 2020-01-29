@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-1">

            <div class="card">
                <div class="card-header">
                    All Deliveries
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-primary">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Product</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach( $deliveries as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-1"></div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Deliver
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('supplier.deliver') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Select A Product</label>
                            <select name="product_id" class="form-control">
                                @foreach( $products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Deliver</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection