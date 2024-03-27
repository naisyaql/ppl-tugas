@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($address) ? 'Edit Address' : 'Create Address' }}</div>

                <div class="card-body">
                    <form action="{{ isset($addresses) ? route('addresses.update', $addresses->id) : route('addresses.store') }}" method="POST">
                        @csrf
                        @if(isset($address))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="street">Street</label>
                            <input type="text" class="form-control" id="street" name="street" value="{{ isset($address) ? $address->street : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ isset($address) ? $address->city : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{ isset($address) ? $address->state : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ isset($address) ? $address->postal_code : '' }}">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ isset($address) ? 'Update' : 'Create' }}</button>
                        <a href="{{ route('addresses.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
