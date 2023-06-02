<div id="main">
    <div class="container">
        <?php if ($this->session->flashdata('msg') != null) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('regis') != null) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('regis'); ?>
            </div>
        <?php } ?>
        <form id="form" action="<?= base_url() ?>undangan/create_lokasi" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="id_undangan" value="<?= $this->uri->segment('3'); ?>">
            <div class="row mt-3">
                <div class="col-md-6 offset-md-3" data-wow-delay="0.22s">
                    <h2>Lokasi <img width="50px" height="100px" src="<?= base_url() ?>assets/img/lokasi.svg" alt=""></h2>
                    <h5>
                        <li>Lokasi Akad</li>
                    </h5>
                    <div class="row">
                        <div class="col-lg-10 col-10">
                            <div class="form-group">
                                <span>Tidak menemukan lokasi? Coba <a class="text-info" href="<?= base_url() ?>assets/map/petunjuk_latitude_dan_longitude.pdf">cara ini</a></span>
                                <input type="search" autocomplete="off" placeholder="Cari lokasi" class="form-control" name="addr" value="" id="addr">
                                <div id="results"></div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-2">
                            <div class="form-group">
                                <img id="loading" style="display: none;" width="45px" src="<?= base_url() ?>assets/web/images/ajax-loader.gif" alt="" srcset="">
                                <!-- <button type="button" style="height: 20px;" class="btn btn-sm btn-info" onclick="addr_search();"><i class="fa fa-search"></i></button> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="map" class="z-depth-1-half map-container" style="height: 220px"></div>
                    </div>
                    <h6>Koordinat</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="lat" required name="latitude_akad" value="<?php echo set_value('latitude_akad'); ?>" class="form-control" placeholder="Latitude Map">
                                <?php
                                echo form_error('latitude_akad');
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="lon" required name="longitude_akad" value="<?php echo set_value('longitude_akad'); ?>" class="form-control" placeholder="Longitude Map">
                                <?php
                                echo form_error('longitude_akad');
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="6" id="alamat_akad" required name="alamat_akad" class="form-control" placeholder="Alamat Lengkap Akad"><?php echo set_value('alamat_akad'); ?></textarea>
                        <?php
                        echo form_error('alamat_akad');
                        ?>
                    </div>
                    <h5>
                        <li>Lokasi Resepsi</li>
                    </h5>
                    <div class="row">
                        <div class="col-lg-10 col-10">
                            <div class="form-group">
                                <span>Tidak menemukan lokasi? Coba <a class="text-info" href="<?= base_url() ?>assets/map/petunjuk_latitude_dan_longitude.pdf">cara ini</a></span>
                                <input type="text" placeholder="Cari lokasi" class="form-control" name="addr_res" value="" id="addr_res">
                                <div id="results_res"></div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-2">
                            <div class="form-group">
                                <img id="loading_res" style="display: none;" width="45px" src="<?= base_url() ?>assets/web/images/ajax-loader.gif" alt="" srcset="">
                                <!-- <button type="button" style="height: 20px;" class="btn btn-sm btn-info" onclick="addr_search();"><i class="fa fa-search"></i></button> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="map_res" class="z-depth-1-half map-container" style="height: 220px"></div>
                    </div>
                    <h6>Koordinat</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" required id="lat_res" name="latitude_resepsi" value="<?php echo set_value('latitude_resepsi'); ?>" class="form-control" placeholder="Latitude Map">
                                <?php
                                echo form_error('latitude_resepsi');
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" required id="lon_res" name="longitude_resepsi" value="<?php echo set_value('longitude_resepsi'); ?>" class="form-control" placeholder="Longitude Map">
                                <?php
                                echo form_error('longitude_resepsi');
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="6" required name="alamat_resepsi" class="form-control" placeholder="Alamat Lengkap Resepsi"><?php echo set_value('alamat_resepsi'); ?></textarea>
                        <?php
                        echo form_error('alamat_resepsi');
                        ?>
                    </div>
                </div>
            </div>
            <div class="row mb-5 pt-5">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-info btn-md btn-block">Lanjutkan <img id="loading_res" style="display: none ;" width="25px" src="<?= base_url() ?>assets/web/images/icon.gif" alt="" srcset=""></button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
<style type="text/css">
    #map {
        width: 100%;
        height: 50%;
        padding: 0;
        margin: 0;
    }

    .address {
        cursor: pointer;
        border-style: ridge;
        padding: 0;
        margin: 0;
    }

    .address_res {
        cursor: pointer;
        border-style: ridge;
        padding: 0;
        margin: 0;
    }
</style>
<script type="text/javascript">
    // jakarta
    var startlat = -6.200000;
    var startlon = 106.816666;

    var options = {
        center: [startlat, startlon],
        zoom: 12
    }

    var map = L.map('map', options);
    var nzoom = 16;

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: 'Muchtara'
    }).addTo(map);

    var myMarker = L.marker([startlat, startlon], {
        title: "Coordinates",
        alt: "Coordinates",
        draggable: true
    }).addTo(map).on('dragend', function() {
        var lat = myMarker.getLatLng().lat.toFixed(8);
        var lon = myMarker.getLatLng().lng.toFixed(8);
        var czoom = map.getZoom();
        if (czoom < 18) {
            nzoom = czoom + 2;
        }
        if (nzoom > 18) {
            nzoom = 18;
        }
        if (czoom != 18) {
            map.setView([lat, lon], nzoom);
        } else {
            map.setView([lat, lon]);
        }
        document.getElementById('lat').value = lat;
        document.getElementById('lon').value = lon;
        myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
    });

    function chooseAddr(lat1, lng1, ads1) {
        // $('#results').hide()
        myMarker.closePopup();
        map.setView([lat1, lng1], 16);
        myMarker.setLatLng([lat1, lng1]);
        lat = lat1.toFixed(8);
        lon = lng1.toFixed(8);
        document.getElementById('lat').value = lat;
        document.getElementById('lon').value = lon;
        myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();

        // $('#results').show()
    }

    function myFunction(arr) {

        var out = "<br>";
        var i;
        if (arr.length > 0) {
            for (i = 0; i < arr.length; i++) {
                out += "<div id='address'  class='address' title='Show Location and Coordinates' onclick='chooseAddr(" + arr[i].lat + ", " + arr[i].lon + ");return false;'>" + arr[i].display_name + "</div>";
            }
            document.getElementById('results').innerHTML = out;

        } else {
            document.getElementById('results').innerHTML = "";
        }
    }

    $(document).ready(function() {
        $("#addr").keyup(function() {
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
                csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            var inp = $(this).val();
            // if (inp != "") {
            $.ajax({
                type: "GET",
                beforeSend: function() {
                    $('#loading').show();
                },
                url: 'https://nominatim.openstreetmap.org/search?format=json&limit=3&q="' + inp,
                data: {
                    [csrfName]: csrfHash
                },
                dataType: "json",
                success: function(arr) {
                    $('#loading').hide();
                    myFunction(arr)
                },
                error: function(r, text, exception) {
                    alert('Gagal memuat data, silahkan ulangi')
                }
            });
            // }
        });
    })
    $(document).on("click", ".address", function() {
        $("#addr").val('');
        $('#results').hide()
        if ($("#addr").keyup()) {
            $('#results').show()
        }

    });
</script>
<script type="text/javascript">
    // jakarta
    var startlat = -6.200000;
    var startlon = 106.816666;

    var options = {
        center: [startlat, startlon],
        zoom: 12
    }

    var map_res = L.map('map_res', options);
    var nzoom = 8;

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: 'Muchtara'
    }).addTo(map_res);

    var myMarker_res = L.marker([startlat, startlon], {
        title: "Coordinates",
        alt: "Coordinates",
        draggable: true
    }).addTo(map_res).on('dragend', function() {
        var lat_res = myMarker_res.getLatLng().lat.toFixed(8);
        var lon_res = myMarker_res.getLatLng().lng.toFixed(8);
        var czoom = map_res.getZoom();
        if (czoom < 18) {
            nzoom = czoom + 2;
        }
        if (nzoom > 18) {
            nzoom = 18;
        }
        if (czoom != 18) {
            map_res.setView([lat_res, lon_res], nzoom);
        } else {
            map_res.setView([lat_res, lon_res]);
        }
        document.getElementById('lat_res').value = lat_res;
        document.getElementById('lon_res').value = lon_res;
        myMarker_res.bindPopup("Lat " + lat_res + "<br />Lon " + lon_res).openPopup();
    });

    function chooseAddr_res(lat1, lng1) {
        // $('#results').hide()
        myMarker_res.closePopup();
        map_res.setView([lat1, lng1], 16);
        myMarker_res.setLatLng([lat1, lng1]);
        lat_res = lat1.toFixed(8);
        lon_res = lng1.toFixed(8);
        document.getElementById('lat_res').value = lat_res;
        document.getElementById('lon_res').value = lon_res;
        myMarker_res.bindPopup("Lat " + lat_res + "<br />Lon " + lon_res).openPopup();

        // $('#results').show()
    }

    function myFunction_res(arr) {

        var out = "<br>";
        var i;
        if (arr.length > 0) {
            for (i = 0; i < arr.length; i++) {
                out += "<div id='address_res' class='address_res' title='Show Location and Coordinates' onclick='chooseAddr_res(" + arr[i].lat + ", " + arr[i].lon + ");return false;'>" + arr[i].display_name + "</div>";
            }
            document.getElementById('results_res').innerHTML = out;

        } else {
            document.getElementById('results_res').innerHTML = "";
        }
    }

    $(document).ready(function() {
        $("#addr_res").keyup(function() {
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
                csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            var inp = $(this).val();
            $.ajax({
                type: "GET",
                beforeSend: function() {
                    $('#loading_res').show();
                },
                url: 'https://nominatim.openstreetmap.org/search?format=json&limit=3&q="' + inp,
                data: {
                    [csrfName]: csrfHash
                },
                dataType: "json",
                success: function(arr) {
                    $('#loading_res').hide();
                    myFunction_res(arr)
                },
                error: function(r, text, exception) {
                    alert('Gagal memuat data, silahkan ulangi')
                }
            });
        });
    })
    $(document).on("click", ".address_res", function() {
        $("#addr_res").val('');
        $('#results_res').hide()
        if ($("#addr_res").keyup()) {
            $('#results_res').show()
        }
    });
</script>