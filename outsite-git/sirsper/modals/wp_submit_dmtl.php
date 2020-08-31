<!-- Input IU(Informasi Umum) -->
                          <div class="modal fade" id="pick<?php echo $row['log_id'];?>" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title"><b>[Submit Record] <b><u><?php echo $row['log_id'];?> <?php echo $row['NM_CUS'];?></u></b></h4>
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
                                      <input type="hidden" name="process_by" value="<?php echo $_SESSION['username'];?>"/>
                                    </div>
                                    <div class="form-group">
                                      <label align="center">Are you sure to process this record to DMTL page?</label><hr>
                                    </div>
                                    <button type="submit" name="pick" value="pick" class="btn btn-block btn-default">Yes</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-block btn-default">No</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
