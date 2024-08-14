<?php
                         $sql = "SELECT * FROM tblaccount";
                         $result = mysqli_query($con, $sql);
                 
                         if(mysqli_num_rows($result) > 0) {
                             $account = mysqli_fetch_all($result,MYSQLI_ASSOC);
                             foreach($account as $user) : ?>
                                <tr id="result">
                                    <td><?php echo $user['fname']; ?> </td>
                                    <td><?php echo $user['lname']; ?> </td>
                                    <td><?php echo $user['email']; ?> </td>
                                    <td><?php echo $user['ucategory']; ?> </td>
                                    <td><?php echo $user['au_member']; ?> </td>
                                    <td><?php echo $user['status']; ?> </td>
                                    <td>
                                        <?php 
                                          $status = $user['status'];
                                          if($status == "Active")
                                          {
                                            $stat1="Deactivate";
                                          }
                                          elseif($status =="Inactive")
                                          {
                                            $stat1 = "Activate";
                                          }
                                          $id = $user['id'];
                                        ?>
                                            <a href="admin_dashboard.php?status=<?php echo $user['status']?>&id=<?php echo $user['id']?>"><input type="submit" class="btn btn-primary btn-sm" id="btn_edit1" value="<?php echo "$stat1" ?>" ></input></a>
                                            <?php 
                                          ?>
                                          <a href="#editaccount"><input type="submit" class="btn btn-warning btn-sm" id="btn_edit" value="Edit" data-bs-toggle="modal" data-bs-target="#editaccount">
                                          </input></a>
                                          
                                          <a href="admin_dashboard.php?delete=<?php echo $user['id'];?>"><input type="submit" class="btn btn-danger btn-sm" id="btn_delete" value="Delete">
                                          </input></a>
                                    </td>
                                </tr>
                          <?php endforeach; 
                         }   
                    ?>