# Проект автоматизации тестирования на Codeception (обёртка Selenium)

## Описание проекта

Этот проект предназначен для автоматизации тестирования веб-приложений с использованием **Codeception** версии 4 и **PHP** 7.4.2. Для генерации отчетов используется **Allure**. Тесты включают функциональные и приемочные сценарии, с подробным описанием шагов и расширенными отчетами.

## Требования

- **PHP 7.4.2**
- **Composer** (должен быть установлен на локальной машине)
- **Codeception 4** 
- **Chromedriver** (либо драйвер на любой другой браузер, в таком случае заменить в файле acceptance.suite.yml)
- **Allure CLI** для генерации отчетов

## Установка

### 1. Установка Composer

Перед началом работы убедитесь, что на вашей локальной машине установлен **Composer**. Composer необходим для управления зависимостями в проекте.

Следуйте инструкциям на официальном сайте [getcomposer.org](https://getcomposer.org/download/) для установки Composer на вашу операционную систему.

Для проверки успешной установки Composer выполните команду:

```bash
composer --version
```

### 2. Клонирование репозитория

```bash
git clone git@github.com:VelikQq/TestTask.git
cd TestTask
```

### 3. Установка зависимостей через Composer

После установки Composer и клонирования репозитория выполните команду:

```bash
composer install
```

### 4. Установка selenium-standalone

- Требуется Java
- Требуется NodeJS
- Самый быстрый способ установки [selenium-standalone использование NodeJS](https://www.npmjs.com/package/selenium-standalone).

### 5. Установка Chromedriver

- 1.Скачайте релиз Chromedriver соответсвующий вашей версии chrome на локальной машине [официального сайта](https://getwebdriver.com/chromedriver).
- 2.Положите в корень проекта. (замените тот который лежит сейчас в проекте)

### 6. Установка Allure CLI

Для генерации отчетов убедитесь, что у вас установлен Allure CLI. Ниже приведены инструкции для установки Allure CLI на Windows и macOS.

**Windows:**

**Через Scoop:**

```bash
scoop install allure
```

**Через Chocolatey:**

```bash
choco install allure
```

**Ручная установка:**

- 1.Скачайте последний релиз Allure CLI с [официального сайта](https://github.com/allure-framework/allure2/releases).
- 2.Распакуйте архив и добавьте путь к папке bin в переменную среды PATH.

**macOS:**

**Через Homebrew:**

```bash
brew install allure
```

**Ручная установка:**

- 1.Скачайте последний релиз Allure CLI с [официального сайта](https://github.com/allure-framework/allure2/releases).
- 2.Распакуйте архив и добавьте путь к папке bin в переменную среды PATH.
- 3.Обновите ~/.zshrc или ~/.bash_profile, добавив следующую строку:

    ```bash
    export PATH=$PATH:/path/to/allure/bin
    ```

    Замените /path/to/allure/bin на фактический путь к директории bin Allure.

## Запуск тестов

###1. **Запуск selenium-standalone**

```bash
selenium-standalone start
```

###2. **Запуск всех тестов**

Для запуска всех тестов с отображением подробных шагов и отладочной информации:

```bash
php vendor/bin/codecept run --debug --steps
```

###3. **Запуск тестов в конкретном модуле**

Вы можете запустить тесты в определенном модуле (например, acceptance):

```bash
php vendor/bin/codecept run acceptance --debug --steps
```

###4. **Генерация отчета Allure**

После выполнения тестов, для генерации и просмотра отчета локально выполните:

```bash
allure serve tests/_output/allure-results
```

Этот отчет автоматически откроется в вашем браузере и будет доступен по адресу http://localhost:{port}, где {port} будет случайно выбранным свободным портом.

## Структура проекта

- **tests/acceptance/** - Тесты для проверки пользовательских сценариев.
- **tests/_output/** - Директория для хранения отчетов, логов и скриншотов.
- **tests/_support/** - Вспомогательные классы и настройки.

## Настройка окружения

Файл **codeception.yml** и файлы конфигурации сьютов содержат основные настройки для запуска тестов.
