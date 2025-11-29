# Laravel Product Catalog
Веб-каталог товарів із категоріями, авторизацією та адмін-панеллю. Проєкт розроблено в рамках курсової роботи.
________________________________________
# Функціонал

## Публічна частина

- Перегляд каталогу товарів
- Пошук за назвою та описом
- Фільтрація за категорією
- Фільтр за ціною (від/до)
- Сторінка товару
## Авторизація

-	Реєстрація та логін
-	Вихід з акаунта
-	Ролі користувачів:
-	Admin — повний доступ
-	User — лише перегляд каталогу

## Адмін-панель
-	CRUD товарів
-	CRUD категорій
-	Завантаження зображень у Storage
-	Валідація форм
________________________________________

# Запуск проєкту (Laragon)

## Клонування або розпакування проєкту
Скопіювати проєкт у папку:

C:\laragon\www\your_project

Laragon автоматично створить домен:

http://your_project.test

________________________________________

# Налаштування .env

  Створити файл .env, якщо його ще немає:
  
cp .env.example .env

  Змінити параметри БД:
  
Laragon створює готову MySQL базу даних root / no password

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=cursova     ← створити вручну у phpMyAdmin

DB_USERNAME=root

DB_PASSWORD=

Створити ключ додатку:

php artisan key:generate

________________________________________

# Міграції та Seeders

## Запустити міграції

php artisan migrate

## Створення адміністратора через сидер

Якщо є AdminSeeder:

php artisan db:seed --class=AdminSeeder

Приклад сидера:

User::create([

    'name' => 'Admin',
    
    'email' => 'admin@example.com',
    
    'password' => Hash::make('admin123'),
    
    'role' => 'admin',
    
]);


- Тепер можна зайти як:
  
admin@example.com

admin123

________________________________________

# Storage — налаштування зображень

Laravel зберігає фото у:

storage/app/public/products

Щоб вони відкривалися з браузера — потрібен symbolic link.

## Створити storage link

php artisan storage:link

Якщо отримаєш помилку "link already exists":

1.	видалити папку
   
2.	public/storage
	
3.	створити заново:
	
4.	php artisan storage:link
	
Після цього зображення доступні за шляхом:

/storage/products/filename.jpg

________________________________________

# Основні маршрути

Публічні:

/                – головна

/products        – каталог

/products/{id}   – сторінка товару

Авторизація:

/login

/register

/logout

Адмінські:

/admin                 – головна панель

/categories/*          – CRUD категорій

/products/*            – CRUD товарів

________________________________________

# Структура бази даних (коротко)

Таблиця products

-	id, name, description, price
-	category_id → FK
-	image (шлях до фото)
-	timestamps

Таблиця categories

-	id, name

Таблиця users

-	id, name, email, password
-	role (user/admin)

________________________________________

# Висновок

Проєкт реалізує повний веб-каталог товарів з ролями доступу, адмін-панеллю та адаптивним інтерфейсом.
Підходить для демонстрації навичок Laravel, MVC, CRUD та роботи зі Storage.
