<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    public function form(Request $request)
    {
        $rules = [
            'title'=>'required|unique:posts|min:3',
            'author'=>'required|min:1',
            'body'=>'required|min:1',
        ];

        $messages = [
            'title.required'=>'O campo título é obrigatório!',
            'title.unique'=>'Já existe um título igual em outro post!',
            'title.min'=>'O campo título precisa ser preenchido!',
            'author.required'=>'O campo autor é obrigatório!',
            'author.min'=>'O campo autor  precisa ser preenchido!',
            'body.required'=>'O campo Texto do Post é obrigatório!',
            'body.min'=>'O campo Texto do Post precisa ser preenchido!',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }else{
            Post::create($request->all());

            $request->session()->flash('alert-success', 'O post foi cadastrado com sucesso!');

            return redirect(route('form'));
        }


    }

    public function post($id)
    {
        return dump(\App\Post::find($id));
    }

    public function list_posts()
    {
        $posts = Post::all();

        return view('list_posts')->with('posts',$posts);
    }


}
