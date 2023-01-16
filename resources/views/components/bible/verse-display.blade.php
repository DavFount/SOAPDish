<div>
    <p class="text-gray-100">
    @foreach($verses as $verse)
            <sup class="font-features sups"> {{ $verse['verseId'] }}</sup> {{ $verse['verse'] }} &nbsp;
    @endforeach
    </p>
</div>
