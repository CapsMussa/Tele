ТЗ для К телеком

Для хранения информации об оборудовании в базе данных используется 2
таблицы (использовать MySQL и работу с миграциями):
1. «Тип оборудования» поля: ID, наименование типа оборудования, маска
серийного номера.
2. «Оборудование» поля: ID, id типа оборудования, серийный номер (уникальное
поле в связке с типом оборудования), примечание/комментарий.
При создании новых записей интерфейс принимает массив объектов, каждый из
которых валидируется. Каждый серийный номер оборудование проверяется на
соответствие маски выбранного типа.
Ошибка валидации/сохранения одного объекта не должны приводить к
остановке цикла обработки. По каждому из переданных объектов должен быть
сформирован ответ (в случае успеха вернуть созданный объект, в случае ошибки
массив сообщений

● N – цифра от 0 до 9;
● A – прописная буква латинского алфавита;
● a – строчная буква латинского алфавита;
● X – прописная буква латинского алфавита либо цифра от 0 до 9;
● Z –символ из списка: “-“, “_”, “@”.
