CREATE DATABASE sm;

CREATE TABLE invoice
(
    id   VARCHAR(15)    NOT NULL,
    cust_id VARCHAR(15) 	NOT NULL,
    amount float  NOT NULL,
    inv_date  	 DATE,
    payment_mode_id varchar(6)  NOT NULL,
    cashier_id varchar(15)  NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (payment_mode_id) REFERENCES payment(id)	ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY(cashier_id)REFERENCES employee(ssn)  ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (cust_id) REFERENCES customer(id)  ON DELETE SET NULL ON UPDATE CASCADE
 );
 
 alter table customer add constraint c1 foreign key(f_id)references feedback(id)on delete cascade 
 
 CREATE TABLE customer
 (
   id	 VARCHAR(15)	NOT NULL,
   name VARCHAR(30) 	NOT NULL,
   gender VARCHAR(20)    NOT NULL check (gender = 'female' or gender='male'),
   address	 VARCHAR(50),
   email	 VARCHAR(20),
   contact	 DOUBLE PRECISION,
   f_id VARCHAR(15)	NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(f_id)REFERENCES feedback(id)  ON DELETE SET NULL ON UPDATE CASCADE
 );
 CREATE TABLE feedback
 (
   id	VARCHAR(15)	NOT NULL,
   text	VARCHAR(50),
   rating	INT,
   PRIMARY KEY(id)
  );
 
 CREATE TABLE employee
 (
   ssn	VARCHAR(15) NOT NULL,
   name	VARCHAR(15)	NOT NULL,
   address 	VARCHAR(30),
   email	VARCHAR(20),
   dob	VARCHAR(15),
   age		INT,
   dno	INT NOT NULL DEFAULT 01,
   pass VARCHAR(20),
   salary  DECIMAL(10,2) ,
   contact	DOUBLE PRECISION,
   PRIMARY KEY(ssn)
 );
 CREATE TABLE department
 (
   dnumber	INT	NOT NULL,
   dname	VARCHAR(40)	NOT NULL,
   mgssn	VARCHAR(15) NULL,
   PRIMARY KEY(dnumber),
   FOREIGN KEY(mgssn)REFERENCES employee(ssn)  ON DELETE SET NULL ON UPDATE CASCADE
  );
  
   CREATE TABLE section
   (
     id	VARCHAR(15)	NOT NULL,
     name	VARCHAR(40),
     dno	INT,
     PRIMARY KEY(id),
     FOREIGN KEY(dno)REFERENCES department(dnumber)  ON DELETE SET NULL ON UPDATE CASCADE
   );
   
   CREATE TABLE product
  (
   id	VARCHAR(15)	NOT NULL,
   name	VARCHAR(20),
   cprice	DOUBLE PRECISION,
   sprice	DOUBLE PRECISION,
   sec_id	VARCHAR(16),
   PRIMARY KEY(id),
   FOREIGN KEY(sec_id)REFERENCES section(id)  ON DELETE SET NULL ON UPDATE CASCADE
   );
   
   CREATE TABLE payment
  (
    id	   VARCHAR(15)	NOT NULL,
    mode_of varchar(20)  NOT NULL, 
    off_id	   VARCHAR(15),
    PRIMARY KEY(id),
    FOREIGN KEY(off_id)REFERENCES offers(id)  ON DELETE SET NULL ON UPDATE CASCADE
   );
   
  CREATE TABLE offers
 (
   id	varchar(50)  NOT NULL,
   type varchar(50)  NOT NULL,
   percentage	int,
   sdate	DATE,
   edate 	DATE,
   PRIMARY KEY(id)
  );
    

INSERT INTO employee VALUES('ESM2019001','akash','hubli','akash@gmail.com','12/03/1992','27','01','akash123','30000','9924563401');
INSERT INTO employee VALUES('ESM2019002','prithvi','banshankari','prithvi@gmail.com','15/04/1988','31','02','prithvi123','50000','9942563402');
INSERT INTO employee VALUES('ESM2019003','rahul','jaipur','rahul@gmail.com','02/06/1990','29','04','rahul123','40000','9924123406');
INSERT INTO employee VALUES('ESM2019004','pradeep','hospete','pradeep@gmail.com','09/03/1992','27','03','pradeep123','30000','9924563404');
INSERT INTO employee VALUES('ESM2019005','ravi','yeshwanthpur','ravi@gmail.com','25/05/1992','27','04','ravi123','30000','9924564304');
INSERT INTO employee VALUES('ESM2019006','adithya','mumbai','adithya@gmail.com','31/10/1992','27','05','adithya123','30000','9934563409');
INSERT INTO employee VALUES('ESM2019007','laxman','banglore','laxman@gmail.com','01/01/1993','26','02','laxman','25000','9924463408');
INSERT INTO employee VALUES('ESM2019008','varun','katraguppe','varun@gmail.com','05/09/1990','29','01','varun123','27000','9924743408');
INSERT INTO employee VALUES('ESM2019009','gourish','mg road','gourish@gmail.com','01/06/1991','28','01','gourish123','29050','9924663408');
INSERT INTO employee VALUES('ESM2019010','nagaraj','gajendragada','nagaraj@gmail.com','03/04/1995','24','03','nagaraj123','29500','9975463408');
INSERT INTO employee VALUES('ESM2019011','prashanth','darwada','prashanth@gmail.com','08/08/1995','24','03','prashanth123','28000','9824463408');
INSERT INTO employee VALUES('ESM2019012','kiran','gadaga','kiran@gmail.com','15/06/1994','25','04','kiran123','30000','9924983408');
INSERT INTO employee VALUES('ESM2019013','rocky','delhi','rocky@gmail.com','31/01/1993','26','04','rocky123','35000','9924183408');
INSERT INTO employee VALUES('ESM2019014','nithesh','chanpatna','nithesh@gmail.com','25/02/1991','28','05','nithesh123','27000','9926193408');
INSERT INTO employee VALUES('ESM2019015','sachin','manglore','sachin@gmail.com','28/12/1991','26','05','sachin123','30000','9928863408');
INSERT INTO employee VALUES('ESM2019016','pavan','hydrabad','pavan@gmail.com','20/10/1994','25','06','pavan123','31000','9928863108');
INSERT INTO employee VALUES('ESM2019017','prabash','kolkata','prabhash@gmail.com','28/12/1990','29','06','prabash123','32000','9928863727');
INSERT INTO employee VALUES('ESM2019018','sanath','bupal','sanath@gmail.com','28/12/1991','28','02','sanath123','30900','9928874568');


INSERT INTO department VALUES('01','Grocery','ESM2019002');
INSERT INTO department VALUES('02','Men Fashion','ESM2019007');
INSERT INTO department VALUES('03','Dining & Serving','ESM2019002');
INSERT INTO department VALUES('04','Electronics','ESM2019007');
INSERT INTO department VALUES('05','Footwear','ESM2019002');
INSERT INTO department VALUES('06','Watches','ESM2019007');

INSERT INTO section VALUES('GR001','Fruits & Vegetables','01');
INSERT INTO section VALUES('GR002','Spices','01');
INSERT INTO section VALUES('GR003','Dry Fruits','01');
INSERT INTO section VALUES('GR004','Oils','01');
INSERT INTO section VALUES('GR005','Rice & Pulses','01');
INSERT INTO section VALUES('MF001','Men Shirts','02');
INSERT INTO section VALUES('MF002','Men Trousers','02');
INSERT INTO section VALUES('MF003','Men Innerwear','02');
INSERT INTO section VALUES('DN001','Soaps & Detergents','03');
INSERT INTO section VALUES('DN002','Coffee, Tea & Beverages','03');
INSERT INTO section VALUES('DN003','Fragrances','03');
INSERT INTO section VALUES('ELC001','Smartphones','04');
INSERT INTO section VALUES('ELC002','Tablets','04');
INSERT INTO section VALUES('ELC003','Laptop','04');
INSERT INTO section VALUES('ELC004','LED Television','04');
INSERT INTO section VALUES('ELC005','Speaker , Woofer & MP3 player','04');
INSERT INTO section VALUES('FW001','Men Footwear','05');
INSERT INTO section VALUES('FW002','Women Footwear','05');
INSERT INTO section VALUES('FW003','Kids Footwear','06');
INSERT INTO section VALUES('WAT001','Men Watches','06');
INSERT INTO section VALUES('WAT002','Women Watches','06');
INSERT INTO section VALUES('WAT003','Kids Watches','06');


INSERT INTO product VALUES('PI10001','Apple','270','300','GR001');
INSERT INTO product VALUES('PI10002','Banana','36','40','GR001');
INSERT INTO product VALUES('PI10003','Orange','180','200','GR001');
INSERT INTO product VALUES('PI10004','Potato','20','22','GR001');
INSERT INTO product VALUES('PI10011','turmeric','45','50','GR002');
INSERT INTO product VALUES('PI10012','chilli powder','36','40','GR002');
INSERT INTO product VALUES('PI10013','Salt','18','20','GR002');
INSERT INTO product VALUES('PI10014','Chicken Masala','36','40','GR002');
INSERT INTO product VALUES('PI10021','walnut','450','500','GR003');
INSERT INTO product VALUES('PI10022','cashew','360','400','GR003');
INSERT INTO product VALUES('PI10023','apricot','180','200','GR003');
INSERT INTO product VALUES('PI10024','coconut','36','40','GR003');
INSERT INTO product VALUES('PI10031','rice','90','100','GR004');
INSERT INTO product VALUES('PI10032','brown rice','72','80','GR004');
INSERT INTO product VALUES('PI10033','wheat','27','30','GR004');
INSERT INTO product VALUES('PI10034','Urad daal','108','120','GR004');
INSERT INTO product VALUES('PI10041','soyabean oil','90','100','GR005');
INSERT INTO product VALUES('PI10042','canola oil','135','150','GR005');
INSERT INTO product VALUES('PI10043','mustard oil','117','130','GR005');
INSERT INTO product VALUES('PI10044','sunflower oil','108','120','GR005');

INSERT INTO product VALUES('PI10111','shirt','1260','1400','MF001');
INSERT INTO product VALUES('PI10112','half sleeve','1170','1300','MF001');
INSERT INTO product VALUES('PI10113','t-shirt','1080','1200','MF001');
INSERT INTO product VALUES('PI10121','jeans','1260','1400','MF002');
INSERT INTO product VALUES('PI10122','trousers','1170','1300','MF002');
INSERT INTO product VALUES('PI10123','formal','1080','1200','MF002');
INSERT INTO product VALUES('PI10131','banyan','126','140','MF003');
INSERT INTO product VALUES('PI10132','underwear','225','250','MF003');
INSERT INTO product VALUES('PI10133','handkerchief','90','100','MF003');
INSERT INTO product VALUES('PI10134','socks','90','100','MF003');

INSERT INTO product VALUES('PI10081','body soap','36','40','DN001');
INSERT INTO product VALUES('PI10082','cloth soap','18','20','DN001');
INSERT INTO product VALUES('PI10083','detergent','117','130','DN001');
INSERT INTO product VALUES('PI10084','floor cleaner','54','60','DN001');
INSERT INTO product VALUES('PI10091','tea','36','40','DN002');
INSERT INTO product VALUES('PI10092','coffee','126','140','DN002');
INSERT INTO product VALUES('PI10093','Cappuccino','117','130','DN002');
INSERT INTO product VALUES('PI10094','leaf-tea','54','60','DN002');
INSERT INTO product VALUES('PI10101','perfume','360','400','DN003');
INSERT INTO product VALUES('PI10102','deodrant','126','140','DN003');
INSERT INTO product VALUES('PI10103','room freshner','117','130','DN003');

INSERT INTO product VALUES('PI10401','Android phone ','14450','15000','ELC001');
INSERT INTO product VALUES('PI10404','Android samsung','4450','5000','ELC001');
INSERT INTO product VALUES('PI10402','windows microsoft','7720','8000','ELC001');
INSERT INTO product VALUES('PI10403','IPHONE apple','38810','40000','ELC001');
INSERT INTO product VALUES('PI10411','Android tab MI','12550','13000','ELC002');
INSERT INTO product VALUES('PI10412','Android tab micromax','6450','7000','ELC002');
INSERT INTO product VALUES('PI10414','windows microsoft','9720','10000','ELC002');
INSERT INTO product VALUES('PI10413','ipad apple','48810', '50000','ELC002');
INSERT INTO product VALUES('PI10421','windows based Acer','42550','43000','ELC003');
INSERT INTO product VALUES('PI10422','windows based Dell','36450','37000','ELC003');
INSERT INTO product VALUES('PI10424','windows based lenovo','29720','30000','ELC003');
INSERT INTO product VALUES('PI10423','macbook apple','47810','50000','ELC003');
INSERT INTO product VALUES('PI10431','40 inch sony','32550','33100','ELC004');
INSERT INTO product VALUES('PI10432','32 inch panasonic','26450','27200','ELC004');
INSERT INTO product VALUES('PI10434','premium tv vu','39720','45000','ELC004');
INSERT INTO product VALUES('PI10433','32 inch samsung','38810','42300','ELC004');
INSERT INTO product VALUES('PI10441','home theatre','22550','23100','ELC005');
INSERT INTO product VALUES('PI10442','bluetooth speaker','1450','1300','ELC005');
INSERT INTO product VALUES('PI10444','soundbars','19720','21000','ELC005');
INSERT INTO product VALUES('PI10443','ipods','18810','19300','ELC005');

INSERT INTO product VALUES('PI10201','Sneakers Levis','1350','1500','FW001');
INSERT INTO product VALUES('PI10202','Loafers Nike','1125','1500','FW001');
INSERT INTO product VALUES('PI10203','Cshoes Reebok','1800','2000','FW001');
INSERT INTO product VALUES('PI10204','Fshoes Columbus','2700','3000','FW001');
INSERT INTO product VALUES('PI10205','Flip-flops Puma','225','300','FW001');
INSERT INTO product VALUES('PI10206','Floaters Adidas','900','1200','FW001');
INSERT INTO product VALUES('PI10211','Wedges Lavie','3150','3500','FW002');
INSERT INTO product VALUES('PI10212','Heels Catwalk','2250','2500','FW002');
INSERT INTO product VALUES('PI10213','C#Shoes Reebok','1620','1800','FW002');
INSERT INTO product VALUES('PI10214','Ballerians Bata','1350','1500','FW002');
INSERT INTO product VALUES('PI10215','Flip-flops Action','150','200','FW002');
INSERT INTO product VALUES('PI10216','Floaters Sparx','900','1200','FW002');
INSERT INTO product VALUES('PI10221','Sandals Puma','720','800','FW003');
INSERT INTO product VALUES('PI10222','Shoes Action-campus','900','1000','FW003');
INSERT INTO product VALUES('PI10223','Flip-flops Bata','180','200','FW003');

INSERT INTO product VALUES('PI10301','Digital','4250','5000','WAT001');
INSERT INTO product VALUES('PI10302','Analogue','2550','3000','WAT001');
INSERT INTO product VALUES('PI10303','Analogue','1350','1500','WAT001');
INSERT INTO product VALUES('PI10304','Analogue','3400','4000','WAT001');
INSERT INTO product VALUES('PI10305','Digital','1500','2000','WAT001');
INSERT INTO product VALUES('PI10311','Digital','2250','2500','WAT002');
INSERT INTO product VALUES('PI10312','Analogue','1800','2000','WAT002');
INSERT INTO product VALUES('PI10313','Analogue','3750','5000','WAT002');
INSERT INTO product VALUES('PI10314','Analogue','1530','1800','WAT002');
INSERT INTO product VALUES('PI10321','Digital','1080','1200','WAT003');
INSERT INTO product VALUES('PI10322','Analogue','950','1000','WAT003');
INSERT INTO product VALUES('PI10323','Digital','1350','1500','WAT003');

INSERT INTO payment VALUES('PAY001','Cash','CASH10');]
INSERT INTO payment VALUES('PAY002','Credit card','CREDIT5');
INSERT INTO payment VALUES('PAY003','Debit card','DEBIT5');
INSERT INTO payment VALUES('PAY004','Paytm','PAYTM8');

INSERT INTO offers VALUES('OFF10','Discount','10','2018-01-01','2019-03-31');
INSERT INTO offers VALUES('SUMMER25','Summer offer','25','2018-03-05','2018-05-28');
INSERT INTO offers VALUES('WINTER20','Winter offer','20','2018-11-01','2019-07-28');
INSERT INTO offers VALUES('SUMMER5','Summer offer','5','2018-03-01','2018-06-28');
INSERT INTO offers VALUES('WINTER5','Winter offer','5','2018-11-01','2019-02-28');
INSERT INTO offers VALUES('KHUSIWALIDIWALI','Diwali offer','15','2018-10-01','2019-10-20');
INSERT INTO offers VALUES('RANGBHARIHOLI','Holi offer','15','2019-03-01','2019-03-20');
INSERT INTO offers VALUES('CASH10','Cash payment offer','10','2018-01-01','2019-03-31');
INSERT INTO offers VALUES('CREDIT5','Credit card offer','5','2018-01-01','2019-03-31');
INSERT INTO offers VALUES('DEBIT5','Debit card offer','5','2018-01-01','2019-04-30');
INSERT INTO offers VALUES('PAYTM8','Paytm offer','8','2018-01-01','2019-04-30');

INSERT INTO customer VALUES('CTM00001','mahesh','male','hasana','mahesh@gmail.com','9654824576','RV002');
INSERT INTO customer VALUES('CTM00019','rakesh','male','kundgol','rakesh@gmail.com','9654897776','RV005');
INSERT INTO customer VALUES('CTM00039','jayesh','male','hubli','jayesh@gmail.com','9654822638','RV001');
INSERT INTO customer VALUES('CTM00037','manoj','male','hanuman nagar','manoj@gmail.com','965489846','RV006');
INSERT INTO customer VALUES('CTM00014','vijay','male','banglore','vijay@gmail.com','9654821791','RV003');
INSERT INTO customer VALUES('CTM00015','shreya goshal','female','jaipur','shreya@gmail.com','9654828120','RV004');
INSERT INTO customer VALUES('CTM00012','aishani','female','manglore','aishani@gmail.com','9654824001','RV002');

INSERT INTO feedback VALUES('RV001','Pears has expired','2');
INSERT INTO feedback VALUES('RV002','Quality is not good','3');
INSERT INTO feedback VALUES('RV003','vegetable is bad','2');
INSERT INTO feedback VALUES('RV004','Sony speakers is fake','1');
INSERT INTO feedback VALUES('RV005','Nice shoes!','4');
INSERT INTO feedback VALUES('RV006','good mobile with less cost','4');

INSERT into InvoiceDetails values('AAA001','CTM00001','5000.223','2017-04-01','PAY001','EMP2001');
INSERT into InvoiceDetails values('AAA002','CTM00019','455000.11','2017-04-01','PAY002','EMP2003');
INSERT into InvoiceDetails values('AAA003','CTM00014','9865.22','2017-04-01','PAY003','EMP2004');
INSERT into InvoiceDetails values('AAB001','CTM00037','8000.25','2015-03-05','PAY004','EMP2002');
INSERT into InvoiceDetails values('AAB002','CTM00014','56666.22','2014-03-05','PAY001','EMP2005');
INSERT into InvoiceDetails values('AAH001','CTM00016','7889.42','2014-02-15','PAY002','EMP2006');
INSERT into InvoiceDetails values('AAC001','CTM00037','9999.88','2017-02-15','PAY003','EMP2005');
INSERT into InvoiceDetails values('AAC002','CTM00015','7852.88','2017-02-15','PAY003','EMP2005');
INSERT into InvoiceDetails values('AAD001','CTM00012','400.88','2017-01-15','PAY001','EMP2002');
INSERT into InvoiceDetails values('AAD002','CTM00012','52224.88','2017-01-15','PAY002','EMP2001');

INSERT into invoice values('AAE001','CTM00012','488.88','2018-12-30','PAY001','ESM2019006');
INSERT into invoice values('AAE002','CTM00039','300.88','2018-12-30','PAY004','ESM2019006');
INSERT into invoice values('AAF002','CTM00012','52224.88','2017-01-15','PAY002','ESM2019006');
INSERT into invoice values('AAG001','CTM00037','488.88','2018-03-30','PAY001','ESM2019006');
INSERT into invoice values('AAG002','CTM00015','3000.88','2018-04-30','PAY004','ESM2019005');
INSERT into invoice values('AAK001','CTM00015','78289.42','2016-02-12','PAY002','ESM2019005');
INSERT into invoice values('AAK003','CTM00019','4000.88','2019-01-15','PAY001','ESM2019005');
INSERT into invoice values('AAL002','CTM00015','23224.88','2018-02-15','PAY002','ESM2019005');
INSERT into invoice values('AAL003','CTM00015','6655.88','2019-01-12','PAY003','ESM2019003');
INSERT into invoice values('AAM001','CTM00012','4880.88','2018-11-30','PAY001','ESM2019003');
INSERT into invoice values('AAM002','CTM00019','300.88','2018-11-30','PAY004','ESM2019003');
INSERT into invoice values('AAN003','CTM00015','66555.88','2018-01-15','PAY003','ESM2019003');
INSERT into invoice values('AAP001','CTM00039','4880.88','2017-04-30','PAY001','ESM2019003');



/*Queries*/

/* delete tuple in table*/
DELETE FROM employee WHERE id='ESM2019007';

/* Basic SQL Quries */
select dob,salary from employee  where name='prithvi' AND address='banshankari';

select dname,name,salary from employee AS E,department AS D where D.mgssn=E.id;   //declare alternative relation names E and S , called aliases or tuple variables

select * from employee;

SELECT ALL salary FROM employee;

SELECT DISTINCT salary FROM employee;

/* set theory
  UNION,EXCEPT(diff),INTERSECT
  ex: SELECT  


