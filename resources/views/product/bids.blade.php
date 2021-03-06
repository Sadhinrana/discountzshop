@extends('layouts.app')

@section('title')
    Bid
@endsection

@section('content')

    <section class="flat-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumbs">
                        <li class="trail-item">
                            <a href="{{url('/')}}" title="">Home</a>
                            <span><img src="{{asset('images/icons/arrow-right.png')}}" alt=""></span>
                        </li>
                        <li class="trail-end">
                            <a href="#" title="">Bid</a>
                        </li>
                    </ul><!-- /.breacrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-breadcrumb -->

    <main id="shop">
        <div class="container">
            <div class="row">
                <div class="table-content table-responsive">
                    <table id="example1" class="table">
                        <thead>
                        <tr>
                            <th>Bid Ends</th>
                            <th>Product</th>
                            <th>Time Left</th>
                            <th>Current Bid</th>
                            <th>
                                Participate
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bids as $bid)
                            <tr>
                                <td>{{date('F d, Y', strtotime($bid->valid_until))}}</td>
                                <td><a href="{{ url('auctions/'.$bid->id) }}">{{$bid->product->productName}}</a></td>
                                <td>
                                    <div class="count-down" data-countdown="{{$bid->valid_until}}"></div><!-- /.count-down -->
                                </td>
                                <td>{{ $bid->application->count() }}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{ url('bids/'.$bid->id) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /#main -->

@endsection

@section('script')
    <!-- DataTables -->
    <script src="{{asset('admins/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>

    <script>
        // Initialize datatable
        $('#example1').DataTable({
            "order": []
        });
    </script>

@endsection
