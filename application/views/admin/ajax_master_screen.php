<table cellspacing="0" id="display_table">
                  <thead>
                    <tr>
                      <th>Investor User Id</th>
                      <th>Investor Name</th>
                      <th>Email Id</th>
                      <th>Mobile No.</th>
                      <th>Status</th>
                      <th>Priority</th>
                      <th>Pan No</th>
                      <th>Bank Account Name</th>
                      <th>DOB</th>
                      <th>Address</th>
                      <th>Pin</th>
                      <th>Landmark</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Date Of Pickup</th>
                      <th>Time Of Pickup</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				          if(@$master_detail){
                    foreach($master_detail as $user_datas){
                      $is_show = "no";
                      $CI =& get_instance();
                      $inv_transaction = $CI->get_details($user_datas->invuser_id, "transaction");
                      $inv_status = $CI->get_details($user_datas->invuser_id, "status");
                      $inv_schedule = $CI->get_details($user_datas->invuser_id, "schedule");

                      if($filter == "status"){
                        if($filter_val == "unscheduled"){
                          if(count(@$inv_status) == 0){
                            $is_show = "yes";
                          }
                        }else if($filter_val == ""){
                          $is_show = "yes";
                        }else{
                          if(@$inv_status->status == $filter_val){
                            $is_show = "yes";
                          }
                        }
                      }
                      if($is_show == "yes"){
                  ?>
                    <tr>
                      <td><a href="<?=base_url()?>admin/investors/<?=$user_datas->invuser_id?>" id="user_id"><?=$user_datas->invuser_id?></a></td>
                      <td><?=$user_datas->name?></td>
                      <td><?=$user_datas->myUniverseEmailId?></td>
                      <td><?=$user_datas->mobileno?></td>
                      <td><?=@$inv_status->status==""?"Unscheduled":@$inv_status->status?></td>
                      <td><!-- Priority --></td>
                      <td><?=$user_datas->panno?></td>
                      <td><?=$user_datas->bankName?></td>
                      <td><?=$user_datas->DOB?></td>
                      <td><?=@$inv_schedule->address?></td>
                      <td><?=@$inv_schedule->pincode?></td>
                      <td><?=@$inv_schedule->landmark?></td>
                      <td><?=@$inv_schedule->city?></td>
                      <td><?=@$inv_schedule->state?></td>
                      <td><?=@$inv_schedule->date_of_pickup==""?"&nbsp;":@$inv_schedule->date_of_pickup?></td>
                      <td><?=@$inv_schedule->time_of_pickup==""?"&nbsp;":@$inv_schedule->time_of_pickup?></td>
                      <td><?php
            if(@$inv_status->status=="" || @$inv_status->status=="rescheduled" || @$inv_status->status=="rejected" || @$inv_status->status=="scheduled" || @$inv_status->status=="courier myself"){?>
             <a id="scheduleds" data-schedule="<?=@$inv_status->status?>" data-emails="<?=$user_datas->myUniverseEmailId?>" data-user_id="<?=$user_datas->invuser_id?>" href="javascript:void(0)">Schedule</a> | <a href="<?=base_url()?>admin/schedule_history/<?=$user_datas->invuser_id?>">Schedule History</a><!--  | <a id="sends" href="javascript:void(0)" data-invid="<?=$user_datas->invuser_id?>" class="send_msg">Send</a> -->
           <?php }else{?>
          <a  href="<?=base_url()?>admin/schedule_history/<?=$user_datas->invuser_id?>">Schedule History</a><!--  | <a id="sends" data-invid="<?=$user_datas->invuser_id?>" class="send_msg" href="javascript:void(0)">Send</a> -->
           <?php } ?>
           </td>
                    </tr>
                    <?php
				            }
                  }
                  }
                ?>
                  </tbody>
                </table>