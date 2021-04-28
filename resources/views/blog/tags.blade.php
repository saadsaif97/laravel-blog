@extends('layouts.welcome')

@section('title', "$tag->name")



@section('header')
<!-- Header -->
<header class="header text-center text-white"
   style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
   <div class="container">

      <div class="row">
         <div class="col-md-8 mx-auto">

            <h1>Tag: {{ $tag->name }}</h1>
            <p class="lead-2 opacity-90 mt-6">Total: {{ $tag->posts->count() }}
               {{ Str::plural('post', $tag->posts->count()) }}
            </p>

         </div>
      </div>

   </div>
</header><!-- /.header -->
@endsection


@section('content')
<!-- Main Content -->
<main class="main-content">
   <div class="section bg-gray">
      <div class="container">
         <div class="row">


            <div class="col-md-8 col-xl-9">

               @include('inc.search-heading')

               <div class="row gap-y">

                  @forelse($posts as $post)
                  <div class="col-md-6">
                     <div class="card border hover-shadow-6 mb-6 d-block">
                        <a href="{{ route('blog.index', $post->id) }}"><img class="card-img-top"
                              src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}"></a>
                        <div class="p-6 text-center">
                           <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400"
                                 href="#">{{ $post->category->name }}</a></p>
                           <small><a href="{{ config('app.url') }}/blog/post/{{ $post->id }}#disqus_thread">join
                                 discussion</a></small>
                           <h5 class="mb-0"><a class="text-dark"
                                 href="{{ route('blog.index', $post->id) }}">{{ $post->title }}</a></h5>
                        </div>
                     </div>
                  </div>
                  @empty
                  <p>No results found for query <strong>{{ request()->query('search') }}</strong></p>
                  @endforelse


               </div>

               {{ $posts->appends(['search'=>request()->query('search')])->links() }}


            </div>



            <div class="col-md-4 col-xl-3">
               @include('inc.blog-sidebar')
            </div>

         </div>
      </div>
   </div>
</main>
@endsection
