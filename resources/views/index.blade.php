@extends('master') 
@section('content') 
<div class="mainsection clear">
  <div class="funcatname clear">
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
  <div class="row" style="margin: 15px 141px 15px;
  width: 1165px;">
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