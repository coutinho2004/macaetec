<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('btsPagination')){
	function btsPagination($base_url,$total_rows,$per_page,$id=3){
		$config = array(
			'base_url'=>$base_url,
			'total_rows'=>$total_rows,
			'per_page'=>$per_page,
			'num_links'=>$id,
			'uri_segment'=>$id,
			'use_page_numbers'=>FALSE,
			'full_tag_open'=>"<ul class='pagination'>",
			'full_tag_close'=>"</ul>",
			'first_link'=>FALSE,
			'last_link'=>FALSE,
			'first_tag_open'=>"<li>",
			'first_tag_close'=>"</li>",
			'prev_link'=>"Anterior",
			'prev_tag_open'=>"<li class='prev'>",
			'prev_tag_close'=>"</li>",
			'next_link'=>"Próxima",
			'next_tag_open'=>"<li class='next'>",
			'next_tag_close'=>"</li>",
			'last_tag_open'=>"<li>",
			'last_tag_close'=>"</li>",
			'cur_tag_open'=>"<li class='active'><a href='#'>",
			'cur_tag_close'=>"</a></li>",
			'num_tag_open'=>"<li>",
			'num_tag_close'=>"</li>",
		);
		return $config;
	}
}