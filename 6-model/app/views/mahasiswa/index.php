<div class="container mt-4">
    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>

            <?php foreach($data['mhs'] as $mhs):?>
                <ul>
                    <li><?= $mhs['nama']?></li>
                    <li><?= $mhs['nim']?></li>
                    <li><?= $mhs['jurusan']?></li>
                </ul>
            <?php endforeach;?>
        </div>
    </div>
</div>