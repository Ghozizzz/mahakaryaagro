<!-- CONTENT -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-lg" role="document">
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
              <div class="col-md-3">
                  Photo <font color="#f00">*</font>
              </div>
              <div class="col-md-9">
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
          <div class="card-body">
            <form method="post" target="_self" name="formku" id="formku" enctype="multipart/form-data" action="<?=base_url();?>Admin/save_cms">
              <div class="row ml-1">
                <div class="form-group" style="width: 100%">
                  <h3 for="nama">Judul</h3>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Judul ..." value="<?=$cms_header['nama'];?>">
                  <input type="hidden" name="id" value="<?=$cms_header['id'];?>">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs justify-content-start">
                  <li class="nav-item">
                    <h4 class="card-title ">Slider Section</h4>
                  </li>
                </ul>
                <ul class="nav nav-tabs justify-content-end" data-tabs="tabs">
                  <li class="nav-item">
                    <a class="btn btn-info" onclick="newData()">Tambah</a>
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
                  <?php $no = 0; foreach ($slider as $k => $v) { $no++;?>
                  <tr>
                    <td><?=$no;?></td>
                    <td><img src="<?=base_url().'assets/images/upload/'.$v->image;?>" style="max-width: 20vh;"></td>
                    <td class="td-actions text-right">
                      <button type="button" rel="tooltip" class="btn btn-success" onclick="editData(<?=$v->id;?>)">
                        <i class="material-icons">edit</i> Edit
                      </button>
                      <a type="button" rel="tooltip" class="btn btn-danger" href="<?=base_url('Admin/delete_slider/').$v->id;?>" onclick="return confirm('Anda yakin menghapus data ini?');">
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
var dsState;
function formSubmit(){
    if($.trim($("#caption_image").val()) == ""){
      alert('Foto tidak boleh kosong!');
    }else{
      if(dsState=="Input"){
        $('#formku').attr("action", "<?php echo base_url(); ?>Admin/save_slider");    
        $('#formku').submit();
      }else{
        $('#formku').attr("action", "<?php echo base_url(); ?>Admin/update_slider");    
        $('#formku').submit();
      }
    };
};

function hapus_gambar(id){
    $('#caption_image').val('');
}

function newData(){
    $('#caption_image').val('');
    $('#img_desc').val('');
    $('#id').val('');
    dsState = "Input";
    $("#myModal").find('.modal-title').text('Tambah Data');
    $("#myModal").modal('show',{backdrop: 'true'});
}

function editData(id){
    dsState = "Edit";
    $.ajax({
        url: "<?=base_url('Admin/edit_slider'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            console.log(result);
            $('#id').val(result['id']);
            $('#nama').val(result['nama']);
            $("#myModal").find('.modal-title').text('Edit User');
            $("#myModal").modal('show',{backdrop: 'true'});           
        }
    });
}
</script>