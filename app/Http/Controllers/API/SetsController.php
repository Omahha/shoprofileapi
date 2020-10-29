<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Set as ResourcesSet;
use App\Http\Resources\SetCollection;
use App\Models\Photo;
use App\Models\Set;
use App\Models\Type;
use Illuminate\Http\Request;

class SetsController extends BaseController
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
        $sets = Set::where('type_id', $type->id)->get();


        return $this->sendResponse(new SetCollection($sets), 'Get sets successfully.');
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
        //
        if($file = $request->file('path')) {
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            $set = Set::create([
                'path' => $name,
                'photo_id' => $request->photo_id,
                'type_id' => Photo::where('id', $request->photo_id)->first()->type_id
            ]);
        }

        // return $this->sendResponse(new ResourcesSet($set), 'Set added.');
        return $this->sendResponse(new ResourcesSet($set), 'Set added.');
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
    public function destroy(Set $set)
    {
        //
        unlink(public_path().$set->path);
        $set->delete();

        return $this->sendResponse(['deleted'], 'Delete successfully.');
    }
}
