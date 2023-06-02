<div id="menu" class="card card-nav bg-light shadow-lg p-3 mb-5 rounded">
    <div class="row pb-2">
        <div class="col-md-12">
            <div class="text-center">
                <a class="btn btn-sm btn-block btn-outline-warning" data-toggle="modal" data-target="#exampleModalCenter">Himbauan</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center navbar-expand">
        <!-- <div class="col-md-1"></div> -->
        <div class="col-md-2 col-md-offset-1">
            <a title="Cover" id="cover" class="klik_menu btn btn-sm btn-light"><img width="28px" src="<?= base_url() ?>assets/img/cover.svg" alt="" srcset=""></a>
        </div>
        <div class="col-md-2">
            <a title="Mempelai" id="mempelai" class="klik_menu btn btn-sm btn-light"><img width="28px" src="<?= base_url() ?>assets/img/wedding-couple.svg" alt="" srcset=""></a>
        </div>
        <div class="col-md-2">
            <a title="Acara" id="acara" class="klik_menu btn btn-sm btn-light"><img width="28px" src="<?= base_url() ?>assets/img/place.svg" alt="" srcset=""></a>
        </div>
        <div class="col-md-2">
            <a title="Mengundang" id="mengundang" class="klik_menu btn btn-sm btn-light"><img width="28px" src="<?= base_url() ?>assets/img/mengundang.svg" alt="" srcset=""></a>
        </div>
        <div class="col-md-2">
            <a title="Lokasi" id="lokasi" class="klik_menu btn btn-sm btn-light"><img width="28px" src="<?= base_url() ?>assets/img/lokasi.svg" alt="" srcset=""></a>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <center><i class="fa fa-exclamation-triangle "></i> Himbauan untuk tamu undangan</center>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Pastikan bahwa anda dalam kondisi sehat jika datang pada pernikahan</li>
                    <li>Wajib memakai masker</li>
                    <li>Membawa Hand Sanitizer</li>
                    <li>Tetap menjaga jarak</li>
                    <li>Tidak memberi amplop langsung pada pengantin</li>
                    <li>Ikuti arahan panitia</li>
                </ul>
            </div>
            <button type="button" class="btn btn-info" data-dismiss="modal">Mengerti</button>
        </div>
    </div>
</div>