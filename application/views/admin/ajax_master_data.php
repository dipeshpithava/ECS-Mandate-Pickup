<table cellspacing="0" id="display_table">
                    <thead>
                    <tr>
                        <th>
                            Investor ID
                        </th>
                        <th>
                            Investor Name
                        </th>
                        <th>
                            Email ID
                        </th>
                        <th>
                          Mobile No.
                        </th>
                        <th>
                          PAN no.
                        </th>
                        <th>
                          Actions
                        </th>
                      </tr>
                      </thead>
                      <tbody>
                  <?php
                    foreach($all_investors as $all_investors_row){
                      ?>
                      <tr>
                        <td><a href="<?=base_url()?>admin/investors/<?=$all_investors_row->invuser_id?>"><?=$all_investors_row->invuser_id?></a></td>
                        <td><?=$all_investors_row->name?></td>
                        <td><?=$all_investors_row->myUniverseEmailId?></td>
                        <td><?=$all_investors_row->mobileno?></td>
                        <td><?=$all_investors_row->panno?></td>
                        <td><a href="<?=base_url()?>admin/transactions/<?=$all_investors_row->invuser_id?>">View Transactions</a><!--  | <a href="#">Inbox</a> | <a href="<?=base_url()?>admin/pdf/<?=$all_investors_row->invuser_id?>" target="_blank">PDF</a> --></td>
                      </tr>
                      <?php
                    }
                  ?>
                  </tbody>
                  </table>