<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Post;
use App\PostsCategory;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function add(CommentRequest $request,$type,$id)
    {

        switch ($type)
        {
            case 'category':
                $model=PostsCategory::findOrFail($id);
                break;
            case 'post':
            default:
                $model=Post::findOrFail($id);
                break;
        }
        $comment=new Comment($request->all());
        /**
         * @var $model PostsCategory|Post
         */
        $model->comments()->save($comment);

        return $comment;
    }
}
