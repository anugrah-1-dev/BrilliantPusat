<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramCamp;
use Illuminate\Http\Request;

class ProgramCampController extends Controller
{
    public function index()
    {
        $programs = ProgramCamp::latest()->paginate(10);
        return view('admin.programs.camp.index', compact('programs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'stok' => 'nullable|integer',
            'harga_perhari' => 'nullable|integer',
            'harga_satu_minggu' => 'nullable|integer',
            'harga_dua_minggu' => 'nullable|integer',
            'harga_tiga_minggu' => 'nullable|integer',
            'harga_satu_bulan' => 'nullable|integer',
            'harga_dua_bulan' => 'nullable|integer',
            'harga_tiga_bulan' => 'nullable|integer',
            'harga_enam_bulan' => 'nullable|integer',
            'harga_satu_tahun' => 'nullable|integer',
            'fasilitas' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        // Upload thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('asset/upload/camp'), $filename);
            $validated['thumbnail'] = $filename;
        }

        ProgramCamp::create($validated);

        return redirect()->back()->with('alert', [
            'title' => 'Berhasil!',
            'text' => 'Program berhasil ditambahkan.',
            'icon' => 'success',
        ]);
    }

    public function update(Request $request, $id)
    {
        $program = ProgramCamp::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'stok' => 'nullable|integer',
            'harga_perhari' => 'nullable|integer',
            'harga_satu_minggu' => 'nullable|integer',
            'harga_dua_minggu' => 'nullable|integer',
            'harga_tiga_minggu' => 'nullable|integer',
            'harga_satu_bulan' => 'nullable|integer',
            'harga_dua_bulan' => 'nullable|integer',
            'harga_tiga_bulan' => 'nullable|integer',
            'harga_enam_bulan' => 'nullable|integer',
            'harga_satu_tahun' => 'nullable|integer',
            'fasilitas' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        // Upload thumbnail baru jika ada
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('asset/upload/camp'), $filename);
            $validated['thumbnail'] = $filename;
        }

        $program->update($validated);

        return redirect()->back()->with('alert', [
            'title' => 'Berhasil!',
            'text' => 'Program berhasil diperbarui.',
            'icon' => 'success',
        ]);
    }

    public function destroy($id)
    {
        $program = ProgramCamp::findOrFail($id);
        $program->forceDelete();

        return redirect()->back()->with('alert', [
            'title' => 'Berhasil!',
            'text' => 'Program berhasil dihapus.',
            'icon' => 'success',
        ]);
    }
}
