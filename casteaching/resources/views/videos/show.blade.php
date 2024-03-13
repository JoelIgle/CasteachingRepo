<x-casteaching-layout>
    @if($video)
        <div class="text-gray-800">
        <h1>{{ $video->title }}</h1>
        <ul>
            <li>{{ $video->description }}</li>
            <li>{{ $video->published_at }}</li>
        </ul>
        </div>
    @else
        <p>Video not found.</p>
    @endif

</x-casteaching-layout>



