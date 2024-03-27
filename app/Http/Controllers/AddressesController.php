<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressesController extends Controller
{
    public function index()
    {
        // Peroleh ID pengguna yang sedang login
        $userId = Auth::id();

        // Ambil alamat yang terkait dengan pengguna yang sedang login
        $addresses = Address::where('user_id', $userId)->get();

        return view('addresses.index', compact('addresses'));
    }

    public function create()
    {
        $addresses = new Address();
        return view('addresses.create', compact('addresses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
        ]);

        $addressData = $request->all();

        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Menambahkan user_id ke data alamat sebelum disimpan
        $addressData['user_id'] = $userId;

        Address::create($addressData);

        return redirect()->route('addresses.index')
            ->with('success', 'Address created successfully.');
    }

    public function show(string $id)
    {
        $addresses = Address::findOrFail($id);

        return view('addresses.show', compact('addresses'));
    }

    public function edit(Address $address)
    {
        return view('addresses.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $request->validate([
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
        ]);

        $address->update($request->all());

        return redirect()->route('addresses.index')
            ->with('success', 'Address updated successfully');
    }

    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()->route('addresses.index')
            ->with('success', 'Address deleted successfully');
    }
}
