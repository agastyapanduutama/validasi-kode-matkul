<div class="card">
    <div class="card-header">
        <h5>Cek Kode Matakuliah</h5>
         <?php

                    if ($this->session->flashdata('warning')) {
                        echo '<div class="alert alert-warning">';
                        echo $this->session->flashdata('warning');
                        echo '</div>';
                    }

                    if ($this->session->flashdata('success')) {
                        echo '<div class="alert alert-success">';
                        echo $this->session->flashdata('success');
                        echo '</div>';
                    }

                    ?>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/matkul/cek')?>" method="POST">
            <div class="form-group row"> 
                <label for="" class="col-3">Cek Matakuliah</label>
                <div class="col-9">
                    <input type="text" required name="kode_matkul" class="form-control" placeholder="MB123">
                </div>
            </div>
             <button type="submit" class="btn btn-primary"><i class="fas fa-eye"></i> Cek Data</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h5>Tambah Matakuliah</h5>
    </div>
    <div class="card-body">
    <form action="<?= base_url('admin/matkul/tambah/aksi')?>" method="POST">
       <div class="form-group row"> 
            <label for="" class="col-3">Kode Matakuliah <span style="color:red">*</span></label>
            <div class="col-9">
                <input type="text" name="kode_matkul" class="form-control" required placeholder="MB123">
            </div>
        </div>

        <div class="form-group row"> 
            <label for="" class="col-3">Nama Matakuliah <span style="color:red">*</span></label>
            <div class="col-9">
                <input type="text" name="nama_matkul" class="form-control" required placeholder="Bahasa Indonesia">
            </div>
        </div>

        <div class="form-group row"> 
            <label for="" class="col-3">SKS <span style="color:red">*</span></label>
            <div class="col-9">
                <input type="number" name="sks" class="form-control" required placeholder="5">
            </div>
        </div>

        <div class="form-group row"> 
            <label for="" class="col-3">Tahun Kurikulum <span style="color:red">*</span></label>
            <div class="col-9">
                <input type="text" name="tahun_kurikulum" class="form-control" required placeholder="2021/2022">
            </div>
        </div>
        <button class="btn btn-success"><i class="fas fa-save"></i>Tambah</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5>Daftar Matakuliah Baru ditambahkan</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Matakuliah</th>
                        <th>Nama Matakuliah</th>
                        <th>SKS</th>
                        <th>Tahun Kurikulum</th>
                        <th>Aksi</th>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($matkul as $ma):?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $ma->kode_matkul?></td>
                            <td><?= $ma->nama_matkul?></td>
                            <td><?= $ma->sks?></td>
                            <td><?= $ma->tahun_kurikulum?></td>
                            <td>
                                <a href="<?= base_url("admin/matkul/hapus/$ma->id")?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Kode Matakuliah</th>
                        <th>Nama Matakuliah</th>
                        <th>SKS</th>
                        <th>Tahun Kurikulum</th>
                        <th>Aksi</th>
                </tfoot>
            </table>
        </div>
    </div>
</div>