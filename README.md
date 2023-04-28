# IT490-RabbitMQ 
## Inital Project: January - May 2018

Setup RabbitMQ onto Ubuntu Linux

[STEP: 1]
Ensure that the following packages are installed follow configuration 

THE sudo commands are all performed in the terminal:
``` bash
sudo apt-get install neovim
sudo apt-get install aptitude
sudo apt-get install php7.0 
sudo apt-get install apache2 libapache2-mod-php7.0
sudo apt-get install git
sudo apt-get install mysql-server
sudo apt-get install rabbitmq-server
```
### The scripts from the professor's GITHUB
git clone https://github.com/EngineerOfLies/rabbitmqphp_example

``` bash
sudo apt-get install syslog-ng-core
sudo apt-get install syslog-ng-mod-amqp
sudo rabbitmq-plugins enable rabbitmq_management
sudo service rabbitmq-server (start or stop or restart) 
sudo apt-get install php7.0-mbstring
sudo apt-get install php-amqp
```
### Adjustment to be made in:
```bash
sudo vim /etc/php/7.0/cli/apache2/php.ini
-->Include the statement around line 877: extension = amqp.so
```

### To enable AMQP
``` bash
cd /etc/php/7.0/cli/conf.d
sudo ln -s /etc/php/mods-available/amqp.ini
```

### OPEN an internet browser
```	
	** INITIAL RabbitMQ access is LOCALHOST SERVICE ONLY!! while in guest mode **

	Open a browser, in dialog box type "localhost:15672"
		Rabbitmq login page username = guest login = guest
	[Admin] tab, this is where a new user or Virtual Host can be added.
```

[STEP: 2]

Download the IT490-RabbitMQ github files and change directory to  /var/www/html

Open a new browser tab and type into the url: localhost/index.html

Confirm that an Apache2 welcome page appears.

Back to terminal, rename or remove the index.html file that currently exist in /var/www/html directory.
```bash
mv index.html /var/www
or
rm index.html
```

Copy the downloaded from the Downloads directory.  Use sudo command to manipulate scripts and files in /var/ directory 
due to the fact that that is an authorized user capability.

Open a new browser tab and type into the url: localhost/blog.html

***>>Make the correct adjustment to the IP address & login info in the ->  vmdaj.ini
This will allow the user the ability to see transactions through RabbitMQ. 


Date modified: April 28, 2023

	
