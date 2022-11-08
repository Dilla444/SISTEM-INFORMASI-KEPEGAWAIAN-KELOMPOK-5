<?php $__env->startSection('konten'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
    <?php if(count($errors) > 0): ?>
				<div class="alert alert-danger">
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php echo e($error); ?> <br/>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<?php endif; ?>
    </div>
  </div>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Pegawai</h6>
            </div>
            <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus"></i>
            </button>
              <div class="table-responsive">
                <div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" role="grid" aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0"> 
                  <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 162px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Foto</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 248px;" aria-label="Position: activate to sort column ascending">NIP</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 116px;" aria-label="Office: activate to sort column ascending">Nama</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 116px;" aria-label="Office: activate to sort column ascending">TTL</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 116px;" aria-label="Office: activate to sort column ascending">JK</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 116px;" aria-label="Office: activate to sort column ascending">No.Telp</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 116px;" aria-label="Office: activate to sort column ascending">Aksi</th>
                    </thead>
                  <tfoot>
                  </tfoot>
                  <tbody>
                  <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr role="row" class="odd">
                      <td class="sorting_1"><img src="foto/<?php echo e($p->foto); ?>" width="100px"/></td>
                      <td><?php echo e($p->nip); ?></td>
                      <td><?php echo e($p->nama); ?></td>
                      <td><?php echo e($p->t_lahir); ?>, <?php echo e($p->tgl_lahir); ?></td>
                      <td><?php if($p->jns_kelamin == 'L'): ?>Laki-laki <?php else: ?> Perempuan <?php endif; ?></td>
                      <td><?php echo e($p->no_telp); ?></td>
                      <td><a class="btn btn-secondary" href="/pegawai/profile/<?php echo e($p->id_peg); ?>"><i class="fa fa-list"></i></a> 
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit<?php echo e($p->id_peg); ?>"><i class="fa fa-edit"></i></button>
                      <button type="button" class="btn btn-danger mt-1" data-toggle="modal" data-target="#ModalDelete<?php echo e($p->id_peg); ?>"><i class="fa fa-trash"></i></button>
                     </td>
                  </tr>


<!-- modal edit -->

<div class="modal fade" id="ModalEdit<?php echo e($p->id_peg); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <!-- form -->
				<?php if(count($errors) > 0): ?>
				<div class="alert alert-danger">
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php echo e($error); ?> <br/>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<?php endif; ?>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home<?php echo e($p->id_peg); ?>" role="tab" aria-controls="home<?php echo e($p->id_peg); ?>" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile<?php echo e($p->id_peg); ?>" role="tab" aria-controls="profile<?php echo e($p->id_peg); ?>" aria-selected="false">Detail 1</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact<?php echo e($p->id_peg); ?>" role="tab" aria-controls="contact<?php echo e($p->id_peg); ?>" aria-selected="false">Detail 2</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home<?php echo e($p->id_peg); ?>" role="tabpanel" aria-labelledby="home-tab<?php echo e($p->id_peg); ?>">
  <form action="/pegawai/edit/<?php echo e($p->id_peg); ?>" method="post" enctype="multipart/form-data">
  <?php echo e(csrf_field()); ?>


    <!-- Start tab 1 -->
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNip">NIP</label>
      <input type="number" class="form-control" value="<?php echo e($p->nip); ?>" id="inputNip"  name="nip"  required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputNama">Nama</label>
      <input type="text" class="form-control" value="<?php echo e($p->nama); ?>" id="inputNama"  name="nama" required>
    </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-3">
  <label for="inputTtl">Tempat</label>
  <input type="text" name="t_lahir" value="<?php echo e($p->t_lahir); ?>" class="form-control">
  </div>
  <div class="form-group col-md-3">
  <label for="inputTgl">Tgl Lahir</label>
  <input type="date" name="tgl_lahir" value="<?php echo e($p->tgl_lahir); ?>" class="form-control">
  </div>
  <div class="form-group col-md-6">
  <label for="inputTgl">No.Telp</label>
  <input type="number" id="inputTgl" name="no_telp" value="<?php echo e($p->no_telp); ?>" class="form-control">
  </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
  <label for="inputKelamin">Jenis Kelamin</label>
  <select name="kelamin" id="inputKelamin" class="form-control" required>
  <option>---</option>
  <option value="L" <?php if($p->jns_kelamin =='L'): ?> selected <?php endif; ?>>Laki-laki</option>
  <option value="P" <?php if($p->jns_kelamin =='P'): ?> selected <?php endif; ?>>Perempuan</option>
  </select>
  </div>

  <div class="form-group col-md-6">
  <label for="inputStatus">Status Pegawai</label>
  <select name="sts_pegawai" id="inputStatus" class="form-control" required>
  <option>---</option>
  <option value="Aktif" <?php if($p->sts_pegawai == "Aktif"): ?> selected <?php endif; ?> >Aktif</option>
  <option value="Tidak aktif" <?php if($p->sts_pegawai == "Tidak aktif"): ?> selected <?php endif; ?>>Tidak Aktif</option>
  </select>
  </div>
  <!-- form row -->
  </div>

<div class="form-row">
<div class="form-group col-md-6">
  <label for="inputStatus">User</label>
  <select name="user" id="inputUser" class="form-control" required>
  <option>---</option>
  <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($u->id); ?>" <?php if($p->id_user == $u->id): ?> selected <?php endif; ?> ><?php echo e($u->name); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  </div>
  <div class="form-group col-md-6">
  <label for="inputFoto">Foto</label>
  <input type="file" class="form-control" name="foto" id="inputFoto">
  </div>
  </div>
  <!-- Tab 1 end -->

  </div>
  <div class="tab-pane fade" id="profile<?php echo e($p->id_peg); ?>" role="tabpanel" aria-labelledby="profile-tab<?php echo e($p->id_peg); ?>">
  
  <!-- Tab 2 -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNip">NIP Lama</label>
      <input type="number" value="<?php echo e($p->nip_lama); ?>" class="form-control" id="inputNip"  name="niplama"  required>
    </div>
  <div class="form-group col-md-6">
  <label for="inputStatus">Agama</label>
  <select name="agama" id="inputUser" class="form-control" required>
  <option>---</option>
  <?php $__currentLoopData = $agama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agama2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($agama2->kode_agama); ?>" <?php if($p->kode_agama == $agama2->kode_agama): ?> selected <?php endif; ?>><?php echo e($agama2->agama); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  </div>
  </div>

  <div class="form-row">
<div class="form-group col-md-6">
  <label for="inputStatus">Pendidikan</label>
  <select name="pendidikan" id="inputUser" class="form-control" required>
  <option>---</option>
  <?php $__currentLoopData = $pendidikan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($pend->kode_pdd); ?>" <?php if($p->kode_pdd == $pend->kode_pdd): ?> selected <?php endif; ?> ><?php echo e($pend->pendidikan); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  </div>
  <div class="form-group col-md-6">
      <label for="inputNip">Nama Sekolah</label>
      <input type="text" class="form-control" id="inputNip"  value="<?php echo e($p->nama_sekolah); ?>" name="namasekolah"  required>
    </div>
  </div>

<div class="form-row">
<div class="form-group col-md-4">
<label for="inputKarpeg">Tahun STTB</label>
<input type="number" value="<?php echo e($p->tahun_sttb); ?>" name="sttb" id="inputKarpeg" class="form-control" required>
</div>
<div class="form-group col-md-4">
<label for="inputKarsu">Gelar Depan</label>
<input type="text" name="gelard" value="<?php echo e($p->gelar_depan); ?>"  id="inputKarsu" class="form-control" required>
</div>
<div class="form-group col-md-4">
<label for="inputAskes">Gelar Belakang</label>
<input type="text" name="gelarb" id="inputAskes" value="<?php echo e($p->gelar_belakang); ?>" class="form-control" required>
</div>
<!-- form row -->
</div>
  <!-- Tab 2 end -->
  
  </div>
  <div class="tab-pane fade" id="contact<?php echo e($p->id_peg); ?>" role="tabpanel" aria-labelledby="contact-tab<?php echo e($p->id_peg); ?>">
  <!-- Tab 3 -->

<!-- Tab 3 -->
<div class="form-row">
<div class="form-group col-md-8">
<label for="inputKarpeg">Hobi</label>
<input type="text" value="<?php echo e($p->hobi); ?>" name="hobi" id="inputKarpeg" class="form-control" required>
</div>
<div class="form-group col-md-4">
<label for="inputAskes">Tamat</label>
<input type="date" name="tamat" value="<?php echo e($p->tmt); ?>" id="inputAskes" class="form-control" required>
</div>
<!-- form row -->
</div>

<div class="form-row">
<div class="form-group col-md-4">
<label for="inputKarpeg">Tamat Jabatan</label>
<input type="date" value="<?php echo e($p->tmt_jab); ?>" name="tamatjabatan" id="inputKarpeg" class="form-control" required>
</div>
<div class="form-group col-md-8">
  <label for="inputStatus">Jabatan Struktural</label>
  <select name="jbts" id="inputUser" class="form-control" required>
  <option>---</option>
  <?php $__currentLoopData = $jbts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jbts2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($jbts2->kode_jbts); ?>" <?php if($p->kode_jbts == $jbts2->kode_jbts): ?> selected <?php endif; ?>><?php echo e($jbts2->nama_jabatan); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  </div>
<div class="form-group col-md-4">
  <label for="inputStatus">Status Pernikahan</label>
  <select name="sts_pernikahan" id="inputUser" class="form-control" required>
  <option>---</option>
  <option value="Menikah" <?php if($p->sts_marital == 'Menikah'): ?> selected <?php endif; ?> >Menikah</option>
  <option value="Belum menikah"  <?php if($p->sts_marital == 'Belum menikah'): ?> selected <?php endif; ?> >Belum menikah</option>
  </select>
  </div>
</div>
 <!-- end form row -->

  <!-- end tab 3 -->
  </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ubah</button></form>
      </div>
    </div>
  </div>
</div>

                  <!--  modal delete -->

<div class="modal fade" id="ModalDelete<?php echo e($p->id_peg); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda yakin ingin menghapus?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a href="/pegawai/hapus/<?php echo e($p->id_peg); ?>" class="btn btn-primary">Iya</a>
      </div>
    </div>
  </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>
</table>
</div>
</div>




<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form -->

        <form action="/pegawai/tambah/proses" method="POST" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

  

        <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Umum</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Detail 1</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Detail 2</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  <!-- Tab 1 -->

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNip">NIP</label>
      <input type="number" class="form-control" id="inputNip"  name="nip"  required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputNama">Nama</label>
      <input type="text" class="form-control" id="inputNama"  name="nama" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-3">
  <label for="inputTtl">Tempat</label>
  <input type="text" name="t_lahir" class="form-control">
  </div>
  <div class="form-group col-md-3">
  <label for="inputTgl">Tgl Lahir</label>
  <input type="date" name="tgl_lahir" class="form-control">
  </div>
  <div class="form-group col-md-6">
  <label for="inputTgl">No.Telp</label>
  <input type="number" id="inputTgl" name="no_telp" class="form-control">
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
  <label for="inputKelamin">Jenis Kelamin</label>
  <select name="kelamin" id="inputKelamin" class="form-control" required>
  <option>---</option>
  <option value="L">Laki-laki</option>
  <option value="P">Perempuan</option>
  </select>
  </div>

  <div class="form-group col-md-6">
  <label for="inputStatus">Status Pegawai</label>
  <select name="sts_pegawai" id="inputStatus" class="form-control" required>
  <option>---</option>
  <option value="Aktif">Aktif</option>
  <option value="Tidak aktif">Tidak Aktif</option>
  </select>
  </div>
  <!-- form row -->
  </div>

<div class="form-row">
<div class="form-group col-md-6">
  <label for="inputStatus">User</label>
  <select name="user" id="inputUser" class="form-control" required>
  <option>---</option>
  <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($u->id); ?>"><?php echo e($u->name); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  </div>
  <div class="form-group col-md-6">
  <label for="inputFoto">Foto</label>
  <input type="file" class="form-control" name="foto" id="inputFoto" required>
  </div>
  </div>
  <!-- Tab 1 end -->
  
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  <!-- Tab 2 -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNip">NIP Lama</label>
      <input type="number" class="form-control" id="inputNip"  name="niplama"  required>
    </div>
<div class="form-group col-md-6">
  <label for="inputStatus">Agama</label>
  <select name="agama" id="inputUser" class="form-control" required>
  <option>---</option>
  <?php $__currentLoopData = $agama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($agama->kode_agama); ?>"><?php echo e($agama->agama); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  </div>
  </div>
  <div class="form-row">
<div class="form-group col-md-6">
  <label for="inputStatus">Pendidikan</label>
  <select name="pendidikan" id="inputUser" class="form-control" required>
  <option>---</option>
  <?php $__currentLoopData = $pendidikan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($p->kode_pdd); ?>"><?php echo e($p->pendidikan); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  </div>

  <div class="form-group col-md-6">
      <label for="inputNip">Nama Sekolah</label>
      <input type="text" class="form-control" id="inputNip"  name="namasekolah"  required>
    </div>
  </div>

<div class="form-row">
<div class="form-group col-md-4">
<label for="inputKarpeg">Tahun STTB</label>
<input type="number" name="sttb" id="inputKarpeg" class="form-control" required>
</div>
<div class="form-group col-md-4">
<label for="inputKarsu">Gelar Depan</label>
<input type="text" name="gelard" id="inputKarsu" class="form-control" required>
</div>
<div class="form-group col-md-4">
<label for="inputAskes">Gelar Belakang</label>
<input type="text" name="gelarb" id="inputAskes" class="form-control" required>
</div>
<!-- form row -->
</div>
  <!-- Tab 2 end -->
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  <!-- Tab 3 -->
  <div class="form-row">
<div class="form-group col-md-8">
<label for="inputKarpeg">Hobi</label>
<input type="text" name="hobi" id="inputKarpeg" class="form-control" required>
</div>
<div class="form-group col-md-4">
<label for="inputAskes">Tamat</label>
<input type="date" name="tamat" id="inputAskes" class="form-control" required>
</div>
<!-- form row -->
</div>

<div class="form-row">
<div class="form-group col-md-4">
<label for="inputKarpeg">Tamat Jabatan</label>
<input type="date" name="tamatjabatan" id="inputKarpeg" class="form-control" required>
</div>
<div class="form-group col-md-8">
  <label for="inputStatus">Jabatan Struktural</label>
  <select name="jbts" id="inputUser" class="form-control" required>
  <option>---</option>
  <?php $__currentLoopData = $jbts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jbts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($jbts->kode_jbts); ?>"><?php echo e($jbts->nama_jabatan); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
  </div>
<div class="form-group col-md-4">
  <label for="inputStatus">Status Pernikahan</label>
  <select name="sts_pernikahan" id="inputUser" class="form-control" required>
  <option>---</option>
  <option value="Menikah">Menikah</option>
  <option value="Belum menikah">Belum menikah</option>
  </select>
  </div>
</div>
 <!-- end form row -->

  <!-- Tab 3 end -->
  </div>
</div>

        <!-- end form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Tambah</button></form>
      </div>
    </div>
  </div>
</div>

<!-- end modal -->
                      </div>
              </div>
            </div>
          </div>
</div>


          <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.induk', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp b\htdocs\semester 5\sistem-informasi-kepegawaian-8\resources\views/pegawai/list.blade.php ENDPATH**/ ?>