@extends('layouts.app')
 
@section('body')
    <h1 class="mb-0">Add Addresses</h1>
    <hr />
    <form action="{{ route('addresses.store') }}" method="POST">

        @csrf
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Street</label>
                <input type="text" name="street" class="form-control" placeholder="Street" value="{{ $addresses->street }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" placeholder="City" value="{{ $addresses->city }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Postal Code</label>
                <input class="form-control" name="postal_code" placeholder="Postal Code" value= "{{$addresses->postal_code}}"> </input>
            </div>
            <div class="col mb-3">
                <label class="form-label">Province</label>
                <input type="text" name="province" class="form-control" placeholder="Province" value="{{ $addresses->province }}" > </input>
            </div>
            <div class="col mb-3">
                <label class="form-label">Country</label>
                <input class="form-control" name="country" placeholder="Country" value= "{{$addresses->country}}"> </input>
            </div>
        </div>
       
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Submit</button>
            </div>
        </div>
    </form>
@endsection