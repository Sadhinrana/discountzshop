@extends('admin.layouts.app')

@section('title')
    Blog
@endsection

@section('breadcrumbhead')
    Blog
    <small>Control panel</small>
@endsection

@section('breadcrumb')
    <li class="active">Blog</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Blog</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Blog Title</th>
                    <th>Category</th>
                    <th>Blog Image</th>
                    <th>Blog Description</th>
                    <th>
                        action
                        <a href="#" class="addBlog btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $blog)
                    <tr id="blog{{$blog->id}}">
                        <td>{{$blog->blogTitle}}</td>
                        <td>{{$blog->category->categoryName}}</td>
                        <td><img src="{{asset('storage/images/blog/'.$blog->blogImage)}}" height="100px" width="100px"></td>
                        <td>{!! html_entity_decode($blog->description) !!}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="#" class="edit-blog btn btn-warning btn-sm" data-id="{{$blog->id}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="delete-blog btn btn-danger btn-sm" data-id="{{$blog->id}}">
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
                    <form class="form-horizontal" role="form" id="addBlog" action="{{url('blogs')}}">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="blogTitle">Blog Title :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="blogTitle" placeholder="Blog Title Here" required>
                                <p class="error blogTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="blogTitle">Category :</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="category_id" name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                        @if(count($category->childs))
                                            @include('admin.product.manageCatChild',['childs' => $category->childs])
                                        @endif
                                    @endforeach
                                </select>
                                <p class="error category_id text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="blogImage">Blog Image :</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="blogImage" required>
                                <p class="error blogImage text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="description">description :</label>
                            <div class="col-sm-10">
                                <textarea id="editor1" name="description" rows="10" cols="80"></textarea>
                                <p class="error description text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="submit"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-success" type="submit">
                                    <span class="glyphicon glyphicon-plus"></span>Save Blog
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

    {{-- Modal Form Edit --}}
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
                    <form class="form-horizontal" role="form" id="updateBlog" action="{{url('blogs')}}">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="blogTitle">Blog Title :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="blogTitle" name="blogTitle" placeholder="Blog Title Here" required>
                                <p class="error eblogTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="blogTitle">Category :</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="ecategory_id" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                        @if(count($category->childs))
                                            @include('admin.product.manageCatChild',['childs' => $category->childs])
                                        @endif
                                    @endforeach
                                </select>
                                <p class="error ecategory_id text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="blogImage">Blog Image :</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="blogImage">
                                <p class="error eblogImage text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="description">description :</label>
                            <div class="col-sm-10">
                                <textarea id="editor" name="description" rows="10" cols="80"></textarea>
                                <p class="error edescription text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="submit"><input type="hidden" id="ID"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-warning" type="submit">
                                    <span class="glyphicon glyphicon-edit"></span>Update Blog
                                </button>
                            </div>
                        </div>
                        <input type="hidden" id="fid">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon"></span>close
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ModalDelete --}}
    <div id="delete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title" id="largeModalLabel">Large Modal</h2>
                </div>
                <div class="modal-body">
                    {{-- Form Delete Post --}}
                    <div class="deleteContent">
                        Are You sure want to delete this data?
                        <span class="hidden id" style="display:none"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class="glyphicon"></span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon"></span>close
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor');
    </script>
@endsection