<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    function index()
    {

        $client = new \GuzzleHttp\Client();

        $commentsEndpoint = "https://jsonplaceholder.typicode.com/comments";
        $postsEndpoint = "https://jsonplaceholder.typicode.com/posts";

        $comments = json_decode($client->request('GET', $commentsEndpoint)->getBody());
        $posts = json_decode($client->request('GET', $postsEndpoint)->getBody());

        $commentsCollection = collect($comments);
        $postsCollection = collect($posts);
        $totalComments = $commentsCollection->groupBy('postId')->toArray();
        // dd($totalComments);

        $data = [];
        // dd($posts);
        foreach ($posts as $item) {
            $post = new Post;
            $post->post_id = $item->id;
            $post->post_title = $item->title;
            $post->post_body = $item->body;
            foreach ($totalComments as $totalComment) {
                dd($totalComment);
            }
            // $post->total
        }
        dd($posts);
        return [
            'posts' => $posts,
            'comments' =>  $comments
        ];
    }
}
