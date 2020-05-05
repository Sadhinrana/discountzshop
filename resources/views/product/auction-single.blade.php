@extends('layouts.app')

@section('title')
    Auction Application
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
                        <li class="trail-item">
                            <a href="{{url('auction')}}" title="">Auction</a>
                            <span><img src="{{asset('images/icons/arrow-right.png')}}" alt=""></span>
                        </li>
                        <li class="trail-end">
                            <a href="#" title="">Auction Application</a>
                        </li>
                    </ul><!-- /.breacrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-breadcrumb -->

    <main id="shop">
        <div class="container">
            <div class="row">
                <div class="count-down" data-countdown="{{$auction->valid_until}}">

                </div><!-- /.count-down -->
                <div class="pull-right"><h1>{{ $auction->product->productName }}</h1></div>
            </div><!-- /.row -->
            <div class="row">
                @if($auction->valid_until >= \Illuminate\Support\Carbon::now())
                    <div class="table-data-feature">
                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i> Bid
                        </a>
                    </div>
                @endif
                <div class="table-content table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Bid amount</th>
                            <th>Bid Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($auction_applications as $auction_application)
                            <tr>
                                <td>{{ $auction_application->user->name }}</td>
                                <td>৳ {{ number_format($auction_application->quotation) }}</td>
                                <td>{{date_format($auction_application->created_at, 'M d, Y')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /#main -->

    @if($auction->valid_until >= \Illuminate\Support\Carbon::now())
        <!-- Modal -->
        <div class="modal" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Bid</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('auctionapplications') }}" id="bid">
                            <input type="hidden" name="auction_id" value="{{ $auction->id }}">
                            <div class="fields-content">
                                <p class="success text-center alert alert-success hidden"></p>
                                <div class="field-row">
                                    <label for="quotation">Quotation *</label>
                                    <input type="number" min="1" name="quotation" placeholder="Your price here" required>
                                    <p class="error text-center alert alert-danger hidden"></p>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="field-row">
                                    <button type="submit">Submit</button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    @endif

@endsection

@section('script')
    <script>
        // Set up an event listener for the bid form.
        $('#bid').submit(function(e) {
            // Stop the browser from submitting the form.
            e.preventDefault();

            // Submit the form using AJAX.
            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    if (data.errors){
                        $('success').hide().addClass('hidden');
                        $('.error').show().removeClass('hidden').text(data.errors.quotation);
                    } else {
                        $('error').hide().addClass('hidden');
                        $('.success').show().removeClass('hidden').text('You have submitted your quotation successfully.');
                        setTimeout(function() {
                            $(location).attr("href", window.location.href);
                        }, 4000);
                    }
                }
            });
        });
    </script>
@endsection
