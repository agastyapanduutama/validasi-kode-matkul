  
<div id="sidebar" class="active">
    
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

              

                <li class="sidebar-item <?php if ($this->uri->segment(2) == 'dashboard') {
                                            echo "active";
                                        } ?>">
                    <a href="<?= base_url('admin/dashboard') ?>" class='sidebar-link'>
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
              

                <li class="sidebar-item <?php if ($this->uri->segment(2) == 'list_matkul') {
                                            echo "active";
                                        } ?>">
                    <a href="<?= base_url('admin/list_matkul') ?>" class='sidebar-link'>
                        <i class="fas fa-book"></i>
                        <span>Daftar Matkul</span>
                    </a>
                </li>
              

                <li class="sidebar-item <?php if ($this->uri->segment(2) == 'matkul') {
                                            echo "active";
                                        } ?>">
                    <a href="<?= base_url('admin/matkul') ?>" class='sidebar-link'>
                        <i class="fas fa-book"></i>
                        <span>Tambah Matkul</span>
                    </a>
                </li>

                 
                

                <li class="sidebar-item <?php if ($this->uri->segment(2) == 'logout') {echo "active";} ?>">
                    <a href="<?= base_url('admin/logout') ?>" class='sidebar-link'>
                    <i class="fas fa-sign-out-alt"></i>
                        <span>Keluar</span>
                    </a>
                </li>
                
                


            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>