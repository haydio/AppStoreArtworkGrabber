<?php $search = $_POST['search']; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>AppStore Artwork Grabber</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="http:////netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="/bootstrap/img/favicon.ico">
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">
        <!-- CSS code from Bootply.com editor -->
        
        <style type="text/css">
            body {
  padding-top: 50px;
}

        </style>
    </head>
    
    <!-- HTML code from Bootply.com editor -->
    
    <body  >
        
        <div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">AppStore Artwork Grabber</a>
    </div>
    <div class="collapse navbar-collapse">
    </div><!--/.nav-collapse -->
  </div>
</div>

<div class="container">
  
  <div class="text-center">
    <h1>
    <form action="search.php" method="post"> 
<input name="search" type="text" value="<?php echo "$search"; ?>" size="25" /> 
<input type="submit" value="Search"/>
</form>
</h1>
    <p class="lead">
    
	<?php

if(!empty($_POST['search'])){

#$search=preg_replace("/ /","+",$search);
 
//We assign the values to their own variables and
//make sure they are a number with int()
$app_id = intval($variables[1]);

    $app_uri    = "http://itunes.apple.com/search?entity=software&term=" .str_replace(" ", "+", $search);
    $data       = file_get_contents ($app_uri);
    $json       = json_decode (trim($data));

$resultNumber = 0;

$resultCount = ($json->resultCount);


while ($i++ < $resultCount)
{

echo "<table width='100%' border='0'>

  <tr>
    <td width='59px'>";
    echo "<img src='";
    print($json->results[$resultNumber]->artworkUrl60);
echo "' width='57px' height='57px' />";
echo "</td>";
    echo "<td width='299'><a href='";
    print($json->results[$resultNumber]->trackViewUrl);
    echo "'>";
    print($json->results[$resultNumber]->trackName);
    echo "</a></td>";
    echo "<td width='200'><b><a href='";
    print($json->results[$resultNumber]->artworkUrl60);
    echo "' />Small icon download</a></b></td>";
    echo "<td width='200'><b><a href='";
    print($json->results[$resultNumber]->artworkUrl512);
    echo "' />Large icon download</a></b></td>";
  echo "</tr>";
echo "</table></br>";

$resultNumber++;
    
}

echo "
<!-- 
~~~~~~***~~~~Diagnostics~~~~***~~~~~~
	Search Term: $search
	Search URL: $app_uri
	Number of results: $resultCount
~~~~~~***~~~~Diagnostics~~~~***~~~~~~
-->";
}
?>    
	    
    </p>
  </div>
  
</div><!-- /.container -->
        
        <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


        <script type='text/javascript' src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>






        
        <!-- JavaScript jQuery code from Bootply.com editor  -->
        
        <script type='text/javascript'>
        
        $(document).ready(function() {
        
            
        
        });
        
        </script>
</body>
</html>