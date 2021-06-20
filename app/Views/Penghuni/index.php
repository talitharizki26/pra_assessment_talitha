 <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <?php if (session()->get('messege')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data Penghuni berhasil <strong><?= session()->getFlashdata('messege'); ?></strong>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-6">
        <?php 
            if (session()->get('err')){
                echo "<div class='alert alert-danger' role='alert'". session()->get('err') ."</div>";
            }
        ?>
        </div>
    </div>


    <div class="card">
    <div class="card-body">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
        +  Tambah Data</button>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penghuni</th>
                <th>No KTP</th>
                <th>Unit</th>
                <th>Foto</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($penghuni->getResultArray() as $row) : ?>
            <tr>
                <td scope="row"><?= $i; ?></td>
                <td><?= $row['nama_penghuni'] ?></td>
                <td><?= $row['no_ktp'] ?></td>
                <td><?= $row['unit'] ?></td>
                <td><?= $row['foto'] ?></td>
                <td>
                    <button type="button" data-toggle="modal" data-target="#modalUbah" class="btn btn-sm btn-warning"><i class="fa  fa-edit"></i></button>
                    <button type="button" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                </td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('penghuni/tambah'); ?>" method="post">
                    <div class="form-group mb-0">
                        <label for="Nama"></label>
                        <input type="text" name="nama_penghuni" id="nama_penghuni" class="form-control" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group mb-0">
                        <label for="ktp"> </label>
                        <input type="text" name="no_ktp" id="no_ktp" class="form-control" placeholder="Masukan No KTP">
                    </div>
                    <div class="form-group mb-0">
                        <label for="unit"></label>
                        <input type="text" name="unit" id="unit" class="form-control" placeholder="Masukan Unit">
                    </div>
                    <div class="form-group mb-0">
                        <label for="foto"></label>
                        <input type="text" name="foto" id="foto" class="form-control" placeholder="Masukan Foto">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUbah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('penghuni/ubah'); ?>" method="post">
                    <div class="form-group mb-0">
                        <label for="Nama"></label>
                        <input type="hidden" name="id" id="id" class="form-control" placeholder="Masukan Nama" value="<?= $row['id_penghuni'] ?>">
                        <input type="text" name="nama_penghuni" id="nama_penghuni" class="form-control" placeholder="Masukan Nama" value="<?= $row['nama_penghuni'] ?>">
                    </div>
                    <div class="form-group mb-0">
                        <label for="ktp"> </label>
                        <input type="text" name="no_ktp" id="no_ktp" class="form-control" placeholder="Masukan No KTP" value="<?= $row['no_ktp'] ?>">
                    </div>
                    <div class="form-group mb-0">
                        <label for="unit"></label>
                        <input type="text" name="unit" id="unit" class="form-control" placeholder="Masukan Unit" value="<?= $row['unit'] ?>">
                    </div>
                    <div class="form-group mb-0">
                        <label for="foto"></label>
                        <input type="text" name="foto" id="foto" class="form-control" placeholder="Masukan Foto" value="<?= $row['foto'] ?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modalHapus">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/Penghuni/hapus/<?= $row['id_penghuni'] ?>" class="btn btn-primary"> Yakin</a>
            </div>
        </div>
    </div>
</div>