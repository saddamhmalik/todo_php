

https://github.com/saddamhmalik/todo_php/assets/49063259/32067456-ecd9-48be-869c-b3fb09c10f53


#Table: SQL :
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    completed BOOLEAN DEFAULT 0
);

#Navigate to todo directory in terminal,
-> php -S localhost:8000 
