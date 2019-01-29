<?php

namespace App\Http\Controllers;

use App\Crud;
use Cron\Tests\AbstractFieldTest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CRUDController extends Controller
{
    public function index()
    {
        $cruds = array();

        return view('crud.index', compact('cruds'));
    }
    public function create()
    {
        return view('crud.create');
    }
    public function store(Request $request)
    {
        $crud = new Crud([
            'title' => $request->get('title'),
            'post' => $request->get('post')
        ]);

        $crud->save();
        return redirect('/crud');
    }
    public function show($id)
    {

    }
    public function edit(Crud $crud)
    {
        return view('crud.edit', compact('crud'));
    }
    public function update(Request $request, Crud $crud)
    {
        $crud->title = $request->get('title');
        $crud->post = $request->get('post');
        $crud->save();
        return redirect('/crud');
    }
    public function destroy($id)
    {
        $crud = Crud::find($id);
        $crud->delete();

        return redirect('/products');
    }
}
