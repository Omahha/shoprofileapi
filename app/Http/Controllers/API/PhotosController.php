<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Photo as ResourcesPhoto;
use App\Http\Resources\PhotoCollection;
use App\Models\Photo;
use App\Models\Type;
use Illuminate\Http\Request;

class PhotosController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($typeName)
    {
        //
        $type = Type::where('name', $typeName)->first();
        $photos = Photo::where('type_id', $type->id)->get();
        return $this->sendResponse(new PhotoCollection($photos), 'Get photos successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($file = $request->file('path')) {
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create([
                'path' => $name,
                'type_id' => $request->type,
                'requirePassword' => $request->requirePassword
            ]);
        }

        return $this->sendResponse(new ResourcesPhoto($photo), 'Photo added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
        unlink(public_path().$photo->path);
        $photo->delete();

        return $this->sendResponse(['deleted'], 'Delete successfully.');
    }
}
