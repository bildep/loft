<?php get_header() ?>


      <div class="main-content">
        <div class="content-wrapper">
          <div class="content">
            <h1 class="title-page"><?php
							if( is_tag() ) :
								single_tag_title();
							else:
								echo 'Последние новости и акции из мира туризма';
							endif;
						?> </h1>

						<?php
						if( have_posts() ) :
							?><div class="posts-list"><?php
							while( have_posts() ) : the_post();

								get_template_part( 'entry', 'post' );

							endwhile;
							?></div>
							<div class="pagenavi-post-wrap"><?php echo paginate_links( array() ); ?></div>
							<?php

						else:

							echo '<p>Ничего не найдено, постов нет.</p>';

						endif;

						?>


          </div>
         	<?php get_sidebar() ?>
        </div>
      </div>

		<?php get_footer( 'main' ) ?>
