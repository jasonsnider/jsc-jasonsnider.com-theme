<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Article">
	<head>
		<?php echo $this->Html->charset(); ?>
        <?php
			echo $this->Html->meta(array('http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge'));
			echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1'));
			//echo $this->Html->tag('title', $this->request->title);
		
			//!!!DANGER ZONE - We shouldn't index result sets, but we do want the Google juice.
			if(in_array($this->request->action, array('index', 'search'))):
				echo $this->Html->meta(array('name' => 'robots', 'content' => 'noindex, follow'));
			endif;
			//END DANGER ZONE!!!
		
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
			echo $this->Html->css('theme');
			echo $this->Html->css('//fonts.googleapis.com/css?family=Rock+Salt');
			echo $this->Html->css('//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700');
	
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
			
			$model = null;
			
			if(!empty($content)):
				$model = model($content);
        ?>
        
        <!-- Begin Social Tags -->
		
        <!-- Google Authorship and Publisher Markup -->
        <link rel="author" href="https://plus.google.com/+JasonSnider">

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="<?php echo $this->request->title; ?>">
        <meta itemprop="description" content="<?php echo $this->request->description; ?>">
        <!--<meta itemprop="image" content="http://www.example.com/image.jpg">-->

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@jason_snider">
        <meta name="twitter:title" content="<?php echo $this->request->title; ?>">
        <meta name="twitter:description" content="<?php echo $this->request->description; ?>">
        <meta name="twitter:creator" content="@jason_snider">
        <!-- Twitter summary card with large image must be at least 280x150px -->
        <!--<meta name="twitter:image:src" content="http://www.example.com/image.html">-->

        <!-- Open Graph data -->
        <meta property="og:title" content="<?php echo $this->request->title; ?>">
        <meta property="og:type" content="article">
        <meta property="og:url" content="https://jasonsnider.com<?php echo $this->here; ?>">
        <meta property="og:image" content="http://example.com/image.jpg">
        <meta property="og:description" content="<?php echo $this->request->description; ?>">
        <meta property="og:site_name" content="Jason Snider">
		
        <meta property="article:published_time" 
              content="<?php echo date('c', strtotime($content[$model]['created'])); ?>">
		
        <meta property="article:modified_time" 
              content="<?php echo date('c', strtotime($content[$model]['modified'])); ?>">

        <!--<meta property="article:section" content="Article Section" />
        <meta property="article:tag" content="Article Tag" />
        <meta property="fb:admins" content="Facebook numberic ID" />-->
        
        <!-- END SOCIAL TAGS-->
        <?php endif; ?>
        
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700" rel="stylesheet" type="text/css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
        <?php echo $this->element('navbar'); ?>
        <div class="container">
			<div class="row row-offcanvas row-offcanvas-right">
				<?php
					//Is there a sidebar avilable for this page?
					$controller = Inflector::camelize($this->request->controller);
					$action = $this->request->action;

					$element = "{$controller}/{$action}";
					$elementPath = null;

					if($this->elementExists($element)){
						$elementPath = $this->element($element, array('model'=>$model));
					}

					$elementPath = $elementPath; //. $this->element('sidebar');

					//Load the content for the main display area into a single variable
					$content = null;
					$content .= $this->Html->tag('a', '', array('id'=>'Top', 'class'=>'anchor'));
					if($this->request->showTitle):
						$content .= $this->Html->tag('h1', $this->request->title);
					endif;

					$content .= $this->Session->flash();
					$content .= $this->fetch('content');

					//If we found a sidebar load a two column layout, otherwise load a single column.
					if($elementPath):
						echo $this->Html->div(
							'content clearfix', 
								$this->Html->div(
									'content-two-column', 
									$content
								) . $this->Html->div(
									'sidebar-two-column', 
									$elementPath
								)
							);
					else:
						echo $this->Html->div(
							'content',
							$content
						);
					endif; 
				?>
			</div>
			<div><?php echo $this->element('footer'); ?></div>
		</div>
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
