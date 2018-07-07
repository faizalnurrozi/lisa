<div id="sidebar" class="sidebar responsive">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch (e) {
        }
    </script>

    <?php 
        $cur1 = $this->uri->segment(2);
        $cur2 = $this->uri->segment(3);
    ?>
    <ul class="nav nav-list">
        <li class="<?php echo ($cur1=="dashboard") ? "active" : ""; ?>" style="height: 100%;">
            <a href="<?php echo base_url('admin/dashboard') ?>">
                <i class="menu-icon fa fa-home"></i>
                <span class="menu-text"> Beranda </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="<?php echo ($cur1=="perangkat_kategori") ? "active" : ""; ?>" style="height: 100%;">
            <a href="<?php echo base_url('admin/perangkat_kategori') ?>">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Kategori </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="<?php echo ($cur1=="perangkat") ? "active" : ""; ?>" style="height: 100%;">
            <a href="<?php echo base_url('admin/perangkat') ?>">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> Perangkat </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="<?php echo ($cur1=="token_transaksi") ? "active" : ""; ?>" style="height: 100%;">
            <a href="<?php echo base_url('admin/token_transaksi') ?>">
                <i class="menu-icon fa fa-database"></i>
                <span class="menu-text"> TopUp Token </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="<?php echo ($cur1=="hitung_penggunaan") ? "active" : ""; ?>" style="height: 100%;">
            <a href="<?php echo base_url('admin/hitung_penggunaan') ?>">
                <i class="menu-icon fa fa-cube"></i>
                <span class="menu-text"> Hitung Penggunaan </span>
            </a>
            <b class="arrow"></b>
        </li>
    </ul>

    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <!-- /section:basics/sidebar.layout.minimize -->
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>
