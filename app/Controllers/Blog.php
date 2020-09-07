<?php namespace App\Controllers;

class Blog extends BaseController
{
	public function index()
	{
		$data = [
			'meta_title' => 'CI4 blog page',
			'title' => 'Blog page',
		];
		$posts = ['title 1', 'title 2', 'title 3'];

		$data['posts'] = $posts;

		return view('admin/blog/index', $data);
	}

	

}
