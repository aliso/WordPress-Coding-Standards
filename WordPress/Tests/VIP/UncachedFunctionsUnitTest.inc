<?php

get_posts(); // bad
wp_get_recent_posts(); // bad
get_children(); // bad
wp_get_post_terms(); // bad
wp_get_post_categories(); // bad
wp_get_post_tags(); // bad
wp_get_object_terms( $object_id, array( 'post_tag' ) ); // bad
wp_old_slug_redirect(); // bad
get_term_by( 'slug', $term_slug, 'post_tag' ); // bad
get_cat_ID( $cat_name ); // bad
get_category_by_slug( $slug ); // bad
get_term_link( $term ); // bad
get_page_by_title( $page_title ); // bad
get_page_by_path( $page_path ); // bad
url_to_postid( $url ); // bad

class Foo {
	function get_posts() {} // ok
}
class Bar {
	static function get_posts() {} // ok
}
$x = new Foo();
$x->get_posts(); // ok
$y = Bar::get_posts(); // ok
\SomeNamespace\get_posts(); // ok

\get_posts(); // bad
