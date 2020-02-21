<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Document;
use App\Http\Requests\UploadRequest;
use App\ThumbnailManager\ImagickThumbnailManager;
use App\ThumbnailManager\ThumbnailManagerInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    /**
     * @var ImagickThumbnailManager
     */
    private $thumbnailManager;

    public function __construct(ThumbnailManagerInterface $thumbnailManager)
    {
        $this->thumbnailManager = $thumbnailManager;
    }

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
    public function store(UploadRequest $request)
    {
        $uploadsDirectory = 'uploads/';
        $originalName = strtolower($request->file('file')->getClientOriginalName());
        $documentLocation = $request->file('file')->move($uploadsDirectory, time() . $originalName);

        (new Document())->create([
            'location' => $documentLocation,
            'thumbnail_location' => $this->thumbnailManager->make($documentLocation),
            'file' => $originalName
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Great! File has been successfully uploaded.'
        ], 200);
    }

}
