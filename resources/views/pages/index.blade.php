@php
    $chapterNumber = 1;
@endphp
<x-base.layout header="Home">
    <div class="flex-col bg-gray-700 text-gray-300">
        @foreach($chapters['book']['CHAPTER'] as $chapter)
            <div>
                Chapter {{ $chapterNumber }}
            </div>
            <div>
                <ol>
                    @foreach($chapter['VERS'] as $verse)
                        <li>{{ $verse }}</li>
                    @endforeach
                </ol>
            </div>
            @php
                $chapterNumber += 1;
            @endphp
        @endforeach
    </div>
</x-base.layout>
