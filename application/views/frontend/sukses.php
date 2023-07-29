<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">Email anda berhasil terkirim</h2>
        <img src="<?=base_url();?>/assets/images/pingtax_compress.png">
        <?php if(empty($nama)){ 
            echo "<h3></h3>";
        }else{
            echo "<h3>Hai, ".$nama."</h3>";
        }?>
        <p style="font-size:20px;color:#5C5C5C;">Terima kasih telah menghubungi kami, Mohon tunggu respon kami selanjutnya</p>
        <a href="<?=base_url();?>" class="btn btn-success">     Kembali      </a>
    <br><br>
        </div>
	</div>
</div>