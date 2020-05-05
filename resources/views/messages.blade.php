@if ($errors->any())
    <div class="popup-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-sm-2">

          </div>
          <div class="col-sm-8">
            <div class="popup">
              <span></span>
              <div class="popup-text" style="color:red">
                <h2 style="color:red">Oops !</h2>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div><!-- /.popup-text -->
            </div><!-- /.popup -->
          </div><!-- /.col-sm-8 -->
          <div class="col-sm-2">

          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.popup-newsletter -->
@endif

@if (\Session::has('success'))
  <div class="popup-newsletter">
    <div class="container">
      <div class="row">
        <div class="col-sm-2">
          
        </div>
        <div class="col-sm-8">
          <div class="popup">
            <span></span>
            <div class="popup-text" style="color:green">
              <h2 style="color:green">Congrats !</h2>
              {{\Session::get('success')}}
            </div><!-- /.popup-text -->
          </div><!-- /.popup -->
        </div><!-- /.col-sm-8 -->
        <div class="col-sm-2">
          
        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.popup-newsletter -->
@elseif (\Session::has('error'))
  <div class="popup-newsletter">
    <div class="container">
      <div class="row">
        <div class="col-sm-2">
          
        </div>
        <div class="col-sm-8">
          <div class="popup">
            <span></span>
            <div class="popup-text" style="color:red">
              <h2 style="color:red">Oops !</h2>
              {{\Session::get('error')}}
            </div><!-- /.popup-text -->
          </div><!-- /.popup -->
        </div><!-- /.col-sm-8 -->
        <div class="col-sm-2">
          
        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.popup-newsletter -->
@endif

<!-- Modal -->
<div class="modal" id="message" role="dialog" style="top: 150px">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title"></h1>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p class="wmessage"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div class="modal" id="compare" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Compare Product</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label col-sm-6" for="toCompare">Choose product from the selectbox to compare them.</label>
          <div class="col-sm-6">
            <select class="form-control" id="toCompare" style="margin-bottom: 10px;">

            </select>
          </div>
        </div>
        <section class="flat-compare">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="wrap-compare">
                  <div class="title">
                    <h3>Compare</h3>
                  </div>
                  <div class="compare-content">
                    <table class="table-compare">
                      <thead>
                      <tr>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr id="compareProductImageName">
                        <th>Product</th>
                      </tr>
                      <tr id="comparePrice">
                        <th>Price</th>
                      </tr>
                      <tr id="compareCart">
                        <th>Add to Cart</th>
                      </tr>
                      <tr id="compareDescription">
                        <th>Description</th>
                      </tr>
                      <tr id="compareColor">
                        <th>Color</th>
                      </tr>
                      <tr id="compareStock">
                        <th>Stock</th>
                      </tr>
                      <tr id="compareDelete">
                        <th>Remove</th>
                      </tr>
                      </tbody>
                    </table><!-- /.table-compare -->
                  </div><!-- /.compare-content -->
                </div><!-- /.wrap-compare -->
              </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
          </div><!-- /.container -->
        </section><!-- /.flat-compare -->
      </div>
    </div>
  </div>
</div>