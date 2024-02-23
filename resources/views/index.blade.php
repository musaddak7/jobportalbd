@extends('master') 

@section('content') 
@include ("includes/slider")
<div class="mainsection clear">
  <div class="funcatname clear">
    <h3>Browse Category</h3>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <ul> @foreach($cat->chunk(ceil($cat->count() / 2))->first() as $cati) 
          <li><a href="jobdetails">{{$cati->name }}</a></li> 
          @endforeach </ul>
      </div>
      <div class="col-md-6">
        <ul> @foreach($cat->chunk(ceil($cat->count() / 2))->last() as $cati) 
        <li><a href="">{{$cati->name }}</a></li>
        @endforeach </ul>
      </div>
    </div>
  </div>
  <div class="govmentjob clear">
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
  </div>
</div>
<div class="mainsecond clear">
  <div class="row" style="margin: 30px 146px 30px;
  width: 93%;">
            <div class="col-md-2"><h5>Training</h5><p>This is training section</p>

            </div><div class="col-md-2"  ><h5>Training</h5><p>This is training section</p>

            </div><div class="col-md-2"  ><h5>Training</h5><p>This is training section</p>

            </div><div class="col-md-2"  ><h5>Training</h5><p>This is training section</p>

            </div><div class="col-md-2"  ><h5>Training</h5><p>This is training section</p>

            </div><div class="col-md-2"  ><h5>Training</h5><p>This is training section</p>

            </div><div class="col-md-2"  ><h5>Training</h5><p>This is training section</p>

            </div><div class="col-md-2"  ><h5>Training</h5><p>This is training section</p>

            </div><div class="col-md-2"  ><h5>Training</h5><p>This is training section</p>

            </div><div class="col-md-2"  ><h5>Training</h5><p>This is training section</p>

            </div>
            

    </div>
 @endsection