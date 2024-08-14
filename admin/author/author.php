<?php
  include "inc/header.php";
  // include "../../resource/"
  if (empty($_SESSION['id'])) {
  // include ""
  }
?>
<!-- #Author Banner-->
<section id="intro" class="clearfix">
  <div class="container">
    <h3 style="color:#fff;">&nbsp;<b> Author Management </b></h3>
  </div>
</section>
          
<br>

<!-- Back End Code -->
<?php
  //Get Delete Result
  if (isset($_GET['del'])) {
    $del = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["del"]);  
    $del = (int)($del);

    $result = delete_authoraction($connect, $del);
    if ($result =="1") {
      message("Author deleted successfully!","1");
    }
  }

  if (isset($_GET['edit'])) {
    $result = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["edit"]);  
    $result = (int)($result);

    if ($result =="1") {
      message("Author updated successfully!","1");
    }
    if ($result =="2") {
      message("Author created successfully!","1");
    }
  }

  if (isset($_GET['add'])) {
    $result = preg_replace("/[^a-zA-Z0-9]/", "", $_GET["add"]);  
    $result = (int)($result);

    if ($result =="1") {
      message("Author created successfully!","1");
    }
  }

  //Get Create Result
  /*if ($_SERVER['REQUEST_METHOD'] =="POST") {
    if (isset($_POST['create'])) {
      foreach($_POST['fstudy'] as $fstudy) {
        $fstudy= implode(', ',$_POST['fstudy']);
      }
      $result = create_authoraction($connect,$_POST['name'],$_POST['prefix'],$_POST['email'],$_POST['profession'],$fstudy,$_POST['created']);
      if ($result == 1) {
        message("Author created successfully!",1);
      } else {
        message("Could not create Author!",0);
      }
    }
  }*/
?>

<div class="container">
  <!-- Create task button -->
  <!--button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#create-project">
    <i  class="fa fa-plus"></i>
  </button-->
  <a href="api/createauthor.php">
    <button type="button" class="btn btn-outline-primary btn-sm">
      <i  class="fa fa-plus"></i>
    </button>
  </a>
  <!-- Refresh Button-->
  <a href="./author.php">
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

  <!-- Modal New Author -->
  <!--div class="modal fade " id="create-project" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="create-project-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm w-50" role="document">
      <div class="modal-content">
        <form method="post" name="AddJournal" action="author.php" enctype="multipart/form-data" class="needs-validation" novalidate>      
          <div class="modal-header">
            <h5 class="modal-title" id="create-project-label">Create Author</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body ">
          <div class="form-group " >
            <div class="form-group">
              <label for="name" class="control-label">Author Name</label><span style="color:red;"> &#42;</span>
              <input type="text" class="form-control" id="name" name="name" placeholder="" required="required">
              <div class="invalid-feedback">
                Please enter a author name.
              </div>
            </div>
            <div class="form-group">
              <label class="label">Prefix (Optional)</label><br>
              <select class="custom-select" id="prefix" name="prefix" title="Choose...">
                <option hidden selected></option>
                <option>Dr.</option>
                <option>Prof.</option>
                <option>Mr.</option>
                <option>Ms.</option>
              </select>
            </div>
            <div class="form-group">
              <label for="email" class="control-label"> Email</label><span style="color:red;"> &#42;</span>
              <input type="text" class="form-control" id="email" name="email" required="required">
              <div class="invalid-feedback">
                Please enter a email.
              </div>
            </div>        
            <div class="form-group">
              <label class="label">Profession <span style="color:red;"> &#42;</span></label><br>
              <select class="custom-select" id="profession" name="profession" title="Choose..." required>
                <option hidden selected></option>
                <option>Admin</option>
                <option>Professor</option>
                <option>Staff</option>
                <option>Student</option>
              </select>
              <div class="invalid-feedback">
                Please select a profession.
              </div>
            </div>
            <div class="form-group">
              <label for="fstudy">Field of Study</label><span style="color:red;"> &#42;</span>
              <select class="custom-select" data-live-search="true" data-mdb-filter="true" id="ftudy" name="fstudy[]" title="Choose..." value="" required>
                <option hidden selected></option>
                <option>English</option>
                <option>Political Science</option>
                <option>Psychology</option>
                <option>History</option>
                <option>Performing Arts</option>
                <option>Criminology</option>
                <option>Computer Science</option>
                <option>Business Administration</option>
                <option>Education</option>
                <option>Nursing</option>
                <option>Physical Theraphy</option>
                <option>Radiologic Technology</option>
                <option>Medical Technology</option>
                <option>Pharmacy</option>
                <option>Midwifery</option>
                <option>Hospitality Management</option>
                <option>Tourism Management</option>
              </select>
              <div class="invalid-feedback">
                Please select fields of study.
              </div>
            </div>    
          </div>

          <div class="ml-1">
            <p>All fields with <span class="text-danger">*</span> marked are mandatory</p>
          </div>

          <input type="hidden" name="created" value="<?php echo date("Y-m-d"); ?>"/>
          <input type="hidden" name="create" value="create"/>
         
          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Save</button>
            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>

        </div>
        </form>
      </div>
    </div>
  </div-->
   
  <!--Author Table-->
  <div class="table-responsive-lg">
    <table id="author" class="table table-hover">
      <thead>
        <tr>
          <th scope="col" class="d-none">Default Sort Fixer</th>
          <th scope="col">Full name</th>
          <th scope="col">Profession</th>
          <th scope="col">Field of Study</th>
          <th scope="col">Created</th>
          <th scope="col" align="center">Option</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $result = get_author($connect);
          if ($result->num_rows>0) {
            while ($data = mysqli_fetch_array($result)) {
              // include""
        ?>
        <tr>
          <!--search--><td class="d-none"></td>

          <!--Display data in table-->
          <td><a href="./api/action.php?id=<?php echo $data['id']?>"><?php echo $data['name']?></a></td>
          <td><?php echo $data['profession']?></td>
          <td><?php echo $data['fstudy']?></td>
          </td>
          <td><?php echo date("Y-m-d",strtotime($data['created']));?></td>

          <!-- Option button -->
          <td align="center">
            <div class="dropdown">
              <button class="btn btn-light btn-sm" type="button" id="option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-h"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="option">
                <a class="dropdown-item" href="./api/action.php?edit=<?php echo $data['id']?>">Edit</a>
                <?php if ($_SESSION['role']=="Administrator") {?><a class="dropdown-item" href="#<?php echo $data['id'];?>" data-toggle="modal" data-target="#delete-<?php echo $data['id'];?>">Delete</a><?php } ?>
              </div>
            </div>
          </td>
        </tr>

        <!-- Delete Popup -->
        <div style="margin-top: 200px;width: 30%;margin-left: 35%;margin-right: 35%;" class="modal fade" id="delete-<?php echo $data['id'];?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Delete Author</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete?
              </div>
              <div class="modal-footer">
                <a href="?del=<?php echo $data['id'];?>"><button class="btn btn-success" type="submit">Save</button></a>
                <button class="btn btn-danger" data-dismiss="modal" style="background-color: red; color: white;">Cancel</button>
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
<!--<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>-->
<script>
  $(document).ready(function() {
    $(".form-control").select2({
      tags: true
    });
  });
</script>
<script>
  $(function() {
    $('#author').DataTable();
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