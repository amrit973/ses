<!--modal-->
<div id="myModal" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Registration Form</h4>
    </div>
    <form action="index.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
       <div class="form-group">
         <input type="text" class="form-control" name="name" placeholder="Name" required>
       </div>


       <div class="row">
         <div class="col-md-6 col-sm-6">
              <div class="form-group ">
                     <label for="name">Gender : </label>
                     <div class="radio-inline"><label><input type="radio" name="gender" value="male" required>Male</label></div>
                     <div class="radio-inline"><label><input type="radio" name="gender" value="female" required>Female</label></div>
              </div>
         </div>
         <div class="col-md-6 col-sm-6">
                  <input type="file" name="image" accept="image/jpeg">
         </div>
       </div>


           <div class="row">
             <div class="col-sm-2 col-md-2">
                    <div class="form-group">
                  <input type="text" class="form-control" name="age" placeholder="Age" required>
                   </div>
               </div>
               <div class="col-sm-10 col-md-10">
                  <div class="form-group">
              <input type="text" class="form-control" name="guardian" placeholder="Guardian's Name" required>
                  </div>
              </div>
           </div>




       <div class="form-group">
         <input type="text" class="form-control" name="address" placeholder="Address" required>
       </div>

       <div class="row">
         <div class="col-md-6 col-sm-6">
             <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
              </div>
         </div>
         <div class="col-md-6 col-sm-6">
           <div class="form-group">
               <input type="text" class="form-control" name="pin" placeholder="PIN" required>
          </div>
         </div>
       </div>


        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
                 <input type="text" class="form-control" name="mobile" placeholder="Mobile" required>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" name="aadhar" placeholder="Aadhar" required>
            </div>
          </div>
        </div>



       <div class="row">
        <div class="col-md-6 col-sm-6">
         <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
       <div class="form-group">
         <input type="password" class="form-control" name="verify" placeholder="Verify Password" required>
       </div>
     </div>
   </div>

 </div>
 <div class="modal-footer">
  <button type="submit" class="btn btn-success">SUBMIT</button>
</div>
</div>
</form>
</div>
</div>
                               <!--end modal-->