<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Pesan;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    /**
     * Simpan pesan dari form contact
     */
    public function store(ContactRequest $request): JsonResponse
    {
        // Simpan data ke database (tabel pesan)
        $pesan = Pesan::create([
            'nama'        => $request->nama,
            'email'       => $request->email,
            'subjek'      => $request->organisasi ?? 'Tanpa Organisasi',
            'isi_pesan'   => $request->pesan,
        ]);

        // Return response JSON
        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim!',
            'data'    => $pesan,
        ], 201); // 201 = data berhasil dibuat
    }
}