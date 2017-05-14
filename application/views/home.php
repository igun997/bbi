<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Software Penghitung Kebutuhan Kalori</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    </head>

    <body>"
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h3>Hitung Kebutuhan Kalori Tubuh Anda Sekarang</h3>
                <form role="form" id="contactForm">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name" class="h4">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukan Nama" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="Umur" class="h4">Umur Anda</label>
                            <input type="number" class="form-control" id="umur" placeholder="Masukan Umur" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="aktfitas" class="h4">Aktvitas Fisik</label>
                            <select class="form-control" id="aktifitas">
                                <option value="">.: Pilih Aktifitas Anda :.</option>
                                <option value="10">Ringan</option>
                                <option value="20">Sedang</option>
                                <option value="30">Berat</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="aktfitas" class="h4">Jenis Kelamin</label>
                            <select class="form-control" id="jk">
                                <option value="">.: Pilih Jenis Kelamin :.</option>
                                <option value="1">Laki-Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="bb" class="h4">Berat Badan (BB)</label>
                            <input type="number" class="form-control" id="bb" placeholder="Masukan BB" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="tb" class="h4">Tinggi Badan (TB)</label>
                            <input type="number" class="form-control" id="tb" placeholder="Masukan TB" required>
                        </div>
                    </div>
                    <button type="button" id="form-submit" onclick="hitung()" class="btn btn-success btn-lg pull-right ">Submit</button>
                    <div id="result" class="hidden">
                        
                    </div>
                    <script>
                        function hitung() {
                            $.ajax({
                                    method: "POST",
                                    url: "<?= base_url("ajax/getData") ?>",
                                    data: {
                                        nama: $("#nama").val(),
                                        umur: $("#umur").val(),
                                        aktifitas: $("#aktifitas").val(),
                                        bb: $("#bb").val(),
                                        tb: $("#tb").val(),
                                        jk: $("#jk").val()
                                    }
                                })
                                .done(function(msg) {
                                    $('#result').removeClass('hidden');
                                    $("#result").html(msg);
                                });
                        }

                    </script>
                </form>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </html>
