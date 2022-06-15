<div class="card">
    <div class="card-header">
        <button class="btn btn-primary float-right" data-bs-toggle="modal" data-target="#modalTambah">Tambah Data</button>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table id="list_user" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>

            </table>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="modalTambah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAdduser">
                    <div class="modal-body">
                        <label for="">Label yang memililiki tanda <span style="color:red">*</span> Tidak boleh kosong</label>
                        <br><br><br>
                        <div class="form-group">
                            <label>Nama <span style="color:red">*</span> </label>
                            <input type="text" name="nama_user" id="nama_user" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Username <span style="color:red">*</span> </label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan " class="form-control">
                        </div>


                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEdituser">
                    <div class="modal-body">

                        <label for="">Label yang memililiki tanda <span style="color:red">*</span> Tidak boleh kosong</label>
                        <br><br><br>

                        <input type="hidden" name="id" id="idData">


                        <div class="form-group">
                            <label>Nama user <span style="color:red">*</span> </label>
                            <input type="text" name="nama_user" id="nama_user1" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Username <span style="color:red">*</span> </label>
                            <input type="text" name="username" id="username1" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan1" class="form-control">
                        </div>


                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--  -->