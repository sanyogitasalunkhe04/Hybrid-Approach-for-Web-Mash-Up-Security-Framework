<?php 
session_start();
require_once('../../configuration.php');
if(isset($_SESSION['user']) && isset($_SESSION['user_id']))
{
?>
<html>
<head>
	<title>News</title>
	<?php
	     require_once(LIB.'db.php');
	     include_once(LAYOUT.'stylesheet.php');
	     include_once(LAYOUT.'javascript.php');
	?>
</head>
<body style="background-color: #222; color: #ffffff;">
	    <div class="container-fluid">
    		<div class="row-fluid">
				<?php include_once(LAYOUT.'header.php'); ?>
			</div>

			<div class="row-fluid"  style="width: 960px; margin: 0px auto;">
				<div class="span12" style="border-bottom: 1px solid #FF9900;"><h4>News</h4></div>
			</div>
			<div class="row-fluid"  style="width: 960px; margin: 0px auto; color:black">
				<center style="margin-top: 50px;">
					<input type="text" name="news_search" style="height: 35px;" class="news_search input-xxlarge" placeholder="Search for news"/>
					<br/>
					<input type="button" class="search btn btn-primary" value="Search" />
				</center>
			</div>
			<div class="row-fluid news_box"  style="width: 960px; margin: 0px auto; color:#ffffff;">			
			</div>
			</div>
		<div class="row-fluid">
			<!-- footer section -->
			<div class="span12">
				<?php include_once(LAYOUT.'footer.php'); ?>
			</div>
		</div>
    	<script type="text/javascript">
			$(document).ready(function(){
				// news script
				$(".search").live("click", function(){
				var $query_string = $(".news_search").val();
				 $.ajax({    
			    		url: '<?php echo DOMAIN."/user_panel/news/get_news.php"; ?>',
			    		type:'GET',
			    		dataType: 'json',
			    		data: {
				    		q: $query_string
			    		},
			    		success: function(data) {
							if(data == "" || data == null)
							{
								$(".news_box").html("");
							}
							else	
							{
								//data = jQuery.parseJSON(data);
								$(".news_box").html("");
								$.each(data, function(i, field){
									if(field['results'] != "" || field['results'] != null)
									{
										$.each(field['results'], function(j, news){
											$(".news_box").append("<div>");
											$(".news_box").append("<h3>"+news['title']+"</h3>");
											$(".news_box").append(news['content']);
											$(".news_box").append("<a href="+news['unescapedUrl']+" target='_blank'>Read more</a>");
											$(".news_box").append("<span class='pull-right'>"+news['publisher']+"</span><br/>");
											$(".news_box").append("<span class='pull-right'>"+news['publishedDate']+"</span>");
											$(".news_box").append("</div>");
										});
									}
									else
									{
										$(".news_box").append("No data found");
									}
								});
							}
					    }
				 });
				});
			});
		</script>    
	</body>
</html>
<?php
}
else
{
	header("Location:".DOMAIN."/user_panel/index.php");	
}
?>
