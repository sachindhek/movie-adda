<?php
include 'inc/header.php';
Session::CheckSession();
$sId =  Session::get('roleid');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addMovies'])) {

  $userAdd = $users->addMovies($_POST);
}

if (isset($userAdd)) {
  echo $userAdd;
}


 ?>


 <div class="card ">
   <div class="card-header">
          <h3 class='text-center'>Add New Movies</h3>
        </div>
        <div class="cad-body">



            <div style="width:600px; margin:0px auto">

            <form class="" action="" method="post">
                <div class="form-group pt-3">
                  <label for="name">Movie</label>
                  <input type="text" name="name"  class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="addMovies" class="btn btn-success">submit</button>
                </div>


            </form>
          </div>


        </div>
      </div>



  <?php
  include 'inc/footer.php';

  ?>
