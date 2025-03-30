<?php

namespace App\Http\Controllers;

use App\Models\Subtitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SubtitleController extends Controller


{
    public function index()
    {
        $subtitles = Subtitle::all(); // Fetch all subtitles
        return view('subtitles', compact('subtitles')); // Pass data to view
    }
    

    public function create()
    {
        if (Auth::user()->is_admin != 1) {
            Alert::Toast('Unauthorized Accesss!', 'warning');
            return redirect()->route('dashboard');
        }
        return view('admin.sub.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->is_admin != 1) {
            Alert::Toast('Unauthorized Accesss!', 'warning');
            return redirect()->route('dashboard');
        }
    
        $request->validate([
            'name' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'file' => 'required|mimes:srt,vtt,txt|max:2048'
        ]);
    
        // Store the file
        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('subtitles', $fileName, 'public');
    
        // Save subtitle to the database
        Subtitle::create([
            'name' => $request->name,
            'language' => $request->language,
            'file' => $filePath, // Ensure 'file' column exists in your database
        ]);
        Alert::success('Uploaded successfully!', 'Your subtitle has been uploaded');
        return redirect()->route('subtitles');
    }
    

    public function download($id)
    {
        $subtitle = Subtitle::findOrFail($id);
        $filePath = storage_path('app/public/' . $subtitle->file);


        // Check if the file exists before downloading
        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File not found!');
        }

        return response()->download($filePath);
    }
}
