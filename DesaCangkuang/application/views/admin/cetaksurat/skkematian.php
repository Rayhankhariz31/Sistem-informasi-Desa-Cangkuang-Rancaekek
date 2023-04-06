<!-- Begin Page Content -->
<font style="color: black;">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-black-800 row justify-content-center">Cetak Surat Keterangan Kematian</h1>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">

                <div id="sktm" class="">
                    <h3 class="row justify-content-center mt-3">Daftar surat yang perlu dicetak</h3>

                    <div class="text-center mt-4">
                        <h6 class="row justify-content-center">
                            <?= $this->session->flashdata('pesansurat'); ?>
                            <?php unset($_SESSION['pesansurat']); ?>
                        </h6>
                    </div>

                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-bordered mt-4" bgcolor="white" id="example" width="100%">
                            <thead style="text-align:center">
                                <tr>
                                    <th scope="col">Nama yang Meninggal</th>
                                    <th scope="col">Tanggal Kematian</th>
                                    <th scope="col">Nama Pelapor</th>
                                    <th scope="col">Penyebab</th>
                                    <th scope="col">Berkas</th>
                                    <th scope="col">Cetak</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="text-align:center">
                                <?php if (is_array($skkematian) || is_object($skkematian)) {
                                    foreach ($skkematian as $data1) { ?>
                                        <tr>

                                            <td class="align-middle">
                                                <?php echo $data1->nama; ?>
                                            </td>

                                            <td class="align-middle" style="width: 15%;">
                                                <?php $originalDate = $data1->tgl_kematian;
                                                $newDate = strftime("%d %B %Y", strtotime($originalDate)); ?>
                                                <?php echo $newDate; ?>
                                            </td>

                                            <td class="align-middle" style="width: 20%">
                                                <?php echo $data1->name; ?>
                                            </td>

                                            <td class="align-middle" style="width: 20%">
                                                <?php echo $data1->penyebab; ?>
                                            </td>

                                            <td class="align-middle" style="width: 10%">
                                                <?php echo anchor('assets/upload/skkematian/' . $data1->berkas, '<div style="" class="btn btn-sm btn-primary"><i class="fa fa-file-download"></i> Unduh</div>') ?>
                                            </td>

                                            <td class="align-middle" style="width: 10%">
                                                <?php echo anchor('cetaksurat/skkematian/' . $data1->id, '<div style="" class="btn btn-sm btn-primary"><i class="fa fa-envelope"></i> Cetak</div>') ?>
                                            </td>

                                            <td class="align-middle" style="width: 10%">
                                                <div class="mx-2">
                                                    <?php echo anchor('admin/skkematianselesai/' . $data1->id, '<div style="margin-top:10px" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Selesai</div>') ?>

                                                    <?php echo anchor('admin/skkematianditolak/' . $data1->id, '<div style="margin-top:10px" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Ditolak</div>') ?>
                                                </div>
                                            </td>

                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>
</font>

<!-- /.container-fluid -->
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik "Keluar" jika Anda ingin mengakhiri sesi di website ini.</div>
            <div class="modal-footer">
                <button class="btn btn-dark" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-success" href="<?= base_url('auth/logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>