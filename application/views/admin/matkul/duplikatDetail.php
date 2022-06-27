
<div class="card">
    <div class="card-header">
        <h5>Daftar Matakuliah Baru ditambahkan</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table id="list_matkulNa" class="table table-striped">
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
                <?php $no=1; foreach ($matkul as $m):?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $m->kode_matkul?></td>
                        <td><?= $m->nama_matkul?></td>
                        <td><?= $m->sks?></td>
                        <td><?= $m->tahun_kurikulum?></td>
                        <td>
                            <!-- <a href="<?= base_url('admin/duplikat/lihat/' . $m->kode_matkul)?>" class="btn btn-primary"><i class="fas fa-eye"></i> Lihat</a> -->

                            <button class='btn btn-danger btn-sm' id='delete' data-id='<?= $m->id?>' title='Hapus Data'><i class='fas fa-trash-alt'></i></button>
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