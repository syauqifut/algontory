<a href="#tambah_kegiatan" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
<table width="100%" class="table striped">
    <thead>
        <th>No.</th>
        <th>Nama Kegiatan</th>
        <th>Foto</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php 
            $no=0;
            foreach ($data_kegiatan as $k){
                echo '
                    <tr>
                        <td>'.$k->id.'</td>
                        <td>'.$k->nama.'</td>
                        <td>'.$k->foto.'</td>
                        <td><a href="#update_kegiatan" class="btn btn-warning" data-toggle="modal" onclick="detail('.$k->id.')">Update</a>
                            <a href="'.base_url('index.php/kegiatan/hapus_kegiatan/'.$k->id).'" class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'anda yakin\')">Delete</a>
                        </td>
                ';
            }
        ?>
    </tbody>
</table>
<?php if ($this->session->flashdata('pesan')!=null): ?>
<div class="alert alert-danger"><?= $this->session->flashdata('pesan');?></div>    
<?php endif ?>

<div class="modal fade"id="tambah_kegiatan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah kegiatan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/kegiatan/tambah_kegiatan')?>" method="post" enctype="multipart/form-data">
        <input type="text" name="nama" class="form-control" placeholder="Nama Kegiatan">
        <br>
        <input type="file" name="foto" class="form-control" placeholder="Foto">
        <br>
        <input type="submit" name="simpan" value="simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<div class="modal fade"id="update_kegiatan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update kegiatan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/kegiatan/ubah_kegiatan')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" class="form-control">
        <br>
        <input type="text" name="nama" id="nama" class="form-control">
        <br>
        <input type="file" name="foto" id="foto" class="form-control">
        <br>
        <input type="submit" name="simpan" value="simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<script>
  function detail(id){
    $.getJSON("<?=base_url()?>index.php/kegiatan/detail_kegiatan/"+id,function(data){
      $("#id").val(data['id']);
      $("#nama").val(data['nama']);
      $("#foto").val(data['foto']);
    });
  }
</script>