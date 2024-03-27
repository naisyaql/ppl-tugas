@extends('layouts.main')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Addresses</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Street</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Postal Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($addresses as $address)
                            <tr>
                                <td>{{ $address->id }}</td>
                                <td>{{ $address->street }}</td>
                                <td>{{ $address->city }}</td>
                                <td>{{ $address->state }}</td>
                                <td>{{ $address->postal_code }}</td>
                                <td>
                                    <a href="{{ route('addresses.edit', $address->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('addresses.create') }}" class="btn btn-success">Add Address</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

