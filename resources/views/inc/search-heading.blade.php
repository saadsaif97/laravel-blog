@if($search = request()->query('search'))
<div class="row gap-y">
   <p>Search results for: <strong>{{ $search }}</strong></p>
</div>
@endif
