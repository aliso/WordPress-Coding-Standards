<?php
/**
 * Restricts usage of uncached functions in VIP context
 *
 * @category PHP
 * @package  PHP_CodeSniffer
 * @author   Alison Barrett <alison@10up.com>
 */
class WordPress_Sniffs_VIP_UncachedFunctionsSniff extends WordPress_Sniffs_Functions_FunctionRestrictionsSniff {

	/**
	 * Groups of functions to restrict
	 *
	 * Example: groups => array(
	 * 	'lambda' => array(
	 * 		'type' => 'error' | 'warning',
	 * 		'message' => 'Use anonymous functions instead please!',
	 * 		'functions' => array( 'eval', 'create_function' ),
	 * 	)
	 * )
	 *
	 * @return array
	 */
	public function getGroups() {
		$groups = array(
			'get_posts' => array(
				'type'      => 'error',
				'message'   => '%s() is an uncached function; use WP_Query instead.',
				'functions' => array(
					'get_posts',
					'wp_get_recent_posts',
					'get_children',
				),
			),
			'wp_get_post_terms' => array(
				'type'      => 'error',
				'message'   => '%s() is an uncached function; use get_the_terms() instead. Use wp_list_pluck() to get the IDs.',
				'functions' => array(
					'wp_get_post_terms',
					'wp_get_object_terms',
				),
			),
			'wp_get_post_categories' => array(
				'type'      => 'error',
				'message'   => '%s() is an uncached function; use the equivalent get_the_* version instead.',
				'functions' => array(
					'wp_get_post_categories',
					'wp_get_post_tags',
				),
			),
			'wp_old_slug_redirect' => array(
				'type'      => 'error',
				'message'   => '%s() is an uncached function; use wpcom_vip_old_slug_redirect() instead.',
				'functions' => array(
					'wp_old_slug_redirect',
				),
			),
			'get_term_by' => array(
				'type'      => 'error',
				'message'   => "%s() is an uncached function; use wpcom_vip_get_term_by() instead.",
				'functions' => array(
					'get_term_by',
					'get_cat_ID',
				),
			),
		);

		$wpcom_vip_fns = array(
			'get_category_by_slug',
			'get_term_link',
			'get_page_by_title',
			'get_page_by_path',
			'url_to_postid',
		);
		foreach ( $wpcom_vip_fns as $function ) {
			$groups[ $function ] = array(
				'type'      => 'error',
				'message'   => "%s() is an uncached function; use wpcom_vip_$function() instead.",
				'functions' => array(
					$function
				),
			);
		}

		return $groups;
	}
}//end class
