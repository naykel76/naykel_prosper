<?php
/**
* @package   yoo_master2
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

<head>
<?php echo $this['template']->render('head'); ?>
</head>

<body class="<?php echo $this['config']->get('body_classes'); ?>">


    <?php if ($this['widgets']->count('toolbar-l + toolbar-r')) : ?>
    <div class="tm-toolbar uk-clearfix uk-hidden-small" style="background: grey">

        <?php if ($this['widgets']->count('toolbar-l')) : ?>
        <div class="uk-float-left"><?php echo $this['widgets']->render('toolbar-l'); ?></div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('toolbar-r')) : ?>
        <div class="uk-float-right"><?php echo $this['widgets']->render('toolbar-r'); ?></div>
        <?php endif; ?>

    </div>
    <?php endif; ?>

    <?php if ($this['widgets']->count('logo + headerbar')) : ?>
    <div id="nk-header" class="uk-clearfix uk-hidden-small">

        <div class="container">
            <?php if ($this['widgets']->count('logo')) : ?>
            <a class="tm-logo" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo'); ?></a>
            <?php endif; ?>

            <?php echo $this['widgets']->render('headerbar'); ?>
        </div>

    </div>
    <?php endif; ?>


    <?php if ($this['widgets']->count('menu + search')) : ?>
    <nav class="tm-navbar uk-navbar">

        <div class="container">
            <?php if ($this['widgets']->count('menu')) : ?>
            <?php echo $this['widgets']->render('menu'); ?>
            <?php endif; ?>

            <?php if ($this['widgets']->count('offcanvas')) : ?>
            <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
            <?php endif; ?>

            <?php if ($this['widgets']->count('search')) : ?>
            <div class="uk-navbar-flip">
                <div class="uk-navbar-content uk-hidden-small"><?php echo $this['widgets']->render('search'); ?></div>
            </div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('logo-small')) : ?>
            <div class="uk-navbar-content uk-navbar-center uk-visible-small"><a class="tm-logo-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a></div>
            <?php endif; ?>
        </div>

    </nav>
    <?php endif; ?>
        
    <section id="nk-top-a" class="uk-cover-background hero">
        <div class="container">
            <div class="<?php echo $grid_classes['top-a']; echo $display_classes['top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                <?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?>
            </div>
        </div>
    </section>

    <?php if ($this['widgets']->count('top-b')) : ?>
        <section id="nk-top-b">
            <div class="container">
                <div class="<?php echo $grid_classes['top-b']; echo $display_classes['top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>


	<div class="container" style="padding-top: 35px; padding-bottom: 35px;">

		<?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
		<div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

			<?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
			<div class="<?php echo $columns['main']['class'] ?>">

				<?php if ($this['widgets']->count('main-top')) : ?>
				<section id="tm-main-top" class="<?php echo $grid_classes['main-top']; echo $display_classes['main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?></section>
				<?php endif; ?>

				<?php if ($this['config']->get('system_output', true)) : ?>
				<main id="tm-content" class="tm-content">

					<?php if ($this['widgets']->count('breadcrumbs')) : ?>
					<?php echo $this['widgets']->render('breadcrumbs'); ?>
					<?php endif; ?>

					<?php echo $this['template']->render('content'); ?>

				</main>
				<?php endif; ?>

				<?php if ($this['widgets']->count('main-bottom')) : ?>
				<section id="tm-main-bottom" class="<?php echo $grid_classes['main-bottom']; echo $display_classes['main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?></section>
				<?php endif; ?>

			</div>
			<?php endif; ?>

            <?php foreach($columns as $name => &$column) : ?>
            <?php if ($name != 'main' && $this['widgets']->count($name)) : ?>
            <aside class="<?php echo $column['class'] ?>"><?php echo $this['widgets']->render($name) ?></aside>
            <?php endif ?>
            <?php endforeach ?>

		</div>
        <?php endif; ?>
	
    </div>

    <?php if ($this['widgets']->count('bottom-a')) : ?>
        <section id="nk-bottom-a">
            <div class="container">
                <div class="<?php echo $grid_classes['bottom-a']; echo $display_classes['bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php if ($this['widgets']->count('bottom-b')) : ?>
        <section id="nk-bottom-b">
            <div class="container">
                <div class="<?php echo $grid_classes['bottom-b']; echo $display_classes['bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <?php if ($this['widgets']->count('footer + debug') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>
    <footer id="nk-footer" class="tm-footer">

        <div class="container">
            
            <div class="uk-panel"><h3 class="uk-panel-title">WebDev Links</h3>
                <ul>
                <li><a href="https://color.adobe.com/create/color-wheel/" target="_blank">Adobe Colour</a></li>
                <li><a href="https://coolors.co/">Coloers</a></li>
                <li><a href="https://www.pexels.com/">Pexcels</a></li>
                <li><a href="https://pixabay.com/en/">Paxabay</a></li>
                <li class="uk-heading">Tech</li>
                <li><a href="https://www.youtube.com/user/TechGuyWeb">Traversy Media</a></li>
                <li><a href="/www.adobe.com/go/xd_tutorial_video">XD Tutioral</a></li>
            </ul>
            


            </div>
            <?php if ($this['config']->get('totop_scroller', true)) : ?>
            <a class="tm-totop-scroller" data-uk-smooth-scroll href="#"></a>
            <?php endif; ?>

            <?php
                echo $this['widgets']->render('footer');
                $this->output('warp_branding');
                echo $this['widgets']->render('debug');
            ?>
        </div>

    </footer>
    <?php endif; ?>


    <div id="nk-copy">
        <div class="container">
            &copy; Copyright © 2019 Fact of Life. All Rights Reserved.
        </div>
    </div>

	<?php echo $this->render('footer'); ?>

	<?php if ($this['widgets']->count('offcanvas')) : ?>
	<div id="offcanvas" class="uk-offcanvas">
		<div class="uk-offcanvas-bar"><?php echo $this['widgets']->render('offcanvas'); ?></div>
	</div>
	<?php endif; ?>

</body>
</html>
