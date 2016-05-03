<?php
/*
Name: Archives Page Listing
Author: GirlieWorks, LLC
Description: List of Available Archives
Version: 1.1
Class: gwthesis_archives_page_listing
*/

class gwthesis_archives_page_listing extends thesis_box {
	protected function translate() {
		$this->title = __('Archives Page Listing', 'gwthesis_archives');
	}

	public function html() {
		echo "\t\t\t\t\t<h3 class=\"top\">" . __('By Month:', 'gwthesis_archives') . "</h3>\n";
		echo "\t\t\t\t\t<ul>\n";
		wp_get_archives('type=monthly');
		echo "\t\t\t\t\t</ul>\n";
		echo "\t\t\t\t\t<h3>" . __('By Category:', 'gwthesis_archives') . "</h3>\n";
		echo "\t\t\t\t\t<ul>\n";
		wp_list_categories('title_li=0');
		echo "\t\t\t\t\t</ul>\n";
        echo "\t\t\t\t\t<h3>" . __('By Title:', 'gwthesis_archives') . "</h3>\n";
        echo "\t\t\t\t\t<ul>\n";
        $allposts = get_posts('&numberposts=-1');
        foreach($allposts as $post):
        	setup_postdata($post);
        	$ptitle = $post->post_title;
        	$result .= '<li><span class="post_title"><a href="' .get_permalink($post->ID). '">' . $ptitle . '</a></span></li>';
        	endforeach;
        echo $result;
        echo "\t\t\t\t\t</ul>\n"; 
	}
}
