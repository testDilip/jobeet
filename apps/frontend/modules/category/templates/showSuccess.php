<?php 
use_stylesheet('jobs.css');
slot('title', sprintf('Jobs in the %s category', $category->getName()))
?>

<div class="category">
	<div class="feed"><a href="<?php echo url_for('category', array('sf_subject' => $category, 'sf_format' => 'atom')) ?>">Feed</a></div>
	<h1><?php echo $category;?></h1>
</div>

<?php include_partial('job/list', array('jobs' => $pager->getResults())) ?>

<?php if ($pager->haveToPaginate())
{
    ?>
    <div class="pagination">
    	<a href="<?php echo url_for('category', $category)?>?page=1">
    		<img alt="First Page" src="/images/first.png" title="First Pasge">
    	</a>
    	
    	<a href="<?php echo url_for('category', $category)?>?page=<?php echo $pager->getPrevious(); ?>">
    		<img alt="Previous Page" src="/images/previous.png" title="Previous Page">
    	</a>
    	
    	<?php foreach ($pager->getLinks() as $page)
    	{
    	    if ($page == $pager->getPage())
    	    {
    	        echo $page;
    	    } else {
    	        ?>
    	        <a href="<?php echo url_for('category', $category); ?>?page=<?php echo $page; ?>"></a>
    	        <?php 
    	    }
    	}?>
    	
    	<a href="<?php echo url_for('category', $category); ?>?page=<?php echo $pager->getNextPage(); ?>">
    		<img alt="Next Page" src="/images/next.png" title="Next Pasge">
    	</a>
    	
    	<a href="<?php echo url_for('category', $category)?>?page=<?php echo $pager->getLastPage(); ?>">
    		<img alt="Last Page" src="/images/last.png" title="Last Page">
    	</a>
    </div>
    <?php 
}?>

<div class="pagination_desc">
	<?php echo format_number_choice(
                                    '[0]No job in this category|[1]One job in this category|(1,+Inf]%count% jobs in this category',
                                    array('%count%' => '<strong>'.count($pager).'</strong>'),
                                    count($pager)
                                    );
    if ($pager->haveToPaginate()) { ?>
		- page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
	<?php } ?>
</div>
