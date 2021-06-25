<x-layout>
    {{-- <?=var_dump($post)?> --}}
    <article>

        <h1>{!! $post->title !!}</h1>
        By <a href="#">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>

        <div>
            {!! $post->body !!}
        </div>
       
    </article>
  
    <a href="/">Go Back!</a>
</x-layout>
