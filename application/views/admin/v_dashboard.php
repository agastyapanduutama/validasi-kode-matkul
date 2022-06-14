<div class="page-content">
	<section class="row">
		<div class="col-12 col-lg-12">
			<div class="row">
				<div class="col-12 col-lg-4 col-md-12">
					<div class="card">
						<div class="card-body px-3 py-4-5">
							<div class="row">
								<div class="col-md-4">
									<div class="stats-icon purple">
										<i class="fas fa-book"></i>
									</div>
								</div>
								<div class="col-md-8">
									<h6 class="text-muted font-semibold">Total Matkul ditambahkan</h6>
									<h6 class="font-extrabold mb-0"><?= $totalmatkul?></h6>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-8 col-md-12">
					<div class="card">
						<div class="card-header">
							<h6>Cek Kode Matakuliah</h6>
						</div>
						<div class="card-body">
							<form action="<?= base_url('admin/matkul/cek')?>" method="POST">
							<div class="form-group row">
								<label for="" class="col-3">Kode Matakuliah</label>
								<div class="col-9">
									<input type="text" name="kode_matkul" placeholder="Contoh : MB001" class="form-control">
								</div>
							</div>
							<button type="submit" class="float-end btn btn-primary">Cek Kode</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Matakuliah</h4>
						</div>
						<div class="card-body">
							<div id="">
								<div class="table-responsive">
									<table class="table table-lg">
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
					</div>
				</div>
			</div>



		</div>

	</section>
</div>
