<?php

namespace CookieAdmin\Admin;

if(!defined('COOKIEADMIN_VERSION') || !defined('ABSPATH')){
	die('Hacking Attempt');
}

class Dashboard{
	
	static function dashboard(){
		
		global $cookieadmin_lang, $cookieadmin_error, $cookieadmin_msg, $cookieadmin_settings;
		
		\CookieAdmin\Admin::header_theme(__('Dashboard', 'cookieadmin'));
		
		$view = get_option('cookieadmin_law', 'cookieadmin_gdpr');
		
		// Stat cards
		echo '
		<div class="cookieadmin-stats-grid">
			<div class="cookieadmin-stat-card">
				<div class="cookieadmin-stat-icon cookieadmin-stat-icon--green"><span class="dashicons dashicons-yes-alt"></span></div>
				<div class="cookieadmin-stat-label">'.esc_html__('Consent Banner', 'cookieadmin').'</div>
				<div class="cookieadmin-stat-value cookieadmin-green">'.esc_html__('Enabled', 'cookieadmin').'</div>
			</div>

			<div class="cookieadmin-stat-card">
				<div class="cookieadmin-stat-icon cookieadmin-stat-icon--blue"><span class="dashicons dashicons-admin-site"></span></div>
				<div class="cookieadmin-stat-label">'.esc_html__('Consent Type', 'cookieadmin').' <a class="cookieadmin-stat-edit" href="'.esc_url(admin_url('admin.php?page=cookieadmin-consent')).'">'.esc_html__('Edit', 'cookieadmin').'</a></div>
				<div class="cookieadmin-stat-value cookieadmin-uppercase">'.($view == 'cookieadmin_us' ? esc_html__('US State Laws', 'cookieadmin') : esc_html__('GDPR', 'cookieadmin')).'</div>
			</div>

			<div class="cookieadmin-stat-card">
				<div class="cookieadmin-stat-icon cookieadmin-stat-icon--navy"><span class="dashicons dashicons-google"></span></div>
				<div class="cookieadmin-stat-label">'.esc_html__('Google Consent Mode v2', 'cookieadmin').' <a class="cookieadmin-stat-edit" href="'.esc_url(admin_url('admin.php?page=cookieadmin-settings')).'">'.esc_html__('Edit', 'cookieadmin').'</a></div>
				<div class="cookieadmin-stat-value">'.(!empty($cookieadmin_settings['google_consent_mode_v2']) ? '<span class="cookieadmin-green">'.esc_html__('Enabled', 'cookieadmin').'</span>' : esc_html__('Disabled', 'cookieadmin')).'</div>
			</div>

			<div class="cookieadmin-stat-card">
				<div class="cookieadmin-stat-icon cookieadmin-stat-icon--amber"><span class="dashicons dashicons-update"></span></div>
				<div class="cookieadmin-stat-label">'.esc_html__('Auto Scan', 'cookieadmin').' <a class="cookieadmin-stat-edit" href="'.esc_url(admin_url('admin.php?page=cookieadmin-settings')).'">'.esc_html__('Edit', 'cookieadmin').'</a></div>
				<div class="cookieadmin-stat-value">'.(!empty($cookieadmin_settings['cookieadmin_auto_scan']) ? '<span class="cookieadmin-green">'.esc_html__('Enabled', 'cookieadmin').'</span>' : esc_html__('Disabled', 'cookieadmin')).'</div>
			</div>
		</div>';
		
		\CookieAdmin\Admin::footer_theme();
	}
}