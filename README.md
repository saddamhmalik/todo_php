

https://github.com/saddamhmalik/todo_php/assets/49063259/32067456-ecd9-48be-869c-b3fb09c10f53


# PHP To-Do List Project

This project is a simple to-do list application developed using PHP.

## Setup Instructions

### 1. Create Table SQL

Run the following SQL command to create the necessary table for tasks:

```sql
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    completed BOOLEAN DEFAULT 0
);
```
### 2. Start the PHP Development Server
To run the PHP development server, navigate to the todo directory in your terminal and execute the following command:
```php 
php -S localhost:8000
```
