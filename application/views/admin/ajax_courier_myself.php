<table cellspacing="0" id="display_table">
                  <thead>
                  <tr>
					            <th>Investor Id</th>
                      <th>Investor Name</th>
                      <th>User Email</th>
          					  <th>Investor PAN</th>
          					  <th>Account No</th>
                      <th>DOB</th>
          					  <th>Confirmation Date</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
				if(@$courier_send_list){
                  foreach($courier_send_list as $courier_list){
						?>
                    <tr>
					            <td><?=$courier_list->invuser_id?></td>
                      <td><?=$courier_list->name?></td>
                      <td><?=$courier_list->myUniverseEmailId?></td>
					            <td><?=$courier_list->panno?></td>
					            <td><?=$courier_list->accountNumber?></td>
                      <td><?=$courier_list->DOB?></td>
					            <td><?=$courier_list->date_time?></td>
                      <td><a id="scheduleds" data-emails="<?=$courier_list->myUniverseEmailId?>" data-user_id="<?=$courier_list->invuser_id?>" href="javascript:void(0)">Schedule</a></td>
                    </tr>
                    <?php
                  }}
                ?>
                </tbody>
                </table>