<div>
    @if(session()->has('success'))
        <p class="text-green-700 font-medium">
            * {{ session()->get('success') }}
        </p>
    @endif
</div>
