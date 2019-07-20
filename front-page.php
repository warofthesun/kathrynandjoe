<!--frontpage-->
<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap  row">

						<main id="main" class="col-xs-12" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( ' single-post' ); ?> role="article">
								<div class="hero--image"><?php the_post_thumbnail('gallery-image'); ?></div>
								<header class="article-header">

									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline entry-meta vcard">
	                      <?php printf( __( 'Posted', 'startertheme' ).' %1$s %2$s',
	       								/* the time the post was published */
	       								'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
	       								/* the author of the post */
	       								'<span class="by">'.__( 'by', 'startertheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
	    							); ?>
									</p>

								</header>

								<section class="entry-content ">
									<?php the_excerpt(); ?>
								</section>

								<footer class="article-footer ">
									<p class="footer-comment-count">
										<?php comments_number( __( '<span>No</span> Comments', 'startertheme' ), __( '<span>One</span> Comment', 'startertheme' ), __( '<span>%</span> Comments', 'startertheme' ) );?>
									</p>

								</footer>

							</article>

							<?php endwhile; ?>

									<?php starter_page_navi(); ?>

							<?php else : endif; ?>


						</main>

				</div>

			</div>

<?php get_footer(); ?>
