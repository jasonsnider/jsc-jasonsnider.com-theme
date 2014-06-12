<div class="header clearfix">
	<div class="container">

		<div class="site-brand clearfix">
			<a href="/" >Jason Snider</a>
			<a href="" class="toggle-header-navigation">[---]</a>  
		</div>
		<div class="site-nav">
			<ul>
				<li><a href="/blog">Blog</a></li>
				<li><a href="/jsc">Utilities</a></li>
				<li>
				  <?php
				  echo $this->Form->create(
					  'Content', 
					  array(
						  'url' => "/contents/contents/search/",
						  'role'=>'form',
						  'class'=>'navbar-form navbar-right',
						  'inputDefaults'=>array(
							  'required'=>false
						  )
					  )
				  );
				  echo $this->Form->input(
					  'q', 
					  array(
						  'type'=>'search', 
						  'placeholder'=>'search...',
						  'label'=>array(
							  'class'=>'sr-only',
						  )
					  )
				  );
				  ?>
				  <?php echo $this->Form->end(); ?>
				</li>
			</ul>

		</div>
	</div>
</div>