# Хоккей (тестовое задание)

## Суть задания

1) Форкнуть этот проект

2) Установить проект
```bash
make install
```

3) Открыть в терминале в докер-контейнер hockey-php-fpm 
```bash
make bash
```

4) Запустить юнит-тесты и убедиться, что они не проходят
```bash
root@1312abe3bf8d:/var/www# vendor/bin/phpunit 
```

5) Добиться того, чтоб все тесты проходили (сами тесты изменять нельзя)


6) Также будет плюсом, если статический анализатор не выявит проблем в коде.
Для его запуска используется команда
```bash
root@1312abe3bf8d:/var/www# vendor/bin/phpunit 
```
