<?php
/**
 * Plugin Name:     VK Meta Box Order Deleter
 * Plugin URI:      https://github.com/vektor-inc/vk-meta-box-order-deleter
 * Description:     metaboxの表示順をリセットするプラグインです。記事編集画面のサイドバーのmetaboxが本文欄の下に移動してしまって戻れなくなった時などに有効化してください。一度有効化したらリセットされるので、プラグインを停止してください。
 * Author:
 * Author URI:
 * Text Domain:     vk-meta-box-order-deleter
 * Domain Path:     /languages
 * Version:         0.0.0
 * License:         GNU General Public License v2 or later
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package         vk-meta-box-order-deleter
 */

 /**
  * 編集画面のmetaboxの表示順をリセット
  *
  * @return void
  */
function vk_meta_box_order_delete() {
	// すべての投稿タイプでmetaboxの表示順をリセットする場合.
	$post_types = get_post_types();
	foreach ( $post_types as $key => $value ) {
		$field = 'meta-box-order_' . $key;
		delete_user_meta( wp_get_current_user()->ID, $field );
	}
	// すべての投稿タイプでmetaboxの表示順をリセットする場合の例.
	// delete_user_meta( wp_get_current_user()->ID, 'meta-box-order_post' );
}
add_action( 'admin_init', 'vk_meta_box_order_delete' );
