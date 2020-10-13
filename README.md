WEBSTER is a social network website designed for sharing information 

The social network can be used to create facebook like posts.

It is made up of JS, PHP, and MySql to store all the data.

Xampp server is required to run the search engine

Schema for database for saving all the sites data.


List of external 3 party CDN used --

1 bootstrap
2 jquery
3 bootbox
4 jcrop


DB_NAME = webster

------------------------------------------------------------------------------------------------

TABLE_NAME = users

1  id        	   int(11)        PRIMARY(AI)
2  first_name 	   varchar(25) 
3  last_name 	   varchar(25) 	
4  username 	   varchar(100) 
5  email 	       varchar(100)
6  password 	   varchar(255) 	
7  signup_date 	   date 		
8  profile_pic 	   varchar(255) 
9  num_posts 	   int(11)
10 num_likes 	   int(11) 			
11 user_closed 	   varchar(3) 	
12 friend_array    text 	



TABLE_NAME = likes


1	id 				int(11)			PRIMARY(AI)			
2	username		varchar(60)	
3	post_id			int(11)





TABLE_NAME = posts



1	id 				int(11)			PRIMARY(AI)
2	body			text	
3	added_by		varchar(60)	
4	user_to			varchar(60)	
5	date_added		datetime			
6	user_closed		varchar(3)	
7	deleted			varchar(3)		
8	likes			int(11)			




TABLE_NAME = comments


1 	id  	        int(11)                 PRIMARY(AI)
2 	post_body 	    text
3 	posted_by 	    varchar(60) 
4 	posted_to 	    varchar(60) 
5 	date_added 	    datetime
6 	removed      	varchar(3)
7 	post_id 		int(11)

TABLE_NAME = friend_requests


1 	id       		int(11) 			PRIMARY(AI)
2 	user_to 		varchar(50)
3 	user_from 		varchar(50)











