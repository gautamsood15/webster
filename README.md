# WEBSTER

WEBSTER is a social network website designed for sharing information 

The social network can be used to create facebook like posts.

It is made up of JS, PHP, and MySql to store all the data.

Xampp server is required to run the search engine

Schema for database for saving all the sites data is also included.


## List of external 3rd party CDN used --

1 bootstrap
2 jquery
3 bootbox
4 jcrop


## DB_NAME = webster

------------------------------------------------------------------------------------------------

### TABLE_NAME = users

1  id        	   int(11)        PRIMARY(AI)	<br>
2  first_name 	   varchar(25) 					<br>
3  last_name 	   varchar(25) 					<br>
4  username 	   varchar(100) 				<br>
5  email 	       varchar(100)					<br>
6  password 	   varchar(255) 				<br>
7  signup_date 	   date 						<br>
8  profile_pic 	   varchar(255) 				<br>
9  num_posts 	   int(11)						<br>
10 num_likes 	   int(11) 						<br>		
11 user_closed 	   varchar(3) 					<br>
12 friend_array    text 						<br>



### TABLE_NAME = likes


1	id 				int(11)			PRIMARY(AI)	<br>		
2	username		varchar(60)					<br>
3	post_id			int(11)						<br>





### TABLE_NAME = posts



1	id 				int(11)			 PRIMARY(AI)	<br>
2	body			text							<br>
3	added_by		varchar(60)						<br>
4	user_to			varchar(60)						<br>
5	date_added		datetime						<br>	
6	user_closed		varchar(3)						<br>
7	deleted			varchar(3)						<br>
8	likes			int(11)							<br>
9 	image 			varchar(500) 					<br>




### TABLE_NAME = comments


1 	id  	        int(11)           PRIMARY(AI)	<br>
2 	post_body 	    text							<br>
3 	posted_by 	    varchar(60) 					<br>
4 	posted_to 	    varchar(60) 					<br>
5 	date_added 	    datetime						<br>
6 	removed      	varchar(3)						<br>
7 	post_id 		int(11)							<br>

### TABLE_NAME = friend_requests


1 	id       		int(11) 			PRIMARY(AI) <br>
2 	user_to 		varchar(50)						<br>
3 	user_from 		varchar(50)						<br>


### TABLE_NAME = messages


1 	id Primary     	 int(11)            PRIMARY(AI) <br>
2 	user_to 	     varchar(50)					<br>
3 	user_from 	     varchar(50)					<br>	
4 	body 	         text							<br>
5 	date 	         datetime						<br>
6 	opened 			 varchar(3) 					<br>
7 	viewed 			 varchar(3)						<br>
8 	deleted 	     varchar(3)						<br>


### TABLE_NAME  = notifications


1 	id Primary 	     int(11) 			PRIMARY(AI)	<br>
2 	user_to 	     varchar(50) 					<br>
3 	user_from 	     varchar(50) 					<br>
4 	message 	     text 							<br>
5 	link 	         varchar(100)					<br> 	
6 	datetime 	     datetime 						<br>
7 	opened 	         varchar(3) 					<br>
8 	viewed 	         varchar(3) 					<br>



### TABLE_NAME = trends

1 	title 			 varchar(50)  					<br>
2 	hits 			 int(11)						<br>





