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
                            <input type="text" class="form-control" name="nama_lokasi" id="nama_lokasi">
                        </div>
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <!-- <input type="text" class="form-control" id="n ama_lokasi" required> -->
                            <select class="form-control" name="kabupaten" id="kabupaten" required>
                                <option selected>Open this select menu</option>
                                <option value="1">Semarang</option>
                                <option value="2">Magelang</option>
                                <option value="3">Salatiga</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="luas_awal">Luas Awal</label>
                            <input type="text" class="form-control" name="luas_awal" id="luas_awal">
                        </div>
                        <div class="form-group">
                            <label for="lingkup_administratif">Lingkup Administratif</label>
                            <textarea type="textarea" class="form-control" name="lingkup_administratif" id="lingkup_administratif"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" class="form-control" name="latitude" id="latitude">
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" class="form-control" name="longitude" id="longitude">
                        </div>
                        <div class="form-group">
                            <label for="status">Tingkat Kekumuhan</label>
                            <input type="text" class="form-control" name="status" id="status">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-left">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>