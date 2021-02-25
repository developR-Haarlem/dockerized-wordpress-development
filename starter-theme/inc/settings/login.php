<?php

function wpb_login_logo() { ?>
    <style type="text/css">
        body{
            background-color: #E2EBEE!important;
        }
        #login{
            position:absolute;
            right:100px;
 
        }
        #login #nav a, #login #backtoblog a{
            color: #1C1E25;
        }
        #login h1 a, .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri()?>/assets/img/NORTH-EAST-black.png');
            height:100px;
            width:300px;
            background-size: contain;
            background-position: bottom;
            background-repeat: no-repeat;
            
            padding-bottom: 10px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );