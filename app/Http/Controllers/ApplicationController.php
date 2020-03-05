<?php

namespace App\Http\Controllers;

use App\Application;
use App\File;
use App\Http\Requests\ApplicationStoreRequest;

class ApplicationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('applications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(ApplicationStoreRequest $request)
    {
        $application = Application::create($request->only(['name', 'email', 'message']));

        $uploadedFile = $request->file('file');

        if ($uploadedFile->store('public')) {

            $attributes = [
                'name'      => $uploadedFile->hashName(),
                'extension' => $uploadedFile->extension(),
            ];

            $application->file()->save((new File)->fill($attributes));
        }

        return response()->json(['status' => 'success']);
    }
}
