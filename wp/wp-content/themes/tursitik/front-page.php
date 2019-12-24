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

            $posts = get_posts( array(
                'orderby'     => 'date',
                'order'       => 'DESC',
                'category'    => 3,
            ));
            foreach( $posts as $post ){
                setup_postdata($post);
                get_template_part( 'home', 'post' );
            }

            wp_reset_postdata(); // сброc

           ?>

        </div>
        <?php get_sidebar() ?>
    </div>
</div>

<?php get_footer( 'main' ) ?>
