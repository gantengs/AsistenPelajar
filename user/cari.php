<!DOCTYPE html>
<html lang="id">
<head>
	<title>Error</title>
</head>
<body>
		          
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Even (<?php
					echo $_SESSION["ses_tampil_ev"];
					?>)
					</h2>
                    
                    <div class="clearfix"></div>
                  </div>
				  <div style="overflow:scrol">
                  <div class="x_content">
                    
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Subjek</th>
                          <th>Sts</th>
                          <th>Even</th>
                          <th>Pengampu</th>
                          <th>Tanggal</th>
                          <th>Aksi </th>
                          <th>Deskripsi </th>
                        </tr>
                      </thead>
                      <tbody>
					    <?php
						if ($_SESSION["ses_tampil_ev"]=="Semua"){
							$sql = mysql_query("select*from even natural join subjek natural join kelas natural join instansi where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_nav_data"]."' and hps_sub='no' order by tgl_ev")
							or die (mysql_error());
						}else{
							$sql = mysql_query("select*from even natural join subjek natural join kelas natural join instansi where id_user='".$_SESSION["ses_user"]."' and id_kls='".$_SESSION["ses_nav_data"]."' and selesai_ev='".$_SESSION["ses_tampil_ev"]."' and hps_sub='no' order by tgl_ev")
							or die (mysql_error());
						}	
							
							while ($data_cari = mysql_fetch_array($sql)) {
						?>
                        <tr>
                          <td><?php echo $data_cari['nama_sub']; ?>
						  </td>
						  <td style="background-color:<?php echo $data_cari['warna_sub']; ?>;" align="center">
						    <a href="?page=jvekmknurhj4u4hrfehfebcfek&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&sawwrxrerzrddtrcfhgvbjhbgyryzsefxfctrc=<?php echo $data_cari['id_ev'];?>&fcfckxfccgvhggsessesesbjbj=<?php if ($data_cari['selesai_ev']=="Sudah Selesai"){echo "sdccgcgdxtcrcgfcfvgvhgv";}else{echo "ytcvtctxtcjtfgctyvycrccytgvvyv";} ?>" class="btn btn-<?php if ($data_cari['selesai_ev']=="Sudah Selesai"){echo "success";}else{echo "danger";} ?> btn-sm" href="#" onClick="return confirm('Tandai <?php if ($data_cari['selesai_ev']=="Sudah Selesai"){echo "Belum";}else{echo "Sudah";} ?> Dilakukan');">
							  <span class="glyphicon glyphicon-<?php if ($data_cari['selesai_ev']=="Sudah Selesai"){echo "ok";}else{echo "remove";} ?>"></span>
							</a>
							</td>
                          <td><?php echo $data_cari['nama_ev']; ?></td>
                          <td><?php echo $data_cari['pengampu_sub']; ?></td>
                          <?php
								$sqltgl_kls_format_cr = mysql_query("select DATE_FORMAT('".$data_cari['tgl_ev']."', '%d %b %Y') as tgl, DATE_FORMAT('".$data_cari['tgl_ev']."', '%w') as hari")
								or die (mysql_error());
								$data_tgl_kls_format_cr=mysql_fetch_array($sqltgl_kls_format_cr);
								if ($data_tgl_kls_format_cr["hari"]=="1"){
									$hari_cr="Senin";
								}else if ($data_tgl_kls_format_cr["hari"]=="2"){
									$hari_cr="Selasa";
								}else if ($data_tgl_kls_format_cr["hari"]=="3"){
									$hari_cr="Rabu";
								}else if ($data_tgl_kls_format_cr["hari"]=="4"){
									$hari_cr="Kamis";
								}else if ($data_tgl_kls_format_cr["hari"]=="5"){
									$hari_cr="Jumat";
								}else if ($data_tgl_kls_format_cr["hari"]=="6"){
									$hari_cr="Sabtu";
								}else{
									$hari_cr="Minggu";
								}
						  ?>
						  <td><?php echo $hari_cr.", ".$data_tgl_kls_format_cr['tgl']; ?></td>
                          <td>
							<a class="btn btn-info btn-sm pull-right" href="?page=Ubah Even&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&ejviejnrjinencij=<?php echo $data_cari['id_ev'];?>">
							  <span class="glyphicon glyphicon-pencil"></span>
							</a><a class="btn btn-danger btn-sm" href="?page=wjhedwukhu2h3uehiwjnwuhd&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>&wihewnwbciuehw8ehuh2=<?php echo $data_cari['id_ev'];?>" onClick="return confirm('Data ini tidak dapat dikembalikan. Yakin ingin menghapus permanen data ?');">
							  <span class="glyphicon glyphicon-trash"></span>
							</a>
							</td>
                          <td><?php echo $data_cari['des_ev']; ?></td>
                        </tr>
						<?php
							}
						?>
                      </tbody>
                    </table>

                  </div>
				  </div>
                </div>
              </div>
            </div>
          </div>
        
    
</body>
</html>