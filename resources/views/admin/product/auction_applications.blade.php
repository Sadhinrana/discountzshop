@extends('admin.layouts.app')

@section('title')
    Auction Application
@endsection

@section('breadcrumbhead')
    Auction Application
    <small>Control panel</small>
@endsection

@section('breadcrumb')
    <li class="active">Auction Application</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Auction Application</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Auction</th>
                    <th>Bid Start</th>
                    <th>Bid End</th>
                    <th>Name</th>
                    <th>Bid amount</th>
                    <th>Bid Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($auction_applications as $auction_application)
                    <tr>
                        <td>{{ $auction_application->auction->product->productName }}</td>
                        <td>{{date('F d, Y', strtotime($auction_application->auction->date))}}</td>
                        <td>{{date('F d, Y', strtotime($auction_application->auction->valid_until))}}</td>
                        <td>{{ $auction_application->user->name }}</td>
                        <td>৳ {{ number_format($auction_application->quotation) }}</td>
                        <td>{{date_format($auction_application->created_at, 'M d, Y')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection