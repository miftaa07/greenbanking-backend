<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    /**
     * Simpan pesan dari form contact
     */
    public function store(ContactRequest $request): JsonResponse
    {
        // Simpan data ke database (tabel messages)
        $message = Message::create([
            'nama'        => $request->nama,
            'email'       => $request->email,
            'organisasi'  => $request->organisasi,
            'pesan'       => $request->pesan,
        ]);

        // Return response JSON
        return response()->json([
            'message' => 'Pesan berhasil dikirim!',
            'data'    => $message,
        ], 201); // 201 = data berhasil dibuat
    }
}