<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-clipboard"></i> Revisi Laporan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="<?php echo site_url("serverside/revision"); ?>" id="submit">
            <input type="hidden" value="<?php echo $data['id_laporan_produksi'] ?>" name="id_laporan_has_status">
        <div class="modal-body">
            <div class="row mb-3">
                <label class="custom-label col-md-4" for="no_so">Nomor SO :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control form-control-sm" value="<?php echo $data['no_so'] ?>" id="no_so" disabled="">
                </div>
            </div>
            <div class="row mb-3">
                <label class="custom-label col-md-4" for="nama_Customer">Nama Customer :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control form-control-sm" id="nama_Customer" value="<?php echo htmlspecialchars($data['nama_Customer']) ?>" disabled="">
                </div>
            </div>
            <div class="row mb-3">
                <label class="custom-label col-md-4" for="keterangan">Keterangan :</label>
                <div class="col-md-8">
                    <textarea id="keterangan" class="form-control form-control-sm" name="keterangan" required=""></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-second btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" id="btn-Process" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Save Data</button>
        </div>
        </form>
    </div>
</div>