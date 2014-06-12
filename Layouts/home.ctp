<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $this->Html->charset(); ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title><?php echo $this->request->title; ?></title>
        
        <?php
            echo $this->Html->meta(
                'keywords',
                $this->request->keywords
            );

            echo $this->Html->meta(
                'description',
                $this->request->description
            );
        
            echo $this->Html->meta('icon', '/theme/JasonSniderTbs/img/57dd069b73a149098c4865f8f5813303.jpeg');

			echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css');
            echo $this->Html->css('cake.generic.stripped');
			echo $this->Html->css('theme');
			echo $this->Html->css('//fonts.googleapis.com/css?family=Rock+Salt');
			echo $this->Html->css('//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700');
			
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>

        <!-- Google Authorship and Publisher Markup -->
        <link rel="publisher" href=”https://plus.google.com/+JasonSnider"/>

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="<?php echo $this->request->title; ?>">
        <meta itemprop="description" content="<?php echo $this->request->description; ?>">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php echo $this->element('navbar'); ?>
		<div class="content clearfix">
			<div class="container">
				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<?php echo $this->element('footer'); ?>
		<?php echo $this->element('sql_dump'); ?>
		<script>
			var ToggleNavigation = (function() {
				"use strict"; /*global document: false*/
				var button = document.querySelector('.toggle-header-navigation');
				button.addEventListener('click', function(event) {
					event.preventDefault();
					var target = document.querySelector('.site-nav');
					if (target.style.display !== "block") {
						target.style.display = "block";
					} else {
						target.style.display = "none";
					}
				});
			}());
		</script>
        <?php echo $this->element('analytics'); ?>
    </body>
</html>