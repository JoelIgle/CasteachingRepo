<x-casteaching-layout>
    @if($video)
        <h1>{{ $video->title }}</h1>
        <ul>
            <li>{{ $video->description }}</li>
            <li>{{ $video->published_at }}</li>
        </ul>
    @else
        <p>Video not found.</p>
    @endif
</x-casteaching-layout>



