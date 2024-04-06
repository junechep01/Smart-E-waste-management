@extends('layouts.app')
@section('content')
    <!-- full Title -->


    <!-- Page Content -->
    <div class="container">
        <h1 class="mt-4 mb-3 mt-3">{{$blog->title}}
            <small>Subheading</small>
        </h1>


        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{asset('images/blogs/'.$blog->image.'')}}" alt="" />
                <hr>
                <!-- Date/Time -->
                <p>Posted on  {{ $blog->created_at->format('F j, Y') }}</p>
                <hr>
                <!-- Post Content -->


                <p>{!! $blog->body  !!}</p>


                <hr>
            </div>



            <!-- Sidebar Widgets Column -->
            <div class="col-md-4 blog-right-side">
                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Related Posts</h5>
                    <div class="card-body">
                        @foreach($blogs->sortByDesc('created_at') as $relatedPost)
                            <p>
                                <a href="{{ route('blogs.show', ['id' => $relatedPost->id]) }}">
                                    {{ $relatedPost->title }}
                                </a>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection
