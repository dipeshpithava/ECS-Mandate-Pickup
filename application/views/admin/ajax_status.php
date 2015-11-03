<table cellspacing="0" id="display_table">
                  <thead>
                  <tr>
                      <th>Investor ID</th>
                      <th>MU Email ID</th>
                      <th>Full Address</th>
                      <th>Location Type</th>
                      <th>Date &amp; Time of Pickup</th>
                      <th>Status</th>
                      <th>Remark</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                  foreach($all_status as $all_status_row){
                    ?>
                    <tr>
                      <td><?=$all_status_row->inv_usr_id?></td>
                      <td>
                        <?php
                        $email_id = $all_status_row->email_id;
                        if($all_status_row->email_id == ""){
                          $CI =& get_instance();
                          $email_id = $CI->get_mu_email_id($all_status_row->inv_usr_id);
                        }
                        echo $email_id;
                        ?>
                      </td>
                      <td><?=$all_status_row->address?> <?=$all_status_row->landmark?> <?=$all_status_row->city?> <?=$all_status_row->state?> <?=$all_status_row->pincode?> </td>
                      <td><?=$all_status_row->location_type?></td>
                      <td><?=$all_status_row->date_of_pickup?> <?=$all_status_row->time_of_pickup?></td>
                      <td>
                        <a href="javascript:void(0);" data-item="<?=$all_status_row->inv_usr_id?>" class="update_status"><?=$all_status_row->status?></a>
						<select name="" id="status_<?=$all_status_row->inv_usr_id?>" class="no_display status_dropdown">
						<?php if($all_status_row->status==strtolower("courier myself")){?>
							<option value="scheduled">scheduled</option>
							<option value="scheduled">rescheduled</option>
						<?php }else if($all_status_row->status==strtolower("scheduled")){?>
							<option value="rescheduled">rescheduled</option>
							<option value="waiting for pickup from customer">waiting for pickup from customer</option>
						<?php }else if($all_status_row->status==strtolower("rescheduled")){?>
							<option value="rescheduled">rescheduled</option>
							<option value="waiting for pickup from customer">waiting for pickup from customer</option>
						<?php }else if($all_status_row->status==strtolower("waiting for pickup from customer")){?>
							<option value="rescheduled">rescheduled</option>
							<option value="waiting for delivery to mu">waiting for delivery to mu</option>
						<?php }else if($all_status_row->status==strtolower("waiting for delivery to mu")){?>
							<option value="received by mu">received by mu</option>
						<?php }else if($all_status_row->status==strtolower("received by mu")){?>
							<option value="in process">in process</option>
						<?php }else if($all_status_row->status==strtolower("in process")){?>
              <option value="rejected">rejected</option>
							<option value="accepted">accepted</option>
						<?php }else if($all_status_row->status==strtolower("rejected")){?>
							<option value="scheduled">scheduled</option>
							<option value="unscheduled">unscheduled</option>
						<?php }else if($all_status_row->status==strtolower("accepted")){?>
							<option value="mandate active">mandate active</option>
							<option value="rejected">rejected</option>
						<?php }else if($all_status_row->status==strtolower("mandate active")){?>
							<option value="mandate active">mandate active</option>
						<?php }?>
						</select>
                        <span id="action_<?=$all_status_row->inv_usr_id?>" class="actions no_display">
                          <a href="javascript:void(0);" class="can_btn">Cancel</a>
                           | 
                          <a href="javascript:void(0);" data-invid="<?=$all_status_row->inv_usr_id?>" class="save_btn">Save</a>
                        </span>
                        
                      </td>
                      <td>
                        <a href="javascript:void(0);" data-item="<?=$all_status_row->inv_usr_id?>" class="remarks"><?=$all_status_row->remark==""?"No Remark":$all_status_row->remark?></a>
                        <textarea name="" id="txt_<?=$all_status_row->inv_usr_id?>" cols="30" rows="5" class="txt_remark_area no_display"><?=$all_status_row->remark?></textarea>
                        <span id="remark_action_<?=$all_status_row->inv_usr_id?>" class="remark_actions no_display">
                          <a href="javascript:void(0);" class="can_btn_remark">Cancel</a>
                           | 
                          <a href="javascript:void(0);" data-invid="<?=$all_status_row->inv_usr_id?>" class="save_btn_remark">Save</a>
                        </span>
                      </td>
                    </tr>
                    <?php
                  }
                ?>
                </tbody>
                </table>