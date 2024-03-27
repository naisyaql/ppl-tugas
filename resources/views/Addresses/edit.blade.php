@extends('layouts.app')
 
@section('body')
    <h1 class="mb-0">Edit Address</h1>
    <hr />
    <form action="{{ route('addresses.update', $address->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Street</label>
                <input type="text" name="street" class="form-control" placeholder="Street" value="{{ $address->street }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" placeholder="City" value="{{ $address->city }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Province</label>
                <input type="text" name="province" class="form-control" placeholder="Province" value="{{ $address->province }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Country</label>
                <input class="form-control" name="country" placeholder="Country" value= "{{$address->country}}"> </input>
            </div>
            <div class="col mb-3">
                <label class="form-label">Postal Code</label>
                <input class="form-control" name="postal code" placeholder="Postal Code" value= "{{$address->postal_code}}"> </input>
            </div>
        </div>
        
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection