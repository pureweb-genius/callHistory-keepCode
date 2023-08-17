<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download()
    {
        $filePath = public_path('callJournal.rar');

        return response()->file($filePath);
    }
}
