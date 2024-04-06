@extends('layouts.app') 
@section('content')  

		<div class="blog-entries p-4">
			<h3 class="text-center mt-4 mb-4">Read Our  Blogs</h3>
			<!-- Blog Post -->
			@foreach($blogs as $blog)	
			<div class="card mb-4">
				<div class="card-body">
				  <div class="row">
					<div class="col-lg-6">
					  <a href="#">
						<img class="img-fluid rounded" src="{{asset('images/blogs/'.$blog->image.'')}}" alt="" />
						
					  </a>
					</div>
					<div class="col-lg-6">
					  <h2 class="card-title">{{$blog->title}}</h2>
					  <p class="card-text">{!!substr($blog->body, 0, 140) !!}....</p>
					  <a href="{{ route('blogs.show', ['id' => $blog->id]) }}" class="btn btn-primary">Read More &rarr;</a>
					</div>
				  </div>
				</div>
				<div class="card-footer text-muted">
					Posted on {{ $blog->created_at->format('F j, Y') }}
				</div>

			</div>
			@endforeach

			

		</div>

		<!-- <div class="pagination_bar_arrow">
			<ul class="pagination justify-content-center mb-4">
				<li class="page-item">
					<a class="page-link" href="#">&larr; Older</a>
				</li>
				<li class="page-item disabled">
					<a class="page-link" href="#">Newer &rarr;</a>
				</li>
			</ul>
		</div> -->

    </div>

  </div>
  <!-- /.container -->
@endsection