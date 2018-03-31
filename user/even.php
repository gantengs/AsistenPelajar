<?php
if (isset($_POST['btntgl_ev'])) {
	$_SESSION["ses_tgl_ev"]=$_POST['txtTanggal'];
}
if (isset($_POST['btntgl_ev_now'])) {
	$sqltgl_1 = mysql_query("SELECT curdate()") or die (mysql_error());
	$data_tgl_1=mysql_fetch_array($sqltgl_1);
	$_SESSION["ses_tgl_ev"]=$data_tgl_1["curdate()"];
}		
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<title>Error</title>
</head>
<body>
		          
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="title-left">
						<div class="col-md-4 col-sm-5 col-xs-6 form-group top_search">
							<form method="post" class="form-horizontal form-label-left" novalidate>
								<div class="item input-group">
									<input type="text" value="<?php echo $_SESSION["ses_tgl_ev"]; ?>" placeholder="Tanggal Even" class="form-control" name="txtTanggal" id="datepicker" data-validate-length="10" value="" required="required"/>
									<span class="input-group-btn">
									  <button class="btn btn-default" name="btntgl_ev" type="submit"><span class="glyphicon glyphicon-arrow-right"></span></button>
									</span>
								</div>
							</form>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3">
						<form method="post">
						<button type="submit" name="btntgl_ev_now" class="btn btn-default"><span class="fa fa-share"></span><strong> Hari ini</strong></button>	
						</form>
						</div>
					</div>
					<div class="title-right  pull-right">
						<div class="col-md-3 col-sm-3 col-xs-3">
							<?php
								$sqltgl_kls_format_ev1 = mysql_query("select DATE_FORMAT('".$_SESSION['ses_tgl_ev']."', '%d %b %Y') as tgl, DATE_FORMAT('".$_SESSION['ses_tgl_ev']."', '%w') as hari")
								or die (mysql_error());
								$data_tgl_kls_format_ev1=mysql_fetch_array($sqltgl_kls_format_ev1);
								if ($data_tgl_kls_format_ev1["hari"]=="1"){
									$hari="Senin";
								}else if ($data_tgl_kls_format_ev1["hari"]=="2"){
									$hari="Selasa";
								}else if ($data_tgl_kls_format_ev1["hari"]=="3"){
									$hari="Rabu";
								}else if ($data_tgl_kls_format_ev1["hari"]=="4"){
									$hari="Kamis";
								}else if ($data_tgl_kls_format_ev1["hari"]=="5"){
									$hari="Jumat";
								}else if ($data_tgl_kls_format_ev1["hari"]=="6"){
									$hari="Sabtu";
								}else{
									$hari="Minggu";
								}
						    ?>
							<a href="?page=Tambah Even"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span><strong> Even (<?php echo $hari.", ".$data_tgl_kls_format_ev1["tgl"]; ?>)</strong></button></a>
						</div>
					</div>
                    <div class="clearfix"></div>
                  </div>
				  <div style="overflow:scrol">
                  <div class="x_content">
                    
						<div class="dashboard-widget-content">

						<ul class="list-unstyled timeline widget">
						  <?php
							$sql = mysql_query("select*from even natural join subjek natural join kelas natural join instansi where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_nav_data"]."' and tgl_ev='".$_SESSION["ses_tgl_ev"]."' and hps_sub='no' order by tgl_ev")
							or die (mysql_error());
							while ($data_ev = mysql_fetch_array($sql)) {
						  ?>
						  <li>
							<div class="block">
							  <div class="block_content">
								<h2 class="title">
									<a href="?page=jvekmknurhj4u4hrfehfebcfek&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&sawwrxrerzrddtrcfhgvbjhbgyryzsefxfctrc=<?php echo $data_ev['id_ev'];?>&fcfckxfccgvhggsessesesbjbj=<?php if ($data_ev['selesai_ev']=="Sudah Selesai"){echo "sdccgcgdxtcrcgfcfvgvhgv";}else{echo "ytcvtctxtcjtfgctyvycrccytgvvyv";} ?>" class="btn btn-<?php if ($data_ev['selesai_ev']=="Sudah Selesai"){echo "success";}else{echo "danger";} ?> btn-sm" href="#" onClick="return confirm('Tandai <?php if ($data_ev['selesai_ev']=="Sudah Selesai"){echo "Belum";}else{echo "Sudah";} ?> Dilakukan');">
									<span class="glyphicon glyphicon-<?php if ($data_ev['selesai_ev']=="Sudah Selesai"){echo "ok";}else{echo "remove";} ?>"></span>
									</a><?php echo $data_ev['nama_ev']; ?>	
									<a class="btn btn-info btn-sm pull-right" href="?page=Ubah Even&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&ejviejnrjinencij=<?php echo $data_ev['id_ev'];?>">
									  <span class="glyphicon glyphicon-pencil"></span>
									</a>
									<a class="btn btn-danger btn-sm pull-right" href="?page=wjhedwukhu2h3uehiwjnwuhd&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&wihewnwbciuehw8ehuh2=<?php echo $data_ev['id_ev'];?>" onClick="return confirm('Data ini tidak dapat dikembalikan. Yakin ingin menghapus permanen data ?');">
									  <span class="glyphicon glyphicon-trash"></span>
									</a>
								</h2>
								<div class="byline">
								  <span><?php echo $data_ev['pengampu_sub']; ?></span>  <strong><?php echo $data_ev['nama_sub']; ?></strong>
								</div>
								<span class="pull-right" style="background-color:<?php echo $data_ev['warna_sub']; ?>;"><p>&nbsp;&nbsp;&nbsp;</p></span>								
								<p class="excerpt">&nbsp;<?php echo $data_ev['des_ev']; ?>
								</p>
							  </div>
							</div>
						  </li>
						  <?php 
							}
						  ?>
						</ul>
					  </div>
                    
                  </div>
				  </div>
                </div>
              </div>
            </div>
          </div>
   
	
</body>
</html>