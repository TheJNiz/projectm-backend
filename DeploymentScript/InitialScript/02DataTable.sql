INSERT INTO tblClient (ClientName, Password, DateCreated) 
 SELECT * FROM ( SELECT 'ProjectM',SHA1('Password123'),NOW()) AS TEMP
WHERE NOT EXISTS 
  (SELECT ClientName FROM tblClient WHERE ClientName='ProjectM');
  
INSERT INTO tblLoanType (Name) 
 SELECT * FROM ( SELECT 'Pinjaman Ansuran') AS TEMP
WHERE NOT EXISTS 
  (SELECT Name FROM tblLoanType WHERE Name='Pinjaman Ansuran');
  
  INSERT INTO tblLoanType (Name) 
 SELECT * FROM ( SELECT 'Pinjaman Jangka Pendek') AS TEMP
WHERE NOT EXISTS 
  (SELECT Name FROM tblLoanType WHERE Name='Pinjaman Jangka Pendek');
  
 INSERT INTO tblUserType (Name) 
 SELECT * FROM ( SELECT 'Super Admin') AS TEMP
WHERE NOT EXISTS 
  (SELECT Name FROM tblUserType WHERE Name='Super Admin');
  
   INSERT INTO tblUserType (Name) 
 SELECT * FROM ( SELECT 'Admin') AS TEMP
WHERE NOT EXISTS 
  (SELECT Name FROM tblUserType WHERE Name='Admin');
  
  INSERT INTO tblUser (UserName, Password,UserTypeID, DateCreated) 
 SELECT * FROM ( SELECT 'superadmin',SHA1('Password123'),1,NOW()) AS TEMP
WHERE NOT EXISTS 
  (SELECT UserName FROM tblUser WHERE UserName='superadmin');