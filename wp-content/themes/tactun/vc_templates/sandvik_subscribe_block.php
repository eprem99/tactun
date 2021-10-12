<?php 
	extract(shortcode_atts(array(
	    'subscribe_title' => '',
	    'subscribe_descrikption' => '',
	    'subscribe_shortcode' => '',
	    'subscribe_img' => '',
	    'subscribe_color' => '',
	    'subscribe_colors' => '',
	    'subscribe_weight' => '',
	), $atts));
if(!empty($subscribe_img)){
	$img = wp_get_attachment_url( $subscribe_img, 'full');
    $style = 'background-image: url('.$img.'); background-repeat: no-repeat; background-size: cover; color: #fff; text-align: center;';
}else{
    $style = '';
}

?>
<div class="subscribe" style="<?php echo $style; ?>">
	<div class="container">
<div class="row">
	<div class="col-md-8 col-xs-8 offset-xs-2 offset-md-2">
		<?php if(!empty($subscribe_title)){ ?>
		    <div class="news_title"><?php echo $subscribe_title; ?></div>
		<?php } ?>
		<?php if(!empty($subscribe_descrikption)){ ?>
		    <div class="news_description"><?php echo $subscribe_descrikption; ?></div>
		<?php } ?>
    </div>
</div>

<div class="row">
	<div class="col-md-8 col-xs-8 offset-xs-2 offset-md-2">
		<div class="subscribe-form">
		<?php echo do_shortcode( $subscribe_shortcode ); ?>
	</div>
	</div>
</div>
</div>
</div>
     <style type="text/css" media="screen">
<?php if(!empty($subscribe_colors)){ ?>
   .subscribe .news_title,
   .subscribe .news_description{
   	       color:  <?php echo $subscribe_colors; ?>;
   }
<?php } ?>  
<?php if(!empty($subscribe_color)){ ?>
   .subscribe:before{
       content: "";
       background-color:  <?php echo $subscribe_color; ?>;
       box-shadow: 0 0 30px 0 #ccc;
       width: 100%;
       height: 100%;
       position: absolute;
       top: 0;
       left: 0;
   }

<?php } ?> 
<?php if(empty($subscribe_img)){ ?>
    .subscribe-form {
       box-shadow: 0 0 30px 0 #ccc;
   }
<?php } ?>
<?php if(!empty($subscribe_weight)){?>
   .subscribe .news_title{
   	       font-weight:  <?php echo $subscribe_weight; ?>;
   }
<?php } ?>  
     </style>

