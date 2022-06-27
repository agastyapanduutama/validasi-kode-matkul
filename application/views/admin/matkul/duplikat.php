
<div class="card">
    <div class="card-header">
        <h5>Daftar Matakuliah Baru ditambahkan</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="list_matkul" class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Matakuliah</th>
                        <th>Jumlah Duplikat</th>
                        <th>Aksi</th>
                </thead>
                <tbody>
                <?php $no=1; foreach ($matkul as $m):?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $m->kode_matkul?></td>
                        <td><?= $m->banyak?></td>
                        <td>
                            <a href="<?= base_url('admin/duplikat/lihat/' . $m->kode_matkul)?>" class="btn btn-primary"><i class="fas fa-eye"></i> Lihat</a>
                            
                        </td>
                    </tr>
                <?php endforeach?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Kode Matakuliah</th>
                        <th>Nama Matakuliah</th>
                        <th>Aksi</th>
                </tfoot>
            </table>
        </div>
    </div>
</div>