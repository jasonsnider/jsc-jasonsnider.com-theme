<aside> 
	<?php if(!empty($relatedContent)): ?>
		<header>
			<?php echo $this->Html->link(
				'Related Posts', 
				"/contents/posts/index/{$relatedContent[0]['Category']['id']}"); ?>
		</header>
		<ul>
			<?php foreach($relatedContent as $related): ?>
			<li>
				<?php echo $this->Html->link(
					$related[$model]['title'], 
					"/{$related[$model]['content_type']}/{$related[$model]['slug']}");
				?>
			</li>
			<?php endforeach; ?>
		</ul>

	<?php endif; ?>
</aside>