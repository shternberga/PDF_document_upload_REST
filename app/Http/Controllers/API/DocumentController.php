<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Document;
use App\ThumbnailManager\ThumbnailManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $documents = Document::latest()->paginate(20);
        return response()->json($documents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        request()->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);
        if ($request->hasFile('file')) {

            $uploadsDirectory = 'uploads/';
            $fileName = strtolower($request->file('file')->getClientOriginalName()); // rename pdf_file
            $request->file('file')->move($uploadsDirectory, $fileName);

            $document = new Document();
            $document->file = $fileName;
            $document->save();

            (new ThumbnailManager())->make(
                $uploadsDirectory,
                'thumbnails/',
                $fileName
            );
        }
        return response()->json([
            'success' => true,
            'message' => 'Great! File has been successfully uploaded.'
        ], 200);
    }

}
