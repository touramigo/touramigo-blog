<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title><?php     wp_title('');    ?></title>
    <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css?v=21">
 <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
	<?php wp_head(); ?>

    <meta name="google-site-verification" content="QQydNBFhT8LFv1OdMp6JVah8ac0V5fQfxb_4pkWjeag" />
</head>
<body>
<section class="page-wrap">
    <header class="header">
        <div class="content spacer">
            <a href="<?php echo home_url( '/' ); ?>" class="logo">
                <img src="<?php the_field('logo_header', option); ?>" alt="" class="logo__icon">
                <span><?php the_field('logo_text_header', option); ?></span>
            </a>

<?php if(get_field('traveling_personalities_title', option)) { ?>
            <a href="<?php the_field('traveling_personalities_url', option); ?>" class="header__link bd-block pos-center">
                <i class="border-top-right"></i>
                <i class="border-bottom-left"></i>
                <?php the_field('traveling_personalities_title', option); ?>
            </a>
<?php } ?>

            <div class="header-right">
                <div class="w-search">
                    <span class="w-search__btn">
                        <i class="icon icon-search pos-center"></i>
                    </span>

                    <form method="GET" action="<?php echo home_url( '/' ); ?>" class="w-search-form">
                        <span class="w-search__close">
                            <i class="icon icon-close pos-center"></i>
                        </span>
                        <input onkeyup='checkParams()' type="search" name="s" id="s" class="w-search-form__field" placeholder="I'm looking for...">
                        <button class="w-search-form__btn" disabled="disabled" style="cursor:default">Search</button>
                    </form>

                </div><!--w-search-->

                <div class="menu-btn">
                    <span>Destinations</span>
                    <i class="icon icon-menu"></i>
                </div><!--menu-btn-->

            </div><!--header-right-->

        </div><!--content-->

    </header>