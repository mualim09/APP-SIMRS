<!-- Input IU(Informasi Umum) -->
                          <div class="modal fade" id="EKDS<?php echo $row['log_id'];?>" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title"><b>[Update Record] <b><u><?php echo $row['log_id'];?> <?php echo $row['NM_CUS'];?></u></b></h4>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                      <h4><label align="center">Estimasi Koletibilitas & Account Strategy</label></h4><hr>
                                    </div>
                                  <form name="postform" action="" enctype='multipart/form-data' method="post">
                                    <div class="form-group">
                                      <!-- <input type="text" name="file" class="form-control" required/> -->
                                      <input type="hidden" name="log_id" value="<?php echo $row['log_id'];?>" />
                                    </div><!-- /.form group -->
                                    <div class="form-group">
                                      <input type="hidden" name="log_id" value="<?php echo $row['log_id'];?>"/>
                                      <input type="hidden" name="CIF" value="<?php echo $row['NO_CUS_CIF'];?>">
                                      <input type="hidden" name="CBC_NAME" value="<?php echo $row['CBC_NAME'];?>"/>
                                      <input type="hidden" name="IC" value="<?php echo $row['NM_CUS'];?>"/>
                                      <input type="hidden" name="Debitur" value="<?php echo $row['NM_CUS'];?>"/>
                                    </div>

                                    <?php

                                    mysql_connect($dbhost, $dbuser, $dbpassword);
                                    mysql_select_db($dbname); 
                                    $role = mysql_query("SELECT * FROM tb_result_review WHERE log_id = '$row[log_id]' ");
                                    $inv = mysql_fetch_array($role);

                                    ?>

                                    <div class="form-group">
                                      <label align="center">Account Strategy</label>
                                      <textarea type="text" name="account_str" class="form-control" required><?php echo $inv['account_str'] ;?></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label align="center">Estimasi Kolektibilitas</label>
                                      <textarea type="text" name="est_kol" class="form-control" required><?php echo $inv['est_kol'] ;?></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label align="center">Usulan Watchlist</label>
                                      <textarea type="text" name="us_wl" class="form-control" required><?php echo $inv['us_wl'] ;?></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label align="center">Root Cause</label>
                                      <textarea type="text" name="root_cause" class="form-control" required><?php echo $inv['root_cause'] ;?></textarea>
                                    </div>
                                    <button type="submit" name="update_ekds" value="submit" class="btn btn-block btn-default">Submit</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-block btn-default">Close</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
