<?php get_header(); ?>

<!--<?php the_post_thumbnail('featured'); ?>
	<?php the_post_thumbnail('post_thumb'); ?>-->

	<section class="nine columns row">
		<?php get_template_part('slider', 'index'); ?>
	</section>
	<section class="internal-x three columns row">
		Advertisement
	</section>
	<section class="new-games nine columns row main-list">
		<h1>NEW SOUPS</h1>
		<ul class="row">
			<?php 
			$args = array('posts_par_page' => 6, 'post_type' => 'awfulmedia_games');
			$query = new WP_Query( $args );
			while ($query->have_posts()) : $query->the_post();
			?>			
			
			<li class="game-thumb">	
				<a href="<?php the_permalink(); ?>">				
					<?php the_post_thumbnail('post-thumb'); ?>
					<?php the_title(); ?>
					<p><?php the_field('description'); ?></p>
				</a>
			</li>			
			<?php 
			endwhile;
			?>
		</ul>
		<h1>POPULAR SOUPS</h1>
		<ul class="row">
			<?php 
			$args = array(
			'posts_par_page' => 6,
			'post_type' => 'awfulmedia_games',
			'orderby' => 'meta_value_num',
			'meta_key' => 'post_views_count'
			);

			$query = new WP_Query( $args );
			while ($query->have_posts()) : $query->the_post();
			?>			
			
			<li class="game-thumb">	
				<a href="<?php the_permalink(); ?>">				
					<?php the_post_thumbnail('post-thumb'); ?>
					<?php the_title(); ?>
					<p><?php the_field('description'); ?>
					<?php echo getPostViews(get_the_ID()); ?></p>
				</a>
			</li>			
			<?php 
			endwhile;
			?>
		</ul>
	</section>
	<section class="sidebar-list three columns row">
		<h5>RAMDOM</h5>
		<ul>
			<?php 
			$args = array('posts_par_page' => 6, 'post_type' => 'awfulmedia_games', 'orderby' => 'rand');//u can orderby date or title
			$query = new WP_Query( $args );
			while ($query->have_posts()) : $query->the_post();
			?>			
			
			<li class="game-thumb">	
				<a href="<?php the_permalink(); ?>">				
					<?php the_post_thumbnail(''); ?>
					<?php the_title(); ?>
					<p><?php the_field('description'); ?></p>
				</a>
			</li>			
			<?php 
			endwhile;
			?>
		</ul>
	</section>

<?php get_footer(); ?>