Replication
-

*MySQL 5.5*

Depending on the configuration, you can replicate all databases, selected databases, or even selected tables within a database.
<br>Asynchronous replication - one server acts as the master, while one or more other servers act as slaves.
<br>Synchronous replication which is a characteristic of MySQL Cluster.
<br>There are two core types of replication format:
* Statement Based Replication (SBR) - which replicates entire SQL statements.
* Row Based Replication (RBR) - which replicates only the changed rows.

Replication between servers in MySQL is based on the binary logging mechanism. The information in the binary log is stored in different logging formats according to the database changes being recorded.

####Setting the Replication Master Configuration
You will need to shut down your MySQL server and edit the my.cnf or my.ini file (/etc/mysql/my.cnf):
````sql
[mysqld]
log-bin=mysql-bin
server-id=1
````
After making the changes, restart the server.
<br>For the greatest possible durability and consistency in a replication setup using InnoDB with transactions, you should use innodb_flush_log_at_trx_commit=1 and sync_binlog=1 in the master my.cnf file.

####Setting the Replication Slave Configuration
 You should shut down your slave server and edit the configuration to specify a unique server ID. For example:
````sql
[mysqld]
server-id=2
````
After making the changes, restart the server.
<br>You do not have to enable binary logging on the slave for replication to be enabled.

####Creating a User for Replication
Each slave must connect to the master using a MySQL user name and password.
````sql
CREATE USER 'repl'@'%.mydomain.com' IDENTIFIED BY 'slavepass';
GRANT REPLICATION SLAVE ON *.* TO 'repl'@'%.mydomain.com';
````

####Obtaining the Replication Master Binary Log Coordinates
Start a session on the master by connecting to it with the command-line client, and:
````sql
FLUSH TABLES WITH READ LOCK;
````
For InnoDB tables, note that FLUSH TABLES WITH READ LOCK also blocks COMMIT operations.
<br>If you exit the client, the lock is released.
<br>On the master:
````sql
SHOW MASTER STATUS;
+------------------+----------+--------------+------------------+
| File             | Position | Binlog_Do_DB | Binlog_Ignore_DB |
+------------------+----------+--------------+------------------+
| mysql-bin.000003 | 73       | test         | manual,mysql     |
+------------------+----------+--------------+------------------+
````

####Creating a Data Snapshot Using mysqldump
````sql
mysqldump --all-databases --master-data > dbdump.db
````

####Creating a Data Snapshot Using Raw Data Files
In a separate session, shut down the master server:
````sql
shell> mysqladmin shutdown
````
Make a copy of the MySQL data files, choose only one of them:
````sql
shell> tar cf /tmp/db.tar ./data
shell> zip -r /tmp/db.zip ./data
shell> rsync --recursive ./data /tmp/dbdata
````
Restart the master server. Copy the files to each slave before starting the slave replication process.

####Setting Up Replication with New Master and Slaves

####Setting Up Replication with Existing Data
````sql
START SLAVE;
````

####Introducing Additional Slaves to an Existing Replication Environment
Shut down the existing slave:
````sql
shell> mysqladmin shutdown
````
Copy the data directory from the existing slave to the new slave.

####Setting the Master Configuration on the Slave
Execute the following statement on the slave:
````sql
mysql> CHANGE MASTER TO
    MASTER_HOST='master_host_name',
    MASTER_USER='replication_user_name',
    MASTER_PASSWORD='replication_password',
    MASTER_LOG_FILE='recorded_log_file_name',
    MASTER_LOG_POS=recorded_log_position;
````




















http://dev.mysql.com/doc/refman/5.5/en/replication-formats.html