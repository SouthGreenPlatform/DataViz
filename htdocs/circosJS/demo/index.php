<!DOCTYPE html> 
<html>
<head>
  <title id="titleMeh"></title>
  <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/sandstone/bootstrap.min.css" rel="stylesheet" integrity="sha384-G3G7OsJCbOk1USkOY4RfeX1z27YaWrZ1YuaQ5tbuawed9IoreRDpWpTkZLXQfPm3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="//code.getmdl.io/1.3.0/material.deep_purple-pink.min.css">
  <script src='../dist/circos.js'></script>
  <script src='../dist/svg-pan-zoom.js'></script>
  <script src='../dist/spectrum.js'></script>
  <link rel='stylesheet' href='../dist/spectrum.css' />
  <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/4.5.0/d3.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/d3-queue/3.0.3/d3-queue.js'></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <style type="text/css">
    .dropdown-menu {

      width: 500px;
    }
    .dropdown-submenu {

      width: 500px;
    }
    #selectChr {
      width: 120px
    }
    .dropdown-submenu>.dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -6px;
      margin-left: -1px;
      -webkit-border-radius: 0 6px 6px 6px;
      -moz-border-radius: 0 6px 6px;
      border-radius: 0 6px 6px 6px;
    }

    .dropdown-submenu:hover>.dropdown-menu {
      display: block;
    }

    .dropdown-submenu>a:after {
      display: block;
      content: " ";
      float: right;
      width: 0;
      height: 0;
      border-color: transparent;
      border-style: solid;
      border-width: 5px 0 5px 5px;
      border-left-color: #ccc;
      margin-top: 5px;
      margin-right: -10px;
    }

    .dropdown-submenu:hover>a:after {
      border-left-color: #fff;
    }

    .dropdown-submenu.pull-left {
      float: none;
    }

    .dropdown-submenu.pull-left>.dropdown-menu {
      left: -100%;
      margin-left: 10px;
      -webkit-border-radius: 6px 0 6px 6px;
      -moz-border-radius: 6px 0 6px 6px;
      border-radius: 6px 0 6px 6px;
    }


    .cd-top.cd-is-visible {
      /* the button becomes visible */
      visibility: visible;
      opacity: 1;
    }
    .cd-top.cd-fade-out {
      /* if the user keeps scrolling down, the button is out of focus and becomes less visible */
      opacity: .5;
    }
  </style>
</head>


<body>
  <!--NAVBAR CONTAINER-->
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">General<b class="caret"></b></a>
            <ul class="dropdown-menu multi-level">
              <li>
                <div class="form-group">
                  <div class="form-group">
                    <label for="userUrl" class="col-lg-4 control-label">Url(optional) :</label>
                    <div class="col-lg-7">
                     <input id="userUrl" wrap="off" rows=4 class="form-control" placeholder="Insert URL"></input>
                   </div>
                   <div id="modalContent"></div>
                   <div id="urlFinal"></div>
                 </div>
                 <br>
                 <div class="form-group">
                   <label for="dataFieldAreaC" class="col-lg-4 control-label">Chromosome data*</label>
                   <div class="col-lg-7">
                    <textarea id="dataFieldAreaC" wrap="off" rows="5" class="form-control" placeholder="Insert values here"></textarea>
                    <span class="help-block">Each entry must be separated by carriage return :<br>
                      <b>chr0 length #color</b>
                      <br>
                      <b>chr1 length #color</b></span>
                    </div>
                  </div>

                  <button class="btn btn-primary col-lg-6 col-lg-offset-4" onclick="load_file(this.value)" id="newLoadDataC" value="C">Load Data</button>
                  <br>
                  <input class="btn btn-warning col-lg-6 col-lg-offset-4" type="file" style="display:none;" id="fileInputC">
                  <h5 id="parC" class=" col-lg-offset-5"></h5>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tracks <b class="caret"></b></a>
            <ul class="dropdown-menu multi-level" role="menu" id="tracks_content" aria-labelledby="dropdownMenu"> 
            <div>&nbsp&nbsp&nbsp&nbsp&nbsp<button class="btn btn-success btn-xs" onclick="addNewTrack()">Add new track</button>
            <button class="btn btn-danger btn-xs" onclick="removeAllTracks()">Remove all tracks</button>
            </div>   <!--Here goes data for the tracks -->     
            </ul>
          </li>

          <li id="chrselectli" style="display:none;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chromosome<b class="caret"></b></a>
            <ul class="dropdown-menu multi-level" role="menu" id="patateorange" aria-labelledby="dropdownMenu"> 
              <div class="form-group">
               <label for="dataFieldAreaC" class="col-lg-4 control-label">Chromosome select</label>
               <div class="col-lg-7">
                 <select multiple size="8" id="selectChr">
                 </select>
               </div>
             </div>
           </ul>
         </li>

       </ul>
       <div class="navbar-form navbar-left" role="search">
        <button class="btn btn-primary" id="newTrackButton">Add new track</button>
        <button class="btn btn-warning" onclick="load_test()" id="load_test">Load an example</button>
        <button class="btn btn-warning" onclick="load_mosaic()" id="load_test_stack">Load mosaic example</button>
        <button class="btn btn-danger" onclick="load_circos()" style="display:none;" id="loadCircos">(Re)Load Circos</button>
        <a id="download" class="btn btn-warning" onclick="generateSVG()">Download as svg</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <button class="btn btn-danger" style="display:none;" id="resetZoom"> Reset Zoom</button>
          <button href="#0" style="display:none;" class="btn-success cd-top">Back to Top</button>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
<!-- END OF NAVBARCONTAINER-->

    <!--Progress bar-->
<div id="bar" class="progress progress-striped" style="margin-top: 63px;">
  <div id="progBar" class="progress-bar" style="width: 0%; background-color: #3e3f3a;"></div>
</div>

    <!--color picker test-->
<!-- <div id="colorPicker" style="margin-top: 80px;">
  <input type='text' id="full"/>
</div> -->

<div style="display: none;" id="cat">
  <center><i><h5>Magic is happening</h5></i></center>
  <center><img src="../dist/cat.gif" /></center>
</div>
<div class="row">



  <!--Div qui se charge de l'affichage du circos-->
  <div class="circoscontainer col-lg-12" >
    <div id='lineChart'></div>

  </div>
  <script src='./holdtheline.js'></script>
  <?php
  if(isset($_FILES["data"]) && isset($_FILES["chromosome"])){
    $i = 0;
    $chromosomeData = json_encode(file_get_contents($_FILES["chromosome"]["tmp_name"]));
    echo "
    <script>
      var data  = {$chromosomeData};
      $('#dataFieldAreaC').text(data);
    </script>";
    foreach($_FILES["data"]["tmp_name"] as $key => $text_field){
      $capture_field_vals = json_encode(file_get_contents($text_field));
      $select = $_POST["select"][$i];
      echo "
      <script>
        var data  = {$capture_field_vals};
        var select = \"$select\";
        var i = $i;
        $('#newTrackButton').click();
        $('#selectType'+i).val(select).change();
        $('#dataFieldArea'+i).text(data);
      </script>";
      $i++;
    }
    echo "
    <script>remove()
      load_circos();
    </script>";
  }
  elseif(isset($_POST["data"]) && isset($_POST["chromosome"])){
    $i = 0;
    $chromosomeData = json_encode(file_get_contents($_POST["chromosome"]));
    echo "
    <script>
      var data  = {$chromosomeData};
      data = data.substring(0, data.length-1);
      $('#dataFieldAreaC').text(data);
    </script>";
    foreach($_POST["data"] as $key => $text_field){
      $capture_field_vals = json_encode(file_get_contents($text_field));
      $select = $_POST["select"][$i];
      echo "
      <script>
        var data  = {$capture_field_vals};
        var select = \"$select\";
        var i = $i;
        $('#newTrackButton').click();
        $('#selectType'+i).val(select).change();
        $('#dataFieldArea'+i).text(data);
      </script>";
      $i++;
    }
    echo "
    <script>
      load_circos();
    </script>";
  }
  ?>
</body>
</html>