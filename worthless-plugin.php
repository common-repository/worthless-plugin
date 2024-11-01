<?php
/*
Plugin Name: Worthless Plugin
Plugin URI: https://ajdg.solutions/plugins/?mtm_campaign=worthless_plugin
Author: Arnan de Gans
Author URI: https://www.arnan.me/?mtm_campaign=worthless_plugin
Description: A worthless plugin doing nothing useful other than to try and make you smile.
Text Domain: ajdg-worthless
Version: 3.4.4
License: GPLv3
*/ 

defined('ABSPATH') or die();

#---------------------------------------------------
# Load plugin and values
#---------------------------------------------------
add_action('admin_menu', 'worthless_dashboard');
add_action("admin_print_styles", 'worthless_dashboard_styles');
add_action('admin_notices', 'worthless_notifications_dashboard');
add_filter('plugin_action_links_' . plugin_basename( __FILE__ ), 'worthless_action_links');

/*-------------------------------------------------------------
 Name:      worthless_dashboard
 Purpose:   Dashboard pages
-------------------------------------------------------------*/
function worthless_dashboard() {
	add_submenu_page('options-general.php', 'Worthless Plugin', 'Worthless Plugin', 'manage_options', 'worthless-plugin', 'worthless_dashboard_page');
}

/*-------------------------------------------------------------
 Name:      worthless_dashboard_page
 Purpose:   Admin dashboard page
-------------------------------------------------------------*/
function worthless_dashboard_page() {
?>
	<div class="wrap">
		<h2><?php _e('Worthless Plugin', 'ajdg-worthless'); ?></h2>

		<div id="dashboard-widgets-wrap">
			<div id="dashboard-widgets" class="metabox-holder">
				<div id="left-column" class="ajdg-postbox-container">
		
					<div class="ajdg-postbox">
						<h2 class="ajdg-postbox-title"><?php _e('Worthless Plugin', 'ajdg-worthless'); ?></h2>
						<div id="stats" class="ajdg-postbox-content">
							<p><strong><?php _e('Support Worthless Plugin', 'ajdg-worthless'); ?></strong></p>
							<p><?php _e('Consider writing a review or making a donation if you like the plugin or if you find the plugin useful. Thanks for your support!', 'ajdg-worthless'); ?></p>
		
							<p><a class="button-primary" href="https://www.arnan.me/donate.html" target="_blank"><?php _e('Support my work', 'ajdg-worthless'); ?></a> <a class="button-secondary" href="https://wordpress.org/support/plugin/worthless-plugin/reviews?rate=5#postform" target="_blank"><?php _e('Write review on wordpress.org', 'ajdg-worthless'); ?></a> <a class="button-secondary" href="https://ajdg.solutions/forums/forum/everything-else/" target="_blank"><?php _e('Support Forum', 'ajdg-worthless'); ?></a></p>

							<p><strong><?php _e('Plugins and services', 'ajdg-worthless'); ?></strong></p>
							<table width="100%">
								<tr>
									<td width="33%">
										<div class="ajdg-sales-widget" style="display: inline-block; margin-right:2%;">
											<a href="https://ajdg.solutions/product/adrotate-pro-single/?mtm_campaign=worthless_plugin" target="_blank"><div class="header"><img src="<?php echo plugins_url("/images/offers/monetize-your-site.jpg", __FILE__); ?>" alt="AdRotate Professional" width="228" height="120"></div></a>
											<a href="https://ajdg.solutions/product/adrotate-pro-single/?mtm_campaign=worthless_plugin" target="_blank"><div class="title"><?php _e('AdRotate Professional', 'ajdg-worthless'); ?></div></a>
											<div class="sub_title"><?php _e('WordPress Plugin', 'ajdg-worthless'); ?></div>
											<div class="cta"><a role="button" class="cta_button" href="https://ajdg.solutions/product/adrotate-pro-single/?mtm_campaign=worthless_plugin" target="_blank">Starting at &euro; 39,-</a></div>
											<hr>
											<div class="description"><?php _e('Run successful advertisement campaigns on your WordPress and/or ClassicPress website within minutes.', 'ajdg-worthless'); ?></div>
										</div>							
									</td>
									<td width="33%">
										<div class="ajdg-sales-widget" style="display: inline-block; margin-right:2%;">
											<a href="https://ajdg.solutions/product/wordpress-maintenance-and-updates/?mtm_campaign=worthless_plugin" target="_blank"><div class="header"><img src="<?php echo plugins_url("/images/offers/wordpress-maintenance.jpg", __FILE__); ?>" alt="WordPress Maintenance" width="228" height="120"></div></a>
											<a href="https://ajdg.solutions/product/wordpress-maintenance-and-updates/?mtm_campaign=worthless_plugin" target="_blank"><div class="title"><?php _e('WP Maintenance', 'ajdg-worthless'); ?></div></a>
											<div class="sub_title"><?php _e('Professional service', 'ajdg-worthless'); ?></div>
											<div class="cta"><a role="button" class="cta_button" href="https://ajdg.solutions/product/wordpress-maintenance-and-updates/?mtm_campaign=worthless_plugin" target="_blank">Starting at &euro; 22,50</a></div>
											<hr>								
											<div class="description"><?php _e('Get all the latest updates for WordPress and plugins. Maintenance, delete spam and clean up files.', 'ajdg-worthless'); ?></div>
										</div>
									</td>
									<td>
										<div class="ajdg-sales-widget" style="display: inline-block;">
											<a href="https://ajdg.solutions/plugins/?mtm_campaign=worthless_plugin" target="_blank"><div class="header"><img src="<?php echo plugins_url("/images/offers/more-plugins.jpg", __FILE__); ?>" alt="AJdG Solutions Plugins" width="228" height="120"></div></a>
											<a href="https://ajdg.solutions/plugins/?mtm_campaign=worthless_plugin" target="_blank"><div class="title"><?php _e('All my plugins', 'adrotate'); ?></div></a>
											<div class="sub_title"><?php _e('WordPress and ClassicPress', 'adrotate'); ?></div>
											<div class="cta"><a role="button" class="cta_button" href="https://ajdg.solutions/plugins/?mtm_campaign=worthless_plugin" target="_blank">View now</a></div>
											<hr>
											<div class="description"><?php _e('Useful and well designed plugins for WordPres, ClassicPress, WooCommerce, Classic Commerce and bbPress.', 'adrotate'); ?></div>
										</div>
									</td>
								</tr>
							</table>
						</div>
					</div>

				</div>
				<div id="right-column" class="ajdg-postbox-container">
								
					<div class="ajdg-postbox">
						<h2 class="ajdg-postbox-title"><?php _e('News & Updates', 'ajdg-worthless'); ?></h2>
						<div id="news" class="ajdg-postbox-content">
							<p><a href="http://ajdg.solutions/feed/" target="_blank" title="Subscribe to the AJdG Solutions RSS feed!" class="button-primary"><i class="icn-rss"></i>Subscribe via RSS feed</a> <em>No account required!</em></p>

							<?php wp_widget_rss_output(array(
								'url' => 'http://ajdg.solutions/feed/', 
								'items' => 4, 
								'show_summary' => 1, 
								'show_author' => 0, 
								'show_date' => 1)
							); ?>
						</div>
					</div>
		
				</div>
			</div>
		</div>
		
		<div class="clear"></div>
	</div>
<?php
}	

/*-------------------------------------------------------------
 Name:      worthless_action_links
 Purpose:	Plugin page link
-------------------------------------------------------------*/
function worthless_action_links($links) {
	$links['worthless-help'] = sprintf('<a href="%s" target="_blank">%s</a>', 'https://ajdg.solutions/forums/forum/everything-else/?mtm_campaign=worthless_plugin', 'Support');

	return $links;
}

/*-------------------------------------------------------------
 Name:      worthless_dashboard_styles
 Purpose: 	Add security field to comment form
-------------------------------------------------------------*/
function worthless_dashboard_styles() {
	wp_enqueue_style('ajdg-worthless-admin-stylesheet', plugins_url('library/dashboard.css', __FILE__));
}

/*-------------------------------------------------------------
 Name:      worthless_notifications_dashboard
 Purpose:   Show random dashboard notification
-------------------------------------------------------------*/
function worthless_notifications_dashboard() {
	$show_banner = mt_rand(0, 99);
	// DEBUG
//	$show_banner = 1;

	if($show_banner < 15) {
		$content = worthless_notification_content();
		echo '<div class="ajdg-notification notice">';
		echo '	<div class="ajdg-notification-logo" style="background-image: url(\''.plugins_url('/images/arnan.jpg', __FILE__).'\');"><span></span></div>';
		echo '	<div class="ajdg-notification-message"><span class="main">'.$content['main'].'</span>';
		echo (strlen($content['small']) > 0) ? '<br />'.$content['small'] : '';
		echo '  <br /><div align="right"><small>by <a href="https://ajdg.solutions/" target="_blank">Worthless Plugin</a></small></div>';
		echo '  </div>';
		echo '</div>';
	}
}

/*-------------------------------------------------------------
 Name:      worthless_notification_content
 Purpose:   Worthless jokes and silly quotes
-------------------------------------------------------------*/
function worthless_notification_content() {
	
	$content = array(
		array('main' => 'Arnan made this!', 'small' => 'He is world famous on the Internet.'),
		array('main' => 'Worthless Plugin for the win!', 'small' => 'Best plugin ever.'),
		array('main' => 'My mom has a website. You should check it out... <a href="https://www.floatingcoconut.net/?mtm_campaign=worthless_plugin" target="_blank">floatingcoconut.net</a>', 'small' => 'Buy her a coffee through a donation!'),
		array('main' => 'Do not be greedy!', 'small' => 'Guess why.'),
		array('main' => 'Be nice to someone today!', 'small' => 'Just because you can...'),
		array('main' => 'Your site smells funny...', 'small' => 'Just kidding, maybe.'),
		array('main' => 'Is it summer yet?', 'small' => 'It should be...'),
		array('main' => 'Winter is coming!', 'small' => 'Release the dragons!'),
		array('main' => 'I have a website too!', 'small' => 'Take a look at <a href="https://www.arnan.me/?mtm_campaign=worthless_plugin" target="_blank">arnan.me</a>.'),
		array('main' => 'Dolly has got nothing on this!', 'small' => 'Hello...'),
		array('main' => 'Stay clear of sh*t people!', 'small' => 'Follow your gut.'),
		array('main' => 'Be kind to people!', 'small' => 'They have feelings too.'),
		array('main' => 'Pidgeons!!!', 'small' => 'They poop everywhere.'),
		array('main' => 'The larger the world gets. The less space we have.', 'small' => ''),
		array('main' => 'The goose has been cooked!', 'small' => ''),
		array('main' => 'Updating plugins is easy.', 'small' => 'You should try it!'),
		array('main' => 'This notification...', 'small' => ''),
		array('main' => 'Did you clear your spam queue today?', 'small' => 'You know you want to!'),
		array('main' => 'Flip flops are serious business.', 'small' => 'No shoe can surpass that.'),
		array('main' => 'This notification is not very useful', 'small' => ''),
		array('main' => 'AI has great potential, but it has no creativity.', 'small' => ''),
		array('main' => 'Are you stoked or hyped about stuff?', 'small' => 'You are a hipster!'),
		array('main' => '34 42 3 76 33 23', 'small' => 'Your lucky numbers for today.'),
		array('main' => 'Darkmode...', 'small' => 'This plugin does not have it.'),
		array('main' => 'Arnan likes the beach', 'small' => 'You too? We have got a lot in common!'),
		array('main' => 'You hit like a girl.', 'small' => 'Still hurts!'),
		array('main' => 'Make a friend today.', 'small' => 'Maybe he or she can treat you for lunch.'),
		array('main' => 'Give me your money!', 'small' => 'This is a stick-up! \o/ <a href="https://www.arnan.me/donate.html?mtm_campaign=worthless_plugin" target="_blank">Click here</a>.'),
		array('main' => 'Cloudy with a chance of hacks!', 'small' => 'Is your website secure? <a href="https://ajdg.solutions/blog/protect-and-speed-up-your-wordpress-website/?mtm_campaign=worthless_plugin" target="_blank">6 ways to a faster and safer WordPress</a>!'),
		array('main' => 'Did this notification seem slow to you?', 'small' => '<a href="https://ajdg.solutions/blog/howto-supercharge-your-wifi-network/?mtm_campaign=worthless_plugin" target="_blank">Supercharge your wifi network</a>.'),
		array('main' => 'Gotcha!', 'small' => 'Captcha!'),
		array('main' => 'Today is stupid questions day.', 'small' => 'Ask one <a href="https://www.arnan.me/links.html" target="_blank">here</a>.'),
		array('main' => 'YOINK!', 'small' => 'ZING!'),
		array('main' => 'I feel like a stranger in my own country.', 'small' => 'So I moved!'),
		array('main' => 'AI will come for your job...', 'small' => 'Sooner than you think!'),
		array('main' => 'Click on my face!', 'small' => ''),
		array('main' => 'Do not click on my face!', 'small' => ''),
		array('main' => 'We are approaching Brainfreeze!', 'small' => ''),
		array('main' => 'Did you install AdRotate yet?', 'small' => 'Monetize your website... <a href="https://ajdg.solutions/product/adrotate-pro-single/?mtm_campaign=worthless_plugin" target="_blank">click</a>!'),
		array('main' => 'Are you like, famous?', 'small' => ''),
		array('main' => 'Arnan likes pancakes!', 'small' => ''),
		array('main' => 'This plugin has no features!', 'small' => 'And yet here we are :)'),
		array('main' => 'Features are overrated!', 'small' => ''),
		array('main' => 'Star Wars or Star Trek?', 'small' => 'May the force live long and prosper!'),
		array('main' => 'Would our world collapse if we figured out the calendar and time we use is inaccurate?', 'small' => 'Only if your salary depends on a timeclock or punchcard...'),
		array('main' => 'Are we there yet?', 'small' => ''),
		array('main' => 'Freedom is not free!', 'small' => 'Sometimes it is on discount though.'),
		array('main' => 'The tyranny of governments will consume us all...', 'small' => 'Unless you fight against it.'),
		array('main' => 'Here is another one of that Arnan guy.', 'small' => 'I\'m Loving It!'),
		array('main' => 'This notification is good to be true.', 'small' => 'And you know it!'),
		array('main' => 'Windows Phone or Android?', 'small' => 'I kinda like iOS.'),
		array('main' => 'If AI is so smart, why can it not take initiative or do things on its own?', 'small' => 'Because everyone lies to you...'),
		array('main' => 'centOS?', 'small' => 'No! macOS!'),
		array('main' => 'What will you have for dinner tonight?', 'small' => 'Stuffed waffle with mushy peas?'),
		array('main' => 'Got SSL?', 'small' => 'Learn about <a href="https://ajdg.solutions/blog/switching-your-wordpress-site-to-ssl/?mtm_campaign=worthless_plugin" target="_blank">switching your WordPress site to SSL</a> to make it more secure!'),
		array('main' => 'Is your WordPress up-to-date?', 'small' => 'It better be... If not, <a href="https://ajdg.solutions/product/wordpress-maintenance-and-updates/?mtm_campaign=worthless_plugin" target="_blank">click here</a>!'),
		array('main' => 'How many plugins do you use?', 'small' => 'I use 42.'),
		array('main' => 'Tired of Gutenberg blocks?', 'small' => 'There is a better way with ClassicPress - <a href="https://ajdg.solutions/blog/take-back-control-of-your-website-with-classicpress/?mtm_campaign=worthless_plugin" target="_blank">Take back control of your website with ClassicPress</a>.'),
		array('main' => 'I am right, you are wrong!', 'small' => 'But if you agree to that, that makes you right and I am wrong. Whoa!'),
		array('main' => 'Spill the beans!', 'small' => 'They\'re not worth it.'),
		array('main' => 'I like money!', 'small' => 'You should send me some -> <a href="https://www.arnan.me/donate.html" target="_blank">Click here</a>.'),
		array('main' => 'Why did Dolly cross the road?', 'small' => 'Because the grass was greener on the other side!'),
		array('main' => 'If this notification made you smile, this plugin is not worthless', 'small' => ''),
		array('main' => 'Do you like french fries?', 'small' => 'You might be a seagull!'),
		array('main' => 'They say the grass is always greener on the other side.', 'small' => 'But I live in a desert...'),
		array('main' => 'Recharge your battery.', 'small' => ''),
		array('main' => 'Work from home if you can.', 'small' => 'Become a hermit today!'),
		array('main' => 'What kind of motorcycle do you ride?', 'small' => ''),
		array('main' => 'Did you upgrade to ClassicPress yet?', 'small' => '<a href="https://ajdg.solutions/blog/take-back-control-of-your-website-with-classicpress/?mtm_campaign=worthless_plugin" target="_blank">Take back control of your website with ClassicPress</a>'),
		array('main' => 'A billion dollars?!!?', 'small' => 'A billion dollars...'),
		array('main' => 'Did you download your free GPS route yet?', 'small' => 'Available on <a href="https://mototravel.net/?mtm_campaign=worthless_plugin" target="_blank">MotoTravel.net</a>'),
		array('main' => 'Goedemiddag!', 'small' => 'Hallo!'),
		array('main' => 'A billion dollars?!!?', 'small' => 'A billion dollars...'),
		array('main' => 'Make some money!!', 'small' => 'Place some ads on your site with AdRotate Pro! Learn more here: <a href="https://ajdg.solutions/product/adrotate-pro-single/?mtm_campaign=worthless_plugin" target="_blank">AdRotate Pro</a>.'),
		array('main' => 'Do not insult a wizard!', 'small' => 'He will turn you into a cake...'),
	);	
	$key = array_rand($content, 1);
	
	return $content[$key];
}
?>