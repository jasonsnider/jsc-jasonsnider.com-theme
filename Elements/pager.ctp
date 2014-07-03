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
