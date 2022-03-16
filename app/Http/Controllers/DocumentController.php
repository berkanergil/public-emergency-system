<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response(Document::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $documentModel = new Document();

            if ($request->file()) {
                Log::info($request->all());
                $fileName = time() . '_' . $request->file->getClientOriginalName();
                $fileType = $request->file->extension();
                $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                $documentModel->path = '/storage/' . $filePath;
                $documentModel->document_type_id = $request->type;

                $documentModel->save();

                return response($documentModel);
            } else {
                return response(false, 400);
            }
        } catch (Exception $e) {
            return response($e, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return response(Document::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return response(Document::find($id)->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return response(Document::destroy($id));
    }
}
