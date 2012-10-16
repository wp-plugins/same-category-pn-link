<?php
/*
Plugin Name: Specific Category PN Link
Plugin URI: http://craft-notes.com/web/wordpress/specific-category-pn-link/
Description: Write out the article about a specific category link. "特定カテゴリのみの前後リンク"を出力します。
Version: 1.3
Author: Halt
Author URI: http://craft-notes.com/
*/

// カテゴリIDを受け取りその親カテゴリと子カテゴリを返す
function get_parent_child_id($cat){
	$parent_id = $cat->category_parent;
	$exclude_id = get_category_children($parent_id, "", ',');
	$exclude_id .= $parent_id;
	
	return $exclude_id;
}

// カテゴリIDを受け取りそれを除外したカテゴリIDを返す
function get_exclude_post_id($cat){
	if(is_object($cat)){
		$exclude_id = get_parent_child_id($cat);
	}
	else{
		$exclude_id = $cat;
	}
	
	$cat = get_categories('orderby=id&exclude='.$exclude_id);
	$exclude_id = "";
	foreach ($cat as $key => $value) {
		$exclude_id .= $value->term_id.",";
	}
	$exclude_id = trim($exclude_id, ",");
	return $exclude_id;
}

// 指定したカテゴリのみの前後記事リンクを返す
// 引数
// $cat : 表示したいカテゴリの情報。$parがtrueの場合はカテゴリの配列。$parがfalseの場合はカテゴリのIDを受け取る。
function specific_cat_link($cat){
	$exclude_id = get_exclude_post_id($cat);	?>
	<ul class="sc-pn-link">
		<li class="prevpost"><?php previous_post_link('« %link', '前の記事', FALSE, $exclude_id); ?></li>
		<li class="nextpost"><?php next_post_link('%link »', '次の記事', FALSE, $exclude_id); ?></li>
	</ul>
	<?php
}

// 指定したカテゴリのみの前後記事リンクを返す
// 前後のポストがない場合はリンク無しで返す
// 引数
// $cat : 表示したいカテゴリの情報。"1,2,3" or カテゴリーのオブジェクト
function scpn_lin($cat){
  $exclude_id = get_exclude_post_id($cat);
  echo "<ul class='sc-pn-link'>";
    echo "<li class='prevpost'>";
    if(get_adjacent_post( false, $exclude_id, true )) {
      previous_post_link('%link', '‹ 前のページ', FALSE, $exclude_id);
    }
    else{ echo '<span>‹ 前のページ</span>'; }
    echo "</li>";
    echo "<li class='nextpost'>";
    if(get_adjacent_post(false, $exclude_id, false)) {
      next_post_link('%link ', '次の記事へ &raquo;', FALSE, $exclude_id);
    }
    else { echo '<span>次のページ ›</span>'; }
    echo "</li>";
	echo "</ul>";
}
?>
