<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Validator;

class PostController extends Controller
{
    /**
     * Return home view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }


    /**
     * Validate form and return data in JSON
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function validateDate(Request $request)
    {
        //validate request
        $validator = Validator::make($request->all(), [
            'fecha' => 'required|date_format:"d-m-Y"',
        ]);

        //render errors or data
        if($validator->fails()){
            //render error view
            $view = view('errors', ['errors' => $validator->errors()])->render();

            return response()->json([
                'view' => $view
            ]);
        }else{
            //Post creator (without save it in DB)
            $post = Post::make($request->all());
            //render message view
            $view = view('message', compact('post'))->render();

            return response()->json([
                'isLeapYear' => $post->fecha->isLeapYear(),
                'day_ca' => $post->dayOfTheWeek('ca'),
                'day_es' => $post->dayOfTheWeek('es'),
                'view' => $view
            ]);
        }


    }
}
