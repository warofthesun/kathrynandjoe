<!--frontpage-->
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap row">

						<main id="main" class="col-xs-12" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( ' single-post' ); ?> role="article">
							this will be the content



							</article>

							<?php endwhile; ?>

									<?php starter_page_navi(); ?>

							<?php else : endif; ?>


						</main>

				</div>

			</div>

<?php get_footer(); ?>
