# hymnlanguages

To test locally: 

```
php -S localhost:8000
```

1. Go to localhost:8000/index.php, updating number or languages posts to `process.php`
2. localhost:8000/display.php calls `get_language.php` and `get_numbers.php` every 1 second to update the page