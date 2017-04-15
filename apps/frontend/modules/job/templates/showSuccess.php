<?php use_helper('Text') ?>
<?php slot(
        'title',
        sprintf('%s is looking for a %s', $job->getCompany(), $job->getPosition())); 
?>
<div id="job">
    <h1><?php echo $job->getCompany(); ?></h1>
    <h2><?php echo $job->getLocation(); ?></h2>
    <h3>
        <?php echo $job->getPosition(); ?>
        <small> - <?php echo $job->getType(); ?></small>
    </h3>
    
    <?php if ($job->getLogo()) {
        ?>
        <div class="logo">
            <a href="<?php echo $job->getUrl(); ?>">
                <img alt="<?php echo $job->getCompany(); ?>" src="/uploads/jobs/<?php echo $job->getLogo(); ?>">
            </a>
        </div>
        <?php 
    }?>
    <div class="description"><?php echo simple_format_text($job->getDescription()); ?></div>
    <h4>How To Apply</h4>
    <p class="how_to_apply"><?php echo $job->getHowToApply(); ?></p>
    <div class="meta">
        <small>posted on <?php echo $job->getCreatedAt('m/d/Y')?></small>
    </div>
    <div style="padding: 20px 0px;">
    	<a href="<?php echo url_for('job/edit?id='. $job->getId())?>">Edit</a> | 
    	<a href="<?php echo url_for('job/index'); ?>">Back to List</a>
    </div>
</div>
<?php
// old code
/*
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $job->getId() ?></td>
    </tr>
    <tr>
      <th>Category:</th>
      <td><?php echo $job->getCategoryId() ?></td>
    </tr>
    <tr>
      <th>Type:</th>
      <td><?php echo $job->getType() ?></td>
    </tr>
    <tr>
      <th>Company:</th>
      <td><?php echo $job->getCompany() ?></td>
    </tr>
    <tr>
      <th>Logo:</th>
      <td><?php echo $job->getLogo() ?></td>
    </tr>
    <tr>
      <th>Url:</th>
      <td><?php echo $job->getUrl() ?></td>
    </tr>
    <tr>
      <th>Position:</th>
      <td><?php echo $job->getPosition() ?></td>
    </tr>
    <tr>
      <th>Location:</th>
      <td><?php echo $job->getLocation() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $job->getDescription() ?></td>
    </tr>
    <tr>
      <th>How to apply:</th>
      <td><?php echo $job->getHowToApply() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $job->getToken() ?></td>
    </tr>
    <tr>
      <th>Is public:</th>
      <td><?php echo $job->getIsPublic() ?></td>
    </tr>
    <tr>
      <th>Is activated:</th>
      <td><?php echo $job->getIsActivated() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $job->getEmail() ?></td>
    </tr>
    <tr>
      <th>Expires at:</th>
      <td><?php echo $job->getExpiresAt() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $job->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $job->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('job/edit?id='.$job->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('job/index') ?>">List</a>
*/
?>