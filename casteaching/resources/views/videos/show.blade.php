<x-casteaching-layout>
{{--    @if($video)--}}
        <div class="text-white">
        <h1>{{ $video->title }}</h1>
        <ul>
            <li>{{ $video->description }}</li>
            <li>{{ $video->published_at }}</li>
        </ul>
        </div>
{{--    @else--}}
{{--        <p>Video not found.</p>--}}
{{--    @endif--}}

</x-casteaching-layout>



