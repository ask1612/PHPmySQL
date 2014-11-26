	
	
		This is a tutorial Android PHP  sample project.	It demonstrates the interaction of Android app with a remote database. 
	The project built on the client-server technology. The client part is the Android app. The server part is a HTTP server that interacts with the database.  Accordingly, the project consists of two parts. One part of the project is an Android project, the second is a PHP project.
	 As the development environment was used NetBeans IDE 8.01.  Android application written in Java. The server application written on the PHP language. To test  the application was  used a standard Android emulator. The project was also tested on the emulator Genymotio 2.3.1 and on a real device Huawei 9500. As the server was used Apache 2.4.10 HTTP server /PHP 5.5.15/MySql 5.0.11.
	In this project I have used the MySQL Relational Database Management System (RDBMS) to create a database.To manage MySQL server was used the browser-based MySQL adminisration tools, phpMyAdin 4.2.7.1.Databases can be created using the script mytest.sql
	To connect to the HTTP server the Android app uses  an absolute URL http://192.168.1.2:7070/askJson/askjson_input.php.

	The client and server communicate using the JSON protocol.

	Here is presented the server  side. This is a PHP  app.
The client  part is represented in the project https://github.com/ask1612/AndroidPHP.git

	PHP project consists of 7 modules. Module askjson_config.php defines string constants used in the project. In module askjson_connect.php defined class DB_Connect to work with MySQL database. Module askjson_input.php is responsible for receiving information from the Android client. For sending http requests  the  Android application uses only the POST method. The same method is used on the server side. Information to the server arrives in the form of a JSON object consisting of two parts , the header <head> and data <data>. The <head> tag contains control information, such as information on the pressed button. The <data> contains the data, for example, the user name and password, and so on.  Because the information about the user pressed  button is in the <head>tag, module askjson_input.php reads out this information and depending on it, the control is passed to one of the three modules.  If the user Android  clicked    button <Register> the control passes to module askjson_register.php that is responsible for the registration process.  If the user  clicked    button <Login> the control passes to module askjson_login.php that is responsible for the user login process. If the user  clicked    button <save> the control passes to module askjson_save.php that is responsible for the  process of saving   person data. Module askjson_message.php designed for transmission of data and messages from the server to the client.

