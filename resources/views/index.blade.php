@extends('master') 
@section('content') 
<div class="mainsection" style="background:silver;">
  <div class="funcatname">
    <h3>Browse Category</h3>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <ul> @foreach($funcategories->chunk(ceil($funcategories->count() / 2))->first() as $category) <li>{{$category->funcatname }}</li> @endforeach </ul>
      </div>
      <div class="col-md-6">
        <ul> @foreach($funcategories->chunk(ceil($funcategories->count() / 2))->last() as $category) <li>{{$category->funcatname }}</li> @endforeach </ul>
      </div>
    </div>
  </div>
  <div class="govmentjob" style="float:right">
    <h3>Gov. Job</h3>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <ul>
          <li>Assistant Officer-Accounts</li>
          <li>Assistant Officer-Accounts</li>
          <li>Assistant Officer-Accounts</li>
          <li>Assistant Officer-Accounts</li>
        </ul>
      </div>
    </div>
  </div><div style="clear:both"></div>
</div>
<div style="clear:both"></div>
<div class="mainsecond" style="background:red; height:500px">

</div>
<div style="clear:both"></div> @endsection