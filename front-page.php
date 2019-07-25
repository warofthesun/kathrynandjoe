<!--frontpage-->
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap row">

						<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php include 'flexible-content.php'; ?>

							<?php endwhile; ?>

									<?php starter_page_navi(); ?>

							<?php else : endif; ?>


						</main>

				</div>

			</div>

<?php get_footer(); ?>
