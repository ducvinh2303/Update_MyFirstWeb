<?php
include_once "controller.php";
include "../model/blogModel.php";

class BlogController extends Controller
{

    public function __construct()
    {
    }

    public function getAll()
    {
        try {
            $blogModel = new BlogModel();
            $list = $blogModel->all();
        } catch (\Throwable $th) {
            return;
        }
        return $list;
    }

    public function createBlog($request)
    {
    }

    public function search($request)
    {
    }

    public function update($request)
    {
    }

    public function delete($request)
    {
    }

    public function validateRequestCreateBlog($request)
    {
    }

    public function validateRequestUpdateBlog($request)
    {
    }
}
