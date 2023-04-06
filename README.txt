Below are the instructions on how to run this IP Lookup application on a standard Ubuntu system. 

1. Download all the files and folders and save them into your working directory. 
Then open a terminal inside your working directory, which is the folder where the index.php 
file is saved. 

2. Check if PHP 8.2 is installed on your Ubuntu system by using the following command: 
	php --version

3. If PHP 8.2 is not installed, please install it first by using the commands: 
	sudo apt update
	sudo apt install software-properties-common
	sudo add-apt-repository ppa:ondrej/php
	sudo apt install php8.2
    Once it is installed successfully: 
    -Use the command, "which php", to see where PHP is installed in the system.
    -Use the command, "php --version", to check the installed version. 

4. In the same terminal, type the following command, to start the PHP web server: 
	php -S localhost:4000 

5. Open up your web browser, and in the address bar, put in the following url to open the IP Lookup webpage: 
	http://localhost:4000/index.php 

6. Type in some IP addresses in the text area, then click the Lookup botton to
see the results. 

7. I also included few unit testing scripts using PHPUnit. To run the tests, first open a new terminal inside 
the working directory. Then run the followig three commands: 
	sudo add-apt-repository ppa:ondrej/php 
	sudo apt-get update
	sudo apt-get install php8.2-dom php8.2-xml php8.2-mbstring php8.2-common php8.2-xmlwriter 
After these packages are installed successfully, run the tests using the following command for testing: 
	php phpunit.phar tests 


4/6/2023
Qingfeng Cao

