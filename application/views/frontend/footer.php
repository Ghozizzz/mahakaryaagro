 
            <footer class="footer action-lage bg-grey p-top-40">
                <!--<div class="action-lage"></div>-->
                <div class="container">
                    <div class="row">
                        <div class="widget_area">

                            <div class="col-md-12 m-top-20">
                                <div class="widget_item widget_about">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h4 class="text-black text_ping">PT. Mahakarya Agro Pertiwi</h4>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-md-6 mobile_kiri">
                                            <div class="text-center">
                                                <div class="widget_ab_item m-top-20">
                                                    <div class="item_icon"><i class="fa fa-building-o text-black"></i></div>
                                                    <div class="widget_ab_item_text">
                                                        <h6 class="text-black">Office</h6>
                                                        <p>Menara MTH Lantai 15 Suite 1508<br>
                                                            Jalan MT Haryono Kav 23 Jakarta Selatan</p>
                                                    </div>
                                                </div>
                                                <div class="widget_ab_item m-top-20">
                                                    <div class="item_icon"><i class="fa fa-building-o text-black"></i></div>
                                                    <div class="widget_ab_item_text">
                                                        <h6 class="text-black">Warehouse</h6>
                                                        <p>Gn Sindur - Jawa Barat</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mobile_kiri">
                                            <div class="text-center">
                                                <div class="widget_ab_item m-top-20">
                                                    <div class="item_icon"><i class="fa fa-phone text-black"></i></div>
                                                    <div class="widget_ab_item_text">
                                                        <h6 class="text-black">Phone :</h6>
                                                        <p>021-75683718</p>
                                                    </div>
                                                </div>
                                                <div class="widget_ab_item m-top-20">
                                                    <div class="item_icon"><i class="fa fa-phone text-black"></i></div>
                                                    <div class="widget_ab_item_text">
                                                        <h6 class="text-black">Mobile Phone :</h6>
                                                        <p>+62 819-0812-7002</p>
                                                    </div>
                                                </div>

                                                <div class="widget_ab_item m-top-20">
                                                    <div class="item_icon"><i class="fa fa-envelope-o text-black"></i></div>
                                                    <div class="widget_ab_item_text">
                                                        <h6 class="text-black">Email :</h6>
                                                        <p>info@mahakaryaagropertiwi.co.id</p>
                                                        <p>sales@mahakaryaagropertiwi.co.id</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row m-top-20">
                                        <div class="col-md-12">
                                            <div class="widget_item mobile_kiri widget_newsletter">
                                                <h4 class="text-black">Social Media</h4>
                                                <div class="social">
                                                    <ul>
                                                        <li>
                                                            <a href="https://www.facebook.com/pingtax"><i class="fa fa-lg fa-facebook"></i></a></li>
                                                        </li>
                                                        <li>
                                                            <a href="https://www.instagram.com/pingtax/"><i class="fa fa-lg fa-instagram"></i></a></li>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fa fa-lg fa-linkedin"></i></a></li>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div><!-- End off widget item -->
                            </div><!-- End off col-md-3 -->
                        </div>
                    </div>
                </div>
                <div class="main_footer fix bg-grey text-center sm-m-top-50 p-bottom-30 m-top-20">
                    <div class="col-md-12">
                        <p class="wow fadeInRight" data-wow-duration="1s">
                            <a href="<?=base_url();?>">Mahakaryaagro</a> 
                            <?=date('Y');?>. All Rights Reserved
                        </p>
                    </div>
                </div>
            </footer>
        </div>

        <script src="<?=base_url();?>assets/js/vendor/bootstrap.min.js"></script>

        <script src="<?=base_url();?>assets/js/owl.carousel.min.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.magnific-popup.js"></script>
        <script src="<?=base_url();?>assets/js/jquery.easing.1.3.js"></script>
        <!-- <script src="<?=base_url();?>assets/css/slick/slick.js"></script> -->
        <!-- <script src="<?=base_url();?>assets/css/slick/slick.min.js"></script> -->
        <script src="<?=base_url();?>assets/js/jquery.collapse.js"></script>
        <script src="<?=base_url();?>assets/js/bootsnav.js"></script>
        <script src="<?=base_url();?>assets/js/slick.min.js"></script>



        <!-- <script src="<?=base_url();?>assets/js/plugins.js"></script> -->
        <script src="<?=base_url();?>assets/js/main.js"></script>
        <script src="<?=base_url();?>assets/js/wow.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".home-carousel").owlCarousel({
                    items: 1,
                    nav: true,
                    dots: true,
                    loop: true,
                    singleItem: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
                });

                // Define the menu we are working with
                var menu = $('#navbar_atas');
                var culmn = $('.culmn');
                var nb = $('.navbar-brand');

                // Get the menus current offset
                var origOffsetY = menu.offset().top;
                var origHeight = menu.innerHeight();

                /**
                 * scroll
                 * Perform our menu mod
                 */
                function scroll() {

                    // Check the menus offset. 
                    if ($(window).scrollTop() >= origOffsetY) {

                        //If it is indeed beyond the offset, affix it to the top.
                        $(menu).addClass('navbar-fixed-top');
                        $(culmn).css('paddingBottom', origHeight);
                    } else {

                        // Otherwise, un affix it.
                        $(menu).removeClass('navbar-fixed-top');
                        $(culmn).css('paddingBottom', 0);

                    }
                }

                // Anytime the document is scrolled act on it
                document.onscroll = scroll;


                /** SEARCH **/
                $("#search_button").on("click", function(e){
                    e.preventDefault();
                    window.location = '<?=base_url();?>search/'+$('#search_input').val();
                });

                $('#search_input').keypress(function (e) {
                    var key = e.which;
                    if(key == 13)  // the enter key code
                    {
                        window.location = '<?=base_url();?>search/'+$('#search_input').val();
                    }
                }); 

            });
        </script>
    </body>
</html>