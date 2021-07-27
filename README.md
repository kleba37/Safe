#Напишите программу подбора кода открытия сейфа.

Условие:

- Сейф принимает максимум 10 попыток открытия, после чего уходит в блокировку на 1 минуту.
- Если сделать попытку во время блокировки - время увеличится на 1 минуту
- PIN состоит из четырех цифр [0-9]
- Каждый из опробованных вариантов должен сохраняться в базу данных mysql
- При запуске программы должна быть возможность продолжить подбор с предыдущего места
- Пользователь должен видеть кол-во совершенных попыток
- Система должна предусматривать возможность создания нескольких объектов для ускорения процесса подбора (ограничение на блокировку распространяется только на объект)
 
Код должен быть написан в строгой типизации на PHP 7.4 или PHP 8
Никакого фронта быть не должно. 
Сообщение данных через print
