<?php

  include "./include/DashboardHeader.php" ;
?>
              
     <div class="row">

     <div class="col-lg-8">
       <div class="card shadow">
        <form enctype="multipart/form-data" action="../controller/ProfileUpdate.php" method="POST">
        <div class="card-hadear d-flex justify-content-between alige-items-center">
            <h4>Profile</h4>
            <button class="btn btn-primary">Update profile</button>
        </div>
        <div class="card-body">
            <div class="row alige-items-center">
                <div class="col-lg-3">

                    <label for="avatar">
                    <img src="<?= getprofaileImg()?>" alt="" class="rounded-circle w-100 ProfileImage">
                    </label>

                <input type="file" id="avatar" class="d-none" name="profileImage">


                </div>

                <div class="col-lg-9">
                    <input type="text" name="name" class="form-control my-2" value=<?= $_SESSION['auth']['name']?> placeholder="Your Name">
                    <span class="text- danger"><?= $_SESSION ['errors']['name_error'] ?? null?></span>
                    <input type="text" name="email" class="form-control my-2" value=<?= $_SESSION['auth']['email']?> placeholder="Your Email">
                    <span class="text- danger"><?= $_SESSION ['errors']['email_error'] ?? null?></span>
                </div>
                

            </div>


        </div>
        </form>
     </div>
     </div>
     <div class="col-lg-4">
     <div class="card shadow">
        <div class="card-hadear">New password</div>
        <div class="card-body">
            .......
        </div>
     </div>
     </div>
     </div>
       


     </div>         
 

<?php

include "./include/DashboardFooter.php" ;
?>

<script>
  const inputImage =  document.querySelector('#avatar')
  const ProfileImage = document.querySelector('.ProfileImage')

        function changeProfileImage(event){
            ProfileImage .src = URL.createObjectURL(event.target.files[0])
            
        }
        inputImage.addEventListener('change', changeProfileImage)


</script>
