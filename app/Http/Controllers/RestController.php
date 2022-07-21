<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

class RestController extends Controller
{
    //  BLOG

    public function blogs()
    {
        $response = Http::get(
            'http://127.0.0.1:8001/api/posts',
            [
                'headers' => [
                    'Accept'        => 'application/json',
                ],
            ]
        );

        $posts = array();
        $result = json_decode($response->getBody());

        $getPosts = $result[0];
        $getCategories = $result[1];

        $search = request('search');

        foreach ($getPosts as $element) {
            if (str_contains($element->title, $search)) {
                $posts[] = $element;
            }
        }

        return view('pages.blog', ['posts' => $posts, 'categories' => $getCategories]);
    }

    public function showPost($id)
    {
        $response = Http::get(
            'http://127.0.0.1:8001/api/posts',
            [
                'headers' => [
                    'Accept'        => 'application/json',
                ],
            ]
        );
        $result = json_decode($response->getBody());
        $posts = $result[0];
        $categories = $result[1];

        foreach ($posts as $element) {
            if ($id == $element->id) {
                $posts = $element;
            }
        }

        return view('pages.showBlog', [
            'post' => $posts,
            'categories' => $result[1],
        ]);
    }

    public function addCommentToPost($id, Request $req)
    {
        $comment = $req->comment;

        $http = new Client();
        $http->request('POST', 'http://127.0.0.1:8001/api/blog/' . $id . '/comments', [
            'headers' => [
                'cache-control' => 'no-cache',
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'form_params' => [
                'comment' => $comment
            ],
        ]);

        $notification = array(
            'message' => 'Comment adedd with success',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function showCategory($id)
    {
        $response = Http::get(
            'http://127.0.0.1:8001/api/posts',
            [
                'headers' => [
                    'Accept'        => 'application/json',
                ],
            ]
        );

        $result = json_decode($response->getBody());
        $categories = $result[1];
        $categoryName = null;

        foreach ($categories as $cat) {
            if ($id == $cat->id) {
                $categories = $cat;
                $categoryName = $cat->name;
            }
        }

        $posts = $categories->posts;

        return view('pages.showCategory', [
            'posts' => $posts,
            'categories' => $result[1],
            'name' => $categoryName
        ]);
    }

    public function showPostsByTag($tag)
    {
        $response = Http::get(
            'http://127.0.0.1:8001/api/posts',
            [
                'headers' => [
                    'Accept'        => 'application/json',
                ],
            ]
        );

        $posts = array();
        $result = json_decode($response->getBody());

        $getPosts = $result[0];
        $getCategories = $result[1];

        foreach ($getPosts as $element) {
            if (str_contains($element->title, $tag)) {
                $posts[] = $element;
            } elseif (str_contains($element->body, $tag)) {
                $posts[] = $element;
            }
        }

        return view('pages.blog', ['posts' => $posts, 'categories' => $getCategories]);
    }
}
