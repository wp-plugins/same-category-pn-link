=== Specific Category PN Link ===

Contributors: halt2965
Donate link: http://web.lugn-design.com/
Tags: Category,Link,prev,next,post,past,single,prevpost,nextpost,pn
Requires at least: 3.0.0
Tested up to: 3.3
Stable tag: 1.2

Write out the article about a specific category link.

== Description ==
Write out the article about a specific category link.
標準で用意されていない特定カテゴリの前後の記事リンクを出力します。

== Installation ==

1. Upload `SpecificCategoryPNLink` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the ‘Plugins’ menu in WordPress
3. Place `<?php specific_cat_link($cat_array,TRUE); ?>` or `<?php specific_cat_link($cat_id,FALSE); ?>` in your templates

more detail. 
詳しくはプラグインのページを参照
http://goo.gl/wbP2X


== Frequently Asked Questions ==


== Changelog ==

= 1.2 =
* Bug fix.
specific_cat_link関数で引数をfalseにした場合正常に動かなかった問題を解決。

= 1.0 =
公開

== Upgrade Notice ==


== Arbitrary section ==
specific_cat_linkやexclude_post_id関数注意点。
第2引数がtrueの場合は第1引数はカテゴリの配列。
第2引数がfalseの場合は第1引数はカテゴリのID(複数可)。
違うと動かないので注意して下さい。