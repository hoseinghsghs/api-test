<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class PostController extends api_controller
{

    public function edit(Post $post)
    {
        
        return response()->json($post);
    }
     
        public function show()      
        {
            return $this->successResponce(Post::all(),"successed", 201) ;
        }
        public function store(Request $request)      
        {
            $validator=Validator::make($request->all(),[
                
                 'title' => 'required',
                 'body' => 'required',
                 'image' => 'required',
                 'user_id' =>'required',
            ]);

                if($validator->fails()){
                    
                    return response([

                        'date' => $validator->messages(),
                    ],422);
                }

            Post::create([
                'title' => $request->title,
                'body' => $request->body,
                'image' => $request->image,
                'user_id' => $request->user_id,
            ]);
            return $this->successResponce(Post::all(),"successed", 201) ;
        }

        public function update(Request $request ,Post $post){

          $post->update([ 
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image,
            'user_id' => $request->user_id,
        ]);
        $post->save();
        return $this->successResponce($post,"successed", 201) ;
 
        }

   
}