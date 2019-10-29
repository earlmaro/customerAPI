@extends('layout.nav')
@section('content')

<p>TODO APP</p>
@if(count($customer)>0)
@foreach($customers as $customer)
<div class="well">
<h3>{{$customer->name}}</h3>
</div>

@else
<p>no customers found</p>
@endif
@endsection


