<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'puas_laundry' => 'required|integer|min:1|max:5',
            'puas_harga' => 'required|integer|min:1|max:5',
            'kritik_saran' => 'nullable|string',
        ]);

        Feedback::create($request->all());

        return redirect()->route('feedback.create')->with('success', 'Terima kasih atas feedback Anda!');
    }
}
