<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ApiDocumentController extends Controller
{
    public function __construct()
    {
        if (config('app.env') !== 'local') {
            abort(404);
        }
    }

    public function docs()
    {
        $filePath = storage_path('openapi/api-docs.yml');

        if (!File::exists($filePath)) {
            abort(404, 'Cannot find '.$filePath);
        }

        $content = File::get($filePath);

        return Response::make($content, 200, [
            'Content-Type' => 'text/x-yaml',
        ]);
    }

    public function index()
    {
        return view('swagger.index', [
            'urlToDocs' => route('api.docs', 'api-docs.yaml'),
            'operationsSorter' => null,
            'configUrl' => null,
            'validatorUrl' => null,
        ]);
    }
}
