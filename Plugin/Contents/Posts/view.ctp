<article>
	<header>
		<h1><?php echo $content['Post']['title']; ?></h1>
		<div class="text-muted">
			Posted On <time 
				class="text-muted" 
				datetime="<?php echo date('m/d/y', strtotime($content['Post']['created'])); ?>">
				<?php echo date('l, F jS, Y \a\t h:m a', strtotime($content['Post']['created'])); ?></time>
				By Jason
		</div>
	</header>
	<?php echo $content['Post']['body']; ?>
	<div>
		<?php 
		foreach($content['Tag'] as $tag):
			echo $this->Html->link(
				$tag['name'], 
				array(
					'plugin'=>'contents',
					'controller'=>'contents',
					'action'=>'search',
					'tags'=>$tag['name']
				), 
				array(
					'class'=>'label label-default'
				)
			);
			echo '&nbsp;';
		endforeach; 
		?>
	</div>

</article>

<aside class="shares clearfix">
	<a href="<?php echo "http://www.linkedin.com/shareArticle?mini=true&url="
			. "https://jasonsnider.com{$this->here}"; ?>"
		title="Share this page on LinkedIn" 
		target="_blank"
		class="share"
		onclick="window.open(
			'<?php echo "http://www.linkedin.com/shareArticle?mini=true&url="
				. "https://jasonsnider.com{$this->here}"; ?>',
			'Share news on LinkedIn | LinkedIn',
			'height=600,width=600'); return false;"
		>
		<span class="fa fa-linkedin"></span></a>

	<a href="<?php echo "https://twitter.com/intent/tweet?url="
		. "https://jasonsnider.com{$this->here}"; ?>"
		title="Plus one this page on Twitter" 
		target="_blank"
		class="share"
		onclick="window.open(
			'<?php echo "https://twitter.com/intent/tweet?url="
		. "https://jasonsnider.com{$this->here}"; ?>',
			'Share a link with your followers',
			'height=260,width=600'); return false;"
		>
		<span class="fa fa-twitter"></span></a>

	<a href="<?php echo "http://www.facebook.com/sharer.php?u="
		. "https://jasonsnider.com{$this->here}"; ?>" 
		title="Share this page on Facebook" 
		target="_blank"
		class="share"                        
		onclick="window.open(
			'<?php echo "http://www.facebook.com/sharer.php?u="
		. "https://jasonsnider.com{$this->here}"; ?>',
			'Share on Facebook',
			'height=400,width=600'); return false;"
		>
		<span class="fa fa-facebook"></span></a>

	<a href="<?php echo "https://plusone.google.com/_/+1/confirm?hl=en&url="
		.  "https://jasonsnider.com{$this->here}"; ?>" 
		author=''
		title="Plus one this page on Google" 
		target="_blank"
		class="share"
		onclick="window.open(
			'<?php echo "https://plusone.google.com/_/+1/confirm?hl=en&url="
		.  "https://jasonsnider.com{$this->here}"; ?>',
			'Share a link with your followers',
			'height=500,width=500'); return false;"
		>
		<span class="fa fa-google-plus"></span></a>
</aside>

<aside class="clearfix author" itemscope itemtype="http://data-vocabulary.org/Person">

	<?php 
	echo $this->Html->image(
		'https://secure.gravatar.com/avatar/57dd069b73a149098c4865f8f5813303.png',
		array(
			'height'=>'72px',
			'width'=>'72px',
			'class'=>'author-avatar'
		)
	); 
	?>

	<p class="about-the-author">
		<strong>About the Author</strong>
		Hi, I'm 
		<a href="https://plus.google.com/+JasonSnider?rel=author" target="_blank" itemprop="name">Jason Snider</a> 
		a <span itemprop="title">full stack web developer, designer, systems architect</span>, security enthusiast, 
		Linux aficionado, open source advocate, sys admin, DBA, business analyst, project manager and scrum master.
	</p>

</aside>

<aside class="ad">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- Leaderboard -->
	<ins class="adsbygoogle"
		 style="display:inline-block;width:728px;height:90px"
		 data-ad-client="ca-pub-2297949586762275"
		 data-ad-slot="3778634944"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</aside>

<aside class="clearfix">
	<a name="comments"></a>
	<div id="disqus_thread"></div>
	<script type="text/javascript">
		/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
		var disqus_shortname = 'jasondsnider'; // required: replace example with your forum shortname
		var disqus_identifier = '<?php echo $content['Post']['slug']; ?>';
		var disqus_url = 'https://jasonsnider.com/<?php echo $this->here ?>';

		/* * * DON'T EDIT BELOW THIS LINE * * */
		(function() {
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
	</script>
	<noscript>
		Please enable JavaScript to view the 
		<a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a>
	</noscript>
	<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
</aside>