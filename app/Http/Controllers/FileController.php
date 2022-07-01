<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    /**
     * @param Request $request
     * @param string $path
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request, string $path = 'files')
    {
        $extension = $request->file->getClientOriginalExtension();

       // $videoExtensions = ['mp4', 'avi', 'mpeg', 'quicktime'];
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'JPEG', 'PNG', 'JPG'];
        $fileExtensions = ['pdf', 'xlsx', 'doc', 'docx'];

        if /*(in_array($extension, $videoExtensions)) {
            $request->validate([
                'file' => ['required', 'mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4'],
            ]);
        } elseif*/ (in_array($extension, $imageExtensions)) {
            $request->validate([
                'file' => ['required', 'mimes:jpg,jpeg,png,gif'],
            ]);
        } elseif (in_array($extension, $fileExtensions)) {
            $request->validate([
                'file' => ['required', 'mimes:pdf,xlsx,doc,docx'],
            ]);
        } else {
            abort(401);
        }

        $fileName = uploadFile('file', $path);
        return response()->json($fileName);
    }

    /**
     * @param $path
     * @param $attachment
     * @return StreamedResponse
     */
    public function download($path, $attachment)
    {
        $file = sprintf('%s/%s', $path, $attachment);
        return Storage::download($file);
    }
}
