<h1>Posts</h1>

@foreach($posts as $post)
    <a href="{{ url('posts/'.str_slug($post->id).'') }}">{{ $post->title }}</a><br>
@endforeach