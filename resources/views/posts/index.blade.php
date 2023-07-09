<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <script>
        function deletePost(id) {
              'use strict'

              if (confirm('削除すると復元できません。\n本当に削除しますか?')) {
		      document.getElementById(`form_${id}`).submit();
	      }
	}
    </script>
    <x-app-layout>
    <x-slot name="header">
     Index
    </x-slot>
    <body>
        <h2> user: {{ Auth::user() }}</h2>
        <h1>Blog Name</h1>
	<div class='posts'>
          @foreach ($posts as $post)    
	      <div class='post'>
		 <h2 class='title'>
                   <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
		 </h2>
                 <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
		 <p class='body'>{{ $post->body }}</p>
                 <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="POST">
                   @csrf
                   @method('DELETE')
                   <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                 </form>
              </div>
	      @endforeach
	<h1>Create New Blog</h1>
	<div class="create">
            <a href='/posts/create'>create</a>
	</div>
	  <div class='paginate'>
	      {{ $posts->links() }}
	  </div>
	</div>
    </body>
     </x-app-layout>
</html>

