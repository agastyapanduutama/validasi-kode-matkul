
 <?= $this->session->flashdata('message');?>
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url()?>assets/format/format.xlsx" download=" ">Download format</a>
                    </div>
                    <form method="POST" action="<?= site_url('admin/import/create/action') ?>" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                        <label class="col-form-label text-md-left">Upload File</label> 
                                            <input type="file" class="form-control" name="file" accept=".xls, .xlsx" required>
                                            <div class="mt-1">
                                                <span class="text-secondary">File yang harus diupload : .xls, xlsx</span>
                                            </div>
                                            <?= form_error('file','<div class="text-danger">','</div>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <div class="form-group mb-0">
                                <button type="submit" name="import" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Upload</button> 
                            </div>
                        </div>
                    </form>
                </div>
      