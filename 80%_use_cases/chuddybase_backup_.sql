

CREATE TABLE `administrator` (
  `Admin_Username` varchar(20) NOT NULL,
  `Password` varchar(15) NOT NULL,
  PRIMARY KEY (`Admin_Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO administrator VALUES("ahmed","aqaq");
INSERT INTO administrator VALUES("farazu","dumdum");
INSERT INTO administrator VALUES("hamzu","nigger");
INSERT INTO administrator VALUES("dyass","hakka");
INSERT INTO administrator VALUES("noob14","saadimranrana");



CREATE TABLE `artist` (
  `Artist_ID` char(8) NOT NULL,
  `Full_Name` varchar(20) DEFAULT NULL,
  `Painting_Style` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Artist_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO artist VALUES("hdfghs","scfsgfg","asdf");
INSERT INTO artist VALUES("sadf","sdf","sdfa");
INSERT INTO artist VALUES("hhhh","scfsgfg","asdf");
INSERT INTO artist VALUES("asdas","asdasd","asdasd");



CREATE TABLE `artwork` (
  `Artwork_ID` varchar(8) NOT NULL,
  `Seller_Username` varchar(8) DEFAULT NULL,
  `Artist_ID` varchar(8) DEFAULT NULL,
  `Price` decimal(8,2) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Year` char(4) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `Painting_Style` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Artwork_ID`),
  KEY `Seller_Username` (`Seller_Username`),
  KEY `Artist_ID` (`Artist_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO artwork VALUES("a2","seller1","hdfghs","5.00","i like pieeeeeeeeeeee and this panting","2019","sold","stupid");
INSERT INTO artwork VALUES("a1","seller1","hdfghs","5.00","daduu khana shana ","1800","sold","stupid");



CREATE TABLE `auction` (
  `Auction_ID` char(8) NOT NULL,
  `Artwork_ID` char(8) DEFAULT NULL,
  `Seller_Username` varchar(20) DEFAULT NULL,
  `Highest_Bid_ID` char(8) DEFAULT NULL,
  `Creation` date DEFAULT NULL,
  `Deadline` timestamp NULL DEFAULT NULL,
  `Starting_Price` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`Auction_ID`),
  KEY `Artwork_ID` (`Artwork_ID`),
  KEY `Seller_Username` (`Seller_Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `bid` (
  `Bid_ID` char(8) NOT NULL,
  `Buyer_Username` varchar(20) DEFAULT NULL,
  `Timestamp` timestamp NULL DEFAULT NULL,
  `Amount` decimal(8,2) DEFAULT NULL,
  `Auction_ID` char(8) DEFAULT NULL,
  PRIMARY KEY (`Bid_ID`),
  KEY `Auction_ID` (`Auction_ID`),
  KEY `Buyer_Username` (`Buyer_Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `buyer` (
  `Buyer_Username` varchar(20) NOT NULL,
  `F_name` varchar(20) DEFAULT NULL,
  `L_name` varchar(20) DEFAULT NULL,
  `Password` varchar(15) DEFAULT NULL,
  `Buyer_Class` varchar(20) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Buyer_Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO buyer VALUES("JNK","scLJN","KJNK","JN","standard","Blocked");
INSERT INTO buyer VALUES("qqqq","Muhammad","Karim","x","premium","Active");
INSERT INTO buyer VALUES("tati@tootoo","hamza","shshs","alalal","premium","Active");
INSERT INTO buyer VALUES("hamza123","IEEE","Day","00000000","Premium","Active");
INSERT INTO buyer VALUES("faraz22","ahmed","ateeq","tatti","premium","Active");
INSERT INTO buyer VALUES("qqqq1111","qqqqq","11111","123&_?","Premium","Active");
INSERT INTO buyer VALUES("buyer1","faraz","karimia","pass1","Standard","Active");
INSERT INTO buyer VALUES("dadu","sadada","dada","dadi","Standard","Blocked");
INSERT INTO buyer VALUES("sdfsdf","sfdasdf","sadfs","sdfsd","Standard","Active");
INSERT INTO buyer VALUES("kjh","kjhk","hkj","sdfsdf","Premium","Active");
INSERT INTO buyer VALUES("tootoo","sdfsdf","sdfsdf","fff","Standard","Active");
INSERT INTO buyer VALUES("888","kljlkj","lkjlkj","888","Premium","Blocked");



CREATE TABLE `feedback` (
  `Feedback_ID` char(8) NOT NULL,
  `Seller_Username` varchar(20) DEFAULT NULL,
  `Artwork_ID` char(8) DEFAULT NULL,
  `Buyer_Username` varchar(20) DEFAULT NULL,
  `Rating` decimal(1,0) DEFAULT NULL,
  `Feedback` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Feedback_ID`),
  KEY `Seller_Username` (`Seller_Username`),
  KEY `Buyer_Username` (`Buyer_Username`),
  KEY `Artwork_ID` (`Artwork_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `orders` (
  `Order_ID` char(8) NOT NULL,
  `Buyer_Username` varchar(20) DEFAULT NULL,
  `Artwork_ID` char(8) DEFAULT NULL,
  `Seller_Username` varchar(20) DEFAULT NULL,
  `Date_and_time` timestamp NULL DEFAULT NULL,
  `Payment_Method` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Order_ID`),
  KEY `Artwork_ID` (`Artwork_ID`),
  KEY `Seller_Username` (`Seller_Username`),
  KEY `Buyer_Username` (`Buyer_Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO orders VALUES("1","buyer1","a1","seller1","2020-11-24 13:42:47","visa");
INSERT INTO orders VALUES("3","buyer1","a3","seller1","2015-10-15 19:05:41","paypal");
INSERT INTO orders VALUES("2","buyer1","a2","seller1","2019-10-15 19:05:41","paypal");



CREATE TABLE `seller` (
  `Seller_Username` varchar(20) NOT NULL,
  `F_name` varchar(20) DEFAULT NULL,
  `L_name` varchar(20) DEFAULT NULL,
  `Password` varchar(15) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `Rating` decimal(1,0) DEFAULT NULL,
  PRIMARY KEY (`Seller_Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO seller VALUES("dghdfgh","dfghfgh","fghfgh","fghfgh","fghfgh","0");
INSERT INTO seller VALUES("x@gamil","x","x","xxx","Standard","5");
INSERT INTO seller VALUES("ahmedateeq23@hmail","ahmed","ateeq","hamzanigger","Standard","5");
INSERT INTO seller VALUES("jnjn@gmal","a","jj","qqq","Standard","5");
INSERT INTO seller VALUES("q1q1","Faraz","Karim","niggea","Blocked","0");
INSERT INTO seller VALUES("ttt00","tttt","tttt","ttt","Active","0");
INSERT INTO seller VALUES("seller1","seller1","seller2","seller1","Active","0");
INSERT INTO seller VALUES("sdfsf","sdfs","sdfs","sdfs","Active","0");
INSERT INTO seller VALUES("qqq","qqq","qqq","qqq","Active","0");

