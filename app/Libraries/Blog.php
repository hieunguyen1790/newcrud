<?php
namespace App\Libraries;

Class Blog{
	public function postItem($params){
		return view('admin/component/blog_item', $params);
	}
}