            <!--Call to  action section-->
            <section id="layanan" class="action bg-primary roomy-40">
                <div class="container">
                    <div class="row">
                        <div class="maine_action">
                            <div class="col-md-12">
                                <div class="action_item text-center layanan">
                                    <h2 class="text-white"><?=$this->lang->line('layanan_kami');?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="layanan_content_1" class="roomy-70">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="vira-card">
                                <div class="vira-card-header wow bounceIn" data-wow-delay="0.3s">
                                    <div class="card-icon">
                                        <span class="fa fa-building" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="vira-card-content wow fadeIn" data-wow-delay="0.5s">
                                    <h3><?=$this->lang->line('wp_perusahaan');?></h3>
                                    <p>
                                        <?=$this->lang->line('l_desc_1');?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="vira-card">
                                <div class="vira-card-header wow bounceIn" data-wow-delay="0.3s">
                                    <div class="card-icon">
                                        <span class="fa fa-user" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="vira-card-content wow fadeIn" data-wow-delay="0.5s">
                                    <h3><?=$this->lang->line('wp_perorangan');?></h3>
                                    <p>
                                        <?=$this->lang->line('l_desc_2');?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="vira-card">
                                <div class="vira-card-header wow bounceIn" data-wow-delay="0.3s">
                                    <div class="card-icon">
                                        <span class="fa fa-address-book" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="vira-card-content wow fadeIn" data-wow-delay="0.5s">
                                    <h3><?=$this->lang->line('aplikasi_hris');?></h3>
                                    <p>
                                        <?=$this->lang->line('l_desc_3');?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center">
                                <a href="https://api.whatsapp.com/send?phone=+6281210763212" target="_blank" class="btn btn-biasa btn-xl wow fadeIn"><?=$this->lang->line('l_konsultasi');?></a>
                            </div>
                        </div>
                    </div>
            </section>

            <section id="layanan_content" class="bg-grey roomy-70">
                <div class="container">
                    <div class="row roomy-40" id="kepatuhan_pajak">
                        <div class="main_business">
                            <div class="col-md-4 wow fadeInUp text-center text-center">
                                <div class="business_img">
                                    <img src="<?=base_url();?>assets/images/jasa/kepatuhan_pajak.svg" alt="">
                                </div>
                            </div>
                            
                            <div class="col-md-8 wow fadeInDown">
                                <div class="business_item sm-m-top-50">
                                    <h2 class="text-uppercase"><?=$this->lang->line('l_jasa_1');?></h2>
                                    <p class="m-top-20"><?=$this->lang->line('l_jd_1');?></p>
                                    <ul>
                                        <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_1_1');?></li>
                                        <li style="margin-left: 15px;">
                                            <ul>
                                                <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_1_1a');?></li>
                                                <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_1_1b');?></li>
                                                <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_1_1c');?></li>
                                                <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_1_1d');?></li>
                                                <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_1_1e');?></li>
                                                <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_1_1f');?></li>
                                                <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_1_1g');?></li>
                                            </ul>
                                        </li>
                                        <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_1_2');?></li>
                                        <?php if($this->session->userdata('site_lang')=='english'){ ?>
                                        <li style="margin-left: 15px;">
                                            <ul>
                                                <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_1_2a');?></li>
                                                <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_1_2b');?></li>
                                            </ul>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr id="review_pajak">
                    <div class="row roomy-40">
                        <div class="main_business">
                            <div class="col-sm-4 col-md-3 col-md-push-9 wow fadeInDown">
                                <div class="business_img">
                                    <img src="<?=base_url();?>assets/images/jasa/review_perpajakan.svg" alt="">
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-9 col-md-pull-3 wow fadeInUp">
                                <div class="business_item sm-m-top-50">
                                    <h2 class="text-uppercase"><?=$this->lang->line('l_jasa_2');?></h2>
                                    <p class="m-top-20"><?=$this->lang->line('l_jd_2');?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr id="konsultasi_pajak">
                    <div class="row roomy-40">
                        <div class="main_business">
                            <div class="col-md-4 wow fadeInUp text-center">
                                <div class="business_img">
                                    <img src="<?=base_url();?>assets/images/jasa/akuntansi.svg" alt="">
                                </div>
                            </div>
                            
                            <div class="col-md-8 wow fadeInDown">
                                <div class="business_item sm-m-top-50">
                                    <h2 class="text-uppercase"><?=$this->lang->line('l_jasa_3');?></h2>
                                    <p class="m-top-20"><?=$this->lang->line('l_jd_3');?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr id="akuntansi">
                    <div class="row roomy-40">
                        <div class="main_business">
                            <div class="col-sm-4 col-md-3 col-md-push-9 wow fadeInDown">
                                <div class="business_img">
                                    <img src="<?=base_url();?>assets/images/jasa/konsultasi_pajak.svg" alt="">
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-9 col-md-pull-3 wow fadeInUp">
                                <div class="business_item sm-m-top-50">
                                    <h2 class="text-uppercase"><?=$this->lang->line('l_jasa_4');?></h2>
                                    <p class="m-top-20"><?=$this->lang->line('l_jd_4');?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr id="pendampingan_pajak">
                    <div class="row roomy-40">
                        <div class="main_business">
                            <div class="col-md-4 wow fadeInUp text-center">
                                <div class="business_img">
                                    <img src="<?=base_url();?>assets/images/jasa/pendampingan_pajak.svg" alt="">
                                </div>
                            </div>
                            
                            <div class="col-md-8 wow fadeInDown">
                                <div class="business_item sm-m-top-50">
                                    <h2 class="text-uppercase"><?=$this->lang->line('l_jasa_5');?></h2>
                                    <p class="m-top-20"><?=$this->lang->line('l_jd_5');?></p>
                                    <ul>
                                        <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jasa_5a');?></li>
                                        <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jasa_5b');?></li>
                                        <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jasa_5c');?></li>
                                        <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jasa_5d');?></li>
                                        <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jasa_5e');?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr id="perencanaan_pajak">
                    <div class="row roomy-40">
                        <div class="main_business">
                            <div class="col-sm-4 col-md-3 col-md-push-9 wow fadeInDown">
                                <div class="business_img">
                                    <img src="<?=base_url();?>assets/images/jasa/perencanaan_pajak.svg" alt="">
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-9 col-md-pull-3 wow fadeInUp">
                                <div class="business_item sm-m-top-50">
                                    <h2 class="text-uppercase"><?=$this->lang->line('l_jasa_6');?></strong></h2>
                                    <p class="m-top-20"><?=$this->lang->line('l_jd_6');?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr id="hris_pajak">
                    <div class="row roomy-40">
                        <div class="main_business">
                            <div class="col-md-4 wow fadeInUp text-center">
                                <div class="business_img">
                                    <img src="<?=base_url();?>assets/images/jasa/hris_pajak.svg" alt="">
                                </div>
                            </div>
                            
                            <div class="col-md-8 wow fadeInDown">
                                <div class="business_item sm-m-top-50">
                                    <h2 class="text-uppercase"><?=$this->lang->line('l_jasa_7');?></h2>
                                    <p class="m-top-20"><?=$this->lang->line('l_jd_7');?></p>
                                    <ul>
                                        <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_7a');?></li>
                                        <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_7b');?></li>
                                        <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_7c');?></li>
                                        <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_7d');?></li>
                                        <li><i class="fa fa-arrow-circle-right"></i><?=$this->lang->line('l_jd_7e');?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--Call to  action section-->
            <section id="layanan_action" class="action roomy-40">
                <div class="container">
                    <div class="row">
                        <div class="maine_action">
                            <div class="col-md-9">
                                <div class="action_item text-left sm-text-center">
                                    <h2 class="text-primary"><?=$this->lang->line('l_konsultasikan');?></h2>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="action_btn text-left sm-text-center">
                                    <a href="https://api.whatsapp.com/send?phone=+6281210763212&text=<?=preg_replace('/\s+/', '%20',trim($this->lang->line('whatsapp')));?>" class="btn btn-primary"><?=$this->lang->line('l_kontak_kami');?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>