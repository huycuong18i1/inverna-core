<?php

get_header(); 

?>

<div class="container">

	<div class="row">

		<div class="col-md-12">

			<div class="wrap-content-area">

				<div id="primary" class="content-area">	

					<main id="main" class="main-content" role="main">

						<div class="entry-content">	

							<?php while ( have_posts() ) : the_post(); ?>	

								<div class="featured-post"><?php the_post_thumbnail('themesflat-service-single'); ?></div>



								<?php if ( themesflat_get_opt('services_title_single') ) :?>	

								<h2 class="post-title"><?php the_title(); ?></h2>

								<?php endif;?>

								

								<?php the_content(); ?>

						

							<?php endwhile; // end of the loop. ?>

						</div><!-- ./entry-content -->

					</main><!-- #main -->

				</div><!-- #primary -->

				<?php 

				if ( themesflat_get_opt( 'services_layout' ) == 'sidebar-left' || themesflat_get_opt( 'services_layout' ) == 'sidebar-right' ) :

					get_sidebar();

				endif;

				?>

			</div>

		</div>

	</div>

</div>



<?php get_footer(); ?>