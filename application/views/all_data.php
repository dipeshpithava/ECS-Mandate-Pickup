<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h1 style="color:red">User status</h1>
	 <table cellspacing="1" border="2px" id="display_table">
                  <thead>
                  <tr>
                      <th>investor_id</th>
                      <th>email_id</th>
                      <th>pincode</th>
					  <th>location_type</th>
					  <th>address</th>
					  <th>landmark</th>
					  <th>city</th>
					   <th>Status</th>
					  <th>state</th>
					  <th>date_of_pickup</th>
					  <th>time_of_pickup</th>
					  <th>updated_by</th>
                    </tr>
                    </thead>
                    <tbody>
                
                    <tr>
                      <td><?=$all_user_data['0']->investor_id?></td>
                      <td><?=$all_user_data['0']->email_id?></td>
					  <td><?=$all_user_data['0']->pincode?></td>
					  <td><?=$all_user_data['0']->location_type?></td>
					  <td><?=$all_user_data['0']->address?></td>
					  <td><?=$all_user_data['0']->landmark?></td>
					  <td><?=$all_user_data['0']->city?></td>
					  <td><?=$all_user_data['0']->status?></td>
					  <td><?=$all_user_data['0']->state?></td>
					  <td><?=$all_user_data['0']->date_of_pickup?></td>
					  <td><?=$all_user_data['0']->time_of_pickup?></td>
					  <td><?=$all_user_data['0']->updated_by?></td>
                    </tr>
                   
                </tbody>
                </table>
</body>
</html>