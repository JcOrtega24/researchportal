$(document).ready(function (e) {

   // Research
   $("#disabled-fullview-R").click(function () {
      alert("You must be Subscribe to View Fulltext")
   });
   
   // Register View
   // Research
   $('a.cls').click(function () {
      var id_r = $(this).attr('id');
      var view = $("#rView" + id_r).val();
      if(isNaN(view)) {
         var view = 00;
      }
      view = parseInt(view);
      view_r = view + 1;
      // alert("I viewed it " + view_r);
      $.ajax({
         url:"http://localhost/researchportal/search/view/citation.php",
         method:"POST",
         data:{view_r:view_r,id_r:id_r},
         success:function(data)
         {
            // alert("I viewed it "+data);
         }
        });
   });
   
   // Register View
   // Research
   $('#r-citing').click(function () {
      var logged_id = $("#cited_byR").attr("value");
      var id_r = $('h5.cls').attr('id');
      var cite = $("#Cite" + id_r).val();

      if(isNaN(cite)) {
         var cite = 0;
      } 
      cite = parseInt(cite);
      cite_r = cite + 1;
      $.ajax({
         url:"http://localhost/researchportal/search/view/citation.php",
         method:"POST",
         data:{cite_r:cite_r,id_r:id_r,logged_id:logged_id},
         success: function (data) {
            alert("Research Cited");
         },
      }); 
   });

   // Register Copied
    // Research
   // MLA
   /*$('#id-copy-cite-r1').click(function () {
      var copyTextarea = document.querySelector('#myInput');
      copyTextarea.select();
       try
       {
          var successful = document.execCommand('copy');
          var msg = successful ? 'successful' : 'unsuccessful';
          console.log('Copying text command was ' + msg);

          if (msg == "successful") {
            // alert("Cited1");
            //  alert($("#cited_byR").val());
             
            var logged_id = $("#cited_byR").attr("value");
            var id_r = $('h5.cls').attr('id');
            var cite = $("#Cite" + id_r).val();

                  if(isNaN(cite)) {
                     var cite = 0;
                  } 
                  cite = parseInt(cite);
                  cite_r = cite + 1;
                  $.ajax({
                     url:"http://localhost/researchportal/search/view/citation.php",
                     method:"POST",
                     data:{cite_r:cite_r,id_r:id_r,logged_id:logged_id},
                     success: function (data) {
                        alert("Research Cited");
                     },
                  });              
          }
       } catch (err){
         console.log('Oops, unable to copy');
        //  alert("Unable to copy citation ");
       } 
      return false;
   });
   // APA
   $('#id-copy-cite-r2').click(function () {
      var copyTextarea = document.querySelector('#myInput1');
      copyTextarea.select();
       try
       {
          var successful = document.execCommand('copy');
          var msg = successful ? 'successful' : 'unsuccessful';
          console.log('Copying text command was ' + msg);

          if (msg == "successful") {
            // alert("Cited1");
            //  alert($("#cited_byR").val());
             
            var logged_id = $("#cited_byR").attr("value");
            var id_r = $('h5.cls').attr('id');
            var cite = $("#Cite" + id_r).val();

                  if(isNaN(cite)) {
                     var cite = 0;
                  } 
                  cite = parseInt(cite);
                  cite_r = cite + 1;
                  $.ajax({
                     url:"http://localhost/researchportal/search/view/citation.php",
                     method:"POST",
                     data:{cite_r:cite_r,id_r:id_r,logged_id:logged_id},
                     success: function (data) {
                        alert("Research Cited");
                     },
                  });               
          }
       } catch (err){
         console.log('Oops, unable to copy');
        //  alert("Unable to copy citation ");
       } 
      return false;
   });*/
});