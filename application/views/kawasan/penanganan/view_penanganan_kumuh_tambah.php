<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam saepe quas quasi numquam ullam cupiditate officia cumque quos nobis iste nostrum et consectetur quidem aliquid assumenda, ad laudantium fugiat placeat neque exercitationem perspiciatis. Nobis eius officia quibusdam expedita at harum dolor corrupti inventore. Repellat facilis facere iure, aut libero voluptatem excepturi corporis impedit esse quasi provident debitis accusamus assumenda placeat commodi enim dolore vitae deleniti exercitationem magni officia consequatur quisquam optio? Expedita, blanditiis eligendi saepe tenetur officiis ducimus debitis facilis maxime ipsa consequuntur voluptates repellendus, veniam aspernatur. Enim minima neque cum, culpa sequi consequatur at laudantium quibusdam, rerum fuga nulla consequuntur qui porro molestias amet praesentium iste nemo! Ab doloremque, odit molestias nostrum molestiae ex eius debitis repellat, repudiandae maxime animi doloribus nulla, blanditiis quasi mollitia praesentium ullam delectus impedit saepe? Repudiandae doloremque nesciunt et molestiae, voluptatibus error nulla optio! Ipsum facilis ad consequatur doloribus quos nihil excepturi, natus culpa laborum rerum voluptates veritatis sequi cum quod qui harum ullam dignissimos quasi. Temporibus quisquam autem, at totam illum possimus voluptates, corporis, iure doloremque tempora sed deserunt eligendi velit tenetur dicta rem unde animi ex consequuntur dolorem vitae dolor ipsam! Atque modi animi fugit illum sint veritatis eum ipsum officiis obcaecati.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">

                        <div class="form-group">
                            <label for="nama_lokasi">Nama Lokasi</label>
                            <select class="selectpicker form-control" data-live-search="true" name="nama_lokasi" id="nama_lokasi" required>
                                <?php foreach ($lokasikumuh as $lokasi) : ?>
                                    <?php foreach ($lokasi['surat_keterangan'] as $sk) : ?>
                                        <?php foreach ($sk['lokasi_kumuh'] as $lk) : ?>
                                            <option value="<?php echo $lk['id_lokasi'] ?>"><?php echo $lk['nama_lokasi'] ?> | <?php echo $sk['sk'] ?> | <?php echo $lokasi['kabupaten'] ?> </option>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_lokasi">Kegiatan</label>
                            <input type="text" class="form-control" name="kegiatan" id="kegiatan">
                        </div>
                        <div class="form-group">
                            <label for="luas_awal">Luas Penanganan</label>
                            <input type="text" class="form-control" name="luas_penanganan" id="luas_penanganan">
                        </div>
                        <div class="form-group">
                            <label for="luas_awal">Tahun Penanganan</label>
                            <input type="text" class="form-control" name="tahun_penanganan" id="tahun_penanganan">
                        </div>
                        <div class="form-group">
                            <label for="latitude">Longitude</label>
                            <input type="text" class="form-control" name="longitude" id="longitude">
                        </div>
                        <div class="form-group">
                            <label for="longitude">Latitude</label>
                            <input type="text" class="form-control" name="latitude" id="latitude">
                        </div>
                        <div class="form-group">
                            <label for="status">Sumber Dana</label>
                            <input type="text" class="form-control" name="sumber_dana" id="sumber_dana">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-left">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>