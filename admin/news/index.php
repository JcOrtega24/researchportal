<?php
  include "inc/header.php";

  // include "../../resource/"
  if (empty($_SESSION['id'])) {
    header("Location: ../../login/login.php");
  }

  /*$sql = "SELECT * from tblnews";
    if ($result = mysqli_query($mysqli, $sql)) {
    $rowcount = mysqli_num_rows($result);
    }*/
?>

<section id="intro" class="clearfix">
  <div class="container">
    <h3 style="color:#fff;">&nbsp;<b> News & Events Management </b></h3>      
  </div>
</section>

<br>

<!-- Back End Code -->
<?php
  //Get Delete Result
  if (isset($_GET['del'])) {
    $del = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["del"]);  
    $del = (int)($del);

    $result = delete_newseventaction($connect, $del);
    if ($result =="1") {
      message("Data deleted successfully!","1");
    }
  }

  if (isset($_GET['edit'])) {
    $result = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["edit"]);  
    $result = (int)($result);

    if ($result =="1") {
      message("Data updated successfully!","1");
    }
  }

  if (isset($_GET['new'])) {
    $result = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["new"]);  
    $result = (int)($result);

    if ($result =="1") {
      message("Data created successfully!",1);
    }
  }

  //Get Create Result
  /*if ($_SERVER['REQUEST_METHOD'] =="POST") {
    if (isset($_POST['create'])) {
      $result = create_newseventaction($connect, $_POST['title'], $_POST['description'], $_POST['datepublish'], $_SESSION['id'], $_POST['date'], $_POST['time'], $_POST['type']);
      if ($result == 1) {
        message("Data created successfully!",1);
      } else {
        message("Could not create new Data!",0);
      }
    }
  }*/
?>

<div class="container">
  <!-- Create task button -->
  <a href="api/createaction.php">
    <button type="button" class="btn btn-outline-primary btn-sm">
      <i  class="fa fa-plus"></i>
    </button>
  </a>

  <!--button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create-project">
    <i class="fa fa-plus"></i>
  </button-->

  <!-- Refresh Button -->
  <a href="index.php">
    <button type="button" class="btn btn-outline-primary btn-sm">
      <i class="fa fa-refresh" aria-hidden="true"></i>
    </button>
  </a>

  <br>
  <br>

  <style>
    .btn-new {margin:0;height:40px;border: solid 1px #ccc;-webkit-box-shadow: none;}
    .btn-new:hover{-webkit-box-shadow: none;}
  </style>

  <!-- Create New News or Events-->
  <!--div class="modal fade" id="create-project" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="create-project-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
        <form method="post" name="AddNews" action="index.php" enctype="multipart/form-data" class="needs-validation" novalidate>
          <div class="modal-header">
            <h5 class="modal-title" id="create-project-label">Create News</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="form-group">
                <label for="author">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" required>
                <div class="invalid-feedback">
                  Please enter a title.
                </div>
              </div>            

              <div class="form-group">
                <label for="title">Description <span class="text-danger">*</span></label>
                <textarea type="text" class="form-control" rows="3" id="description" name="description" required></textarea>
                <div class="invalid-feedback">
                  Please enter a description.
                </div>
              </div>

              <div class="row">
                <div class="col">  
                  <div class="form-group">
                    <label>Type <span class="text-danger">*</span></label>
                    <select class="custom-select" id="type" name="type" title="Choose..." required>
                      <option hidden selected></option>
                      <option>News</option>
                      <option>Events</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select post type.
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label for="datepub">Date (Required if events)</label>
                    <input type="date" class="form-control" id="date" name="date">
                  </div>
                </div>

                <div class="col">  
                  <div class="form-group">
                    <label for="datepub">Time (Required if events)</label>
                    <input type="time" class="form-control" id="time" name="time">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="ml-3">
            <p>All fields with <span class="text-danger">*</span> marked are mandatory</p>
          </div>

          <input type="hidden" name="datepublish" value="<?php echo date("Y-m-d"); ?>"/>
          <input type="hidden" name="create" value="create" />
          <div class="modal-footer">
           <button class="btn btn-success" type="submit" style="background-color: #4CAF50; color: white;">Save</button>
            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div-->

  <!--Table-->
  <div class="table-responsive-lg">
    <!-- change table id based on your managemnet -->
    <table id="news" class="table table-hover">
      <thead>
        <tr>
          <th scope="col" class="d-none"></th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Date Published</th>
          <th scope="col">Author</th>
          <th scope="col">Type</th>
          <th scope="col" align="center">Option</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $result = get_news_events($connect);
          if ($result->num_rows > 0) {
            while ($data = mysqli_fetch_array($result)) {
        ?>
        <tr>
          <td class="d-none"></td>
          <td><?php echo $data['title'] ?></td>
          <td><?php echo $data['description'] ?></td>
          <td><?php echo $data['date_publish'] ?></td>
          <td>
            <?php
              $accountResult = get_account($connect);
              if ($accountResult -> num_rows > 0) 
              {
                while ($account = mysqli_fetch_array($accountResult)) 
                {
                  if($data['author'] == $account['id'])
                  {
                    echo $account['name'];
                  }
                }
              }
            ?>
          </td>
          <td><?php echo $data['type'] ?></td>
          <td align="center">
            <div class="dropdown">
              <button class="btn btn-light btn-sm" type="button" id="option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-h"> </i>
              </button>
              <div class="dropdown-menu" aria-labelledby="option">
                <a class="dropdown-item" href="./api/action.php?edit=<?php echo $data['id']?>">Edit</a>
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
                <h5 class="modal-title" id="deleteLabel">Delete Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete?
              </div>
              <div class="modal-footer">
                <a href="?del=<?php echo $data['id'];?>"><button type="button" class="btn btn-success">Yes</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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

<script src="../resource/assets/datatables.min.js"></script>
<link href="../resource/css/select2.min.css" rel="stylesheet" />
<script src="../resource/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $(".form-control").select2({
      tags: true
    });
  });
</script>

<script>
  $(function() {
    $('#news').DataTable();
    $(function() {
      var table = $('#example').DataTable({
        "columnDefs": [{
          "visible": false,
          "targets": 2
        }],
        "ordering": false,
        "displayLength": 25,
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