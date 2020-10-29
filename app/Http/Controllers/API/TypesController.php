<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\TypeCollection;
use App\Models\Type;

use function PHPSTORM_META\type;

class TypesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->sendResponse(new TypeCollection(Type::all()), 'Get Types Successfully');
    }

    public function hasPassword()
    {
        $hasPassword = [
            'textile' => Type::where('name', 'textile')->first()->password ? 'yes' : 'no',
            'graphic' => Type::where('name', 'graphic')->first()->password ? 'yes' : 'no',
            'illustration' => Type::where('name', 'illustration')->first()->password ? 'yes' : 'no'
        ];
        return $this->sendResponse($hasPassword, 'get hasPassword');
    }

    public function checkPassword(Request $request)
    {
        $typePassword = Type::where('name', $request->type)->first()->password;
        $pass = $typePassword == $request->password ? 'pass' : 'no';
        return $this->sendResponse($pass, 'password checked');
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
    public function update(Request $request, Type $type)
    {
        //
        $input = $request->all();
        $type->update([
            'password' => $request->input('password')
        ]);

        return $this->sendResponse($input, 'Type update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
