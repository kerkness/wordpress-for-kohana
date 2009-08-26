<?php

class Wordpress
{
	
	public static function slug( $id = NULL )
	{
		global $wpdb;
		global $post;
		if( ! $id ) $id = $post->ID;
		if( ! $id ) return FALSE;		
		$slug = $wpdb->get_var("SELECT post_name FROM $wpdb->posts WHERE ID = " . $id );
		return $slug;
	}
	
	public static function get_id_from_name( $name )
	{
		global $wpdb;
		//print "SELECT ID FROM $wpdb->posts WHERE post_name = '$name'";
		$id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_name = '$name'" );
		return $id;
	}
	
	public static function get_post_by_name( $name )
	{
		$id = self::get_id_from_name( $name );
		if ( $id ) return get_post( $id );
		return FALSE;
	}
	
	public static function recent_posts( $numberposts=10 )
	{
		$args = array(
			'numberposts' => $numberposts,
		);
		return get_posts( http_build_query($args) );
	}
	
	public static function postid()
	{
		global $post;
		return $post->ID;
	}
	
	final private function __construct()
	{
		// This is a static class
	}
	
	
}