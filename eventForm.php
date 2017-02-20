<div class="detail">
<form  name='eventForm' method ="POST" action="<?php $_SERVER['PHP_SELF'];?>?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year;?>&v=true&add=true">
        <div class="form-group">
        <label for="textTitle">Title</label>
        <input type="text" name="textTitle" class="form-control">
        </div>
        <div class="form-group">
        <label for="detail">Detail</label>
        <textarea name="textDetail" class="form-control" rows="4" cols="50"></textarea>
        </div>
        <button type="submit" name="btnAdd" class="btn btn-info">Submit</button>
</form>
</div>