<?php
  // ===========================================================
  include "inc/header.php";
  // include "../../resource/"
  if (empty($_SESSION['id'])) {
    // include""
    header("Location: ../../login/login.php");
  }
?>

<!-- #Account-->
<!-- Banner -->
<section id="intro" class="clearfix">
  <div class="container">
    <h3 style="color:#fff;">&nbsp;<b> Account Management </b></h3>
  </div>
</section>

<br>

<!-- Back End Code -->
<?php
  //Get Delete Result
  if (isset($_GET['del'])) {
    // change function to the designated function of your assign management
    $result = delete_accountaction($connect, $_GET['del']);
    if ($result == "1") {
      //header("Location: ./account.php");
      message("Account deleted successfully!", "1");
    }
  }

  if (isset($_GET['edit'])) {
    // change function to the designated function of your assign management
    $result = $_GET['edit'];
    if ($result =="1") {
      message("Account updated successfully!","1");
    }
  }

  //Get Activate Result
  if (isset($_GET['activate'])) {
    // change function to the designated function of your assign management
    $result = activate_action($connect, $_GET['activate']);
    if ($result == "1") {
      message("Account Active!", "1");
    }
  }


  //Get Deactivate Result
  if (isset($_GET['deactivate'])) {
    // change function to the designated function of your assign management
    $result = deactivate_action($connect, $_GET['deactivate']);
    if ($result == "1") {
      message("Account Inactive!", "1");
    }
  }


  //Get Subscribe Result
  if (isset($_GET['subscribe'])) {
    // change function to the designated function of your assign management
    $result = subscribe_action($connect, $_GET['subscribe']);
    if ($result == "1") {
      message("Account Subscribed!", "1");
    }
  }

  //Get Unsubscribe Result
  if (isset($_GET['unsubscribe'])) {
    // change function to the designated function of your assign management
    $result = unsubscribe_action($connect, $_GET['unsubscribe']);
    if ($result == "1") {
      message("Account Unsubscribed!", "1");
    }
  }

  //$nameErr = $emailErr = $passErr = $catErr = $memErr = "";

  //Get Create Account Result
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['create'])) {
      // change function to the designated function of your assign management
      // also correct each string of the sql with your form
      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        message("Invalid format and please re-enter valid email", "0");
      }

      $result = create_accountaction($connect, $_POST['name'], $_POST['email'], $_POST['email'], $_POST['pass'], $_POST['ucategory'], $_POST['au_member'], $_SESSION['id']);
      if ($result == 1) {
        message("Account created successfully!", 1);
      } else {
        message("Could not create Account!", 0);
      }
    }
  }

?>

<!-- Container for Add, Refresh and Reports button -->
<div class="container">
  <!-- Create Account Button -->
  <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create-project">
    <i class="fa fa-plus"></i>
  </button>
  <!-- Refresh Account Page -->
  <a href="./account.php"><button type="button" class="btn btn-outline-primary btn-sm">
      <i class="fa fa-refresh" aria-hidden="true"></i>
    </button>
  </a>
  <a href="../account/report/subscribe_report.php"><button type="button" class="btn btn-outline-primary btn-sm" style="float: right;"><i class="fa fa-report" aria-hidden="true">Report for Accounts</i></button></a>


  <br />
  <br />

  <!-- Create New Account -->

  <div class="modal fade" id="create-project" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="create-project-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
        <!-- change action location to your management -->
        <form method="post" action="./account.php" enctype="multipart/form-data" class="needs-validation" novalidate>
          <div class="modal-header">
            <h5 class="modal-title" id="create-project-label">Create Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- change the form add based on your designated management -->
            <div class="form-group">
              <label for="name">Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="name" name="name" required>
              <div class="invalid-feedback">
                Please enter a name.
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="email" name="email" required>
              <div class="invalid-feedback">
                Please enter an email.
              </div>
            </div>
            <div class="form-group">
              <label for="pass">Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control" id="pass" name="pass" required></input>
              <div class="invalid-feedback">
                Please enter a password.
              </div>
            </div>

            <div class="form-group">
              <label for="passowrd">Category <span class="text-danger">*</span></label>
              <select class="browser-default custom-select" id="ucategory" class="form-control" name="ucategory" required>
                <option hidden selected disabled value="">Category</option>
                <option value="Student">Student</option>
                <option value="Administrator">Administrator</option>
              </select>
              <div class="invalid-feedback">
                Please select category
              </div>
            </div>

            <div class="form-group">
              <label for="au_member">Subscription <span class="text-danger">*</span></label>
              <select class="browser-default custom-select" id="au_member" class="form-control" name="au_member" required>
                <option hidden selected disabled value="">Subscribe in research portal?</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
              <div class="invalid-feedback">
                Please select subscription status
              </div>
            </div>
          </div>

          <div class="ml-3">
            <p>All fields with <span class="text-danger">*</span> marked are mandatory</p>
          </div>

          <input type="hidden" name="create" value="create" />
          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Save</button>
            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
      </div>
      </form>
    </div>
  </div>

  <!--Account Table-->
  <div class="table-responsive-lg">
    <!-- change table id based on your managemnet -->
    <table id="research" class="table table-hover">
      <thead>
        <tr>
          <th scope="col" class="d-none">Default Sort Fixer</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Category</th>
          <th scope="col">Subscription</th>
          <th scope="col" align="center">Option</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $result = get_users($connect);
        if ($result->num_rows > 0) {
          while ($data = mysqli_fetch_array($result)) {
        ?>
            <tr>
              <td class="d-none"></td>
              <td><?php echo $data['name'] ?></a></td>
              <td><?php echo $data['username'] ?></a></td>
              <td><?php echo $data['ucategory'] ?></td>
              <td><?php echo $data['subcribe'] ?></td>
              
              <!--Option Button-->
              <td align="center">
                <div class="dropdown">
                  <button class="btn btn-light btn-sm" type="button" id="option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-ellipsis-h"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="option">
                    <a class="dropdown-item" href="./api/action.php?edit=<?php echo $data['id'] ?>">Edit</a>
                    <?php
                      $status = $data['status'];
                      if ($status == "Active") {
                        // $stat1="Deactivate";
                        if ($_SESSION['role'] == "Administrator") { ?>
                          <a class="dropdown-item" href="#<?php echo $data['id']; ?>" data-toggle="modal" data-target="#deactivate-<?php echo $data['id']; ?>">Deactivate</a>
  					            <?php }
                      } 
  					          elseif ($status == "Inactive") {
                        // $stat1 = "Activate";
                        if ($_SESSION['role'] == "Administrator") {?>
  								        <a class="dropdown-item" href="#<?php echo $data['id']; ?>" data-toggle="modal" data-target="#activate-<?php echo $data['id'];?>">Activate</a>
  							        <?php }
                      }
                      $id = $data['id'];?>
                    <?php
                    $status = $data['subcribe'];
                    if ($status == "Yes") {
                      // $stat1="Deactivate";
                      if ($_SESSION['role'] == "Administrator") { ?>
						            <a class="dropdown-item" href="#<?php echo $data['id']; ?>" data-toggle="modal" data-target="#unsubscribe-<?php echo $data['id']; ?>">Unsubscribe</a>
						          <?php }
                    } 
                    elseif ($status == "No") {
                      // $stat1 = "Activate";
                      if ($_SESSION['role'] == "Administrator") { ?>
                        <a class="dropdown-item" href="#<?php echo $data['id']; ?>" data-toggle="modal" data-target="#subscribe-<?php echo $data['id']; ?>">Subscribe</a>
                      <?php }
                    } elseif ($status == "") {
                      if ($_SESSION['role'] == "Administrator") { ?>
                        <a class="dropdown-item" href="#<?php echo $data['id']; ?>" data-toggle="modal" data-target="#subscribe-<?php echo $data['id']; ?>">Subscribe</a>
                      <?php }
                    }
                    $id = $data['id'];?>
                    <?php if ($_SESSION['role'] == "Administrator") { ?><a class="dropdown-item" href="#<?php echo $data['id']; ?>" data-toggle="modal" data-target="#delete-<?php echo $data['id']; ?>">Delete</a><?php } ?>
                  </div>
                </div>
              </td>
            </tr>

            <!-- Delete Popup -->
            <div style="margin-top: 200px;width: 30%;margin-left: 35%;margin-right: 35%;" class="modal fade" id="delete-<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteLabel">Delete Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to delete?
                  </div>
                  <div class="modal-footer">
                    <a href="?del=<?php echo $data['id'];?>"><button class="btn btn-success" type="submit">Save</button></a>
                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Activate Popup -->
            <div style="margin-top: 200px;width: 30%;margin-left: 35%;margin-right: 35%;" class="modal fade" id="activate-<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="activateLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="activateLabel">Activate Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to Activate?
                  </div>
                  <div class="modal-footer">
                    <a href="?activate=<?php echo $data['id'];?>"><button class="btn btn-success" type="submit">Save</button></a>
                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Deactivate Popup -->
            <div style="margin-top: 200px;width: 30%;margin-left: 35%;margin-right: 35%;" class="modal fade" id="deactivate-<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deactivateLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deactivateLabel">Activate Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to Deactivate?
                  </div>
                  <div class="modal-footer">
                    <a href="?deactivate=<?php echo $data['id'];?>"><button class="btn btn-success" type="submit">Save</button></a>
                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Subscribe Popup -->
            <div style="margin-top: 200px;width: 30%;margin-left: 35%;margin-right: 35%;" class="modal fade" id="subscribe-<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="subscribeLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="subscribeLabel">Subscribe Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to Subscribe?
                  </div>
                  <div class="modal-footer">
                    <a href="?subscribe=<?php echo $data['id'];?>"><button class="btn btn-success" type="submit">Save</button></a>
                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Unsubscribe Popup -->
            <div style="margin-top: 200px;width: 30%;margin-left: 35%;margin-right: 35%;" class="modal fade" id="unsubscribe-<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="unsubscribeLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="unsubscribeLabel">Subscribe Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to Unsubscribe?
                  </div>
                  <div class="modal-footer">
                    <a href="?unsubscribe=<?php echo $data['id'];?>"><button class="btn btn-success" type="submit">Save</button></a>
                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>

<script src="../resource/assets/datatables.min.js"></script>
<script>
  $(function() {
    //  change id with the id of the table
    $('#research').DataTable();
    $(function() {
      var table = $('#example').DataTable({
        "columnDefs": [{
          "visible": false,
          "targets": 2
        }],
        "ordering": false,
        "displayLength": 5,
        "drawCallback": function(settings) {
          var api = this.api();
          var rows = api.rows({
            page: 'current'
          }).nodes();
          var last = null;
          api.column(2, {
            page: 'current'
          }).data().each(function(group, i) {
            if (last !== group) {
              $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
              last = group;
            }
          });
        }
      });
      // Order by the grouping
      $('#example tbody').on('click', 'tr.group', function() {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
          table.order([2, 'desc']).draw();
        } else {
          table.order([2, 'asc']).draw();
        }
      });
    });
  });
  $('#example23').DataTable({
    dom: 'Bfrtip',
    buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
  $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

  //Timer for message
  $('.alert').delay(3000).fadeOut('slow',function() { $(this).remove(); });
</script>