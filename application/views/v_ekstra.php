<a href="#tambah_ekstra" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
<table width="100%" class="table striped">
    <thead>
        <th>No.</th>
        <th>Nama ekstra</th>
        <th>Foto</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php 
            $no=0;
            foreach ($data_ekstra as $e){
                echo '
                    <tr>
                        <td>'.$e->id.'</td>
                        <td>'.$e->nama.'</td>
                        <td>'.$e->foto.'</td>
                        <td><a href="#update_ekstra" class="btn btn-warning" data-toggle="modal" onclick="detail('.$e->id.')">Update</a>
                            <a href="'.base_url('index.php/ekstra/hapus_ekstra/'.$e->id).'" class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'anda yakin\')">Delete</a>
                        </td>
                ';
            }
        ?>
    </tbody>
</table>
<?php if ($this->session->flashdata('pesan')!=null): ?>
<div class="alert alert-danger"><?= $this->session->flashdata('pesan');?></div>    
<?php endif ?>

<div class="modal fade"id="tambah_ekstra">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah ekstra</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/ekstra/tambah_ekstra')?>" method="post" enctype="multipart/form-data">
        <input type="text" name="nama" class="form-control" placeholder="Nama ekstra">
        <br>
        <input type="file" name="foto" class="form-control">
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

<div class="modal fade"id="update_ekstra">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update ekstra</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/ekstra/ubah_ekstra')?>" method="post" enctype="multipart/form-data">
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
    $.getJSON("<?=base_url()?>index.php/ekstra/detail_ekstra/"+id,function(data){
      $("#id").val(data['id']);
      $("#nama").val(data['nama']);
      $("#foto").val(data['foto']);
    });
  }
</script>