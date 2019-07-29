<?php

// check if the flexible content field has rows of data
if( have_rows('content_sections') ):

 	// loop through the rows of data
    while ( have_rows('content_sections') ) : the_row();

		// check current row layout
        if( get_row_layout() == 'content_block' ):
        $section_title = sanitize_title_for_query(get_sub_field('section_title') );
        $subtitle = sanitize_title_for_query(get_sub_field('subtitle') );
        ?>
        <a name="<?php if(get_sub_field('section_title') ) : echo esc_attr( $section_title ); elseif(get_sub_field('subtitle') ) : echo esc_attr( $subtitle ); else : ?>post-<?php the_ID(); ?><?php endif; ?>"></a>
        <article id="<?php if(get_sub_field('section_title') ) : echo esc_attr( $section_title ); elseif(get_sub_field('subtitle') ) : echo esc_attr( $subtitle ); else : ?>post-<?php the_ID(); ?><?php endif; ?>" <?php post_class( 'content-section' ); ?> role="article">
          <?php if(get_sub_field('section_title') ) : ?>
            <h1 class="section__title"><?php the_sub_field('section_title'); ?></h1>
          <?php endif; ?>
          <?php if(get_sub_field('subtitle') ) : ?>
            <h2 style="text-align:center;"><?php the_sub_field('subtitle'); ?></h2>
          <?php endif; ?>
          <?php if(get_sub_field('include_header_image') ) : ?>
            <?php
              $image = get_sub_field('header_image');
                // vars
              	$url = $image['url'];
              	$title = $image['title'];
              	$alt = $image['alt'];
              	$caption = $image['caption'];

              	// thumbnail
              	$size = 'header-image';
              	$thumb = $image['sizes'][ $size ];
              	$width = $image['sizes'][ $size . '-width' ];
              	$height = $image['sizes'][ $size . '-height' ]; ?>

                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="full-width"/>
              <?php endif; ?>
              <div class="content-section__body <?php if(get_sub_field('background_color')) : ?>background-color<?php endif; ?>" <?php if(get_sub_field('background_color')) : ?>style="background-color:<?php the_sub_field('choose_color'); ?>"<?php endif; ?>>
                <?php if (get_sub_field('number_of_columns') == 'one' ) : ?>
                  <div class="content content__single"><?php the_sub_field('content'); ?></div>
                <?php else : ?>
                  <div class="content content__double">
                    <div class="content__left"><?php the_sub_field('content_left'); ?></div>
                    <div class="content__right"><?php the_sub_field('content_right'); ?></div>
                  </div>
                <?php endif; ?>
              </div>
              <?php if(get_sub_field('background_color')) : ?>
                <svg width="1666px" height="85px" viewBox="0 0 1666 85" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="section-bottom-color">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <path d="M1666,84.3380452 C1646.13912,84.055906 1626.22427,82.9261695 1606.22142,81.3445559 C1577.68418,79.0851147 1548.96875,75.9063324 1520.2155,72.9339956 C1491.47118,69.959346 1462.69211,67.193036 1434.25797,65.7084686 C1427.15197,65.3452433 1420.07275,65.090149 1413.01405,64.8493475 C1405.96475,64.6772597 1398.94561,64.5951742 1391.95827,64.56401 C1384.98271,64.6124829 1378.03978,64.7358626 1371.14497,64.947617 C1364.29737,65.221762 1357.44083,65.5552548 1350.77219,66.0542912 C1314.16018,66.2061243 1279.24449,69.7758388 1245.95728,72.7863796 C1229.30684,74.2963916 1213.05033,75.6545628 1197.13552,76.4534684 C1195.12926,76.5955726 1193.16351,76.6372014 1191.18793,76.7121941 L1185.2652,76.9380318 L1182.30828,77.0492945 L1179.37976,77.0855205 L1173.52525,77.1728934 L1170.59725,77.2241102 L1167.7003,77.1901916 L1161.91336,77.1211107 C1158.05652,77.1357213 1154.1971,76.9042724 1150.33926,76.7758306 C1134.86765,76.1113774 1118.86476,74.4168378 1102.48143,72.0571704 C1086.08658,69.682896 1069.30767,66.5685743 1052.03919,62.9020021 C1034.77913,59.2471433 1017.09377,55.0758121 998.819145,50.6488907 L971.015263,43.9741661 C961.701711,41.5707403 952.364462,39.4343041 943.002892,37.0025368 C907.864024,28.5937432 870.728681,21.9827208 833.269183,19.0692636 C795.828744,16.1571421 758.116724,16.986778 722.206573,22.7955627 C719.548013,7.35293789 716.013275,4.72869984 711.964223,7.46267519 C707.917938,10.2185673 703.372836,18.2320707 698.665693,24.3560782 C691.477335,22.2076395 684.302007,21.4065669 677.217928,21.613924 C670.164393,21.9222766 663.206593,23.2529109 656.394926,25.2438475 C654.692364,25.7445711 652.99688,26.2760664 651.316377,26.8640733 C649.64136,27.4658972 647.97563,28.1044193 646.320975,28.7735735 C643.0117,30.1128814 639.742801,31.5768562 636.521771,33.1222099 C633.301845,34.6705269 630.123373,36.2884396 627.001171,37.9704274 C623.891115,39.6850113 620.829461,41.43893 617.81874,43.1900693 C611.828281,46.6912662 605.994688,50.0999321 600.383734,53.3797495 C594.79695,56.6066913 589.415062,59.4832688 584.22645,61.6766849 C579.019187,63.8517407 574.117007,65.4507985 569.323256,65.9714151 C564.603438,66.517467 560.02309,66.0430298 555.658747,64.2182316 C540.581812,57.9215733 525.807496,54.1588973 511.549676,52.1492639 C497.286928,50.1418037 483.553737,49.8889311 470.385589,50.658962 C457.21048,51.4302365 444.592419,53.2246936 432.414801,55.367992 L423.359324,57.0310366 L414.452515,58.7679379 L410.035258,59.6686466 L405.610911,60.5095663 C402.649151,61.0552627 399.731904,61.7294839 396.723405,62.254799 C372.839262,66.7650911 347.341258,70.505237 322.396257,69.8804244 C297.493836,69.3001528 273.357037,64.4835809 252.537202,52.2727441 C230.947865,42.7544028 209.226167,34.8326534 187.274211,29.314404 C165.334002,23.7887402 143.079434,20.6364932 120.750527,20.6277555 C98.4552148,20.6068379 76.1320475,23.7137979 54.622756,30.5566298 C35.4417449,36.6522295 16.9230074,45.7379269 -1.19482202e-12,58.0065821 L0,0 L1666,0 L1666,84.3380452 Z" id="section-bottom-color" fill="<?php the_sub_field('choose_color'); ?>" fill-rule="nonzero"></path>
                    </g>
                </svg>
              <?php endif; ?>
        </article>

  <?php endif;

    endwhile; else :
endif;

?>
