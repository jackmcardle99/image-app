<div class="flashmessage alert bg-red-500 text-white font-bold rounded-t px-4 py-2">
    {{$slot}}

</div>
<ul class="flashmessage alert border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 mb-5">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
