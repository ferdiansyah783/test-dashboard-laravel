<div>
    @if ($errors->count())
        @foreach ($errors->all() as $error)
            <p class="text-sm text-red-500 my-2">{{ $error }}</p>
        @endforeach
    @endif
</div>
