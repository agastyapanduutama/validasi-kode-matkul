
                <div class="card">
                    <div class="card-header">
                        Data Mahasiswa
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message');?>
                        <a href="<?= base_url('admin/import/create') ?>" class="btn btn-primary mb-3">Import</a>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Angkatan</th>
                            </tr>
                            <?php if (count($mahasiswa) > 0) {
                                    foreach ($mahasiswa as $row): ?>
                                    <tr>
                                        <td><?= $row->nim ?></td>
                                        <td><?= $row->nama ?></td>
                                        <td><?= $row->angkatan ?></td>
                                    </tr>
                                <?php endforeach ?>
                           <?php }else{ ?>
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada data</td>
                                </tr>
                        <?php } ?>
                           
                        </table>
                    </div>
                    <div class="card-footer">
                        Page
                    </div>
                </div>
     