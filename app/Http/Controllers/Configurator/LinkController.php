<?php

namespace App\Http\Controllers\Configurator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\LinkValidator;
use App\Models\Link;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Authenticatable $user
     * @return array
     */
    public function index(Authenticatable $user)
    {
        $data = Link::where('company_id', $user->company_id)->get();

        $tree = function ($elements, $parentId = 0) use (&$tree) {
            $branch = [];

            foreach ($elements as $element) {
                if ($element['children'] == $parentId) {
                    $children = $tree($elements, $element['id']);
                    if ($children) {
                        $element['children'] = $children;
                    }  else {
                        $element['children'] = [];
                    }
                    $branch[] = $element;
                }
            }

            return $branch;
        };

        $tree = $tree($data);
        return $tree;

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
     * @param LinkValidator $request
     * @param Authenticatable $user
     * @return void
     */
    public function store(LinkValidator $request, Authenticatable $user)
    {
        return Link::updateOrCreate(
            ['company_id' => $user->company_id, 'name' => $request->name],
            ['children' => $request->children]
        );
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
    public function destroy($id)
    {
        //
    }
}
