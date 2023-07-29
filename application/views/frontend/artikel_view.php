<section class="artikel-banner" style="background-image: url('../assets/images/artikel/<?=$data['banner_src'];?>');">
  <div class="container">
    <h1 class="judul_artikel mt-4 bg-text-banner"><?=$data['judul'];?></h1>
  </div>
</section>

<section id="artikel_view">
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row" id="artikel_main">
          <!-- Post Content Column -->
          <!-- <img class="img-artikel" src="<?=base_url().'/assets/images/artikel/'.$data['img_src'];?>" alt="<?=$data['img_desc'];?>"> -->
          <div class="col-lg-12" style="margin-bottom: 3rem;">
            <div class="artikel_details roomy-40">
              <div class="col-md-12">
                <div class="artikel_isi">
                  <?=html_entity_decode($data['deskripsi']);?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-3 artikel_sidebar">

        <!-- Promotion Widget -->
        <div class="card">
          <div class="card-body">
            <h3 style="margin-bottom: 1.5rem;">Category</h3>
            <?php if(!empty($side_category)){ 
              foreach($side_category as $k => $v){
            ?>
              <a href="<?=base_url().'items/'.$v->slug;?>" class="cat_btn <?=($v->id==$data['id'])?'active':'';?>">
                <h4 style="font-size: 1.2rem"><?=$v->judul;?></h4>
              </a>
            <?php 
              }
            } ?>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <!-- /.row -->
    <!--Call to  action section-->
    <div class="row" id="cta_artikel">
      <div class="col-md-12">
        <section class="action roomy-40">
          <div class="container">
            <div class="row">
              <div class="maine_action">
                <div class="col-md-9">
                  <div class="action_item text-left sm-text-center">
                    <h2 class="text-white">Contact us for further enquiries </h2>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="action_btn text-left sm-text-center">
                    <a href="<?=base_url();?>kontak" class="btn btn-default">Email Us</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- /.container -->
</section>