Create table Artist (
Artist_ID     	char(8) not null,
Full_Name 	varchar(20),
Painting_Style	varchar(20),
primary key (Artist_ID));

Create table Seller (
Seller_Username	varchar(20) not null,		
F_name     		varchar(20),
L_name     		varchar(20),
Password 		varchar(15),
Status 			varchar(10),
Rating			numeric(1,0),
primary key (Seller_Username) );


Create table Buyer (
Buyer_Username	varchar(20) not null,
F_name     		varchar(20),
L_name     		varchar(20),
Password 		varchar(15),
Buyer_Class 		varchar(20),
Status 			varchar(10),
primary key (Buyer_Username) );

Create table Administrator (
Admin_Username		varchar (20) not null,
Password			varchar (15) not null,
primary key(Admin_Username)
);

Create table Feedback (
Feedback_ID 		char(8) not null,
Seller_Username   	varchar(20), 
Artwork_ID 		char(8),
Buyer_Username     	varchar(20),
Rating 			numeric(1,0),
Feedback 		varchar(200),
primary key (Feedback_ID), 
foreign key (Seller_Username) references Seller
on delete cascade
on update cascade,
foreign key (Buyer_Username) references Buyer
on delete cascade
on update cascade,
foreign key (Artwork_ID) references Artwork
on delete cascade
on update cascade
);

Create table Orders (
Order_ID 			char (8) not null, 
Buyer_Username 		varchar (20),
Artwork_ID			char (8),
Seller_Username		varchar (20),
Date_and_time		timestamp,	
Payment_Method		varchar (10),
primary key (Order_ID),	
foreign key (Artwork_ID) references Artwork
on delete cascade
on update cascade,
foreign key (Seller_Username) references Seller
on delete cascade
on update cascade,
foreign key (Buyer_Username) references Buyer
on delete cascade
on update cascade
);

Create table Auction (
Auction_ID 			char (8) not null,
Artwork_ID			char (8),
Seller_Username		varchar (20),
Highest_Bid_ID		char (8),
Creation			date,
Deadline			timestamp,
Starting_Price			numeric (8,2),
primary key (Auction_ID),
foreign key (Artwork_ID) references Artwork
on delete cascade
on update cascade,		
foreign key (Seller_Username) references Seller
on delete cascade
on update cascade
);

Create table Bid (
Bid_ID				char (8) not null,
Buyer_Username		varchar (20),
Timestamp			timestamp,
Amount			numeric (8,2),
Auction_ID			char (8),
primary key (Bid_ID),
foreign key (Auction_ID) references Auction
on delete cascade
on update cascade,
foreign key (Buyer_Username) references Buyer
	on delete cascade
on update cascade);	

Create table Artwork (
Artwork_ID 			varchar (8) not null,
Seller_Username		varchar (2), 
Artist_ID			varchar (8),
Price				numeric (8,2),
Description 			varchar (200),
Year				char (4),
Status				varchar (10),
Painting_Style			varchar (20),
primary key (Artwork_ID),
foreign key (Seller_Username) references Seller
on delete cascade
on update cascade,
foreign key (Artwork_ID) references Feedback   
on delete cascade
on update cascade,
foreign key (Artwork_ID) references Orders
on delete cascade
on update cascade,
foreign key (Artist_ID) references Artists
on delete cascade
on update cascade
);