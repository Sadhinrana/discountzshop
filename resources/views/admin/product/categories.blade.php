@extends('admin.layouts.app')

@section('title')
    Category
@endsection

@section('breadcrumbhead')
    Category
    <small>Control panel</small>
@endsection

@section('breadcrumb')
    <li class="active">Category</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Category</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Category name</th>
                    <th>Category image</th>
                    <th>Parent Category</th>
                    <th>
                        action
                        <a href="#" class="addCategory btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($allcategories as $category)
                    <tr id="category{{$category->id}}">
                        <td>{{$category->categoryName}}</td>
                        <td><img src="{{asset('storage/images/icons/menu/'.$category->catImage)}}" alt="N/A"></td>
                        <td>
                            @if($category->parent_id == 0)
                                None
                            @else
                                {{$category->parent->categoryName}}
                            @endif
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <a href="#" class="edit-category btn btn-warning btn-sm" data-id="{{$category->id}}" data-categoryName="{{$category->categoryName}}" data-catImage="{{$category->catImage}}" data-parent_id="{{$category->parent_id}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="delete-category btn btn-danger btn-sm" data-id="{{$category->id}}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    {{-- Modal Form Create Post --}}
    <div id="create" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title" id="largeModalLabel">Large Modal</h2>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="category-add-form" action="{{url('categories')}}">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="categoryName">Category Name :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="categoryName" placeholder="Category Name Here" required>
                                <p class="error categoryName text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="categoryName">Category Image :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="catImage">
                                <p class="error catImage text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="parent_id">Parent Category :</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="parent_id" required>
                                    <option value="0">None</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                        @if(count($category->childs))
                                            @include('admin.product.manageCatChild',['childs' => $category->childs])
                                        @endif
                                    @endforeach
                                </select>
                                <p class="error parent_id text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="submit"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-success" type="submit">
                                    <span class="glyphicon glyphicon-plus"></span>Save Category
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    {{-- Modal Form Edit and Delete Post --}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title" id="largeModalLabel">Large Modal</h2>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="modal" id="category-edit-form">
                        <input type="hidden" id="fid">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="categoryName">Category Name :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Category Name Here" required>
                                <p class="error categoryName text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="categoryName">Category Image :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" id="catImage" name="catImage">
                                <p class="error catImage text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="categoryName">Parent Category :</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="parent_id" id="parent_id" required>
                                    <option value="0">None</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                        @if(count($category->childs))
                                            @include('admin.product.manageCatChild',['childs' => $category->childs])
                                        @endif
                                    @endforeach
                                </select>
                                <p class="error parent_id text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="submit"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-warning" type="submit">
                                    <span class="glyphicon glyphicon-check"></span>Update Cat
                                </button>
                            </div>
                        </div>
                    </form>
                    {{-- Form Delete Post --}}

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon"></span>close
                    </button>

                </div>
            </div>
        </div>
    </div>

    {{-- Form Delete Post --}}
    <div id="delete" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <div class="deleteContent">
                        Are You sure want to delete this data?
                        <span class="hidden id" style="display:none"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class="glyphicon"></span>
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

@endsection