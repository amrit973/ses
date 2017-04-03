<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <?php include 'head.php';?>
    <style type="text/css">

    body
    {
        text-align: center;
        padding: 0px;
        margin:0px;
    }
    h2
    {
       color: white;
       font-family:sans-serif;
    }
    img
    {
        background-color: white;
    }
        .content
        {
            width: 20%;
            margin:0 auto;
            text-align: center;
        }
    </style>

    <script src="jquery-1.8.2.js"></script>
    <script src="mfs100.js"></script>
    <script language="javascript" type="text/javascript">
        var quality = 60; //(1 to 100) (recommanded minimum 55)
        var timeout = 10; // seconds (minimum=10(recommanded), maximum=60, unlimited=0

        function Capture() {
            var email = document.getElementById('email').value;
            try {
                document.getElementById('imgFinger').src = "data:image/bmp;base64,";
                document.getElementById('txtIsoTemplate').value = "";
                var res = CaptureFinger(quality, timeout);
                if (res.httpStaus) {

                    if (res.data.ErrorCode == "0") {
                        $.ajax({
                            type: "POST",
                            url: 'apiJson.php',
                            data: {'email': email},
                            dataType: 'json',
                            success: function(data)
                                    {
                                        document.getElementById('txtIsoTemplate2').value = data[0];
                                    }
                               });

                        document.getElementById('imgFinger').src = "data:image/bmp;base64," + res.data.BitmapData;
                        document.getElementById('txtIsoTemplate').value = res.data.IsoTemplate;

                    }
                }
                else {
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;
        }



       function Verify() {
            try {
                var isotemplate = document.getElementById('txtIsoTemplate').value;
                var isotemplate2 = document.getElementById('txtIsoTemplate2').value;
                var res = VerifyFinger(isotemplate, isotemplate2);

                if (res.httpStaus) {
                    if (res.data.Status) {
                        //alert("Finger matched");
                        window.location = "voterForm.php";
                        document.getElementById('theForm').submit();
                    }
                    else {
                        if (res.data.ErrorCode != "0") {
                            alert(res.data.ErrorDescription);
                        }
                        else {
                            alert("Finger not matched");
                        }
                    }
                }
                else {
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;

        }

    </script>
</head>
<body>
<h2>SES USER AUTHENTICATION</h2>
     <div class="content">
       <img id="imgFinger" width="150px" height="180px" alt="Finger Image">
       <br><br>
       <div>
           <form method="post" id="theForm" action="voterForm.php">
             <div class="form-group">
                   <input id="email" type="email" name="email" placeholder="Enter your email" class="form-control">
             </div>

               <input type="hidden" name="check" value="success">
            </form>
       </div>
       <br>
       <div>
           <input type="submit" id="btnCapture" value="Capture" class="btn btn-primary" onclick="return Capture()" />
           <input type="submit" id="btnMatch" value="Match" class="btn btn-success" onclick="return Verify()" />
       </div>
       <div>
                <textarea id="txtIsoTemplate" style="width: 100%; height:30px;display: none;" class="form-control" > </textarea>
       </div>
        <div>
                <textarea id="txtIsoTemplate2" style="width: 100%; height:30px;display: none;" class="form-control" > </textarea>
       </div>
     </div>

</body>
</html>
