<?php

$navigation=[];
$navigation['dashboard']=['type'=>'link', 'title'=>'Dashboard', 'icon'=>'fas fa-fw fa-tachometer-alt', 'src'=>'dashboard', 'file'=>'index'];

$navigation[]=['type'=>'divider'];

$navigation[]=['type'=>'heading', 'title'=>'Interface'];

$navigation[]=['type'=>'sub', 'title'=>'Components', 'icon'=>'fas fa-fw fa-cog', 'pages'=>['components_buttons', 'components_cards']];
$navigation[]=['type'=>'sub_heading', 'title'=>'Custom Components'];
$navigation['components_buttons']=['type'=>'sub_link', 'title'=>'Buttons', 'src'=>'components_buttons', 'file'=>'components_buttons'];
$navigation['components_cards']=['type'=>'sub_link', 'title'=>'Cards', 'src'=>'components_cards', 'file'=>'components_cards'];
$navigation[]=['type'=>'sub_close'];

$navigation[]=['type'=>'sub', 'title'=>'Utilities', 'icon'=>'fas fa-fw fa-wrench', 'pages'=>['utilities-color', 'utilities-border', 'utilities-animation', 'utilities-other']];
$navigation[]=['type'=>'sub_heading', 'title'=>'Custom Utilities'];
$navigation['utilities-color']=['type'=>'sub_link', 'title'=>'Colors', 'src'=>'utilities-color', 'file'=>'utilities-color'];
$navigation['utilities-border']=['type'=>'sub_link', 'title'=>'Borders', 'src'=>'utilities-border', 'file'=>'utilities-border'];
$navigation['utilities-animation']=['type'=>'sub_link', 'title'=>'Animations', 'src'=>'utilities-animation', 'file'=>'utilities-animation'];
$navigation['utilities-other']=['type'=>'sub_link', 'title'=>'Other', 'src'=>'utilities-other', 'file'=>'utilities-other'];
$navigation[]=['type'=>'sub_close'];

$navigation[]=['type'=>'divider'];

$navigation[]=['type'=>'heading', 'title'=>'Addons'];

$navigation[]=['type'=>'sub', 'title'=>'Pages', 'icon'=>'fas fa-fw fa-folder', 'pages'=>['login', 'register', 'forgot-password', '404', 'blank']];
$navigation[]=['type'=>'sub_heading', 'title'=>'Login Screens'];
$navigation['login']=['type'=>'sub_link', 'title'=>'Login', 'src'=>'login', 'file'=>'login'];
$navigation['register']=['type'=>'sub_link', 'title'=>'Register', 'src'=>'register', 'file'=>'register'];
$navigation['forgot-password']=['type'=>'sub_link', 'title'=>'Forgot Password', 'src'=>'forgot-password', 'file'=>'forgot-password'];
$navigation[]=['type'=>'sub_divider'];
$navigation[]=['type'=>'sub_heading', 'title'=>'Other Pages'];
$navigation['404']=['type'=>'sub_link', 'title'=>'404', 'src'=>'404', 'file'=>'404'];
$navigation['blank']=['type'=>'sub_link', 'title'=>'Blank', 'src'=>'blank', 'file'=>'blank'];
$navigation[]=['type'=>'sub_close'];

$navigation['charts']=['type'=>'link', 'title'=>'Charts', 'icon'=>'fas fa-fw fa-chart-area', 'src'=>'charts', 'file'=>'charts'];

$navigation['tables']=['type'=>'link', 'title'=>'Tables', 'icon'=>'fas fa-fw fa-table', 'src'=>'tables', 'file'=>'tables'];

$render_pages=['dashboard', 'components_buttons', 'components_cards', 'utilities-color', 'utilities-border', 'utilities-animation', 'utilities-other', 'login', 'register', 'forgot-password', 'components_cards', '404', 'blank', 'charts', 'tables'];
$noindex=['login', 'register', 'forgot-password'];

foreach ($render_pages as $page) {
	if (isset($navigation[$page]['src'])) {

		ob_start();
		include './src/'.$navigation[$page]['src'].'.php';
		$content=ob_get_contents();
		ob_end_clean();

		if (!in_array($page, $noindex)) {
			ob_start();
			include './src/_index.php';
			$content=ob_get_contents();
			ob_end_clean();
		}

		file_put_contents('../demo/'.$navigation[$page]['file'].'.html', $content);
	}
}

?>