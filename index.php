<?php

get_header();
?>


<main id="primary" class="site-main">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part('patterns/example');
        endwhile;
    else :
        get_template_part('patterns/example', 'none');
    endif;
    ?>
</main>

<?php
get_footer();
?>