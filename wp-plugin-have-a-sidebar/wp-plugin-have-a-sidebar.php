<?php
/*
Plugin Name: Have a Sidebar
Description: 管理者以外のユーザログイン時にサイドメニューから「コメント」「プラグイン」「ツール」「設定」を削除するプラグイン
Version:     0.0.1
Author:      アルム＝バンド
*/

function have_a_sidebar_rm_sidebar_menu_exclude_admin() {
    // ログイン時
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();
        // 管理者以外
        if ( ! in_array( 'administrator', $current_user->roles, true ) ) {
            remove_menu_page( 'edit-comments.php' );   // コメント
//            remove_menu_page( 'plugins.php' );       // プラグイン
            remove_menu_page( 'tools.php' );           // ツール
            remove_menu_page( 'options-general.php' ); // 設定
        }
    }
}
add_action( 'admin_menu', 'have_a_sidebar_rm_sidebar_menu_exclude_admin', 999 );
