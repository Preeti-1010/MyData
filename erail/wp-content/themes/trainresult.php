<?php 

//get_header();
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL);
//$content = file_get_contents('functions.php');
//echo $content;
include "../../../../wp-config.php";
///global $wpdb;

class Trainresult{
	public function index(){

	}
	public function trainStation($data){
		$trainid = $data['trainid'];
		//echo $trainid;
		
		$query = "SELECT * from wpk0_postmeta where post_id=".$trainid." AND `meta_key` LIKE 'train_number' ";

 		print_r($query);die;
 		//echo $query;
		/*global $wpdb;
		$query$table = "SELECT wpk0_posts.* FROM wpk0_posts, wpk0_postmeta WHERE wpk0_posts.ID = wpk0_postmeta.post_id  AND wpk0_posts.post_type = 'train' AND wpk0_posts.post_title LIKE '%$keyword%'";

 $query = get_results($table, OBJECT); = $wpdb->get_col("select * from $wpdb->postmeta where post_id =".$trainid." and meta_key = 'train_number'");
		$trainMeta = $wpdb->$query;
		echo $wpdb->trainMeta;*/
		//print_r($trainMeta );die;
		//print_r($trainMeta);die;		
	}
}

$train = new Trainresult;
$train->trainStation($_POST);

/*$route = route_ajax();
echo print_r($route);die;*/
?>
