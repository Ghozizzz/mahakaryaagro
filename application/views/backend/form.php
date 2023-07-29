
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" target="_self" name="formku" id="formku" enctype="multipart/form-data">
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <h3 for="judul">Judul</h3>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Input Judul ..." value="<?=($type=='edit')? $header['judul'] : '';?>">
            <input type="hidden" name="id" value="<?=($type=='edit')? $header['id'] : '';?>">
          </div>
          <div class="form-group">
            <h3 for="slug">URL</h3>
            <small>*yang muncul pada url: www.xxx.com/<b>url_yang_anda_isi</b> | <font style="color: red;">tidak boleh ada spasi dan harus huruf kecil semua</font></small>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="Input URL ..." value="<?=($type=='edit')? strtolower(str_replace("-", " ", $header['slug'])) : '';?>">
          </div>
          <div class="form-group">
            <h3 for="exampleInputEmail1">Meta Keywords</h3>
            <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Input Meta Keywords ..." value="<?=($type=='edit')? $header['keywords'] : '';?>">
          </div>
          <div class="form-group">
            <h3 for="exampleInputPassword1">Meta Description</h3><small>*yang muncul di search engine dan halaman utama.(max 500 karakter)</small>
            <br>
            <textarea class="form-control" id="meta_description" name="meta_description" onkeyup="countChar(this)"><?=($type=='edit')? $header['meta_description'] : '';?></textarea>
            <div id="charNum"></div>
          </div>
          <h3 for="exampleInputEmail1">Banner Image</h3>
          <div class="form-group">
            <div class="text-left">
              <img src="<?=base_url().'assets/images/artikel/'.$header['banner_src'];?>" style="height: 100px; width: auto;">
              <span class="btn btn-raised btn-round btn-default btn-file">
                <span class="fileinput-new" id="banner_button" onclick="$('#banner_src').click()"><?=($type=='edit')? $header['banner_src'] : 'Choose Image' ;?></span>
                <input type="file" id="banner_src" name="banner_src"/>
              </span><br>
            </div>
          </div>
          <h3 for="exampleInputEmail1">Header Image</h3>
          <div class="form-group">
            <div class="text-left">
              <img src="<?=base_url().'assets/images/artikel/'.$header['img_src'];?>" style="height: 100px; width: auto;">
              <span class="btn btn-raised btn-round btn-default btn-file">
                <span class="fileinput-new" id="img_button" onclick="$('#img_src').click()"><?=($type=='edit')? $header['img_src'] : 'Choose Image' ;?></span>
                <input type="file" id="img_src" name="img_src" />
              </span><br>
            </div>
          </div>
          <div class="form-group">
            <div class="text-left">
              <small>Deskripsi Image</small><br>
              <input type="text" class="form-control" id="img_desc" name="img_desc" placeholder="Deskripsi Image ..." value="<?=($type=='edit')? strtolower(str_replace("-", " ", $header['img_desc'])) : '';?>">
              <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" onclick="hapus_gambar()">
              <i class="fa fa-times"></i> Remove</a>
            </div>
          </div>
          <div class="form-group">
            <h3 for="exampleInputPassword1">Deskripsi Halaman</h3>
            <textarea id="deskripsi" name="deskripsi"><?=($type=='edit')? $header['deskripsi'] : '';?></textarea>
          </div>
          <div class="form-group">
            <?php if($type=='edit'){
                $status = '';
              if($header['status']==1){
                $status = 'checked';
              }
            }?>
            <input type="checkbox" id="status" name="status" <?=($type=='edit')? $status : 'checked';?>>
            <label for="status">Active <i class="fa fa-check"></i></label>
          </div>
          <div class="alert alert-danger" style="display: none">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong id="message"></strong>
          </div>
          <a href="javascript:;" id="saveData" class="btn btn-success" onclick="formSubmit();" <?=($type=='edit')? 'style="display: none;"':'';?>>Save</a>
          <a href="javascript:;" id="updateData" class="btn btn-success" onclick="updateData();" <?=($type=='add')? 'style="display: none;"':'';?>>Update</a>
        </form>

      </div>
    </div>
  </div>
</div>

<script src="https://cdn.tiny.cloud/1/oh6fvpdbkfkcfd395f2zz2ogx1tt4pxl7a3g7lzjukh5jjr3/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
<script>
tinymce.init({
  selector: '#deskripsi',
  height : '350',
  plugins: [
       "advlist autolink lists link image charmap print preview hr anchor pagebreak",
       "searchreplace wordcount visualblocks visualchars code fullscreen",
       "insertdatetime nonbreaking save table contextmenu directionality",
       "emoticons template paste textcolor colorpicker textpattern media",
    ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager | media table",
  advlist_bullet_styles: "default,circle,disc,square",
  image_title: true,
  automatic_uploads: true,
  image_advtab: true,
  images_upload_url: "<?=base_url();?>Admin/tinymce_upload",
  file_picker_types: 'image', 
  paste_data_images:true,
  relative_urls: false,
  remove_script_host: false,
  table_sizing_mode: 'responsive',
  table_class_list: [
    {title: 'Tabel Responsive', value: 'table_responsive_custom'}
  ],
  file_picker_callback: function(cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    input.onchange = function() {
      var file = this.files[0];
      var reader = new FileReader();
      reader.readAsDataURL(file);
        reader.onload = function () {
           var id = 'mahakaryaagro_' + (new Date()).getTime();
           var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
           var blobInfo = blobCache.create(id, file, reader.result);
           blobCache.add(blobInfo);
           cb(blobInfo.blobUri(), { title: file.name });
        };
    };
    input.click();
  },  
});

function formSubmit(){
    var editorContent = tinyMCE.get('deskripsi').getContent();
    if($.trim($("#judul").val()) == ""){
        $('#message').html("Judul harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(200);
    }else if($.trim($("#img_src").val()) == ""){
        $('#message').html("Image Header harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(200);
    }else if(editorContent == ""){
        $('#message').html("Details harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(200);
    }else{
        $('#formku').attr("action", "<?=base_url(); ?>Admin/save");    
        $('#formku').submit(); 
    };
};

function updateData(){
    var editorContent = tinyMCE.get('deskripsi').getContent();
    if($.trim($("#judul").val()) == ""){
        $('#message').html("Judul harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(200);
    }else if(editorContent == ""){
        $('#message').html("Details harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(200);
    }else{
        $('#formku').attr("action", "<?=base_url(); ?>Admin/update");    
        $('#formku').submit(); 
    };
};

function countChar(val) {
  var len = val.value.length;
  if (len >= 500) {
    val.value = val.value.substring(0, 500);
    alert("You have reached the maximum length for this field");
  } else {
    $('#charNum').text(500 - len);
  }
};

function hapus_gambar(){
  $('#img_src').val('');
  $('#img_name').val('');
  $('#img_desc').val('');
  $('#img_button').text('Select Image');
}

$('#img_src').change(function() {
  var file = $('#img_src')[0].files[0].name;
  $('#img_button').text(file);
});

$('#banner_src').change(function() {
  var file = $('#banner_src')[0].files[0].name;
  $('#banner_button').text(file);
});
</script>