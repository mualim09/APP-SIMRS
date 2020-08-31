<!-- Input IU(Informasi Umum) -->
                          <div class="modal fade" id="IUCREATE<?php echo $row['log_id'];?>" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title"><b>[Document] <b><u><?php echo $row['log_id'];?> <?php echo $row['NM_CUS'];?></u></b></h4>
                                </div>
                                <div class="modal-body">
                                  <form name="postform" action=" " enctype='multipart/form-data' method="post">
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
                                    <div class="form-group">
                                      <h4><label align="center">INFORMASI UMUM</label></h4><hr>
                                    </div>
                                    <div class="form-group">
                                      <label align="center">Total Limit</label>
                                      <input type="text" name="Limitx" id="uang2" value="<?php echo $row['LIMIT1'];?>" class="form-control" required/>
                                      <label align="center">Total Bade</label>
                                      <input type="text" name="Bade" id="uang3" value="<?php echo $row['BADE'];?>" class="form-control" required/>
                                      <label align="center">Fasilitas Kredit</label>
                                      <input type="text" name="JenisFaskred" value="<?php echo $row['JNS_KRD'];?>" class="form-control" required/>
                                      <label align="center">Kolektibilitas</label>
                                      <input type="text" name="KOL" value="<?php echo $row['KOLL'];?>" class="form-control" required/>
                                      <label align="center">Bidang Usaha</label>
                                      <input type="text" name="BidangUsaha" value="<?php echo $row['NM_CUS'];?>" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                      <hr><h4><label align="center">HISTORI PEMBERIAN KREDIT</label></h4><hr>
                                    </div>
                                    <div class="form-group">
                                      <label align="center">Histori Pemberian Kredit</label>
                                      <textarea type="text" name="his_pem_kre" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                      <hr><h4><label align="center">CURRENT ISSUES INDUSTRI</label></h4><hr>
                                    </div>
                                    <div class="form-group">
                                      <label align="center">Current Issues Industri</label>
                                      <textarea type="text" name="cur_is_in" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                      <hr><h4><label align="center">HISTORI PEMBAYARAN DAN KOLEKTIBILITAS</label></h4><hr>
                                    </div>
                                    <div class="form-group">
                                      <label align="center">Histori Pembayaran dan Kolektibilitas</label>
                                      <textarea type="text" name="his_pem_kol" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                      <hr><h4><label align="center">EARLY WARNING</label></h4><hr>
                                    </div>
                                    <div class="form-group">
                                      <label align="center">Early Warning</label>
                                      <textarea type="text" name="earl_war" class="form-control" required></textarea>
                                    </div><!-- /.form group -->
                                    <button type="submit" name="update_iu" value="submit" class="btn btn-block btn-warning">Submit</button>                       
                                    <button type="button" data-dismiss="modal" class="btn btn-block btn-warning">Close</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
