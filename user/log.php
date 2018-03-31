<!DOCTYPE html>
<html lang="id">
<head>
	<title>Error</title>
</head>
<body>
		          
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar Aktifitas</h2>
                    <a class="btn btn-danger btn-sm pull-right" href="?page=krtxwwezhbfrre&uhbfdsgq=<?php	echo "".$_GET['page'].""; ?>" onClick="return confirm('Bersihkan catatan Aktifitas saya ...');">
					<i class="glyphicon glyphicon-trash"></i>
					</a>
                    <div class="clearfix"></div>
                  </div>
				  <div style="overflow:scrol">
                  <div class="x_content">
                    
                    <table id="datatable-responsive" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Waktu</th>
                          <th>Aktifitas</th>
                          
                        </tr>
                      </thead>
                      <tbody>
					    <?php
							$sql = mysql_query("select*from log where id_user='".$_SESSION["ses_user"]."'")
							or die (mysql_error());
						
							while ($data_log = mysql_fetch_array($sql)) {
						?>
                        <tr>
						  <?php
								$sqltgl_log_format = mysql_query("select DATE_FORMAT('".$data_log['tgl_log']."', '%d %b %Y (%r)') as tgl, DATE_FORMAT('".$data_log['tgl_log']."', '%w') as hari")
								or die (mysql_error());
								$data_tgl_log_format=mysql_fetch_array($sqltgl_log_format);
								if ($data_tgl_log_format["hari"]=="1"){
									$hari_log="Senin";
								}else if ($data_tgl_log_format["hari"]=="2"){
									$hari_log="Selasa";
								}else if ($data_tgl_log_format["hari"]=="3"){
									$hari_log="Rabu";
								}else if ($data_tgl_log_format["hari"]=="4"){
									$hari_log="Kamis";
								}else if ($data_tgl_log_format["hari"]=="5"){
									$hari_log="Jumat";
								}else if ($data_tgl_log_format["hari"]=="6"){
									$hari_log="Sabtu";
								}else{
									$hari_log="Minggu";
								}
						  ?>
                          <td><?php echo $hari_log.", ".$data_tgl_log_format['tgl']; ?></td>
                          <td><?php echo $data_log['isi_log']; ?></td>
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