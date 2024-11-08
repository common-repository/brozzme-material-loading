<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 08/05/16
 * Time: 17:00
 */

function bml_pace_theme_loader(){
$options = get_option('b_material_general_settings');

$bar_height_stack = $options['bml_height'];//'5px';
$bar_height = strpos($bar_height_stack, 'px');
    if($bar_height !== false ){
        // px est trouvé dedans
        $bar_height = explode('px', $bar_height_stack);
        $bar_height = $bar_height[0];
    }
    else{
        $bar_height = $options['bml_height'];
    }


$bar_color = !is_home() ? $options['bml_color']: $options['bml_homepage_color'];

    if($options['bml_always_show_bar']== 'true'){
        $always_show_bar = '';
    }  
    else{
        $always_show_bar = '
        .pace-inactive {
            display: none;
        }
        ';
    }
    if($options['bml_template']== 'minimal'){
    ?>
    <style>

        .pace .pace-progress {
            background: <?php echo $bar_color;?>;
            position: fixed;
            z-index: 2000;
            top: 0;
            right: 100%;
            width: 100%;
            height: <?php echo $bar_height;?>px;
        }
        
        <?php echo $always_show_bar;?>
        
        .admin-bar .pace .pace-progress {
            top: 32px;
        }
        @media only screen and (max-width: 768px) {
            .admin-bar .pace .pace-progress {
                top: 46px;
            }
        }
    </style>
    <?php
   }
    elseif($options['bml_template']== 'flash'){
        ?>
        <style>

            .pace {
                -webkit-pointer-events: none;
                pointer-events: none;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            <?php echo $always_show_bar;?>

            .pace .pace-progress {
                background: <?php echo $bar_color;?>;
                position: fixed;
                z-index: 2000;
                top: 0;
                right: 100%;
                width: 100%;
                height: 2px;
            }

            .pace .pace-progress-inner {
                display: block;
                position: absolute;
                right: 0px;
                width: 100px;
                height: 100%;
                box-shadow: 0 0 10px <?php echo $bar_color;?>, 0 0 5px <?php echo $bar_color;?>;
                opacity: 1.0;
                -webkit-transform: rotate(3deg) translate(0px, -4px);
                -moz-transform: rotate(3deg) translate(0px, -4px);
                -ms-transform: rotate(3deg) translate(0px, -4px);
                -o-transform: rotate(3deg) translate(0px, -4px);
                transform: rotate(3deg) translate(0px, -4px);
            }

            .pace .pace-activity {
                display: block;
                position: fixed;
                z-index: 2000;
                top: 15px;
                right: 15px;
                width: 14px;
                height: 14px;
                border: solid 2px transparent;
                border-top-color: <?php echo $bar_color;?>;
                border-left-color: <?php echo $bar_color;?>;
                border-radius: 10px;
                -webkit-animation: pace-spinner 400ms linear infinite;
                -moz-animation: pace-spinner 400ms linear infinite;
                -ms-animation: pace-spinner 400ms linear infinite;
                -o-animation: pace-spinner 400ms linear infinite;
                animation: pace-spinner 400ms linear infinite;
            }

            @-webkit-keyframes pace-spinner {
                0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
            }
            @-moz-keyframes pace-spinner {
                0% { -moz-transform: rotate(0deg); transform: rotate(0deg); }
                100% { -moz-transform: rotate(360deg); transform: rotate(360deg); }
            }
            @-o-keyframes pace-spinner {
                0% { -o-transform: rotate(0deg); transform: rotate(0deg); }
                100% { -o-transform: rotate(360deg); transform: rotate(360deg); }
            }
            @-ms-keyframes pace-spinner {
                0% { -ms-transform: rotate(0deg); transform: rotate(0deg); }
                100% { -ms-transform: rotate(360deg); transform: rotate(360deg); }
            }
            @keyframes pace-spinner {
                0% { transform: rotate(0deg); transform: rotate(0deg); }
                100% { transform: rotate(360deg); transform: rotate(360deg); }
            }

            .admin-bar .pace .pace-progress {
                top: 32px;
            }
            @media only screen and (max-width: 768px) {
                .admin-bar .pace .pace-progress {
                    top: 46px;
                }
            }
        </style>
    <?php
    }
    elseif($options['bml_template']== 'bounce'){
        ?>
        <style>

            .pace {
                width: 140px;
                height: 300px;
                position: fixed;
                top: -90px;
                right: -20px;
                z-index: 2000;
                -webkit-transform: scale(0);
                -moz-transform: scale(0);
                -ms-transform: scale(0);
                -o-transform: scale(0);
                transform: scale(0);
                opacity: 0;
                -webkit-transition: all 2s linear 0s;
                -moz-transition: all 2s linear 0s;
                transition: all 2s linear 0s;
            }

            .pace.pace-active {
                -webkit-transform: scale(.25);
                -moz-transform: scale(.25);
                -ms-transform: scale(.25);
                -o-transform: scale(.25);
                transform: scale(.25);
                opacity: 1;
            }

            .pace .pace-activity {
                width: 140px;
                height: 140px;
                border-radius: 70px;
                background: <?php echo $bar_color;?>;
                position: absolute;
                top: 0;
                z-index: 1911;
                -webkit-animation: pace-bounce 1s infinite;
                -moz-animation: pace-bounce 1s infinite;
                -o-animation: pace-bounce 1s infinite;
                -ms-animation: pace-bounce 1s infinite;
                animation: pace-bounce 1s infinite;
            }

            .pace .pace-progress {
                position: absolute;
                display: block;
                left: 50%;
                bottom: 0;
                z-index: 1910;
                margin-left: -30px;
                width: 60px;
                height: 75px;
                background: rgba(20, 20, 20, .1);
                box-shadow: 0 0 20px 35px rgba(20, 20, 20, .1);
                border-radius: 30px / 40px;
                -webkit-transform: scaleY(.3) !important;
                -moz-transform: scaleY(.3) !important;
                -ms-transform: scaleY(.3) !important;
                -o-transform: scaleY(.3) !important;
                transform: scaleY(.3) !important;
                -webkit-animation: pace-compress .5s infinite alternate;
                -moz-animation: pace-compress .5s infinite alternate;
                -o-animation: pace-compress .5s infinite alternate;
                -ms-animation: pace-compress .5s infinite alternate;
                animation: pace-compress .5s infinite alternate;
            }

            @-webkit-keyframes pace-bounce {
                0% {
                    top: 0;
                    -webkit-animation-timing-function: ease-in;
                }
                40% {}
                50% {
                    top: 140px;
                    height: 140px;
                    -webkit-animation-timing-function: ease-out;
                }
                55% {
                    top: 160px;
                    height: 120px;
                    border-radius: 70px / 60px;
                    -webkit-animation-timing-function: ease-in;
                }
                65% {
                    top: 120px;
                    height: 140px;
                    border-radius: 70px;
                    -webkit-animation-timing-function: ease-out;
                }
                95% {
                    top: 0;
                    -webkit-animation-timing-function: ease-in;
                }
                100% {
                    top: 0;
                    -webkit-animation-timing-function: ease-in;
                }
            }

            @-moz-keyframes pace-bounce {
                0% {
                    top: 0;
                    -moz-animation-timing-function: ease-in;
                }
                40% {}
                50% {
                    top: 140px;
                    height: 140px;
                    -moz-animation-timing-function: ease-out;
                }
                55% {
                    top: 160px;
                    height: 120px;
                    border-radius: 70px / 60px;
                    -moz-animation-timing-function: ease-in;
                }
                65% {
                    top: 120px;
                    height: 140px;
                    border-radius: 70px;
                    -moz-animation-timing-function: ease-out;}
                95% {
                    top: 0;
                    -moz-animation-timing-function: ease-in;
                }
                100% {top: 0;
                    -moz-animation-timing-function: ease-in;
                }
            }

            @keyframes pace-bounce {
                0% {
                    top: 0;
                    animation-timing-function: ease-in;
                }
                50% {
                    top: 140px;
                    height: 140px;
                    animation-timing-function: ease-out;
                }
                55% {
                    top: 160px;
                    height: 120px;
                    border-radius: 70px / 60px;
                    animation-timing-function: ease-in;
                }
                65% {
                    top: 120px;
                    height: 140px;
                    border-radius: 70px;
                    animation-timing-function: ease-out;
                }
                95% {
                    top: 0;
                    animation-timing-function: ease-in;
                }
                100% {
                    top: 0;
                    animation-timing-function: ease-in;
                }
            }

            @-webkit-keyframes pace-compress {
                0% {
                    bottom: 0;
                    margin-left: -30px;
                    width: 60px;
                    height: 75px;
                    background: rgba(20, 20, 20, .1);
                    box-shadow: 0 0 20px 35px rgba(20, 20, 20, .1);
                    border-radius: 30px / 40px;
                    -webkit-animation-timing-function: ease-in;
                }
                100% {
                    bottom: 30px;
                    margin-left: -10px;
                    width: 20px;
                    height: 5px;
                    background: rgba(20, 20, 20, .3);
                    box-shadow: 0 0 20px 35px rgba(20, 20, 20, .3);
                    border-radius: 20px / 20px;
                    -webkit-animation-timing-function: ease-out;
                }
            }

            @-moz-keyframes pace-compress {
                0% {
                    bottom: 0;
                    margin-left: -30px;
                    width: 60px;
                    height: 75px;
                    background: rgba(20, 20, 20, .1);
                    box-shadow: 0 0 20px 35px rgba(20, 20, 20, .1);
                    border-radius: 30px / 40px;
                    -moz-animation-timing-function: ease-in;
                }
                100% {
                    bottom: 30px;
                    margin-left: -10px;
                    width: 20px;
                    height: 5px;
                    background: rgba(20, 20, 20, .3);
                    box-shadow: 0 0 20px 35px rgba(20, 20, 20, .3);
                    border-radius: 20px / 20px;
                    -moz-animation-timing-function: ease-out;
                }
            }

            @keyframes pace-compress {
                0% {
                    bottom: 0;
                    margin-left: -30px;
                    width: 60px;
                    height: 75px;
                    background: rgba(20, 20, 20, .1);
                    box-shadow: 0 0 20px 35px rgba(20, 20, 20, .1);
                    border-radius: 30px / 40px;
                    animation-timing-function: ease-in;
                }
                100% {
                    bottom: 30px;
                    margin-left: -10px;
                    width: 20px;
                    height: 5px;
                    background: rgba(20, 20, 20, .3);
                    box-shadow: 0 0 20px 35px rgba(20, 20, 20, .3);
                    border-radius: 20px / 20px;
                    animation-timing-function: ease-out;
                }
            }
            .admin-bar .pace .pace-progress {
                top: 32px;
            }
            @media only screen and (max-width: 768px) {
                .admin-bar .pace .pace-progress {
                    top: 46px;
                }
            }
        </style>
    <?php
    }
    elseif($options['bml_template']== 'centercircle'){
        $rgba_color = brozzme_hex2rgba($bar_color, 0.8);

       ?>
        <style>
            .pace {
                    -webkit-pointer-events: none;
          pointer-events: none;

          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;

          -webkit-perspective: 30rem;
          -moz-perspective: 30rem;
          -ms-perspective: 30rem;
          -o-perspective: 30rem;
          perspective: 30rem;

          z-index: 2000;
          position: fixed;
          height: 15rem;
          width: 15rem;
          margin: auto;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
        }

        .pace.pace-inactive .pace-progress {
                    display: none;
                }

        .pace .pace-progress {
                    position: fixed;
                    z-index: 2000;
          display: block;
          position: absolute;
          left: 0;
          top: 0;
          height: 15rem;
          width: 15rem !important;
          line-height: 15rem;
          font-size: 5rem;
          border-radius: 50%;
          background: <?php echo $rgba_color;?>;
          color: #fff;
          font-family: "Helvetica Neue", sans-serif;
          font-weight: 100;
          text-align: center;

          -webkit-animation: pace-theme-center-circle-spin linear infinite 2s;
          -moz-animation: pace-theme-center-circle-spin linear infinite 2s;
          -ms-animation: pace-theme-center-circle-spin linear infinite 2s;
          -o-animation: pace-theme-center-circle-spin linear infinite 2s;
          animation: pace-theme-center-circle-spin linear infinite 2s;

          -webkit-transform-style: preserve-3d;
          -moz-transform-style: preserve-3d;
          -ms-transform-style: preserve-3d;
          -o-transform-style: preserve-3d;
          transform-style: preserve-3d;
        }

        .pace .pace-progress:after {
                    content: attr(data-progress-text);
                    display: block;
                }

        @-webkit-keyframes pace-theme-center-circle-spin {
                    from { -webkit-transform: rotateY(0deg) }
          to { -webkit-transform: rotateY(360deg) }
        }

        @-moz-keyframes pace-theme-center-circle-spin {
                    from { -moz-transform: rotateY(0deg) }
          to { -moz-transform: rotateY(360deg) }
        }

        @-ms-keyframes pace-theme-center-circle-spin {
                    from { -ms-transform: rotateY(0deg) }
          to { -ms-transform: rotateY(360deg) }
        }

        @-o-keyframes pace-theme-center-circle-spin {
                    from { -o-transform: rotateY(0deg) }
          to { -o-transform: rotateY(360deg) }
        }

        @keyframes pace-theme-center-circle-spin {
                    from { transform: rotateY(0deg) }
          to { transform: rotateY(360deg) }
        }
        </style>
    <?php
    }
    elseif($options['bml_template']== 'centeratom'){
        ?>
        <style>

            .pace.pace-inactive {
                display: none;
            }

            .pace {
                -webkit-pointer-events: none;
                pointer-events: none;

                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;

                z-index: 2000;
                position: fixed;
                height: 120px;
                width: 200px;
                margin: auto;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
            }

            .pace .pace-progress {
                z-index: 2000;
                position: absolute;
                height: 150px;
                width: 150px;

                -webkit-transform: translate3d(0, 0, 0) !important;
                -ms-transform: translate3d(0, 0, 0) !important;
                transform: translate3d(0, 0, 0) !important;
            }

            .pace .pace-progress:before {
                content: attr(data-progress-text);
                text-align: center;

                color: #fff;
                background: <?php echo $bar_color;?>;
                border-radius: 50%;
                font-family: "Helvetica Neue", sans-serif;
                font-size: 14px;
                font-weight: 400;
                line-height: 1;
                padding: 40% 0px auto!important; 7px;
                width: 50%;
                height: 40%;
                margin: 20px 0 0 60px;
                display: block;
                z-index: 999;
                position: absolute;
            }

            .pace .pace-activity {
                font-size: 15px;
                line-height: 1;
                z-index: 2000;
                position: absolute;
                height: 120px;
                width: 200px;

                display: block;
                -webkit-animation: pace-theme-center-atom-spin 2s linear infinite;
                -moz-animation: pace-theme-center-atom-spin 2s linear infinite;
                -o-animation: pace-theme-center-atom-spin 2s linear infinite;
                animation: pace-theme-center-atom-spin 2s linear infinite;
            }

            .pace .pace-activity {
                border-radius: 50%;
                border: 5px solid <?php echo $bar_color;?>;
                content: ' ';
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                height: 120px;
                width: 200px;
            }

            .pace .pace-activity:after {
                border-radius: 50%;
                border: 5px solid <?php echo $bar_color;?>;
                content: ' ';
                display: block;
                position: absolute;
                top: -5px;
                left: -5px;
                height: 120px;
                width: 200px;

                -webkit-transform: rotate(60deg);
                -moz-transform: rotate(60deg);
                -o-transform: rotate(60deg);
                transform: rotate(60deg);
            }

            .pace .pace-activity:before {
                border-radius: 50%;
                border: 5px solid <?php echo $bar_color;?>;
                content: ' ';
                display: block;
                position: absolute;
                top: -5px;
                left: -5px;
                height: 120px;
                width: 200px;

                -webkit-transform: rotate(120deg);
                -moz-transform: rotate(120deg);
                -o-transform: rotate(120deg);
                transform: rotate(120deg);
            }

            @-webkit-keyframes pace-theme-center-atom-spin {
                0%   { -webkit-transform: rotate(0deg) }
                100% { -webkit-transform: rotate(359deg) }
            }
            @-moz-keyframes pace-theme-center-atom-spin {
                0%   { -moz-transform: rotate(0deg) }
                100% { -moz-transform: rotate(359deg) }
            }
            @-o-keyframes pace-theme-center-atom-spin {
                0%   { -o-transform: rotate(0deg) }
                100% { -o-transform: rotate(359deg) }
            }
            @keyframes pace-theme-center-atom-spin {
                0%   { transform: rotate(0deg) }
                100% { transform: rotate(359deg) }
            }

        </style>
    <?php
    }
    elseif($options['bml_template']== 'centersimple'){
        ?>
    <style>
        .pace {
            -webkit-pointer-events: none;
            pointer-events: none;

            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;

            z-index: 2000;
            position: fixed;
            margin: auto;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            height: 5px;
            width: 200px;
            background: #fff;
            border: 1px solid <?php echo $bar_color;?>;

            overflow: hidden;
        }

        .pace .pace-progress {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;

            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);

            max-width: 200px;
            position: fixed;
            z-index: 2000;
            display: block;
            position: absolute;
            top: 0;
            right: 100%;
            height: 100%;
            width: 100%;
            background: <?php echo $bar_color;?>;
        }

        .pace.pace-inactive {
            display: none;
        }
    </style>
    <?php
    }
    elseif($options['bml_template']== 'centerradar'){
        ?>
        <style>
            .pace {
                -webkit-pointer-events: none;
                pointer-events: none;

                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;

                z-index: 2000;
                position: fixed;
                height: 90px;
                width: 90px;
                margin: auto;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
            }

            .pace.pace-inactive .pace-activity {
                display: none;
            }

            .pace .pace-activity {
                position: fixed;
                z-index: 2000;
                display: block;
                position: absolute;
                left: -30px;
                top: -30px;
                height: 90px;
                width: 90px;
                display: block;
                border-width: 30px;
                border-style: double;
                border-color: <?php echo $bar_color;?> transparent transparent;
                border-radius: 50%;

                -webkit-animation: spin 1s linear infinite;
                -moz-animation: spin 1s linear infinite;
                -o-animation: spin 1s linear infinite;
                animation: spin 1s linear infinite;
            }

            .pace .pace-activity:before {
                content: ' ';
                position: absolute;
                top: 10px;
                left: 10px;
                height: 50px;
                width: 50px;
                display: block;
                border-width: 10px;
                border-style: solid;
                border-color: <?php echo $bar_color;?> transparent transparent;
                border-radius: 50%;
            }

            @-webkit-keyframes spin {
                100% { -webkit-transform: rotate(359deg); }
            }

            @-moz-keyframes spin {
                100% { -moz-transform: rotate(359deg); }
            }

            @-o-keyframes spin {
                100% { -moz-transform: rotate(359deg); }
            }

            @keyframes spin {
                100% {  transform: rotate(359deg); }
            }
        </style>
    <?php
    }
    elseif($options['bml_template']== 'loadingbar'){
        ?>
        <style>
            .pace {
                -webkit-pointer-events: none;
                pointer-events: none;

                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;

                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                -ms-box-sizing: border-box;
                -o-box-sizing: border-box;
                box-sizing: border-box;

                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
                border-radius: 10px;

                -webkit-background-clip: padding-box;
                -moz-background-clip: padding;
                background-clip: padding-box;

                z-index: 2000;
                position: fixed;
                margin: auto;
                top: 12px;
                left: 0;
                right: 0;
                bottom: 0;
                width: 200px;
                height: 50px;
                overflow: hidden;
            }

            .pace .pace-progress {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                -ms-box-sizing: border-box;
                -o-box-sizing: border-box;
                box-sizing: border-box;

                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                border-radius: 2px;

                -webkit-background-clip: padding-box;
                -moz-background-clip: padding;
                background-clip: padding-box;

                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);

                display: block;
                position: absolute;
                right: 100%;
                margin-right: -7px;
                width: 93%;
                top: 7px;
                height: 14px;
                font-size: 12px;
                background: <?php echo $bar_color;?>;
                color: #29d;
                line-height: 60px;
                font-weight: bold;
                font-family: Helvetica, Arial, "Lucida Grande", sans-serif;

                -webkit-box-shadow: 120px 0 #fff, 240px 0 #fff;
                -ms-box-shadow: 120px 0 #fff, 240px 0 #fff;
                box-shadow: 120px 0 #fff, 240px 0 #fff;
            }

            .pace .pace-progress:after {
                content: attr(data-progress-text);
                display: inline-block;
                position: fixed;
                width: 45px;
                text-align: right;
                right: 0;
                padding-right: 16px;
                top: 4px;
            }

            .pace .pace-progress[data-progress-text="0%"]:after { right: -200px }
            .pace .pace-progress[data-progress-text="1%"]:after { right: -198.14px }
            .pace .pace-progress[data-progress-text="2%"]:after { right: -196.28px }
            .pace .pace-progress[data-progress-text="3%"]:after { right: -194.42px }
            .pace .pace-progress[data-progress-text="4%"]:after { right: -192.56px }
            .pace .pace-progress[data-progress-text="5%"]:after { right: -190.7px }
            .pace .pace-progress[data-progress-text="6%"]:after { right: -188.84px }
            .pace .pace-progress[data-progress-text="7%"]:after { right: -186.98px }
            .pace .pace-progress[data-progress-text="8%"]:after { right: -185.12px }
            .pace .pace-progress[data-progress-text="9%"]:after { right: -183.26px }
            .pace .pace-progress[data-progress-text="10%"]:after { right: -181.4px }
            .pace .pace-progress[data-progress-text="11%"]:after { right: -179.54px }
            .pace .pace-progress[data-progress-text="12%"]:after { right: -177.68px }
            .pace .pace-progress[data-progress-text="13%"]:after { right: -175.82px }
            .pace .pace-progress[data-progress-text="14%"]:after { right: -173.96px }
            .pace .pace-progress[data-progress-text="15%"]:after { right: -172.1px }
            .pace .pace-progress[data-progress-text="16%"]:after { right: -170.24px }
            .pace .pace-progress[data-progress-text="17%"]:after { right: -168.38px }
            .pace .pace-progress[data-progress-text="18%"]:after { right: -166.52px }
            .pace .pace-progress[data-progress-text="19%"]:after { right: -164.66px }
            .pace .pace-progress[data-progress-text="20%"]:after { right: -162.8px }
            .pace .pace-progress[data-progress-text="21%"]:after { right: -160.94px }
            .pace .pace-progress[data-progress-text="22%"]:after { right: -159.08px }
            .pace .pace-progress[data-progress-text="23%"]:after { right: -157.22px }
            .pace .pace-progress[data-progress-text="24%"]:after { right: -155.36px }
            .pace .pace-progress[data-progress-text="25%"]:after { right: -153.5px }
            .pace .pace-progress[data-progress-text="26%"]:after { right: -151.64px }
            .pace .pace-progress[data-progress-text="27%"]:after { right: -149.78px }
            .pace .pace-progress[data-progress-text="28%"]:after { right: -147.92px }
            .pace .pace-progress[data-progress-text="29%"]:after { right: -146.06px }
            .pace .pace-progress[data-progress-text="30%"]:after { right: -144.2px }
            .pace .pace-progress[data-progress-text="31%"]:after { right: -142.34px }
            .pace .pace-progress[data-progress-text="32%"]:after { right: -140.48px }
            .pace .pace-progress[data-progress-text="33%"]:after { right: -138.62px }
            .pace .pace-progress[data-progress-text="34%"]:after { right: -136.76px }
            .pace .pace-progress[data-progress-text="35%"]:after { right: -134.9px }
            .pace .pace-progress[data-progress-text="36%"]:after { right: -133.04px }
            .pace .pace-progress[data-progress-text="37%"]:after { right: -131.18px }
            .pace .pace-progress[data-progress-text="38%"]:after { right: -129.32px }
            .pace .pace-progress[data-progress-text="39%"]:after { right: -127.46px }
            .pace .pace-progress[data-progress-text="40%"]:after { right: -125.6px }
            .pace .pace-progress[data-progress-text="41%"]:after { right: -123.74px }
            .pace .pace-progress[data-progress-text="42%"]:after { right: -121.88px }
            .pace .pace-progress[data-progress-text="43%"]:after { right: -120.02px }
            .pace .pace-progress[data-progress-text="44%"]:after { right: -118.16px }
            .pace .pace-progress[data-progress-text="45%"]:after { right: -116.3px }
            .pace .pace-progress[data-progress-text="46%"]:after { right: -114.44px }
            .pace .pace-progress[data-progress-text="47%"]:after { right: -112.58px }
            .pace .pace-progress[data-progress-text="48%"]:after { right: -110.72px }
            .pace .pace-progress[data-progress-text="49%"]:after { right: -108.86px }
            .pace .pace-progress[data-progress-text="50%"]:after { right: -107px }
            .pace .pace-progress[data-progress-text="51%"]:after { right: -105.14px }
            .pace .pace-progress[data-progress-text="52%"]:after { right: -103.28px }
            .pace .pace-progress[data-progress-text="53%"]:after { right: -101.42px }
            .pace .pace-progress[data-progress-text="54%"]:after { right: -99.56px }
            .pace .pace-progress[data-progress-text="55%"]:after { right: -97.7px }
            .pace .pace-progress[data-progress-text="56%"]:after { right: -95.84px }
            .pace .pace-progress[data-progress-text="57%"]:after { right: -93.98px }
            .pace .pace-progress[data-progress-text="58%"]:after { right: -92.12px }
            .pace .pace-progress[data-progress-text="59%"]:after { right: -90.26px }
            .pace .pace-progress[data-progress-text="60%"]:after { right: -88.4px }
            .pace .pace-progress[data-progress-text="61%"]:after { right: -86.53999999999999px }
            .pace .pace-progress[data-progress-text="62%"]:after { right: -84.68px }
            .pace .pace-progress[data-progress-text="63%"]:after { right: -82.82px }
            .pace .pace-progress[data-progress-text="64%"]:after { right: -80.96000000000001px }
            .pace .pace-progress[data-progress-text="65%"]:after { right: -79.1px }
            .pace .pace-progress[data-progress-text="66%"]:after { right: -77.24px }
            .pace .pace-progress[data-progress-text="67%"]:after { right: -75.38px }
            .pace .pace-progress[data-progress-text="68%"]:after { right: -73.52px }
            .pace .pace-progress[data-progress-text="69%"]:after { right: -71.66px }
            .pace .pace-progress[data-progress-text="70%"]:after { right: -69.8px }
            .pace .pace-progress[data-progress-text="71%"]:after { right: -67.94px }
            .pace .pace-progress[data-progress-text="72%"]:after { right: -66.08px }
            .pace .pace-progress[data-progress-text="73%"]:after { right: -64.22px }
            .pace .pace-progress[data-progress-text="74%"]:after { right: -62.36px }
            .pace .pace-progress[data-progress-text="75%"]:after { right: -60.5px }
            .pace .pace-progress[data-progress-text="76%"]:after { right: -58.64px }
            .pace .pace-progress[data-progress-text="77%"]:after { right: -56.78px }
            .pace .pace-progress[data-progress-text="78%"]:after { right: -54.92px }
            .pace .pace-progress[data-progress-text="79%"]:after { right: -53.06px }
            .pace .pace-progress[data-progress-text="80%"]:after { right: -51.2px }
            .pace .pace-progress[data-progress-text="81%"]:after { right: -49.34px }
            .pace .pace-progress[data-progress-text="82%"]:after { right: -47.480000000000004px }
            .pace .pace-progress[data-progress-text="83%"]:after { right: -45.62px }
            .pace .pace-progress[data-progress-text="84%"]:after { right: -43.76px }
            .pace .pace-progress[data-progress-text="85%"]:after { right: -41.9px }
            .pace .pace-progress[data-progress-text="86%"]:after { right: -40.04px }
            .pace .pace-progress[data-progress-text="87%"]:after { right: -38.18px }
            .pace .pace-progress[data-progress-text="88%"]:after { right: -36.32px }
            .pace .pace-progress[data-progress-text="89%"]:after { right: -34.46px }
            .pace .pace-progress[data-progress-text="90%"]:after { right: -32.6px }
            .pace .pace-progress[data-progress-text="91%"]:after { right: -30.740000000000002px }
            .pace .pace-progress[data-progress-text="92%"]:after { right: -28.880000000000003px }
            .pace .pace-progress[data-progress-text="93%"]:after { right: -27.02px }
            .pace .pace-progress[data-progress-text="94%"]:after { right: -25.16px }
            .pace .pace-progress[data-progress-text="95%"]:after { right: -23.3px }
            .pace .pace-progress[data-progress-text="96%"]:after { right: -21.439999999999998px }
            .pace .pace-progress[data-progress-text="97%"]:after { right: -19.58px }
            .pace .pace-progress[data-progress-text="98%"]:after { right: -17.72px }
            .pace .pace-progress[data-progress-text="99%"]:after { right: -15.86px }
            .pace .pace-progress[data-progress-text="100%"]:after { right: -14px }


            .pace .pace-activity {
                position: absolute;
                width: 100%;
                height: 28px;
                z-index: 2001;
                box-shadow: inset 0 0 0 2px <?php echo $bar_color;?>, inset 0 0 0 7px #FFF;
                border-radius: 10px;
            }

            .pace.pace-inactive {
                display: none;
            }

        </style>
    <?php
    }
    elseif($options['bml_template']== 'cornerindicator'){
        ?>
        <style>
            .pace {
                -webkit-pointer-events: none;
                pointer-events: none;

                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            .pace .pace-activity {
                display: block;
                position: fixed;
                z-index: 2000;
                top: 0;
                right: 0;
                width: 300px;
                height: 300px;
                background: <?php echo $bar_color;?>;
                -webkit-transition: -webkit-transform 0.3s;
                transition: transform 0.3s;
                -webkit-transform: translateX(100%) translateY(-100%) rotate(45deg);
                transform: translateX(100%) translateY(-100%) rotate(45deg);
                pointer-events: none;
            }

            .pace.pace-active .pace-activity {
                -webkit-transform: translateX(50%) translateY(-50%) rotate(45deg);
                transform: translateX(50%) translateY(-50%) rotate(45deg);
            }

            .pace .pace-activity::before,
            .pace .pace-activity::after {
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                position: absolute;
                bottom: 30px;
                left: 50%;
                display: block;
                border: 5px solid #fff;
                border-radius: 50%;
                content: '';
            }

            .pace .pace-activity::before {
                margin-left: -40px;
                width: 80px;
                height: 80px;
                border-right-color: rgba(0, 0, 0, .2);
                border-left-color: rgba(0, 0, 0, .2);
                -webkit-animation: pace-theme-corner-indicator-spin 3s linear infinite;
                animation: pace-theme-corner-indicator-spin 3s linear infinite;
            }

            .pace .pace-activity::after {
                bottom: 50px;
                margin-left: -20px;
                width: 40px;
                height: 40px;
                border-top-color: rgba(0, 0, 0, .2);
                border-bottom-color: rgba(0, 0, 0, .2);
                -webkit-animation: pace-theme-corner-indicator-spin 1s linear infinite;
                animation: pace-theme-corner-indicator-spin 1s linear infinite;
            }

            @-webkit-keyframes pace-theme-corner-indicator-spin {
                0% { -webkit-transform: rotate(0deg); }
                100% { -webkit-transform: rotate(359deg); }
            }
            @keyframes pace-theme-corner-indicator-spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(359deg); }
            }

        </style>
    <?php
    }
    elseif($options['bml_template']== 'bigcounter'){
        ?>
        <style>
            .pace {
                -webkit-pointer-events: none;
                pointer-events: none;

                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            .pace.pace-inactive .pace-progress {
                display: none;
            }

            .pace .pace-progress {
                position: fixed;
                z-index: 2000;
                top: 0;
                right: 0;
                height: 5rem;
                width: 5rem;

                -webkit-transform: translate3d(0, 0, 0) !important;
                -ms-transform: translate3d(0, 0, 0) !important;
                transform: translate3d(0, 0, 0) !important;
            }

            .pace .pace-progress:after {
                display: block;
                position: absolute;
                top: 0;
                right: .5rem;
                content: attr(data-progress-text);
                font-family: "Helvetica Neue", sans-serif;
                font-weight: 100;
                font-size: 5rem;
                line-height: 1;
                text-align: right;
                color: rgba(0, 0, 0, 0.19999999999999996);
            }
            .admin-bar .pace .pace-progress {
                top: 32px;
            }
            @media only screen and (max-width: 768px) {
                .admin-bar .pace .pace-progress {
                    top: 46px;
                }
            }
        </style>
    <?php
    }
    elseif($options['bml_template']== 'flattop'){
        ?>
        <style>
            .pace {
                -webkit-pointer-events: none;
                pointer-events: none;

                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;

                position: fixed;
                top: 0;
                left: 0;
                width: 100%;

                -webkit-transform: translate3d(0, -50px, 0);
                -ms-transform: translate3d(0, -50px, 0);
                transform: translate3d(0, -50px, 0);

                -webkit-transition: -webkit-transform .5s ease-out;
                -ms-transition: -webkit-transform .5s ease-out;
                transition: transform .5s ease-out;
            }

            .pace.pace-active {
                -webkit-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }

            .pace .pace-progress {
                display: block;
                position: fixed;
                z-index: 2000;
                top: 0;
                right: 100%;
                width: 100%;
                height: 10px;
                background: <?php echo $bar_color;?>;

                pointer-events: none;
            }
            .admin-bar .pace .pace-progress {
                top: 32px;
            }
            @media only screen and (max-width: 768px) {
                .admin-bar .pace .pace-progress {
                    top: 46px;
                }
            }
        </style>
    <?php
    }
    elseif($options['bml_template']== 'fillleft'){
        ?>
        <style>
            .pace {
                -webkit-pointer-events: none;
                pointer-events: none;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            .pace-inactive {
                display: none;
            }

            .pace .pace-progress {
                background-color: rgba(0, 0, 0, 0.19999999999999996);
                position: fixed;
                z-index: 999;
                top: 0;
                right: 100%;
                bottom: 0;
                width: 100%;
            }
        </style>
    <?php
    }
    elseif($options['bml_template']== 'barbershop'){
        ?>
        <style>
            .pace {
                -webkit-pointer-events: none;
                pointer-events: none;

                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;

                overflow: hidden;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 2000;
                width: 100%;
                height: 12px;
                background: #fff;
            }

            .pace-inactive {
                display: none;
            }

            .pace .pace-progress {
                background-color: #29d;
                position: fixed;
                top: 0;
                bottom: 0;
                right: 100%;
                width: 100%;
                overflow: hidden;
            }

            .pace .pace-activity {
                position: fixed;
                top: 0;
                right: -32px;
                bottom: 0;
                left: 0;

                -webkit-transform: translate3d(0, 0, 0);
                -moz-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);

                background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.2)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.2)), color-stop(0.75, rgba(255, 255, 255, 0.2)), color-stop(0.75, transparent), to(transparent));
                background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent);
                background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent);
                background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent);
                background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent);
                -webkit-background-size: 32px 32px;
                -moz-background-size: 32px 32px;
                -o-background-size: 32px 32px;
                background-size: 32px 32px;

                -webkit-animation: pace-theme-barber-shop-motion 500ms linear infinite;
                -moz-animation: pace-theme-barber-shop-motion 500ms linear infinite;
                -ms-animation: pace-theme-barber-shop-motion 500ms linear infinite;
                -o-animation: pace-theme-barber-shop-motion 500ms linear infinite;
                animation: pace-theme-barber-shop-motion 500ms linear infinite;
            }

            @-webkit-keyframes pace-theme-barber-shop-motion {
                0% { -webkit-transform: none; transform: none; }
                100% { -webkit-transform: translate(-32px, 0); transform: translate(-32px, 0); }
            }
            @-moz-keyframes pace-theme-barber-shop-motion {
                0% { -moz-transform: none; transform: none; }
                100% { -moz-transform: translate(-32px, 0); transform: translate(-32px, 0); }
            }
            @-o-keyframes pace-theme-barber-shop-motion {
                0% { -o-transform: none; transform: none; }
                100% { -o-transform: translate(-32px, 0); transform: translate(-32px, 0); }
            }
            @-ms-keyframes pace-theme-barber-shop-motion {
                0% { -ms-transform: none; transform: none; }
                100% { -ms-transform: translate(-32px, 0); transform: translate(-32px, 0); }
            }
            @keyframes pace-theme-barber-shop-motion {
                0% { transform: none; transform: none; }
                100% { transform: translate(-32px, 0); transform: translate(-32px, 0); }
            }

        </style>
    <?php
    }
    elseif($options['bml_template']== 'macosx'){
        ?>
        <style>
            .pace {
                -webkit-pointer-events: none;
                pointer-events: none;

                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;

                overflow: hidden;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 2000;
                width: 100%;
                height: 12px;
                background: #fff;
            }

            .pace-inactive {
                display: none;
            }

            .pace .pace-progress {
                background-color: #0087E1;
                position: fixed;
                top: 0;
                right: 100%;
                width: 100%;
                height: 12px;
                overflow: hidden;

                -webkit-border-radius: 0 0 4px 0;
                -moz-border-radius: 0 0 4px 0;
                -o-border-radius: 0 0 4px 0;
                border-radius: 0 0 4px 0;

                -webkit-box-shadow: inset -1px 0 #00558F, inset 0 -1px #00558F, inset 0 2px rgba(255, 255, 255, 0.5), inset 0 6px rgba(255, 255, 255, .3);
                -moz-box-shadow: inset -1px 0 #00558F, inset 0 -1px #00558F, inset 0 2px rgba(255, 255, 255, 0.5), inset 0 6px rgba(255, 255, 255, .3);
                -o-box-shadow: inset -1px 0 #00558F, inset 0 -1px #00558F, inset 0 2px rgba(255, 255, 255, 0.5), inset 0 6px rgba(255, 255, 255, .3);
                box-shadow: inset -1px 0 #00558F, inset 0 -1px #00558F, inset 0 2px rgba(255, 255, 255, 0.5), inset 0 6px rgba(255, 255, 255, .3);
            }

            .pace .pace-activity {
                position: fixed;
                top: 0;
                left: 0;
                right: -28px;
                bottom: 0;

                -webkit-background-image: radial-gradient(rgba(255, 255, 255, .65) 0%, rgba(255, 255, 255, .15) 100%);
                -moz-background-image: radial-gradient(rgba(255, 255, 255, .65) 0%, rgba(255, 255, 255, .15) 100%);
                -o-background-image: radial-gradient(rgba(255, 255, 255, .65) 0%, rgba(255, 255, 255, .15) 100%);
                background-image: radial-gradient(rgba(255, 255, 255, .65) 0%, rgba(255, 255, 255, .15) 100%);

                -webkit-background-size: 28px 100%;
                -moz-background-size: 28px 100%;
                -o-background-size: 28px 100%;
                background-size: 28px 100%;

                -webkit-animation: pace-theme-mac-osx-motion 500ms linear infinite;
                -moz-animation: pace-theme-mac-osx-motion 500ms linear infinite;
                -ms-animation: pace-theme-mac-osx-motion 500ms linear infinite;
                -o-animation: pace-theme-mac-osx-motion 500ms linear infinite;
                animation: pace-theme-mac-osx-motion 500ms linear infinite;
            }

            @-webkit-keyframes pace-theme-mac-osx-motion {
                0% { -webkit-transform: none; transform: none; }
                100% { -webkit-transform: translate(-28px, 0); transform: translate(-28px, 0); }
            }
            @-moz-keyframes pace-theme-mac-osx-motion {
                0% { -moz-transform: none; transform: none; }
                100% { -moz-transform: translate(-28px, 0); transform: translate(-28px, 0); }
            }
            @-o-keyframes pace-theme-mac-osx-motion {
                0% { -o-transform: none; transform: none; }
                100% { -o-transform: translate(-28px, 0); transform: translate(-28px, 0); }
            }
            @-ms-keyframes pace-theme-mac-osx-motion {
                0% { -ms-transform: none; transform: none; }
                100% { -ms-transform: translate(-28px, 0); transform: translate(-28px, 0); }
            }
            @keyframes pace-theme-mac-osx-motion {
                0% { transform: none; transform: none; }
                100% { transform: translate(-28px, 0); transform: translate(-28px, 0); }
            }

        </style>
    <?php
    }
    else{
        ?>
        <style>
            .pace .pace-progress {
                background: <?php echo $bar_color;?>;
                position: fixed;
                z-index: 2000;
                top: 0;
                right: 100%;
                width: 100%;
                height: <?php echo $bar_height;?>px;
            }
            .admin-bar .pace .pace-progress {
                top: 32px;
            }
            @media only screen and (max-width: 768px) {
                .admin-bar .pace .pace-progress {
                    top: 46px;
                }
            }
        </style>
    <?php
    }
}


function brozzme_hex2rgba($color, $opacity = false) {

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if(empty($color))
        return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if($opacity){
        if(abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }

    //Return rgb(a) color string
    return $output;
}