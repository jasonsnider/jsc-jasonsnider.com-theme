<style>
	.pager{
		text-align: center;
	}
	
	.pager span{
		padding: 0 4px;
	}
	
	.pager span a{
		padding: 0 6px;
	}
	
	.pager span.disabled{
		padding: 0 10px;
		color: #777;
	}

	.current{
		font-weight: bold;
	}
	
	.pager-numbers{
		color: #777;
		padding: 6px 0;
		font-style:italic;
	}
</style>
<?php


// Shows the next and previous links
$pager = $this->Paginator->prev(
  'Previous',
  null,
  null,
  array('class' => 'disabled')
);

// Shows the page numbers
$pager .= $this->Paginator->numbers(array('separator'=>''));

$pager .= $this->Paginator->next(
  'Next',
  null,
  null,
  array('class' => 'disabled')
);

$pager .= $this->Html->div('pager-numbers', $this->Paginator->counter('Page {:page} of {:pages}, showing {:current}'
		. ' records out of {:count} total, starting on record {:start}, ending on {:end}'));

echo $this->Html->div('pager', $pager);
