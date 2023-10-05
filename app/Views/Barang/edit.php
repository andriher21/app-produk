<style>

#drop-area {
    border-style: dotted;
    min-height: 200px;
    padding: 10px;
    border-color: #4169E1;
    border-radius: 15px;
    stroke-width: 1px;
    margin-bottom: 15px;
}

h6.drop-text {
    color: #4169E1;
    text-align: center;
    font-size: 0,1em;
}
h6.drop-alert {
    color: #FF0000;
    text-align: center;
    font-size: 0,1em;
}

#loader-icon {
    display: none;
}

#success-message-info {
    text-align: center;
}
</style>
<div class="container-fluid employee-attendance-data-summary">
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
                 <a href="<?= base_url('/produk')?>" class="h-6 font-weight-bold ">Daftar Produk > Edit Produk</a>
                <br>
                <br>
               <?php foreach($produk as $p):?>
                <form class="form">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Kategori</label>
                            <select id="kategori" name="kategori" class="form-control">
                                <option selected>Choose...</option>
                                <?php foreach($kategory as $k):?>
                                 <option value="<?=$k['nama_kategory'] ?>" <?= $p['kategory_barang'] == $k['nama_kategory']  ? 'selected="true"' : ''; ?>><?=$k['nama_kategory']?></option>
                                 <?php endforeach?>
                             </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label >Nama Barang</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $p['nama_barang']?>" required>  
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Harga Beli</label>
                            <input type="number" class="form-control autofill" name="hargabeli" id="hargabeli" value="<?= $p['harga_beli']?>"   required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Harga Jual</label>
                            <input type="text" class="form-control " name="hargajual" id="hargajual" value="<?= $p['harga_jual']?>" readonly required>
                        </div>
                        <div class="form-group col-md-4">
                            <label >Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" value="<?= $p['stok_barang']?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                            <label>Upload Image(jpg/png)</label>
                                <div class="phppot-container">
                                    <div id="drop-area">
                                        <div id="drop">'<img src="<?=base_url('/uploads/'.$p['image'].'')?>"class ="rounded mx-auto d-block" width="100px" height="100px"
                                                hspace=15 accept=".jpg, .jpeg, .png" id="imgview"/>'
                                        </div>  
                                        <div id="loader-icon">
                                            <img class="rounded mx-auto d-block" id="imgPreview" src="#" alt="pic" />
                                    </div>
                                    </div>
                                   
                                </div>
                    </div>
                        <div class="row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-2">
                            <a href="<?= base_url('/produk')?>"class="btn btn-outline-primary  btn-block " role="button">Batalkan </a>
                            
                            </div>
                            <div class="col-sm-2">
                                <button type="button" onclick="save(<?= $p['kode_barang']?>)" class="btn btn-primary btn-block">Simpan</button>
                            </div>
                        </div>
                   </form>
                   <?php endforeach?>
              
                
            </div>
            <div class="col"></div>
        </div>
    </div>
    <iframe id="print-summary-report" hidden></iframe>


</div>
</div>
<!-- End of Main Content -->
<script>
    var base_url = '<?php echo base_url(); ?>'; 

    </script>