@extends('layouts.backend.main')

@section('title', 'My Blog | Blog index')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Hello {{Auth::user()->name}}
                <small>Blog Index</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('backend.blog.index')}}">Blog</a> </li>
                <li class="active">All posts</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border clearfix">
                    <h3 class="box-title pull-left">Blogs</h3>
                    <div class="pull-left">
                        <a  class="btn btn-sm btn-success" href="{{route('backend.blog.create')}}">Create blog</a>
                    </div>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    @if(!$posts->count())
                    <div class="alert alert-warning">
                        No records found!
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th width="80">Action</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>
                                <a href="{{route('backend.blog.edit', $post->id)}}" class="btn btn-xs btn-default">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="" class="btn btn-xs btn-danger">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->author->name}}</td>
                            <td>{{$post->category->title}}</td>
                            <td>
                                <abbr title="{{$post->dateFormatted(true)}}">{{$post->dateFormatted()}}</abbr>
                                {!! $post->publicationLabel() !!}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        {{ $posts->links() }}
                    </div>
                    <div class="pull-right">

                        <small>{{$postsCount}} Items</small>
                    </div>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
   <script type="application/javascript">
       $('ul.pagination').addClass('no-margin pagination-sm');
   </script>
@endsection
