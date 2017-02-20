<!--modal-->
<div id="loginModal" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Login</h4>
    </div>
    <form action="newlogin.php" method="post">
      <div class="modal-body">
       <div class="form-group">
         <input type="email" class="form-control" name="email" placeholder="Email address">
       </div>
       <div class="form-group">
         <input type="password" class="form-control" name="password" placeholder="password">
       </div>

    <button type="submit" class="btn btn-success">SUBMIT</button>
    &nbsp;<a href="#">Forgot Password?</a>
     </div>
   </form>
  </div>

</div>
</div>
                               <!--end modal-->