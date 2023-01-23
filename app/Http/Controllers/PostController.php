<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use App\Models\Comments;
use Egulias\EmailValidator\Parser\Comment;

class PostController extends Controller
{
 public function add_post(){
    if(auth::id()){

        return view('home.add_post');
    }else{
        redirect('login');
    }
 }

 public function set_post(Request $request){
    if(auth::id()){

        $validated = $request->validate([
            'title' => 'required|unique:posts',
            'content' => 'required|min:20',
            'image' => 'required|mimes:png,jpg,webp|max:20000'
        ]);
   

       $posts = new posts;
       $posts->title = $request->title;
       $posts->content = $request->content;
       $posts->author = auth::user()->name;
       $posts->image = "null";
       $posts->date = date("Y-m-d H:i:s");
       if($request->has('image')){
           $image = $request->image;
        $imagename ="image_for_web".time().".".$image->getClientOriginalExtension();
        $request->image->move('posts',$imagename);
        $posts->image=$imagename;
       }
       $posts->save() ;
       return redirect()->back()->with('message','Post added successfully');
    }else{
        redirect('login');
    }
 }

    public function single_post($id){
        if(auth::id()){
            $single_post = Posts::find($id);
            $show_comment = Comments::where('post_id','=',$id)->orderby('id','desc')->get();
            $comment_count = Comments::where('post_id','=',$id)->get()->count();
            return view('home.single_post',compact('single_post','show_comment','comment_count'));

        }else{
            return redirect('login');
        }
    }


    public function create_comment(Request $request,$id){
        if(auth::id()){
            $validated = $request->validate([
                'name' => 'required',
                'comment' => 'required|min:2'
            ]);
            
            $user_id = auth::user()->id;
            $post_id = $id;
            $add_coment = new comments;
            $add_coment->name = auth::user()->name;
            $add_coment->comment = $request->comment;
            $add_coment->user_id = $user_id;
            $add_coment->post_id = $post_id;
            $add_coment->date = date("Y-m-d H:i:s");
 
            $add_coment->save();
            return redirect()->back()->with('message','Comment added successfully');
        }else{
            return redirect('login');
        }

    }

    public function delete_post($id){

        $delete_post =Posts::find($id);
        $delete_comments = Comments::where('post_id','=',$id);
        if($delete_comments){
            $delete_comments->delete();
            $delete_post->delete();
            return redirect('/')->with('message','Post deleted');
        }
    }

    public function update_post($id){
        if(auth::id()){
            $old_info = Posts::find($id);
            return view('home.update_post',compact('old_info'));
        }else{
            return redirect('login');
        }

    }
    public function edit_post(Request $request ,$id){
        if(auth::id()){
    
            $validated = $request->validate([
                'title' => 'required|unique:posts',
                'content' => 'required|min:20',
                'image' => 'required|mimes:png,jpg,webp|max:20000'
            ]);
       
    
           $posts =  posts::find($id);
           $posts->title = $request->title;
           $posts->content = $request->content;
           $posts->author = auth::user()->name;
           $posts->image = "null";
           $posts->date = date("Y-m-d H:i:s");
           $image = $request->image;
           if($image){
            $imagename ="image_for_web".time().".".$image->getClientOriginalExtension();
            $request->image->move('posts',$imagename);
            $posts->image=$imagename;
           }
           $posts->save() ;
           return redirect('/')->with('message','Post added successfully');
        }else{
            redirect('login');
        }
     }

}
