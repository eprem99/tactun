<div class="col-md-12">
	<div class="content-item row">
		<?php if( has_post_thumbnail() ) { ?>
		<div class="col-md-3">
			<?php the_post_thumbnail('tactun-image-278x200-cropped')?>
		</div>	
		<div class="col-md-9">
			<?php the_breadcrumb(); ?>
			<a href="<?php the_permalink(); ?>">
				<h3><?php the_title(); ?></h3>
			</a>
			<div class="description">	
				<?php the_excerpt(); ?>
			</div>	
		</div>
	<?php }else{ ?>
		<div class="col-md-12">
			<?php the_breadcrumb(); ?>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
			<div class="description">	
				<?php the_excerpt(); ?>
			</div>	
		</div>
	<?php } ?>	
		<div class="col-md-12 mb-4 mt-4 border"><span></span></div>
	</div>
</div>