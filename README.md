# Форма обратной связи (отправки заявки)

![Изображение](https://stately-cupcake-b0602a.netlify.app/feedback.png)

## Тестовое задание для компании, разрабатывающей решения Call-To-Action и повышающей вовлечённость клиентов

> ### **Задача:** сделать форму обратной связи.
>
> -   При сохранении заявки использовать паттерн фабрика.
> -   Реализовать структуру, чтобы можно было добавлять новые места для хранения заявок, например другая база данных или email.
> -   Изначально реализовать сохранение в базу и в файл. Саму структуру базы можно не делать.
> -   Поля: имя, телефон, само обращение. Валидация данных на бекенде.
>
> ### Что необходимо использовать
>
> -   PHP 7
> -   Фреймворк Laravel или mvc фреймворк
> -   ООП (для создания заявки и места для хранения заявки)
> -   DDD для организации приложения (не обязательно)
> -   Фреймворк Vue (обязательно)

## Запуск

```
git clone https://github.com/drmnk/feedback.git
cd feedback
cp .env.example .env
# указать полный путь к sqlite базе в .env переменной DB_DATABASE
php artisan key:generate

composer install
npm install
npm run build
php artisan migrate
php artisan serve
```

## Некоторые моменты

### Хранение данных и ООП

Так как по факту мы не храним заявки, а "отправляем" их через некоторый транспорт (например, email, ведь точно не будет местом хранения) - то по факту сквозной нумерации у нас не будет.

Однако в реальности же как-то их нужно было бы разделять между собой. Поэтому к заявкам добавляется UUID. Но в той же почте он точно не понадобится. Возможно, вместо интерфейса (который сейчас очень куцый) лучше было бы создать родительский класс (который бы всё равно получился очень куцым). Однако для тестового в общем сойдёт, мне кажется.

Для хранения мы просто используем уже имеющиеся в Ларавеле фасады DB и Storage, поэтому можно создавать соединения обычными способами через конфиги, после чего использовать их для хранения заявок.

### 8 vs 7

Так, ну буду честным сразу - _я немного срезал углы_. Я использовал PHP8 - только потому, что сейчас на Мак проблематично скачать PHP7 через homebrew (**он больше не поддерживается :/**), а в докер это паковать я немного заленился, всё же прекрасно работает через php artisan serve.

Но здесь из особенностей PHP8 используются только readonly свойства классов (для класса DTO) и собственно определение свойств в конструкторе. Ну и версия Ларавель 9-я, а с PHP7 мы бы просто установили 8-ю.

Но я думаю для переносимости запакую в Докер это чуть попозже.

### DDD

Ещё небольшая оговорка - организация DDD. Тут, как бы, сколько людей, столько и мнений. Я не читал оригинальную книгу Эрика Эванса (но видел много мнений, что сейчас она уже немного устарела, особенно после появления ORM - не могу ничего сказать, прочитаю и скажу).

Но я натолкнулся на хорошее и очень красивое определение от [Мартина Джо](https://martinjoo.dev):

> Domain-Driven Design is a software development approach that tries to bring the business language and the source code as close as possible.
>
> To be a little bit more specific it achieves this by making every important "stuff" a first-class citizen.

То есть мы должны в разработке просто начать распоряжаться терминами бизнеса, а не терминами программистов. Создавать не только классы-"существительные", но и классы-"действия", описывающие бизнес-процессы типа "ОтгрузитьСоСклада", "УвеличитьСкидкуКлиента".

Однако при этом надо не начать воевать с фреймворком. Так как у нас тут маленькая задача со всего одним, по факту, процессом - "отправить/сохранить заявку через некий канал связи", то не знаю, считается ли настоящим DDD всего один метод `Feedback::store`.

Однако что точно мы можем применить из DDD-мира - это Data Transfer Objects. Не будем кидаться непонятным "массивом" между обработчиками, создадим один жёсткий класс, отвечающий только за перенос данных заявки.

Конечно, в реальном мире для приложения мы бы воспользовались скорее всего пакетом от Spatie, но получилось довольно мило.

### Vue

Ну а Вью прикручен с помощью [InertiaJS](https://inertiajs.com). Да здавствует `modern monolith`
