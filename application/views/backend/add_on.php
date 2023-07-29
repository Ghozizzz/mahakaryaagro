<!-- CONTENT -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" target="_self" name="formku" id="formku" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
              <div class="col-md-2">
                  Photo <font color="#f00">*</font>
              </div>
              <div class="col-md-10">
                  <input type="hidden" id="id" name="id">
                  <input type="file" id="caption_image" name="caption_image">
                  <p class="help-block">Pastikan Foto yg di Upload tidak pecah</p>
                  <a href="javascript:;" id="hapus_gambar" onclick="hapus_gambar(this.id)">Hapus Gambar</a>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="formSubmit(this.id)">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs justify-content-start">
                  <li class="nav-item">
                    <h4 class="card-title ">Add On Section</h4>
                  </li>
                </ul>
                <ul class="nav nav-tabs justify-content-end" data-tabs="tabs">
                  <li class="nav-item">
                    <a class="btn btn-info" data-toggle="modal" data-target="#myModal">Tambah</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th width="25%">Photo</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php $no = 0; foreach ($artikel as $k => $v) { $no++;?>
                  <tr>
                    <td><?=$no;?></td>
                    <td><img src="<?=base_url().'assets/images/upload/'.$v->src;?>" style="max-width: 30vw;"></td>
                    <td class="td-actions text-right">
                        <a type="button" rel="tooltip" class="btn btn-danger" href="<?=base_url('Admin/delete_addon/').$v->id;?>" onclick="return confirm('Anda yakin menghapus data ini?');">
                            <i class="material-icons">close</i> Hapus
                        </a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function formSubmit(){
    if($.trim($("#caption_image").val()) == ""){
        $('#message').html("Image harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $('#formku').attr("action", "<?php echo base_url(); ?>Admin/save_add_on");    
        $('#formku').submit(); 
    };
};

function hapus_gambar(id){
    $('#caption_image').val('');
}

function newData(){
  $("#myModal").find('.modal-title').text('Tambah Data');
}
</script>