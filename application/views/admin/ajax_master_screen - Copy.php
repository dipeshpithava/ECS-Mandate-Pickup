<table cellspacing="0" id="display_table">
                  <thead>
                    <tr>
                      <th>Investor User Id</th>
                      <th>Email Id</th>
          					  <th>Status</th>
          					  <th>Priority</th>
                      <th>Pan No</th>
                      <th>Bank Account Name</th>
                      <th>DOB</th>
          					  <th>Address</th>
          					  <th>City</th>
          					  <th>State</th>
          					  <th>Date Of Pickup</th>
          					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				          if(@$master_detail){
                    foreach($master_detail as $user_datas){
                  ?>
                    <tr>
                      <td><a href="<?=base_url()?>admin/investors/<?=@$user_datas->investor_user_id?>" id="user_id"><?=@$user_datas->investor_user_id?></a></td>
                      <td><?=@$user_datas->myuniverse_email_id?></td>
					            <td>
                        <?php
                        if(@$uns_status == "unscheduled"){
                          echo @$uns_status;
                        }else{
                          echo @$user_datas->status;
                        }
                        ?>
                      </td>
					            <td></td>
                      <td><?=@$user_datas->investor_pan?></td>
					            <td><?=@$user_datas->bank_name?></td>
                      <td><?=@$user_datas->investor_dob?></td>
                      <td><?=@$user_datas->address?></td>
                      <td><?=@$user_datas->city?></td>
          					  <td><?=@$user_datas->state?></td>
          					  <td><?=@$user_datas->date_of_pickup?></td>
					            <td>
                      <?php
                      $status = @$user_datas->status;
					            if($status=="" || $status=="rescheduled" || $status=="rejected"){
                      ?>
						            <a id="scheduleds" href="javascript:void(0)">Scheduled</a> | <a href="<?=base_url()?>admin/user_screen/<?=@$user_datas->investor_user_id?>">View</a> | <a href="">Send</a>
                      <?php
                      }else{
                      ?>
                        <a href="<?=base_url()?>admin/user_screen/<?=@$user_datas->investor_user_id?>">View</a> | <a href="">Send</a>
                      <?php } ?>
                      </td>
                    </tr>
                    <?php
				            } 
                  }
                ?>
                  </tbody>
                </table>