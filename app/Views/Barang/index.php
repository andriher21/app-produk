<!-- Begin Page Content -->
<div class="container-fluid produk">
    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-4"></div>
        <div class="col-4">
       
        </div>
        <div class="col-4">
        <!-- <button class="btn btn-sm btn-primary data-daterangepicker float-right">&nbsp; <i class="fas fa-calendar-alt mr-2"></i> Date &nbsp;</button>
           -->
    </div>
       
    </div>

    <!-- DataTales Example -->
    <div class="section-body section-emp-summary">
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <br>
                <div>
              <h6 class="m-0 font-weight-bold text-black">Daftar Product </h6>
                </div>
                <br>
    

              <div class="row mb-2">
                        <div class="col-4">
                            <div class="input-group">
                                <input type="text" id="searchbox" class="form-control" placeholder="Cari Barang">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-search text-danger"></i></span>
                                    </div>
                            </div>
                            
                        </div>
                            <div class="col-2">
                                    <div class="input-group">
                                        <select class="form-control kategori-filter" name="kategori_filter" id="kategori_filter">
                                            <option value="">Semua</option>
                                            <?php foreach( $kategory as $k) :?>
                                            <option value="<?= $k['nama_kategory']?>"><?= $k['nama_kategory'] ?></option>
                                        <?php endforeach ?>
                                        </select>
                                    
                                    </div></div>
                                <div class="col-2"></div>
                            <div class="col-4 text-right">
                            <div class="btn-group group-action-area ">
                                <button class="btn btn-success btn-sm btn-export" id="btn-export"><i class="fas fa-fw  fa-file-export"></i> Export Excel</button>
                                <a href="<?= base_url('/produk/create')?>"class="btn btn-danger btn-sm"><i class="fas fa-fw fas fa-plus-circle"></i> Tambah Produk</a>
                               
                            </div>
                            </div>
                        </div>
                        <br>
                <div class="card shadow mb-4">
               
                    <div class="card-body">
                      
                        <div class="table-responsive">
                            <table class="table table-striped dataTable" width="100%" cellspacing="0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th> Image</th>
                                        <th> Nama Produk</th>
                                        <th> Kategori</th>
                                        <th> Harga Beli (Rp)</th>
                                        <th> Harga Jual (Rp)</th>
                                        <th> Stok  </th>
                                        <th width ="5px">Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $total = 0;foreach ($produk as $u) : ?>
                                            <tr>
                                            <td> <img class="rounded mx-auto d-block"  width="30px" src="<?= base_url() ?>/uploads/<?= $u['image']; ?>"></td>
                                            <td><?= $u['nama_barang']; ?></td>
                                            <td><?= $u['kategory_barang']; ?></td>
                                            <td  ><?= $u['harga_beli']; ?></td>
                                            <td  ><?= $u['harga_jual']; ?></td>
                                            <td ><?= $u['stok_barang']; ?></td>
                                            
                                            <td><div class="btn-group">
                                                         <a href="<?= base_url('produk/edit/'.$u['kode_barang'])?>" class="btn btn-outline-light " 
                                                         title="Edit Data" style="color:#4169E1;"><i class="fas fa-pen"></i></a>
                                                
                                                         <button class=" btn btn-outline-light"onclick="deleted(<?= $u['kode_barang']?>,'<?= $u['nama_barang']?>')" title="Hapus Data"
                                                          style="color:#FF0000;"><i class=" fas fa-trash"></i></button>
                                            
                                        </td>
                                            </tr>
                                        <?php endforeach ?>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <iframe id="print-summary-report" hidden></iframe>
    <!-- Delete Modal -->
     <div class="modal fade" id="confirmation-dialog" tabindex="-1" role="dialog" aria-labelledby="modal-top" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <div class="modal-body confirmation-dialog-notice"> Do you want to continue?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-shadow btn-confirmation-dialog-yes" data-dismiss="modal" data-url="javascript:;">
                        <i class="fa fa-trash m-r-5"></i> Yes
                    </button>
                    <button type="button" class="btn btn-secondary" id="" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Delete Modal -->

</div>
</div>
<!-- End of Main Content -->
<script>
    var base_url = '<?php echo base_url(); ?>'; 

    </script>

