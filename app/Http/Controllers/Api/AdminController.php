<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getMessages()
    {
        $messages = \App\Models\Pesan::orderBy('created_at', 'desc')->get();
        return response()->json([
            'success' => true,
            'data' => $messages
        ]);
    }

    public function markAsRead($id)
    {
        $message = \App\Models\Pesan::find($id);
        if ($message) {
            $message->is_read = true;
            $message->save();
            return response()->json([
                'success' => true,
                'message' => 'Status pesan berhasil diperbarui'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Pesan tidak ditemukan'
        ], 404);
    }
}
