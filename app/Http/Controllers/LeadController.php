<?php

// app/Http/Controllers/LeadController.php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Project;

class LeadController extends Controller
{
    // Menampilkan list lead
    public function index()
    {
        $leads = Lead::with('product')->get();
        return view('leads.index', compact('leads'));
    }

    // Menampilkan form untuk membuat lead baru
    public function create()
    {
        $products = Product::all();
        return view('leads.create', compact('products'));
    }

    // Menyimpan data lead baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
        ]);

        $lead = Lead::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'product_id' => $request->product_id,
        ]);

        Project::create([
            'lead_id' => $lead->id,
            'product_id' => $lead->product_id,
        ]);

        return redirect()->route('leads.index')->with('success', 'Lead created successfully.');
    }

    // Menampilkan form untuk edit lead
    public function edit(Lead $lead)
    {
        $products = Product::all();
        return view('leads.edit', compact('lead', 'products'));
    }

    // Memperbarui data lead
    public function update(Request $request, Lead $lead)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
        ]);

        $lead->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'product_id' => $request->product_id,
        ]);

        return redirect()->route('leads.index')->with('success', 'Lead updated successfully.');
    }

    // Menghapus lead
    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')->with('success', 'Lead deleted successfully.');
    }

}

