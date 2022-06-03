 <?php 
	function return_back(){
		header("Location: admin.php?message=you need to login again");
	}

  ?><!DOCTYPE html>
 <html>
 <head>
 	<title>Index</title>
 </head>
 <body>
 <header width="150px">
 	<h1>Widget corp</h1>
 </header>
 <style type="text/css">
 	h1{
 		/*background-color: blue;*/
 		/*font-style: bold;*/
 	}

 </style>
 <style type="text/css">
 	header{
 		background-color: blue;
	    margin-top: -25px;
	    width: 100%;
	    height: 61px;
	    margin-left: -8px;
	    margin-right: -8px;
	    color: white;
 	}
 	#heading{
 		color: #ffffff;
	    font-size: 2.4em;
	    width: 353px;
	    margin-block-start: 0em;
	    margin-block-end: 0em;
	    margin-inline-start: 0px;
	    margin-inline-end: 0px;
	    padding-left: 45px;
	    font-weight: bold;
	    padding-top: 8px;

 	}
 	.main{
 		display: flex;
	    width: inherit;
	    height: 513px;

 	}
 	.sidebar{
 		margin-bottom: 0px;
	    height: 109vh;
	    width: 258px;
	    margin-left: -8px;
	    background-color: maroon;
	   	color: black;

 	}
 	.main_content{
	    background-color: #ffffcc;
	    margin-right: -8px;
	    width: 100%;
 	}
 	a{
 		color: #9966ff;
 	}
 </style>