 
<?php
     
	 if (isset($_GET['name'])) {
	    
 	 $surl = 'https://api.trendyol.com/sapigw/brands/by-name?name='.$_GET['name'].'&size=50';	
	 
	 
     $ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL, $surl);
	 curl_setopt($ch, CURLOPT_HEADER, 0);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 
	 $results = json_decode(curl_exec($ch));
	 
	 curl_close($ch);
	
	  
	
	
	 }
	
	
	 ?>
	 
	 


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<style>

body{
  padding:20px 20px;
}

.results tr[visible='false'],
.no-result{
  display:none;
}

.results tr[visible='true']{
  display:table-row;
}

.counter{
  padding:8px; 
  color:#ccc;
}

</style>
 

<form action="searchBrands.php" method="GET"> 

<div class="input-group mb-3">
  <input type="text" name="name" class="form-control input-lg" placeholder="Marka Ara" value="<?php echo $_GET['name']; ?>">
  <button class="btn btn-primary  input-lg" type="submit" id="button-addon1">Trendyolda Marka Ara</button>
</div>

</form>
 


<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results">
  <thead>
    <tr>
      <th>#</th>
      <th class="col-md-5 col-xs-5">Brand ID</th>
      <th class="col-md-4 col-xs-4">Brand Name</th>
    </tr>
    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
    </tr>
  </thead>
  <tbody>
  <?php if ($results) { ?>
  <?php foreach($results as $key => $result) { ?>
   <tr>
   <td><?php echo $key; ?></td>
   <td><?php echo $result->id; ?></td>
  <td><?php echo $result->name; ?></td>
  </tr>
  <?php } ?>
  <?php } ?>
  </tbody>
</table>




 

