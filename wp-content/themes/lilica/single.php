<?php get_header(); ?>

<style>
    html {
        margin: 0 !important;
    }
    .menu .itens-direita ul li, .menu .itens-esquerda ul li {
        height: 12vh;
        text-align: center;
        padding: 2.8vh 4% 0 4%;
        font-size: 1.1em;
        font-weight: 500;
        cursor: pointer;
        display:inline-block;
    }
    .menu .logo {
        cursor: pointer;
    }
</style>

<script>

    window.onload = function()
    {
        var div = document.getElementById("logo");
        div.style.cursor = 'pointer';
        div.onclick = function()
        {
            location.href = "<?php echo get_home_url(); ?>#blog";
        };
    }

    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            location.href = "<?php echo get_home_url(); ?>#blog";
        });
    });


</script>

<?php $post = get_post(get_the_ID()); ?>

<div class="post-single">
    <div class="post-content">
        <div class="titulo"><?php echo $post->post_title ?></div>
        <?php echo $post->post_content ?>
    </div>

    <div class="last-posts">
        <div class="titulo">ULTIMOS POSTS</div>
        <ul>
            <?php query_posts('category_name=blog'); ?>
            <?php while (have_posts()) : the_post(); ?>
                <li><a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>  </li>
            <?php endwhile; ?>
        </ul>
    </div>

    <div class="clearfix"></div>
</div>

<!--footer-->
<div class="footer">
    &nbsp;
</div>