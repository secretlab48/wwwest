
                    <footer class="footer" role="contentinfo">
                        <div class="footer-box">
                            <div class="container">
                                <div class="row">
                                    <div class="footer-left col-lg-5 col-sm-12">
                                        <div class="footer-col-title footer-logo">
                                            <a href="<?php echo site_url(); ?>">MoGo</a>
                                        </div>
                                        <div class="footer-col">
                                            <div class="footer-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</div>
                                            <div class="follow-us__container">
                                                <div class="follow-us__followers"><span>15k</span> followers</span></div>
                                                <div class="foolow-us__box">
                                                    <span>Follow us:</span>
                                                    <div class="follow-us__content">
                                                        <a class="fa fa-facebook" href="#"></a>
                                                        <a class="fa fa-twitter" href="#"></a>
                                                        <a class="fa fa-instagram" href="#"></a>
                                                        <a class="fa fa-pinterest" href="#"></a>
                                                        <a class="fa fa-google-plus" href="#"></a>
                                                        <a class="fa fa-youtube" href="#"></a>
                                                        <a class="fa fa-telegram" href="#"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="subscribe__container">
                                                <form>
                                                    <input name="email" placeholder="Your email..."/>
                                                    <button>subscribe</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-center col-lg-4 col-sm-12">
                                        <div class="footer-col-title blogs">
                                            blogs
                                        </div>
                                        <div class="footer-col">
                                            <div class="footer-blogs__container">
                                                <?php echo do_shortcode('[get_last_posts]' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-right col-lg-3 col-sm-12">
                                        <div class="footer-col-title blogs">
                                            instagram
                                        </div>
                                        <div class="footer-col">
                                            <div class="footer-instagram">
                                                <?php echo do_shortcode( '[instagram-feed user="vadim124578" num="3" cols="3" showheader=false showfollow=false showbutton=true usepagination=true imagepadding="0" buttontext="View more photos"]' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-title container" style="padding-left:0;padding-right:0;">© <?php echo date( 'Y' ); ?> secretlab</div>
                    </footer>

                    <?php wp_footer(); ?>

             </main>

		</div> <!-- site-wrapper -->

	</body>
</html>
