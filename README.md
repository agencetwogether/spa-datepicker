## Installation
### Clone this repository
```
git clone https://github.com/agencetwogether/spa-datepicker.git
```
### Install dependencies
```
composer install
```

```
npm install
```

### Create database (sqlite) and seed
```
php artisan migrate --seed
```

### Launch server
```
php artisan serve
```

### Access demo
Go to host and login with 
```
email: demo@test.test
password: password 
```

### See bug
Open browser console

Go to Booking resource and create new, when you choose a church, errors occur...

Same way, if you edit a record, when you select a new church, errors occur...

### Nota
Try also with hard refresh cache browser
