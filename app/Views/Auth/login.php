
<div class="container-fluid ">
    
    <!-- Outer Row -->
    <div class="row">
        <div class="col-6 text-black">
            <p class="h5 font-weight-bold text-center mt-5"> <i class="fas fa-shopping-bag"></i> &nbsp; SIMS Web App</p>
            <h4 class="font-weight-bold text-center mt-3"> Masuk dan Buat Akun Untuk memulai</h4>
                
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <!-- <h1 class="h4 text-gray-900 mb-4">Login Admin</h1> -->
                                    <?= session('message');  ?>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('/login'); ?> ">
                                    <div class="form-group">
                                        <input type="text" placeholder="Username"class="form-control form-control-user" id="username" name="username" >
                                       
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Password"class="form-control form-control-user" id="password" name="password">
                                     
                                    </div>
                                    <button type="submit" class="btn btn-danger btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> 
            </div>
        
        <div class="col-sm-6 px-0 d-none d-sm-block">

            <img src="<?= base_url() ?>/img/Frame 98699.png"
            alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;" >
        </div>
  </div>

</div>