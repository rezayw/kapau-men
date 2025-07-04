# kapau-men
Kapau-men is a simple web application for kind of ordering Padang food :) Indonesian fav taste and delicious food using postgre HTML, CSS, JS, and PHP with Postgres DB. These one I'm create by my own to learn feeding data and post form action for booking order menus and queue.


## DB Creation

### Create DB 

```
CREATE DATABASE kapau_db;

```

### Create Table

```
CREATE TABLE orders (
  id SERIAL PRIMARY KEY,
  name TEXT,
  phone TEXT,
  menu_item TEXT,
  ordered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
