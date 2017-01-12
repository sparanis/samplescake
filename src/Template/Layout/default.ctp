<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Work Studio';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('slicknav.css') ?>
    <?= $this->Html->css('prettyPhoto.css') ?>
    <?= $this->Html->css('camera.css') ?>
    <?= $this->Html->css('font-awesome.css') ?>
    <?= $this->Html->css('hover.css') ?>

    <?= $this->Html->script('jquery-1.8.3.min.js') ?>
    <?= $this->Html->script('jquery.mobile.customized.min.js') ?>
    <?= $this->Html->script('jquery.easing.1.3.js') ?>
    <?= $this->Html->script('camera.min.js') ?>
    <?= $this->Html->script('myscript.js') ?>
    <?= $this->Html->script('sorting.js') ?>
    <?php if($mytype=='customers'){?>
    <?= $this->Html->script('app.js') ?>
    <?php } ?>
    <?= $this->Html->script('jquery.isotope.js') ?>
    <?= $this->Html->script('jquery.masonry.min.js') ?>
    <script>
            jQuery(function(){
                    jQuery('#camera_wrap_1').camera({
                    transPeriod: 500,
                    time: 3000,
                    height: '490px',
                    thumbnails: false,
                    pagination: true,
                    playPause: false,
                    loader: false,
                    navigation: false,
                    hover: false
                });
            });
        </script>

</head>
<body>
    <div id="menuF" class="fixed">
        <div class="container">
            <div class="row hidden-xs">
                <div class="logo col-md-4">
                    <div>
                        <a href="<?php echo $this->request->webroot;?>">
                            <?php echo $this->Html->image('ws_small.png', ['alt' => 'WORK STUDIO', 'class' => 'b-logo']); ?>
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="navmenu"style="text-align: center;">
                        <ul id="menu">

                            

                            <?php if($mytype=='customers'){

                            $activePage = $_SERVER['REQUEST_URI'];

                            $pages = array(
                                    'Home' => $this->request->webroot.$mytype.'/',
                                    'Inbox' => $this->request->webroot.'messages',
                                    'Search' => $this->request->webroot.'search',
                                    'Jobs' => $this->request->webroot.'jobs',
                                    'Logout' => $this->request->webroot.'/users/logout'
                                );

                             ?>
                            <?php foreach ($pages as $page=>$url): ?>
                                <li <?php if($url === $activePage):?>class="active"<?php endif;?> ><a href="<?php echo $url; ?>"><?php echo $page; ?></a></li>
                            <?php endforeach ?>


                            <?php }else if($mytype=='workers'){ 

                            $activePage = $_SERVER['REQUEST_URI'];

                            $pages = array(
                                    'Home' => $this->request->webroot.$mytype.'/',
                                    'Inbox' => $this->request->webroot.'messages',
                                    'Skills' => $this->request->webroot.'skills',
                                    'Histories' => $this->request->webroot.'histories',
                                    'Licenses' => $this->request->webroot.'licenses',
                                    'Logout' => $this->request->webroot.'/users/logout'
                                );

                             ?>
                            <?php foreach ($pages as $page=>$url): ?>
                                <li <?php if($url === $activePage):?>class="active"<?php endif;?> ><a href="<?php echo $url; ?>"><?php echo $page; ?></a></li>
                            <?php endforeach ?>


                            <?php }else{ ?>
                            
                            <!-- if no ID -->
                        
                            <li class="active" ><a href="<?php echo $this->request->webroot;?>#home">Home</a></li>
                            <li><a href="<?php echo $this->request->webroot;?>#about">Account</a></li>
                            <li><a href="<?php echo $this->request->webroot;?>#project">Projects</a></li>
                            <li><a href="<?php echo $this->request->webroot;?>#news">Jobs</a></li>
                            <li class="last"><a href="<?php echo $this->request->webroot;?>#contact">Contact</a></li>

                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->Flash->render() ?>
    <div class="clearfix">
        <!--  <h1><a href=""><?= $this->fetch('title') ?></a></h1> -->

        <?= $this->fetch('content') ?>

        <div class="clearfix"></div>
    </div>
    <footer>

        <!--contact start-->

    <div id="contact">
        <div class="lineBlack">
            <div class="container">
                <div class="row downLine">
                    <div class="col-md-12 text-right">
                        <input  id="searchPattern" type="search" placeholder="Search the Site"/><i class="glyphicon glyphicon-search" style="font-size: 13px; color:#a5a5a5;" id="iS"></i>
                    </div>
                    <div class="col-md-6 text-left copy">
                        <p>Copyright &copy; 2014 Timber HTML Template. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-right dm">
                        <ul id="downMenu">
                            <li class="active"><a href="#home">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#project1">Projects</a></li>
                            <li><a href="#news">Jobs</a></li>
                            <li class="last"><a href="#contact">Contact</a></li>
                            <!--li><a href="#features">Features</a></li-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    </footer>

        
    <?= $this->Html->script('jquery.prettyPhoto.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('jquery.slicknav.js') ?> 
    <?= $this->Html->script('profile-pic.js') ?> 

    <script>
            $(document).ready(function(){
            $(".bhide").click(function(){
                $(".hideObj").slideDown();
                $(this).hide(); //.attr()
                return false;
            });
            $(".bhide2").click(function(){
                $(".container.hideObj2").slideDown();
                $(this).hide(); // .attr()
                return false;
            });
                
            $('.heart').mouseover(function(){
                    $(this).find('i').removeClass('fa-heart-o').addClass('fa-heart');
                }).mouseout(function(){
                    $(this).find('i').removeClass('fa-heart').addClass('fa-heart-o');
                });
                
                function sdf_FTS(_number,_decimal,_separator)
                {
                var decimal=(typeof(_decimal)!='undefined')?_decimal:2;
                var separator=(typeof(_separator)!='undefined')?_separator:'';
                var r=parseFloat(_number)
                var exp10=Math.pow(10,decimal);
                r=Math.round(r*exp10)/exp10;
                rr=Number(r).toFixed(decimal).toString().split('.');
                b=rr[0].replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g,"\$1"+separator);
                r=(rr[1]?b+'.'+rr[1]:b);

                return r;
}
                
            setTimeout(function(){
                    $('#counter').text('0');
                    $('#counter1').text('0');
                    $('#counter2').text('0');
                    setInterval(function(){
                        
                        var curval=parseInt($('#counter').text());
                        var curval1=parseInt($('#counter1').text().replace(' ',''));
                        var curval2=parseInt($('#counter2').text());
                        if(curval<=707){
                            $('#counter').text(curval+1);
                        }
                        if(curval1<=12280){
                            $('#counter1').text(sdf_FTS((curval1+20),0,' '));
                        }
                        if(curval2<=245){
                            $('#counter2').text(curval2+1);
                        }
                    }, 2);
                    
                }, 500);
            });
    </script>
    <script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#menu').slicknav();
        
    });
    </script>
    
    <script type="text/javascript">
    // $(document).ready(function(){
       
    //     var $menu = $("#menuF");
            
    //     $(window).scroll(function(){
    //         if ( $(this).scrollTop() > 100 && $menu.hasClass("default") ){
    //             $menu.fadeOut('fast',function(){
    //                 $(this).removeClass("default")
    //                        .addClass("fixed transbg")
    //                        .fadeIn('fast');
    //             });
    //         } else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
    //             $menu.fadeOut('fast',function(){
    //                 $(this).removeClass("fixed transbg")
    //                        .addClass("default")
    //                        .fadeIn('fast');
    //             });
    //         }
    //     });
    // });
    //jQuery
    </script>
    <script>
        /*menu*/
        function calculateScroll() {
            var contentTop      =   [];
            var contentBottom   =   [];
            var winTop      =   $(window).scrollTop();
            var rangeTop    =   200;
            var rangeBottom =   500;
            $('.navmenu').find('a').each(function(){
                contentTop.push( $( $(this).attr('href') ).offset().top );
                contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
            })
            $.each( contentTop, function(i){
                if ( winTop > contentTop[i] - rangeTop && winTop < contentBottom[i] - rangeBottom ){
                    $('.navmenu li')
                    .removeClass('active')
                    .eq(i).addClass('active');              
                }
            })
        };
        
        $(document).ready(function(){
            calculateScroll();
            $(window).scroll(function(event) {
                calculateScroll();
            });
            $('.navmenu ul li a').click(function() {  
                $('html, body').animate({scrollTop: $(this.hash).offset().top - 80}, 800);
                return false;
            });
        });     
    </script>   
    <script type="text/javascript" charset="utf-8">

        jQuery(document).ready(function(){
            jQuery(".pretty a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true, social_tools: ''});
            
        });
    </script>

</body>
</html>
