<?php get_header() ?>

<?php
function validaEmail($email){
    $er = "/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/";
    if (preg_match($er, $email)){
        return true;
    } else {
        return false;
    }
}
function PegarMeioStr($in, $fim, $str)
{
    @$ex = explode($in, $str);
    @$ex2 = explode($fim, $ex[1]);
    return $ex2[0];
}
function get_attachment_url_by_slug( $slug ) {
    $args = array(
        'post_type' => 'attachment',
        'name' => sanitize_title($slug),
        'posts_per_page' => 1,
        'post_status' => 'inherit',
    );
    $_header = get_posts( $args );
    $header = $_header ? array_pop($_header) : null;
    return $header ? wp_get_attachment_url($header->ID) : '';
}

if(isset($_POST['newsletter-email']) && $_POST['newsletter-email'] != '') {
    $email = trim($_POST['newsletter-email']);
    if(validaEmail($email)) {
        $email = addslashes($email);

        //cadastrar na newsletter
        $query = "INSERT INTO wp_newsletter (email, status) VALUES ('".$email."','C')";
        $wpdb->get_results($query);

        echo '

            <script>
                $(function() {
                    $("#myModalLabel").html("Newsletter");
                    $("#myModalText").html("Email cadastrado!");
                    $("#btn-modal").trigger("click");
                });
            </script>

        ';

    } else {
        echo '

            <script>
                $(function() {
                    $("#myModalLabel").html("Newsletter");
                    $("#myModalText").html("Email invalido");
                    $("#btn-modal").trigger("click");
                });
            </script>

        ';
    }
}

if(isset($_GET['nome']) && isset($_GET['email']) && isset($_GET['mensagem']) && isset($_GET['telefone'])) {

    $admin_email = "";

    query_posts('showposts=1&category_name=email');
    while (have_posts()) : the_post();
        $admin_email = get_the_content();
    endwhile;

    $nome = trim(@$_GET['nome']);
    $email = trim(@$_GET['email']);
    $telefone = trim(@$_GET['telefone']);
    $mensagem = trim(@$_GET['mensagem']);
    $headers = 'From: '.$nome.' <'.$email.'>' . "\r\n";
    if(wp_mail($admin_email, 'Contato via Web', $mensagem."<br><br>Contato: $telefone", $headers)) {
        echo '

            <script>
                $(function() {
                    $("#myModalLabel").html("Contato");
                    $("#myModalText").html("Mensagem enviada!");
                    $("#btn-modal").trigger("click");
                    var url=document.location.href;
                    var url_nova= url.split("?")[0];
                    window.history.pushState("",document.title,url_nova);
                });
            </script>

        ';
    } else {
        echo '

            <script>
                $(function() {
                    $("#myModalLabel").html("Contato");
                    $("#myModalText").html("Não foi possível enviar a mensagem.");
                    $("#btn-modal").trigger("click");
                    var url=document.location.href;
                    var url_nova= url.split("?")[0];
                    window.history.pushState("",document.title,url_nova);
                });
            </script>

        ';
    }
}
?>

    <div class="slider">
        <?php echo do_shortcode("[huge_it_slider id='1']"); ?>
        <div class="frase"><?php echo get_setting("frase-slider") ?></div>
        <div class="subfrase"><?php echo get_setting("subfrase-slider") ?></div>
        <div class="orcamento"><a href="#contato" class="scroll"><button><?php echo get_setting("botao-slider") ?></button></a></div>
    </div>

<div class="sep-slider"></div>

<div class="sobre" id="sobre">

    <?php
    query_posts('showposts=1&category_name=sobre-nos');
    while (have_posts()) : the_post();
        $conteudo = get_the_content();
        $img = PegarMeioStr(' src="', '"', $conteudo);
        $fala = strip_tags(strip_shortcodes($conteudo));
        ?>

        <div class="sobre-txt">
            <div class="titulo">
                <span class="linha-dir"></span><label><?php echo get_setting("secao-1") ?></label><span class="linha-esq"></span>
            </div>
            <?php echo $fala; ?>
        </div>
        <div class="sobre-img"><img src="<?php echo $img; ?>" /></div>

        <div class="clearfix"></div>

    <?php endwhile; ?>
</div>

<div class="produtos" id="produtos">
    <div class="titulo"><?php echo get_setting("secao-2") ?></div>

    <div class="grid">

        <?php
        $query = "SELECT name,image_url FROM wp_huge_itslider_images WHERE slider_id = '2' ORDER BY ordering";
        $result = $wpdb->get_results($query);

        $vt_categorias = array();

        foreach ($result as $img) {
            if($vt_categorias[$img->name])
                echo '<a class="fancybox" rel="group-'.$img->name.'" href="'.$img->image_url.'"></a>';
            else
                echo '<a class="item fancybox" rel="group-'.$img->name.'" href="'.$img->image_url.'"><img src="'.$img->image_url.'"></a>';

            $vt_categorias[$img->name] = true;
        }
        ?>

        <!--
        <div class="item"><img src="img/chocolate-section-sobre.png" /></div>
        <div class="item"><img src="img/chocolate-section-sobre.png" /></div>
        <div class="item"><img src="img/chocolate-section-sobre.png" /></div>
        <div class="item"><img src="img/chocolate-section-sobre.png" /></div>
        <div class="item"><img src="img/chocolate-section-sobre.png" /></div>
        <div class="item"><img src="img/chocolate-section-sobre.png" /></div>-->

        <div class="clearfix"></div>
    </div>
</div>

<div class="clientes" id="clientes">

    <div class="titulo"><label><?php echo get_setting("secao-3") ?></label></div>

    <div class="grid clearfix">

        <?php
        query_posts('showposts=3&category_name=cliente&orderby=rand');
        while (have_posts()) : the_post();
            $conteudo = get_the_content();
            $img = PegarMeioStr(' src="', '"', $conteudo);
            $fala = strip_tags(strip_shortcodes($conteudo));
            ?>

            <div class="item">
                <div class="img"><img src="<?php echo $img ?>"></div>
                <div class="texto">
                    <p><?php echo $fala ?></p>
                    <label><?php the_title(); ?></label>
                </div>
                <div class="bottom-img"></div>
            </div>

            <?php endwhile; ?>

    </div>
</div>

<div class="dicas-novidades" id="blog">
    <div class="grid">
        <div class="titulo"><?php echo get_setting("secao-4") ?></div>

        <?php
        query_posts('showposts=1&category_name=blog');
        while (have_posts()) : the_post();
            $conteudo = get_the_content();
            $img = PegarMeioStr(' src="', '"', $conteudo);
            $post_txt = strip_tags(strip_shortcodes($conteudo));
        ?>
            <div class="ultimo-post" onclick="location.href = '<?php echo get_permalink() ?>'">
                <div class="titulo"><?php echo get_the_title() ?></div>
                <img src="<?php echo $img ?>" />
                <?php echo wp_trim_words($post_txt, 115, "... <span class='ler-mais'>LER MAIS</span>"); ?>
            </div>
        <?php endwhile; ?>
        <div class="ultimos-posts">
            <div class="titulo">ULTIMOS POSTS</div>
        <?php
        query_posts('showposts=4&category_name=blog&offset=1');
        while (have_posts()) : the_post();
            $conteudo = get_the_content();
            $img = PegarMeioStr(' src="', '"', $conteudo);
            $post_txt = strip_tags(strip_shortcodes($conteudo));
            ?>
                <div class="post" onclick="location.href = '<?php echo get_permalink() ?>'">
                    <img src="<?php echo $img ?>" />
                    <span class="titulo"><?php echo get_the_title() ?></span>
                    <p><?php echo wp_trim_words($post_txt, 22, ""); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="clearfix"></div>
        <div style="text-align: right">
            <?php
            $latest = get_posts('showposts=1&category_name=blog');
            foreach ($latest as $posts) {
                setup_postdata($post);?>
                <a href="<?php the_permalink();?>">TODOS POSTS</a>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<!--contato-->
<div class="contato" id="contato">

    <div class="titulo"><?php echo get_setting("secao-5") ?></div>

    <div class="contato-box clearfix">
        <div class="dados-contato left">
            <p><img src="wp-content/themes/lilica/img/contato-endereco.png">Endereço: <?php echo get_setting("endereco") ?></p>
            <p><img src="wp-content/themes/lilica/img/contato-telefone.png">Telefone: <?php echo get_setting("telefone-contato") ?></p>
            <p><img src="wp-content/themes/lilica/img/contato-email.png">Email: <?php echo get_setting("email-contato") ?></p>
            <p><img src="wp-content/themes/lilica/img/icon-whatsapp.png">Whatsapp: <?php echo get_setting("whatsapp") ?></p>
            <br />
            <p>Horário de funcionamento: <br><?php echo get_setting("hfuncionamento") ?></p>
            <br>
            <p>
                <img src="wp-content/themes/lilica/img/contato-instagram.png">
                <a target="_blank" href="<?php echo get_setting("instagram") ?>"><?php echo get_setting("instagram") ?></a>
            </p>
            <br /><br />
            <p><?php echo get_setting("obscontato") ?></p>
        </div>
        <div class="enviar-email right">
            <form action="" method="get" name="enviar-email" id="enviar-email">
                <input type="text" name="nome" id="contato-nome" placeholder="Seu nome" required>
                <input type="email" name="email" id="contato-email" placeholder="Seu email" required>
                <input type="text" name="telefone" id="contato-telefone" placeholder="Telefone" required>
                <textarea type="text" name="mensagem" id="contato-mensagem" placeholder="Mensagem" required></textarea>
                <input type="submit" value="ENVIAR">
            </form>
        </div>
        <!--
        <div class="api-fb left">
           <!-- api
           <!--<div class="fb-like"></div>
        </div>
        -->
    </div>
</div>

<?php echo do_shortcode("[wpgmza id='1']"); ?>

<!--footer-->
<div class="footer">
    <img src="wp-content/themes/lilica/img/logo.png">
</div>

<?php get_footer(); ?>