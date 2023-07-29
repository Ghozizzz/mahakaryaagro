<div class="container roomy-10" id="list_row_data">
  <?php foreach ($list as $key => $v) { ?>
  <div class="well">
    <div class="row">
      <div class="col-md-4">
        <img class="roomy-10 judul_artikel_img" src="<?=base_url().'/assets/images/artikel/'.$v->img_src;?>" alt="<?=$v->img_desc;?>">
      </div>
      <div class="col-md-8">
        <a class="judul_artikel_list" href="<?=base_url().'belajar-pajak/'.$v->slug;?>">
          <h2><b><?=$v->judul;?></b></h2>
        </a>
        <!-- <p class="text-right">By Francisco</p> -->
        <div class="artikel_isi">
          <?=substr($v->deskripsi, 0, 200);?> ...
        </div>
        <ul class="list-inline list-unstyled fl_left roomy-10">
          <li><span class="created_at"><i class="fa fa-calendar fa"></i> <?=$v->created_at;?></span></li>
          <!-- <li>|</li> -->
<!--           <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
          <li>|</li> -->
          <!-- <li class="socmed-button"> -->
          <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
            <!-- <a><i class="fa fa-facebook-square fa-2x"></i></a>
            <a><i class="fa fa-twitter-square fa-2x"></i></a>
            <a><i class="fa fa-google-plus-square fa-2x"></i></a> -->
          <!-- </li> -->
        </ul>
        <p class="fl_right text-right roomy-10"><a class="btn btn-primary btn-small" href="<?=base_url().'belajar-pajak/'.$v->slug;?>">Baca Selengkapnya</a></p>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<div class="container roomy-50">
  <div class="row">
    <div class="col-md-12">
      <button type="button" class="btn btn-biasa lg-btn btn-load-more" style="width: 100%;" id="load_more">LOAD MORE</button>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
  var start = 10;
  var end = 10;
  $("#load_more").on('click',function(){
    $(this).text('PLEASE WAIT ...');
    $.ajax({
        url: "<?=base_url('Welcome/load_more');?>",
        type: 'post',
        data: {
          start: start,
          end: end,
        },
        error : function(data){
          alert('Time Out, please try again');  
        },
        success: function(data) {
            var res = JSON.parse(data);
            if(res.response.error === 0){
                $("#load_more").text('LOAD MORE');
                start = start + 10;
                $(res.html).appendTo($('#list_row_data')).show('slow');
            }else{
                alert(res.response.message);
            }
        }
    });
  });
});
</script>