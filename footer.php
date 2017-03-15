<footer>
       <div class="container">
           <div class="row">
               <div class="col-md-2">
                   <h4>Copyright &copy 2017</h4>
                   <h4>All Rights Reserved</h4>
               </div>

               <div class="col-md-2">
                    <h4>Navigation</h4>
                    <a href="#">Home</a><br>
                    <a href="#">Services</a><br>
                    <a href="#">Links</a><br>
                    <a href="adminLogin.php">Admin</a><br>
            </ul>
               </div>
               <div class="col-md-2">
                   <h4>Follow Us</h4>
            <a class="btn btn-social-icon btn-twitter"><span class="fa fa-twitter"></span></a>
            <a class="btn btn-social-icon btn-facebook"><span class="fa fa-facebook-official"></span></a>
            <a class="btn btn-social-icon btn-linkedin"><span class="fa fa-linkedin-square"></span></a>
            <a class="btn btn-social-icon btn-github"><span class="fa fa-github"></span></a>
               </div>
               <div class="col-md-4 col-md-offset-2 contact">
                  <h4>Contact Us</h4>
                   <form method="POST" action="sendmail.php">
                         <div class="form-group">
                             <input type="email" class="form-control" name="email" placeholder="Email">
                         </div>
                         <div class="form-group">
                              <textarea name="message" class="form-control" placeholder="Message" rows="4" cols="50"></textarea>

                         </div>
                         <button type="submit" class="btn btn-info">Send</button>
                   </form>
               </div>
           </div>
       </div>
   </footer>