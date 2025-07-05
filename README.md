# kapau-men
Kapau-men is a simple web application for kind of ordering Padang food :) Indonesian fav taste and delicious food using postgre HTML, CSS, JS, and PHP with Postgres DB. These one I'm create by my own to learn feeding data and post form action for booking order menus and queue.


## DB Creation

### Create DB 

```
CREATE DATABASE kapau_db;

```

### Create Table Form Order

```
CREATE TABLE orders (
  id SERIAL PRIMARY KEY,
  name TEXT,
  phone TEXT,
  menu_item TEXT,
  ordered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

```

### Adding More table
```

CREATE TABLE menu_items (
  id SERIAL PRIMARY KEY,
  name TEXT NOT NULL,
  description TEXT NOT NULL,
  price INT NOT NULL,
  image_path TEXT NOT NULL
);

```
### Adding Value
```
INSERT INTO menu_items (name, description, price, image_path) VALUES
('Nasi Ayam Goreng', 'Nasi Ayam digoreng dengan bumbu lengkuas khas minang.', 25000, 'assets/images/nasi-ayam-goreng.jpg'),
('Nasi Ayam Gulai', 'Nasi dengan ayam gulai kuah kuning dengan kelapa santan khas minang.', 35000, 'assets/images/nasi-ayam-gulai.jpeg'),
('Nasi Ayam Pop', 'Nasi dengan ayam pop kering dengan sambal khas minang', 30000, 'assets/images/nasi-ayam-pop.jpeg'),
('Nasi Dendeng', 'Nasi dengan daging sapi digoreng kering dan sambal balado khas minang', 30000, 'assets/images/nasi-dendeng.jpeg'),
('Nasi Ikan Bakar', 'Nasi dengan ikan dibakar pakai arang kelapa tanpa minyak khas minang', 30000, 'assets/images/nasi-ikan-bakar.jpeg'),
('Nasi Kapau', 'Nasi khas minang komplit rames murah', 30000, 'assets/images/nasi-kapau.jpeg'),
('Nasi Rendang', 'Nasi dengan daging sapi berbumbu rendang khas minang', 30000, 'assets/images/nasi-rendang.jpg'),
('Nasi Telur Barendo, 'Nasi komplit dengan telur kriting atau barendo khas minang', 30000, 'assets/images/nasi-telur-barendo.jpeg'),
('Nasi Tunjang', 'Nasi dengan kikil sapi empuk kenyal tanpa tulang dan bergulai khas minang', 30000, 'assets/images/nasi-tunjang.jpeg');

```
