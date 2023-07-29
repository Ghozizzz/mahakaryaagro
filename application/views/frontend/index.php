    <!--Home Sections-->
    <div class="overlay-text">
        <h2>
            <?=$cms['nama'];?>
        </h2>
    </div>
    <div id="homeCarousel" class="home-carousel" data-ride="carousel">
        <?php $no = 0; foreach ($slider as $v) { ?>
        <div class="carousel-item <?=($no==0)? 'active' : '' ;?>">  
            <img class="home-slider-item" src="<?=base_url();?>assets/images/upload/<?=$v->image;?>" alt="Image">
            <div class="gradient-overlay"></div>
        </div>
        <?php $no++; } ?>
    </div>
    <section id="home">
        <div class="container">
            <div class="main-section__single">
                <div class="flex row align-items-center">
                    <div class="flex__text col-lg-12">
                        <h3 style="color: #fff">The pioneer of feed ingredients company in Indonesia</h3>
                        <div class="blockquote__content">
                            We have been providing the best quality feed ingredients product for all our customers in indonesia. We have served a wide range of customers, from small-medium companies to national manufacturers.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 4rem">
                <div class="col-md-12 text-center roomy-40">
                    <h2 class="text-white wow slideInLeft">
                    <span class="text-white">Delivering the highest quality products <br> to feed the world better</span>
                    </h2>
                </div>
                <div class="col-md-4 cat-middle">
                    <div class="sm-m-top-30 text-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="cf-img">
                            <!-- <i class="fa fa-check"></i> -->
                        </div>
                        <h3 class="text-white">Market</h3>
                        <p class="text-white">We have progressively transformed into a trustworthy company with a wide range of professional market.</p>
                    </div>
                </div>
                <div class="col-md-4 cat-middle tengah">
                    <div class="sm-m-top-30 text-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="cf-img">
                            <!-- <i class="fa fa-check"></i> -->
                        </div>
                        <h3 class="text-white">High Quality</h3>
                        <p class="text-white">Our products are made of selected materials to high quality products.</p>
                    </div>
                </div>
                <div class="col-md-4 cat-middle">
                    <div class="sm-m-top-30 text-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="cf-img">
                            <!-- <i class="fa fa-check"></i> -->
                        </div>
                        <h3 class="text-white">Serve with Care</h3>
                        <p class="text-white">Customer satisfaction is our priority. We are supported by competent human resources to ensure the best experience for you.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="container" id="cut_circle">
        </div> -->
    </section>

    <section class="item-section">
        <div class="container">
            <div class="row text-center" style="padding-bottom: 1rem;">
                <div class="col-md-12">
                    <h2 class="blue_pingtax">Specialty Feed Ingredient</h2>
                    <p class="text-black">PT.Mahakarya Agro Pertiwi has been years distributing high quality animal feed ingredients. We have been trusted by many well-known national manufacturers.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <?php foreach($artikel as $key => $v){ ?>
            <div class="col-md-6 item-cont section-item">
              <div class="background-image1" style="background-image: url('assets/images/artikel/<?=$v->img_src;?>');"></div>
              <div class="content1">
                <h2 class="text-white" style="font-weight: 900"><?=$v->judul;?></h2>
                <!-- <p><?=$v->meta_description;?></p> -->
                <a href="<?=base_url().'items/'.$v->slug;?>" class="btn btn-primary btn-no-radius">See More</a>
              </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <!--Call to  action section-->
    <section id="action" class="action roomy-40">
        <div class="container">
            <div class="row">
                <div class="maine_action">
                    <div class="col-md-9">
                        <div class="action_item text-left sm-text-center">
                            <h2 class="text-primary">Have A Question ? Drop Us A Line</h2>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="action_btn text-left sm-text-center">
                            <a href="https://api.whatsapp.com/send?phone=+6281210763212&text=<?=preg_replace('/\s+/', '%20',trim($this->lang->line('whatsapp')));?>" class="btn btn-primary">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>