We needed a way to version control database tables like we have with other files.

STEPS:

**to backup** (do this everytime you do git push if you've worked on database)

- go to cmd
- execute the following command:
    mysqldump -u root -p <databaseName> > <path to dbVersionControl folder in this repo with new file name>

    For example:
    mysqldump -u root -p entrancems > C:\xampp\htdocs\EntranceMS\database\dbVersionControl\entrancems0.sql

now your changes are backed up


**to restore** (do this everytime you do git pull when others have made changes to the database)

- go to cmd (important as '<' operator does not seem to work in VisualStudio code terminal atleast in my case)

- execute the following commands:

    (To drop and create new db)
    mysql -u root -p (this will give you access to the database)

    (you will be in a mariadb-like interface in the terminal)

    drop database <databasename>;
    create database <databasename>;
    (now exit the interface with 'Ctrl+C')

    mysql -u root -p <databaseName> < <path to dbVersionControl folder in this repo with filename>

    For example
    mysql -u root -p testdb < C:\xampp\htdocs\EntranceMS\database\dbVersionControl\myChangedDatabase.sql

now all the changes are updated!

Notes:
- To name a backup, put databasename and a number at the end. Do not delete previous files.
- You have a better method to sync db -> let me know
- if mysql commands are not recognized in the terminal, you need to add this path to environment variables:
    C:\xampp\mysql\bin
    (putting it at the top and a reboot was needed for me)
- if '<' command shows error, use windows command prompt in administrator mode
- https://www.sqlshack.com/how-to-backup-and-restore-mysql-databases-using-the-mysqldump-command/ for more info about mysqldump