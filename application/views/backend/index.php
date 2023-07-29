<!-- CONTENT -->
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
                    <h4 class="card-title ">Artikel</h4>
                  </li>
                </ul>
                <ul class="nav nav-tabs justify-content-end" data-tabs="tabs">
                  <li class="nav-item">
                    <a class="btn btn-info" href="<?=base_url();?>Admin/form">Tambah Artikel</a>
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
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php $no = 0; foreach ($artikel as $k => $v) { $no++;?>
                  <tr>
                    <td><?=$no;?></td>
                    <td><?=$v->judul;?></td>
                    <?=($v->status==1)? '<td class="aktif">Aktif</td>' : '<td class="tidak_aktif">Tidak Aktif</td>';?>
                    <td class="td-actions text-right">
                        <a type="button" rel="tooltip" class="btn btn-success" href="<?=base_url('Admin/edit/').$v->id;?>">
                            <i class="material-icons">edit</i> Edit
                        </a>
                        <a type="button" rel="tooltip" class="btn btn-danger" href="<?=base_url('Admin/delete/').$v->id;?>" onclick="return confirm('Anda yakin menghapus data ini?');">
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