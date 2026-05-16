<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public function index()
    {
        $logo = Logo::first();
        return view('admin.logos.index', compact('logo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        $logo = Logo::first();

        // Hapus file lama jika ada
        if ($logo && $logo->image_path) {
            $oldPath = public_path('uploads/logos/' . $logo->image_path);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        // Simpan langsung ke public/uploads/logos/
        $file     = $request->file('image_path');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/logos'), $filename);

        if ($logo) {
            $logo->update(['image_path' => $filename]);
        } else {
            Logo::create(['image_path' => $filename]);
        }

        return redirect()->route('admin.logos.index')->with('alert', [
            'icon'  => 'success',
            'title' => 'Berhasil!',
            'text'  => 'Logo landing page berhasil diperbarui.',
        ]);
    }
}
