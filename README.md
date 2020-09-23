WEBSTER is a social network website designed for sharing information 

The social network can be used to create facebook like posts.

It is made up of JS, PHP, and MySql to store all the data.

Xampp server is required to run the search engine

Schema for database for saving all the sites data.


DB_NAME = webster

------------------------------------------------------------------------------------------------

TABLE_NAME = users

1  id Primary 	   int(11)        PRIMARY(AI)
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